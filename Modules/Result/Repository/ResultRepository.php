<?php


namespace Modules\Result\Repository;


use App\DesignPatterns\Repository;
use Modules\Result\Entities\Result;

class ResultRepository extends Repository
{
    /**
     * @var Result
     */
    public $model;

    public function __construct()
    {
        $this->model = new Result();
    }

    public function getResultsOfQuiz ($quiz_id){
        return result::where('form_id',$quiz_id)
            ->get();
    }

}
