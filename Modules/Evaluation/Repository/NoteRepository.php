<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Note;

class NoteRepository extends Repository
{
    /**
     * @var Note
     */
    public $model;

    public function __construct()
    {
        $this->model = new Note();
    }

    public function getReportByCircleId ($circle_id){
        return Note::where('circle_id',$circle_id)
            ->where('type','report')
            ->first();
    }

    public function getAllAnswersForQuestionOfCircle ($circle_id){
        return Note::where('circle_id',$circle_id)
            ->where('type','question')
            ->with('answers')
            ->with('answers.user')
            ->with('answers.message')
            ->get();
    }

    public function getAllQuestions (){
        return Note::where('type','question')
            ->groupBy('title')
            ->get();
    }

    public function getTempateWithType ($type){
        return Note::where('type',$type)
            ->first();
    }

    public function getUserTemplateOfCircle ($type,$circle_id){
        return Note::where('type',$type)
            ->where('circle_id',$circle_id)
            ->first();

    }

    public function getAllNotesOfCircleByType ($type,$circle_id){
        return Note::where('circle_id',$circle_id)
            ->where('type',$type)
            ->get();
    }

    public function getBehaviorTemplateByEvaluationId  ($evaluation_id){
        return Note::where('circle_id',$evaluation_id)
            ->where('type','behavior_template')
            ->first();
    }
}
