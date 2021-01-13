<?php


namespace Modules\Result\Http\Service;


use Modules\Result\Repository\AnswerQuizRepository;

class AnswerQuizService
{

    /**
     * @var AnswerQuizRepository
     */
    private $answerQuizRepo;

    public function __construct(
        AnswerQuizRepository $answerQuizRepository
    )
    {
        $this->answerQuizRepo = $answerQuizRepository;
    }

}
