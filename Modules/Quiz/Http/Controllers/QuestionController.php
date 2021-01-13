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
        return view('customer.new_question',compact('active','user','quiz'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['position'] = $this->questionService->getLastPosition ($data['form_id']);
        $question = $this->questionService->createQuestion($data);
        return redirect("questions/$question->id/edit");
    }

    public function show($id)
    {
        return view('quiz::show');
    }

    public function edit($id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $question = $this->questionService->getQuestion ($id);
        $quiz = $this->quizService->getQuiz($question->form_id);
        return view('customer.new_question',compact('active','user','quiz','question'));
    }

    public function update(Request $request, $id)
    {
        $data=$request->all();
        $this->questionService->updateQuestion($data,$id);
        return redirect("questions/$id/edit");
    }

    public function destroy($id)
    {
        $this->questionService->deleteQuestion($id);
        return back();
    }
}
