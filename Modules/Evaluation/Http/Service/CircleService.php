<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\CircleRepository;

class CircleService
{

    /**
     * @var CircleRepository
     */
    private $circleRepo;

    public function __construct(
        CircleRepository $circleRepository
    )
    {
        $this->circleRepo = $circleRepository;
    }

    public function createCircle ($data){
        return $this->circleRepo->create($data);
    }

    public function getCirclesOfEvaluations ($evaluation_id){
        return $this->circleRepo->getAllCirclesOfEvaluation ($evaluation_id);
    }

    public function getCircleById ($id){
        return $this->circleRepo->getCircleById($id);
    }

}
