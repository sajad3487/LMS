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
            ->get();
    }

    public function getCircleById ($id){
        return Circle::where('id',$id)
            ->with('questions')
            ->with('users')
            ->first();
    }

}
