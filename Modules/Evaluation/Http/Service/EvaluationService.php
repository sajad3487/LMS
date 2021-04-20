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

    public function getEvaluationById ($id){
        return $this->evaluationRepo->getById($id);
    }

}
