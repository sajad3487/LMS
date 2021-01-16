<?php


namespace Modules\Result\Repository;


use App\DesignPatterns\Repository;
use Modules\Result\Entities\AnswerQuiz;

class AnswerQuizRepository extends Repository
{
    public $model;

    public function __construct()
    {
        $this->model = new AnswerQuiz();
    }

    public function getAnswerWithQuestion($answer_id){
        return AnswerQuiz::where('id',$answer_id)
            ->with('question_answer')
            ->first();
    }

}
