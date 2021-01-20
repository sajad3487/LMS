<?php

namespace Modules\Quiz\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\QuestionService;
use Modules\Quiz\Http\Service\QuizService;

class QuizController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var QuizService
     */
    private $quizService;
    /**
     * @var QuestionService
     */
    private $questionService;

    public function __construct(
        UserService $userService,
        QuizService $quizService,
        QuestionService $questionService
    )
    {
        $this->userService = $userService;
        $this->quizService = $quizService;
        $this->questionService = $questionService;
    }

    public function index()
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quizzes = $this->quizService->getUserQuizzes(auth()->id());
        return view('customer.quizzes', compact('active', 'user', 'quizzes'));
    }


    public function create()
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.new_quiz', compact('active', 'user'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $quiz = $this->quizService->createQuiz($data);
        return redirect("quizzes/$quiz->id/edit");
    }


    public function show($id)
    {
        return view('quiz::show');
    }


    public function edit($id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz($id);
        return view('customer.new_quiz', compact('active', 'user', 'quiz'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->quizService->updateQuiz($data, $id);
        return back();
    }


    public function destroy($id)
    {
        dd($id);
    }

    public function view($id)
    {
        $quiz = $this->quizService->getQuiz($id);
        if ($quiz->status) {
            return view('quiz', compact('quiz'));
        }
        return redirect('/');
    }

    public function copy($id)
    {
        $quiz = $this->quizService->getQuiz($id);
        $quiz_data['user_id'] = $quiz->user_id;
        $quiz_data['title'] = $quiz->title;
        $quiz_data['first_name_label'] = $quiz->first_name_label;
        $quiz_data['first_name_requirement'] = $quiz->first_name_requirement;
        $quiz_data['last_name_label'] = $quiz->last_name_label;
        $quiz_data['last_name_requirement'] = $quiz->last_name_requirement;
        $quiz_data['email_label'] = $quiz->email_label;
        $quiz_data['email_requirement'] = $quiz->email_requirement;
        $quiz_data['placeholder'] = $quiz->placeholder;
        $quiz_data['status'] = $quiz->status;
        $quiz_data['taken'] = $quiz->taken;
        $quiz_data['average_score'] = $quiz->average_score;
        $quiz_data['average_percentage'] = $quiz->average_percentage;
        $quiz_data['button_text'] = $quiz->button_text;
        $new_quiz = $this->quizService->createQuiz($quiz_data);
        foreach ($quiz->question as $question){
            $this->questionService->makeDuplicateQuestionForQuiz($question->id,$new_quiz->id);
        }
        return redirect("quizzes/$new_quiz->id/edit");
    }


}
