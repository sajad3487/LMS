<?php


namespace Modules\Quiz\Http\Service;


use Modules\Quiz\Repository\OptionRepository;

class OptionService
{
    /**
     * @var OptionRepository
     */
    private $optionRepo;

    public function __construct(
        OptionRepository $optionRepository
    )
    {
        $this->optionRepo = $optionRepository;
    }

    public function createOption ($data){
        return $this->optionRepo->create($data);
    }

    public function updateOption ($data,$id){
        return $this->optionRepo->update($data,$id);
    }

}
