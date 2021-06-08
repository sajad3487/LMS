<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Behavior;

class BehaviorRepository extends Repository
{
    /**
     * @var Behavior
     */
    public $model;

    public function __construct()
    {
        $this->model = new Behavior();
    }

    public function getBehaviorOfClient ($evaluation_id){
        return Behavior::where('evaluation_id',$evaluation_id)
            ->with('scrollers')
            ->with('scrollers.circle')
            ->with('scrollers.scroller_answers_detail')
            ->get();
    }

}
