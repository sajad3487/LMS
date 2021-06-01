<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Evaluation;

class EvaluationRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Evaluation();
    }

    public function getAllEvaluationsOfMentor ($mentor_id){
        return Evaluation::where('mentor_id',$mentor_id)
            ->where('parent_id',0)
            ->with('user')
            ->with('active_circle')
            ->get();
    }

    public function getEvaluationById ($evaluation_id){
        return Evaluation::where('id',$evaluation_id)
            ->with('circles')
            ->with('circles.answers')
            ->with('circles.answers.answer_detail')
            ->with('circles.answers.user')
            ->with('circles.target')
            ->with('circles.journal')
            ->first();
    }

    public function getClientEvaluation  ($client_id){
        return Evaluation::where('user_id',$client_id)
            ->with('circles')
            ->with('circles.answers')
            ->with('circles.answers.answer_detail')
            ->with('circles.answers.user')
            ->with('circles.target')
            ->with('circles.report')
            ->with('circles.journal')
            ->first();
    }

}
