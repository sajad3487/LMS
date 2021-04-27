<?php


namespace Modules\Result\Repository;


use App\DesignPatterns\Repository;
use Modules\Result\Entities\AnswerQuestion;
use Modules\Result\Entities\answerQuiz;

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

    public function deleteQuestionsOfQuiz ($quiz_id){
        return answerQuestion::where('form_id',$quiz_id)
            ->delete();
    }

}
