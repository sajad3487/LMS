<?php


namespace Modules\Result\Http\Service;


use Modules\Result\Repository\AnswerQuestionRepository;

class AnswerQuestionService
{
    /**
     * @var AnswerQuestionRepository
     */
    private $answerQuestionRepo;

    public function __construct(
        AnswerQuestionRepository $answerQuestionRepository
    )
    {
        $this->answerQuestionRepo = $answerQuestionRepository;
    }

    public function createAnswerQuestion ($data){
        return $this->answerQuestionRepo->create($data);
    }

}
