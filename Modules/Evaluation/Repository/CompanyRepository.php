<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Company;

class CompanyRepository extends Repository
{
    /**
     * @var Company
     */
    public $model;

    public function __construct()
    {
        $this->model = new Company();
    }

}
