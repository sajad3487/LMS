<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Scroller;

class ScrollerRepository extends Repository
{

    /**
     * @var Scroller
     */
    public $model;

    public function __construct()
    {
        $this->model = new Scroller();
    }

    public function getAllScrollersOfCircle ($circle_id){
        return Scroller::where('circle_id',$circle_id)
            ->get();
    }

    public function getCircleBehaviorScroller ($behavior_id,$circle_id){
        return Scroller::where('behavior_id',$behavior_id)
            ->where('circle_id',$circle_id)
            ->first();
    }

}
