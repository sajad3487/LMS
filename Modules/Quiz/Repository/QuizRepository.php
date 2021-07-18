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
            ->orWhere('type','private')
            ->with('question')
            ->get();
    }

    public function getQuizById ($id){
        return Quiz::where('id',$id)
            ->with('question')
            ->with('question.option')
            ->with('question.answer')
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

    public function getActiveUserQuizzes ($user){
        return Quiz::Where(function($query) use ($user)
            {
                $query->where('status',1)
                    ->where('type','quiz')
                    ->where('parent_id',0);
            })
            ->orWhere(function($query) use ($user)
            {
                $query->Where("type",'private')
                    ->Where("parent_id",$user->company_id);
            })
            ->with('question')
            ->with('question.option')
            ->get();
    }

}
