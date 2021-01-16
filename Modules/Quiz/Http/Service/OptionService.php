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

    public function createOption($data)
    {
        return $this->optionRepo->create($data);
    }

    public function updateOption($data, $id)
    {
        return $this->optionRepo->update($data, $id);
    }

    public function deleteOption($id)
    {
        return $this->optionRepo->delete($id);
    }

    public function getOptionById($id)
    {
        return $this->optionRepo->getById($id);
    }


}
