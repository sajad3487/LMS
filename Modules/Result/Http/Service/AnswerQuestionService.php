<?php


namespace Modules\Result\Http\Service;


use Modules\Quiz\Http\Service\QuestionService;
use Modules\Result\Repository\AnswerQuestionRepository;

class AnswerQuestionService
{
    /**
     * @var AnswerQuestionRepository
     */
    private $answerQuestionRepo;
    /**
     * @var QuestionService
     */
    private $questionService;

    public function __construct(
        AnswerQuestionRepository $answerQuestionRepository,
        QuestionService $questionService
    )
    {
        $this->answerQuestionRepo = $answerQuestionRepository;
        $this->questionService = $questionService;
    }

    public function createAnswerQuestion ($data){
        return $this->answerQuestionRepo->create($data);
    }

    public function countOptionAnswer ($option_id){
        return $this->answerQuestionRepo->countOptionSelected ($option_id);
    }


}
