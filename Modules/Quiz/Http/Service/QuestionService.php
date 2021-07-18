<?php


namespace Modules\Quiz\Http\Service;


use Modules\Quiz\Repository\QuestionRepository;
use Modules\Result\Http\Service\ResultService;

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
    /**
     * @var ResultService
     */
    private $resultService;

    public function __construct(
        QuestionRepository $questionRepository,
        OptionService $optionService,
        ResultService $resultService
    )
    {
        $this->questionRepo = $questionRepository;
        $this->optionService = $optionService;
        $this->resultService = $resultService;
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
        return $this->questionRepo->getAllQuestionOfQuiz($quiz_id);
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


    public function getSectionsOfQuiz($quiz_id){
        return $this->questionRepo->getAllSectionsOfQuiz($quiz_id);
    }

    public function getQuestionsWithoutTitle ($quiz_id){
        return $this->questionRepo->getAllQuestionWithoutTitle ($quiz_id);
    }

    public function duplicateQuestionOfQuiz ($quiz_id,$prev_quiz_id){
        $sections = $this->questionRepo->getAllSectionsOfQuiz($prev_quiz_id);
//        dd($sections,$free_questions);
        foreach ($sections as $section){
            $data['form_id'] = $quiz_id;
            $data['parent_id'] = 0;
            $data['position'] = $this->getLastPosition ($quiz_id);
            $data['type'] = $section->type;
            $data['body'] = $section->body;
            $data['description'] = $section->description;
            $data['additional_info'] = $section->additional_info;
            $data['status'] = $section->status;
            $data['requirement'] = $section->requirement;
            $new_section = $this->questionRepo->create($data);
            foreach ($section->question as $question){
                $question_data['form_id'] = $quiz_id;
                $question_data['parent_id'] = $new_section->id;
                $question_data['position'] = $this->getLastPosition ($quiz_id);
                $question_data['type'] = $question->type;
                $question_data['body'] = $question->body;
                $question_data['description'] = $question->description;
                $question_data['additional_info'] = $question->additional_info;
                $question_data['status'] = $question->status;
                $question_data['requirement'] = $question->requirement;
                $new_question = $this->questionRepo->create($question_data);
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
            }
        }
        $free_questions = $this->questionRepo->getAllQuestionWithoutTitle($prev_quiz_id);
        foreach ($free_questions as $question_without){
            $q_data['form_id'] = $quiz_id;
            $q_data['parent_id'] = 0;
            $q_data['position'] = $this->getLastPosition ($quiz_id);
            $q_data['type'] = $question_without->type;
            $q_data['body'] = $question_without->body;
            $q_data['description'] = $question_without->description;
            $q_data['additional_info'] = $question_without->additional_info;
            $q_data['status'] = $question_without->status;
            $q_data['requirement'] = $question_without->requirement;
            $new_q = $this->questionRepo->create($q_data);
            foreach ($question_without->option as $option_without){
                $op_data['question_id'] = $new_q->id;
                $op_data['form_id'] = $new_q->form_id;
                $op_data['score'] = $option_without->score;
                $op_data['body'] = $option_without->body;
                $op_data['status'] = $option_without->status;
                $op_data['tag_score'] = $option_without->tag_score;
                $op_data['additional_info'] = $option_without->additional_info;
                $this->optionService->createOption($op_data);
            }
        }

    }

    public function duplicateSegment ($quiz_id,$prev_quiz_id){
        $segments = $this->resultService->getResultSegments($prev_quiz_id);
        foreach ($segments as $segment){
            $data['form_id']= $quiz_id;
            $data['min_score']= $segment->min_score;
            $data['max_score']= $segment->max_score;
            $data['segment_title']= $segment->segment_title;
            $data['result_body']= $segment->result_body;
            $data['result_media']= $segment->result_media;
            $data['status']= $segment->status;
            $this->resultService->createResultSegment($data);
        }
    }

    public function uploadMedia ($file) {
        $destination = base_path() . '/public_html/media/image/';
        $filename = rand(1111111, 99999999);
        $newFileName = $filename . $file->getClientOriginalName();
        $file->move($destination, $newFileName);
        return '/media/image/' . $newFileName;
    }


}
