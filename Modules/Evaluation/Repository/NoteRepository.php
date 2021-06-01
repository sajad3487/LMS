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
            ->with('answers')
            ->with('answers.user')
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

}
