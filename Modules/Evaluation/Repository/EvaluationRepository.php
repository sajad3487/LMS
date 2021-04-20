<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Evaluation;

class EvaluationRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Evaluation();
    }

}
