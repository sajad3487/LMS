<?php


namespace Modules\Quiz\Repository;


use App\DesignPatterns\Repository;
use Modules\Quiz\Entities\Quiz;

class QuizRepository extends Repository
{
    /**
     * @var Quiz
     */
    public $model;

    public function __construct()
    {
        $this->model = new Quiz();
    }

    public function getAllUserQuizzes ($user_id){
        return Quiz::where('user_id',$user_id)
            ->where('type','quiz')
            ->with('question')
            ->get();
    }

    public function getQuizById ($id){
        return Quiz::where('id',$id)
            ->with('question')
            ->with('question.option')
            ->first();
    }

    public function getQuizWithParentById ($quiz_id){
        return Quiz::where('id',$quiz_id)
            ->with('parent')
            ->with('question')
            ->with('question.option')
            ->first();
    }

    public function getAllUserSuperQuiz ($user_id){
        return Quiz::where('user_id',$user_id)
            ->where('type','super')
            ->with('question')
            ->with('quiz')
            ->get();
    }

    public function getSuperQuizById ($quiz_id){
        return Quiz::where('id',$quiz_id)
            ->with('quiz')
            ->with('quiz.question')
            ->with('quiz.question.option')
            ->with('segment')
            ->with('quiz.segment')
            ->first();
    }

}
