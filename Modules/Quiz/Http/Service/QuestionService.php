<?php


namespace Modules\Quiz\Http\Service;


use Modules\Quiz\Repository\QuestionRepository;

class QuestionService
{
    /**
     * @var QuestionRepository
     */
    private $questionRepo;
    /**
     * @var OptionService
     */
    private $optionService;

    public function __construct(
        QuestionRepository $questionRepository,
        OptionService $optionService
    )
    {
        $this->questionRepo = $questionRepository;
        $this->optionService = $optionService;
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

    public function updateQuestion ($data,$id){
        return $this->questionRepo->update($data,$id);
    }

    public function deleteQuestion ($id){
        return $this->questionRepo->delete($id);
    }

    public function getQuestionsOfQuiz ($quiz_id){
        return $this->questionRepo->getallQuestionOfQuiz($quiz_id);
    }

    public function makeDuplicateQuestion ($question_id){
        $question = $this->questionRepo->getQuestionById($question_id);
        $data['form_id'] = $question->form_id;
        $data['parent_id'] = $question->parent_id;
        $data['type'] = $question->type;
        $data['position'] = $this->getLastPosition ($data['form_id']);
        $data['body'] = $question->body;
        $data['description'] = $question->description;
        $data['additional_info'] = $question->additional_info;
        $data['status'] = $question->status;
        $data['requirement'] = $question->requirement;
        $new_question = $this->questionRepo->create($data);
        foreach ($question->option as $option){
            $option_data['question_id'] = $new_question->id;
            $option_data['form_id'] = $new_question->form_id;
            $option_data['score'] = $option->score;
            $option_data['body'] = $option->body;
            $option_data['status'] = $option->status;
            $option_data['tag_score'] = $option->tag_score;
            $option_data['additional_info'] = $option->additional_info;
            $this->optionService->createOption($option_data);
        }
        return $this->questionRepo->getQuestionById($new_question->id);
    }

    public function makeDuplicateQuestionForQuiz ($question_id,$quiz_id){
        $question = $this->questionRepo->getQuestionById($question_id);
        $data['form_id'] = $quiz_id;
        $data['position'] = $this->getLastPosition ($quiz_id);
        $data['body'] = $question->body;
        $data['additional_info'] = $question->additional_info;
        $data['status'] = $question->status;
        $data['requirement'] = $question->requirement;
        $new_question = $this->questionRepo->create($data);
        foreach ($question->option as $option){
            $option_data['question_id'] = $new_question->id;
            $option_data['form_id'] = $new_question->form_id;
            $option_data['score'] = $option->score;
            $option_data['body'] = $option->body;
            $option_data['status'] = $option->status;
            $option_data['tag_score'] = $option->tag_score;
            $option_data['additional_info'] = $option->additional_info;
            $this->optionService->createOption($option_data);
        }
        return $this->questionRepo->getQuestionById($new_question->id);
    }

    public function getSectionsOfQuiz($quiz_id){
        return $this->questionRepo->getAllSectionsOfQuiz($quiz_id);
    }

    public function getQuestionsWithoutTitle ($quiz_id){
        return $this->questionRepo->getAllQuestionWithoutTitle ($quiz_id);
    }

}
