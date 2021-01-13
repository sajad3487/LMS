<?php


namespace Modules\Quiz\Http\Service;


use Modules\Quiz\Repository\QuestionRepository;

class QuestionService
{
    /**
     * @var QuestionRepository
     */
    private $questionRepo;

    public function __construct(
        QuestionRepository $questionRepository
    )
    {
        $this->questionRepo = $questionRepository;
    }

    public function createQuestion ($data){
        return $this->questionRepo->create($data);
    }

    public function getLastPosition ($form_id){
        $last_question_position = $this->questionRepo->getLastPositionOfForm($form_id);
        if ($last_question_position == null){
            return 1;
        }else{
            return $last_question_position->position +1;
        }
    }

    public function getQuestion ($id){
        return $this->questionRepo->getQuestionById($id);
    }

}
