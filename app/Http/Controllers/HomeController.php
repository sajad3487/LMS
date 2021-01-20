<?php

namespace App\Http\Controllers;

use App\Http\Requests\customerSearchProduct;
use App\Http\Requests\ProfileRequest;
use App\Http\Services\UserService;
use Modules\Category\Http\Services\CategoryService;
use Modules\Order\Http\Services\OrderService;
use Modules\Product\Http\Services\ProductService;
use Modules\Quiz\Http\Service\QuizService;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * @var QuizService
     */
    private $quizService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(
        QuizService $quizService,
        UserService $userService
    )
    {
        $this->middleware('auth');
        $this->quizService = $quizService;
        $this->userService = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active = 1;
        $quizzes = $this->quizService->getUserQuizzes(auth()->id());
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.index',compact('active','quizzes','user'));
    }

    public function profile (){
        $active = 4;
        $quizzes = $this->quizService->getUserQuizzes(auth()->id());
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.profile',compact('active','quizzes','user'));
    }

    public function updateProfile (Request $request){
        $data = $request->all();
        $this->userService->updateUser($data,auth()->id());
        return back();
    }


}
