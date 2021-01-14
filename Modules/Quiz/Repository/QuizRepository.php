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
            ->with('question')
            ->get();
    }

    public function getQuizById ($id){
        return Quiz::where('id',$id)
            ->with('question')
            ->with('question.option')
            ->first();
    }

}
