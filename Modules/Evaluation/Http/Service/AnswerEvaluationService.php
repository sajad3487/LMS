<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\AnswerEvaluationRepository;

class AnswerEvaluationService
{
    /**
     * @var AnswerEvaluationRepository
     */
    private $answerEvaluationRepo;

    public function __construct(
        AnswerEvaluationRepository $answerEvaluationRepository
    )
    {
        $this->answerEvaluationRepo = $answerEvaluationRepository;
    }

    public function createAnswer ($data){
        return $this->answerEvaluationRepo->create($data);
    }

    public function getCircleAnswerOfUser ($user_id,$circle_id){
        return $this->answerEvaluationRepo->getAnswersOfUserToCircle ($user_id,$circle_id);
    }




}
