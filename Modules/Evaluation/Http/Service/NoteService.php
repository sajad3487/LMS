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

    public function createNote ($data){
        return $this->noteRepo->create($data);
    }

    public function updateNote ($data,$id){
        return $this->noteRepo->update($data,$id);
    }

    public function deleteNote ($id){
        return $this->noteRepo->delete($id);
    }

}
