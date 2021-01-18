<?php


namespace Modules\Result\Repository;


use App\DesignPatterns\Repository;
use Modules\Result\Entities\AnswerQuestion;

class AnswerQuestionRepository extends Repository
{
    /**
     * @var AnswerQuestion
     */
    public $model;

    public function __construct()
    {
        $this->model = new AnswerQuestion();
    }

    public function countOptionSelected ($option_id){
        return answerQuestion::where('option_id',$option_id)->count();
    }

}
