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

    public function deleteAllQuestionsOfQuiz ($quiz_id){
        return $this->answerQuestionRepo->deleteQuestionsOfQuiz ($quiz_id);
    }

    public function deleteQuestionsOfAnswer ($answer_id){
        return $this->answerQuestionRepo->deleteAllQuestionsOfAnswer ($answer_id);
    }

    public function updateAnswerQuestion ($data,$id){
        return $this->answerQuestionRepo->update($data,$id);
    }


}
