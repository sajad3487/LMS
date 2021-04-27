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
            ->get();
    }

}
