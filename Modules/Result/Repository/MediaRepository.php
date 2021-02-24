<?php


namespace Modules\Result\Repository;


use App\DesignPatterns\Repository;
use Modules\Result\Entities\Media;

class MediaRepository extends Repository
{
    /**
     * @var Media
     */
    public $model;

    public function __construct()
    {
        $this->model = new Media();
    }

}
