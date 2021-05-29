<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\CircleRepository;

class CircleService
{

    /**
     * @var CircleRepository
     */
    private $circleRepo;
    /**
     * @var AnswerEvaluationService
     */
    private $answerEvaluationService;

    public function __construct(
        CircleRepository $circleRepository,
        AnswerEvaluationService $answerEvaluationService
    )
    {
        $this->circleRepo = $circleRepository;
        $this->answerEvaluationService = $answerEvaluationService;
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

    public function changeStatusOfCircle ($circle_id,$next_level){
        $circle = $this->circleRepo->getCircleById($circle_id);
        if ($circle->status == 1 && $next_level == 2){
            if ($circle->questions->count() != 0 && $circle->users->count() != 0){
                $data['status'] = 2;
                $this->circleRepo->update($data,$circle_id);
            }
        }elseif ($circle->status == 2 && $next_level == 3){
            $data['status'] = 3;
            $this->circleRepo->update($data,$circle_id);
        }elseif ($circle->status == 3 && $next_level == 4){
            $data['status'] = 4;
            $this->circleRepo->update($data,$circle_id);
        }elseif ($circle->status == 4 && $next_level == 5){
            $data['status'] = 5;
            $this->circleRepo->update($data,$circle_id);
        }
    }

}
