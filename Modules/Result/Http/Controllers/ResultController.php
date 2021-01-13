<?php

namespace Modules\Result\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\QuizService;
use Modules\Result\Http\Service\ResultService;

class ResultController extends Controller
{
    /**
     * @var ResultService
     */
    private $resultService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var QuizService
     */
    private $quizService;

    public function __construct(
        ResultService $resultService,
        UserService $userService,
        QuizService $quizService
    )
    {
        $this->resultService = $resultService;
        $this->userService = $userService;
        $this->quizService = $quizService;
    }

    public function index($quiz_id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz ($quiz_id);
        $results = $this->resultService->getResultSegments($quiz_id);
        return view('customer.results',compact('active','user','quiz','results'));
    }

    public function create($quiz_id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz ($quiz_id);
        return view('customer.new_segment',compact('active','user','quiz'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
        $data = $this->resultService->createResultSegment();
    }

    public function show($id)
    {
        return view('result::show');
    }

    public function edit($id)
    {
        return view('result::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
