<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Note;

class NoteRepository extends Repository
{
    /**
     * @var Note
     */
    public $model;

    public function __construct()
    {
        $this->model = new Note();
    }

}
