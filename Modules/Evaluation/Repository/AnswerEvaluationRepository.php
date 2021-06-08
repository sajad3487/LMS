<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\AnswerEvaluation;

class AnswerEvaluationRepository extends Repository
{
    /**
     * @var Repository
     */
    public $model;

    public function __construct()
    {
        $this->model = new AnswerEvaluation();
    }

    public function getAnswersOfUserToCircle ($user_id,$circle_id){
        return AnswerEvaluation::where('user_id',$user_id)
            ->where('circle_id',$circle_id)
            ->where('parent_id',0)
            ->with('circle')
            ->with('circle.target')
            ->with('answer_detail')
            ->with('answer_detail.not')
            ->with('answer_detail.message')
            ->with('answer_detail.message.owner')
            ->first();
    }


}
