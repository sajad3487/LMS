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

    public function createAnswer($data)
    {
        return $this->answerQuizRepo->create($data);
    }

    public function calculateSumScore($answer_id)
    {
        $answer = $this->answerQuizRepo->getAnswerWithQuestion($answer_id);
        $score = 0;
        foreach ($answer->question_answer as $question_answer) {
            $score += $question_answer->score;
        }
        return $score;
    }

}
