<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\AnswerScroller;

class AnswerScrollerRepository extends Repository
{
    /**
     * @var AnswerScroller
     */
    public $model;

    public function __construct()
    {
        $this->model = new AnswerScroller();
    }

    public function getClientAnswersWithCircleId ($circle_id,$user_id){
        return AnswerScroller::where('user_id',$user_id)
            ->where('circle_id',$circle_id)
            ->where('parent_id',0)
            ->with('answer_scroller_detail')
            ->with('answer_scroller_detail.scroller')
            ->with('answer_scroller_detail.behavior')
            ->first();
    }

    public function getCircleScrollerAnswerOfUser ($user_id,$circle_id){
        return AnswerScroller::where('circle_id',$circle_id)
            ->where('user_id',$user_id)
            ->where('type','behavior_record')
            ->with('answer_scroller_detail')
            ->first();
    }

}
