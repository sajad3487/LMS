<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleAnswerRequest;
use Modules\Evaluation\Http\Service\AnswerEvaluationService;
use Modules\Evaluation\Http\Service\CircleService;

class AnswerEvaluationController extends Controller
{
    /**
     * @var AnswerEvaluationService
     */
    private $answerEvaluationService;
    /**
     * @var CircleService
     */
    private $circleService;

    public function __construct(
        AnswerEvaluationService $answerEvaluationService,
        CircleService $circleService
    )
    {
        $this->answerEvaluationService = $answerEvaluationService;
        $this->circleService = $circleService;
    }

    public function store(CircleAnswerRequest $request,$circle_id)
    {
//        dd($request->all(),$circle_id);
        $circle = $this->circleService->getCircleById($circle_id);
        $answer_data['evaluation_id'] = $circle->evaluation_id;
        $answer_data['circle_id'] = $circle_id;
        $answer_data['user_id'] = auth()->id();
        $answer_data['type'] = "answer_record";
        $answer_record = $this->answerEvaluationService->createAnswer($answer_data);
        foreach ($request->answer as $key=>$answer){
            $answer_detail['parent_id'] = $answer_record->id;
            $answer_detail['evaluation_id'] = $circle->evaluation_id;
            $answer_detail['not_id'] = $key;
            $answer_detail['circle_id'] = $circle_id;
            $answer_detail['user_id'] = auth()->id();
            $answer_detail['body'] = $answer;
            $answer_detail['type'] = "answer_detail";
            $this->answerEvaluationService->createAnswer($answer_detail);
        }
        $this->circleService->changeStatusOfCircle($circle_id,4);
        return back();
    }

}
