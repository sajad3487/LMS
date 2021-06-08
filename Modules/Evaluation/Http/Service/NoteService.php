<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\NoteRepository;

class NoteService
{
    /**
     * @var NoteRepository
     */
    private $noteRepo;

    public function __construct(
        NoteRepository $noteRepository
    )
    {
        $this->noteRepo = $noteRepository;
    }

    public function createNote($data)
    {
        return $this->noteRepo->create($data);
    }

    public function updateNote($data, $id)
    {
        return $this->noteRepo->update($data, $id);
    }

    public function deleteNote($id)
    {
        return $this->noteRepo->delete($id);
    }

    public function getReportOfCircle($circle_id)
    {
        return $this->noteRepo->getReportByCircleId($circle_id);
    }

    public function getAnswersForQuestionOfCircle($circle_id)
    {
        return $this->noteRepo->getAllAnswersForQuestionOfCircle($circle_id);
    }

    public function getQuestions (){
        return $this->noteRepo->getAllQuestions ();
    }

    public function getTemplateByType ($type){
        return $this->noteRepo->getTempateWithType ($type);
    }

    public function getTemplateOfCircle ($type,$circle_id){
        return $this->noteRepo->getUserTemplateOfCircle ($type,$circle_id);
    }

    public function getNotesOfCircleByType ($type,$circle_id){
        return $this->noteRepo->getAllNotesOfCircleByType ($type,$circle_id);
    }

    public function getBehaviorTemplateOfEvaluation ($evaluation_id){
        return $this->noteRepo->getBehaviorTemplateByEvaluationId ($evaluation_id);
    }

}
