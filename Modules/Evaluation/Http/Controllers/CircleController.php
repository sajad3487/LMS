<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleRequest;
use Modules\Evaluation\Http\Requests\QuestionRequest;
use Modules\Evaluation\Http\Requests\ReportRequest;
use Modules\Evaluation\Http\Requests\UserRequest;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\EvaluationService;
use Modules\Evaluation\Http\Service\NoteService;

class CircleController extends Controller
{
    /**
     * @var CircleService
     */
    private $circleService;
    /**
     * @var NoteService
     */
    private $noteService;
    /**
     * @var EvaluationService
     */
    private $evaluationService;

    public function __construct(
        CircleService $circleService,
        NoteService $noteService,
        EvaluationService $evaluationService
    )
    {
        $this->circleService = $circleService;
        $this->noteService = $noteService;
        $this->evaluationService = $evaluationService;
    }

    public function store(CircleRequest $request)
    {
        $data = $request->all();
        $circle = $this->circleService->createCircle ($data);
        $this->evaluationService->addCircleToEvaluation($data['evaluation_id'],$circle->id);
        return back();
    }

    public function new_user (UserRequest $request){
        $circle = $this->circleService->getCircleById ($request->circle_id);
        foreach ($circle->users as $user){
            if ($user->id == $request->user_id){
                return back();
            }
        }
        $circle->users()->attach($request->user_id);
        $this->circleService->changeStatusOfCircle ($request->circle_id,2);
        return back();
    }

    public function delete_user (UserRequest $request){
        $circle = $this->circleService->getCircleById($request->circle_id);
        $circle->users()->detach($request->user_id);
        return back();
    }

    public function show_report ($circle_id){
        $circle = $this->circleService->getCircleById($circle_id);
        $active = 6;
        $report = $this->noteService->getReportOfCircle ($circle_id);
        $questions = $this->noteService->getAnswersForQuestionOfCircle ($circle_id);
//        dd($report->description);
//        dd($circle->answers->count(),$circle->users->count());
        return view('customer.report_circle',compact('circle','active','report','questions'));
    }

    public function store_report (ReportRequest $request,$circle_id){
        $data['description'] = $request->description;
        $data['circle_id'] = $circle_id;
        $data['type'] = 'report';
        $data['title'] = 'title';
        $data['status'] = 1;
        $report = $this->noteService->createNote($data);
        return back();
    }

    public function update_report (ReportRequest $request,$report_id){
        $data['description'] = $request->description;
        $this->noteService->updateNote($data,$report_id);
        return back();
    }

    public function send_report (Request $request,$circle_id){
        $data['description'] = $request->description;
        $this->noteService->updateNote($data,$request->report_id);
        $this->circleService->changeStatusOfCircle ($circle_id,5);
        return back()->with('success', 'Your report has been successfully sent');
    }

}
