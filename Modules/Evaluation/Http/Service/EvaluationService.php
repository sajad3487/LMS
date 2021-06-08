<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\EvaluationRepository;

class EvaluationService
{
    /**
     * @var EvaluationRepository
     */
    private $evaluationRepo;

    public function __construct(
        EvaluationRepository $evaluationRepository
    )
    {
        $this->evaluationRepo = $evaluationRepository;
    }

    public function createEvaluation ($data){
        return $this->evaluationRepo->create($data);
    }

    public function updateEvaluation($data,$id){
        return $this->evaluationRepo->update($data,$id);
    }

    public function getEvaluationById ($id){
        return $this->evaluationRepo->getEvaluationById($id);
    }

    public function getAllEvaluationsOfMentor ($mentor_id){
        return $this->evaluationRepo->getAllEvaluationsOfMentor ($mentor_id);
    }

    public function addCircleToEvaluation ($evaluation_id,$circle_id){
        $evaluation = $this->evaluationRepo->getEvaluationById($evaluation_id);
//        dd($evaluation);
        if ($evaluation->status == 1){
            $data['active_circle_id'] = $circle_id;
            $data['status'] = 2;
            $this->evaluationRepo->update($data,$evaluation_id);
        }
    }

    public function getEvaluationOfClient ($client_id){
        return $this->evaluationRepo->getClientEvaluation ($client_id);
    }



}
