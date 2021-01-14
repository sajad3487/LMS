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
        if(isset($request->file)){
            $data['result_media'] = $this->resultService->uploadMedia($request->file);
            unset($data['file']);
        }
        $check_range = $this->resultService->checkRangeOfSegment ($data['min_score'],$data['max_score'],$data['form_id']);
        if ($check_range == 'ok'){
            $segment = $this->resultService->createResultSegment($data);
            return redirect("segments/$segment->id/edit");
        }else{
            return back();
        }
    }

    public function show($id)
    {
        return view('result::show');
    }

    public function edit($id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $segment= $this->resultService->getSegment($id);
        $quiz = $this->quizService->getQuiz ($segment->form_id);
        return view('customer.new_segment',compact('active','user','quiz','segment'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(isset($request->file)){
            $data['result_media'] = $this->resultService->uploadMedia($request->file);
            unset($data['file']);
        }
        $check_range = $this->resultService->checkRangeOfSegmentForUpdate ($data['min_score'],$data['max_score'],$data['form_id'],$id);
        if ($check_range == 'ok'){
            $this->resultService->updateResultSegment($data,$id);
            return redirect("segments/$id/edit");
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        $this->resultService->deleteSegment ($id);
        return back();
    }
}
