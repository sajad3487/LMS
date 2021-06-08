<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Circle;

class CircleRepository extends Repository
{

    /**
     * @var Circle
     */
    public $model;

    public function __construct()
    {
        $this->model = new Circle();
    }

    public function getAllCirclesOfEvaluation ($evaluation_id){
        return Circle::where('evaluation_id',$evaluation_id)
            ->with('questions')
            ->with('users')
            ->with('scrollers')
            ->with('scrollers.behavior')
            ->get();
    }

    public function getCircleById ($id){
        return Circle::where('id',$id)
            ->with('questions')
            ->with('answers')
            ->with('answers.user')
            ->with('answers.answer_detail')
            ->with('answers.answer_detail.not')
            ->with('answers.answer_detail.message')
            ->with('answers.answer_detail.new_message')
            ->with('users')
            ->with('scrollers')
            ->with('scrollers.behavior')
            ->with('target')
            ->first();
    }

}
