<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Modules\Evaluation\Http\Service\CompanyService;
use Modules\Quiz\Http\Service\QuizService;
use Modules\Result\Http\Service\AnswerQuizService;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var CompanyService
     */
    private $companyService;
    /**
     * @var QuizService
     */
    private $quizService;
    /**
     * @var AnswerQuizService
     */
    private $answerService;

    public function __construct(
        UserService $userService,
        CompanyService $companyService,
        QuizService $quizService,
        AnswerQuizService $answerQuizService
    )
    {
        $this->userService = $userService;
        $this->companyService = $companyService;
        $this->quizService = $quizService;
        $this->answerService = $answerQuizService;
    }

    public function participant_dash (){
        $user = $this->userService->getClientWithCircles(auth()->id());
        $quizzes = $this->quizService->getQuizzesOfUserWithAnswersInfo(auth()->id());
        return view('user.user_dashboard',compact('user','quizzes'));
    }

    public function participant_login (){
        return view('auth.user_login');
    }

    public function participant_done_quiz ($quiz_id){
        $user = $this->userService->getClientWithCircles(auth()->id());
        $quizzes = $this->quizService->getQuizzesOfUserWithAnswersInfo(auth()->id());
        $quiz_answer = $this->answerService->getAnswerOfQuizForUser ($quiz_id,auth()->id());
        return view('user.user_quiz_answer',compact('user','quizzes','quiz_answer'));
    }

    public function index (){
        $users = $this->userService->getUserByType(3);
        $companies = $this->companyService->getAllCompanies();
        $active = 9;
        return view('customer.users',compact('users','companies','active'));
    }

    public function update (UserRequest $request,$id){
        $data = $request->all();
        $this->userService->updateUser($data,$id);
        return back();
    }

    public function destroy ($id){
        $this->userService->deleteUser ($id);
        return back();
    }

    public function add_company (Request $request,$id){
        $data = $request->all();
        $this->userService->updateUser($data,$id);
        return back();
    }


}
