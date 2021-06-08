<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleAnswerRequest;
use Modules\Evaluation\Http\Service\AnswerEvaluationService;
use Modules\Evaluation\Http\Service\AnswerScrollerService;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\ScrollerService;

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
    /**
     * @var AnswerScrollerService
     */
    private $answerScrollerService;
    /**
     * @var ScrollerService
     */
    private $scrollerService;

    public function __construct(
        AnswerEvaluationService $answerEvaluationService,
        CircleService $circleService,
        AnswerScrollerService $answerScrollerService,
        ScrollerService $scrollerService
    )
    {
        $this->answerEvaluationService = $answerEvaluationService;
        $this->circleService = $circleService;
        $this->answerScrollerService = $answerScrollerService;
        $this->scrollerService = $scrollerService;
    }

    public function store(CircleAnswerRequest $request,$circle_id)
    {
        $circle = $this->circleService->getCircleById($circle_id);
        if (isset($request->answer)){
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
        }
        if (isset($request->scroller_answer)){
            $scroller_data['evaluation_id'] = $circle->evaluation_id;
            $scroller_data['circle_id'] = $circle_id;
            $scroller_data['user_id'] = auth()->id();
            $scroller_data['type'] = "behavior_record";
            $scroller_record = $this->answerScrollerService->createAnswerScroller($scroller_data);
            foreach ($request->scroller_answer as $scroller_key=>$scroller_answer){
                $scroller = $this->scrollerService->getScrollerById($scroller_key);
                $scroller_detail['parent_id'] = $scroller_record->id;
                $scroller_detail['evaluation_id'] = $circle->evaluation_id;
                $scroller_detail['circle_id'] = $circle_id;
                $scroller_detail['owner_id'] = $scroller->behavior_id;
                $scroller_detail['scroller_id'] = $scroller_key;
                $scroller_detail['user_id'] = auth()->id();
                $scroller_detail['score'] = $scroller_answer;
                $scroller_detail['type'] = "behavior_detail";
                $this->answerScrollerService->createAnswerScroller($scroller_detail);
            }
        }
        $this->circleService->changeStatusOfCircle($circle_id,4);
        return back();
    }

}
