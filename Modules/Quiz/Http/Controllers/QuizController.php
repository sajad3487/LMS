<?php

namespace Modules\Quiz\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

    public function __construct(
        UserService $userService,
        QuizService $quizService
    )
    {
        $this->userService = $userService;
        $this->quizService = $quizService;
    }

    public function index()
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quizzes = $this->quizService->getUserQuizzes(auth()->id());
        return view('customer.quizzes',compact('active','user','quizzes'));
    }


    public function create()
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.new_quiz',compact('active','user'));
    }


    public function store(Request $request)
    {
        $data =$request->all();
        $data['user_id']= auth()->id();
        $quiz =$this->quizService->createQuiz($data);
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
        $quiz = $this->quizService->getQuiz ($id);
        return view('customer.new_quiz',compact('active','user','quiz'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        dd($id);
    }
}
