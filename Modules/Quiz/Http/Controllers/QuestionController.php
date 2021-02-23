<?php

namespace Modules\Quiz\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\QuestionService;
use Modules\Quiz\Http\Service\QuizService;

class QuestionController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var QuestionService
     */
    private $questionService;
    /**
     * @var QuizService
     */
    private $quizService;

    public function __construct(
        UserService $userService,
        QuestionService $questionService,
        QuizService $quizService
    )
    {
        $this->userService = $userService;
        $this->questionService = $questionService;
        $this->quizService = $quizService;
    }

    public function create($id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz($id);
        if($quiz->type == 'subquiz'){
            $active = 4;
        }
        return view('customer.new_question', compact('active', 'user', 'quiz'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['position'] = $this->questionService->getLastPosition($data['form_id']);
        $question = $this->questionService->createQuestion($data);
        $quiz = $this->quizService->getQuiz($question->form_id);
        if ($quiz->type == 'subquiz'){
            return redirect("superQuizzes/$quiz->parent_id/edit");
        }
        return redirect("quizzes/$question->form_id/edit");
    }

    public function show($id)
    {
        return view('quiz::show');
    }

    public function edit($id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $question = $this->questionService->getQuestion($id);
        $quiz = $this->quizService->getQuiz($question->form_id);
        return view('customer.new_question', compact('active', 'user', 'quiz', 'question'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $quiz_id = $data['form_id'];
        if (!isset($data['requirement'])) {
            $data['requirement'] = 0;
        }
        if (!isset($data['additional_info'])) {
            $data['additional_info'] = 0;
        }
        $this->questionService->updateQuestion($data, $id);
        $quiz = $this->quizService->getQuiz($quiz_id);
        if ($quiz->type == 'subquiz'){
            return redirect("superQuizzes/$quiz->parent_id/edit");
        }
        return redirect("quizzes/$quiz_id/edit");
    }

    public function destroy($id)
    {
        $this->questionService->deleteQuestion($id);
        return back();
    }

    public function copy($id)
    {
        $new_question = $this->questionService->makeDuplicateQuestion($id);
        return redirect("questions/$new_question->id/edit");
    }

    public function create_title($quiz_id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz($quiz_id);
        return view('customer.new_title', compact('active', 'user', 'quiz'));
    }

    public function edit_title($question_id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $question = $this->questionService->getQuestion($question_id);
        $quiz = $this->quizService->getQuiz($question->form_id);
        return view('customer.new_title', compact('active', 'user', 'quiz', 'question'));
    }

    public function createQuestionOfTitle($section_id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $section = $this->questionService->getQuestion($section_id);
        $quiz = $this->quizService->getQuiz($section->form_id);
        return view('customer.new_question', compact('active', 'user', 'quiz','section'));
    }
}
