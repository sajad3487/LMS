<?php


namespace Modules\Quiz\Repository;


use App\DesignPatterns\Repository;
use Modules\Quiz\Entities\Question;

class QuestionRepository extends Repository
{
    /**
     * @var question
     */
    public $model;

    public function __construct()
    {
        $this->model = new Question();
    }

    public function getLastPositionOfForm ($form_id){
        return Question::where('form_id',$form_id)
            ->orderBy('position','DESC')
            ->first();
    }

    public function getQuestionById ($id){
        return Question::where('id',$id)
            ->with('option')
            ->first();
    }

    public function getallQuestionOfQuiz ($quiz_id){
        return question::where('form_id',$quiz_id)
            ->orderBy('position','ASC')
            ->with('answer')
            ->with('option')
            ->with('answer.taken')
            ->with('answer.option')
            ->get();
    }

    public function getAllSectionsOfQuiz ($quiz_id){
        return question::where('form_id',$quiz_id)
            ->where('parent_id',0)
            ->where('type','title')
            ->with('question')
            ->with('question.option')
            ->get();
    }

    public function getAllQuestionWithoutTitle ($quiz_id){
        return question::where('form_id',$quiz_id)
            ->where('parent_id',0)
            ->where('type','!=','title')
            ->with('option')
            ->get();
    }

}
