<?php


namespace Modules\Result\Http\Service;


use Modules\Result\Repository\ResultRepository;

class ResultService
{
    /**
     * @var ResultRepository
     */
    private $resultRepo;

    public function __construct(
        ResultRepository $resultRepository
    )
    {
        $this->resultRepo = $resultRepository;
    }

    public function getResultSegments ($quiz_id){
        return $this->resultRepo->getResultsOfQuiz($quiz_id);
    }

    public function createResultSegment ($data){
        return $this->resultRepo->create($data);
    }

}
