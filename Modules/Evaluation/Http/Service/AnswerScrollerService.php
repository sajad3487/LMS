<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\AnswerScrollerRepository;

class AnswerScrollerService
{
    /**
     * @var AnswerScrollerRepository
     */
    private $answerScrollerRepo;

    public function __construct(
        AnswerScrollerRepository $answerScrollerRepository
    )
    {
        $this->answerScrollerRepo = $answerScrollerRepository;
    }

    public function createAnswerScroller ($data){
        return $this->answerScrollerRepo->create($data);
    }

    public function getClientAnswersByCircleId ($circle_id,$user_id){
        return $this->answerScrollerRepo->getClientAnswersWithCircleId ($circle_id,$user_id);
    }

    public function getCircleAnswerScrollerOfUser ($user_id,$circle_id){
        return $this->answerScrollerRepo->getCircleScrollerAnswerOfUser ($user_id,$circle_id);
    }

}
