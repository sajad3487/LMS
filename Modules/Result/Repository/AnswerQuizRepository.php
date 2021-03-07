<?php


namespace Modules\Result\Repository;


use App\DesignPatterns\Repository;
use Modules\Result\Entities\answerQuestion;
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


    public function getAllAnswerOfSegment ($min,$max,$form_id){
        return answerQuiz::where('form_id',$form_id)
            ->where('score','>=',$min)
            ->where('score','<=',$max)
            ->get();
    }

    public function getAllUsersOfQuiz ($quiz_id){
        return answerQuiz::where('form_id',$quiz_id)
            ->with('question_answer')
            ->with('question_answer.question')
            ->with('question_answer.option')
            ->get();
    }

    public function getAllUsersOfSuperQuiz ($quiz_id){
        return answerQuiz::where('form_id',$quiz_id)
            ->where('type','superquiz')
            ->with('quiz_answer.quiz')
            ->with('quiz_answer.question_answer')
            ->with('quiz_answer.question_answer.question')
            ->with('quiz_answer.question_answer.option')
            ->get();
    }

    public function getAllAnswerOfSuperQuiz ($answer_id){
        return answerQuiz::where('id',$answer_id)
            ->with('quiz_answer')
            ->with('quiz_answer.quiz')
            ->with('quiz_answer.question_answer')
            ->first();
    }

    public function getEmailAnswer ($email,$form_id){
        return answerQuiz::where('email',$email)
            ->where('form_id',$form_id)
            ->first();
    }


}
