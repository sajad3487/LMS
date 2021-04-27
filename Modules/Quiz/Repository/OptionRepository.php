<?php


namespace Modules\Quiz\Repository;


use App\DesignPatterns\Repository;
use Modules\Quiz\Entities\Option;

class OptionRepository extends Repository
{

    public $model;

    public function __construct()
    {
        $this->model = new Option();
    }

    public function deleteOptionsOfQuiz ($quiz_id){
        return Option::where('form_id',$quiz_id)
            ->delete();
    }

}
