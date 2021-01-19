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

}
