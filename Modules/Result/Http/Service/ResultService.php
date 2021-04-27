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

    public function getResultSegments($quiz_id)
    {
        return $this->resultRepo->getResultsOfQuiz($quiz_id);
    }

    public function createResultSegment($data)
    {
        return $this->resultRepo->create($data);
    }

    public function uploadMedia($file)
    {
        $destination = base_path() . '/public/image/';
        $filename = rand(1111111, 99999999);
        $newFileName = $filename . $file->getClientOriginalName();
        $file->move($destination, $newFileName);
        return '/image/' . $newFileName;
    }

    public function checkRangeOfSegment($min, $max, $quiz_id)
    {
        $segments = $this->resultRepo->getResultsOfQuiz($quiz_id);
        $result = 'ok';
        foreach ($segments as $segment) {
            if ($min >= $segment->min_score && $min <= $segment->max_score) {
                $result = 'fail';
            }
            if ($max >= $segment->min_score && $max <= $segment->max_score) {
                $result = 'fail';
            }
            if ($min >= $max) {
                $result = 'fail';
            }
        }
        return $result;
    }

    public function getSegment($id)
    {
        return $this->resultRepo->getSegmentById($id);
    }

    public function checkRangeOfSegmentForUpdate($min, $max, $quiz_id, $id)
    {
        $segments = $this->resultRepo->getResultsOfQuiz($quiz_id);
        $result = 'ok';
        foreach ($segments as $segment) {
            if ($min >= $segment->min_score && $min <= $segment->max_score && $segment->id != $id) {
                $result = 'fail';
            }
            if ($max >= $segment->min_score && $max <= $segment->max_score && $segment->id != $id) {
                $result = 'fail';
            }
            if ($min >= $max) {
                $result = 'fail';
            }
        }
        return $result;
    }

    public function updateResultSegment($data, $id)
    {
        return $this->resultRepo->update($data, $id);
    }

    public function deleteSegment($id)
    {
        return $this->resultRepo->delete($id);
    }

    public function findSegment ($score,$quiz_id){
        $segments = $this->resultRepo->getResultsOfQuiz($quiz_id);
        foreach ($segments as $segment){
            if ($score >= $segment->min_score && $score <= $segment->max_score){
                $segment_id = $segment->id;
                break;
            }
        }
        if (!isset($segment_id)){
            $segment_id = 0;
        }

        return $this->resultRepo->getSegmentById($segment_id);
    }

    public function deleteSegmentsOfQuiz ($quiz_id){
        return $this->resultRepo->deleteAllSegmentsOfQuiz($quiz_id);
    }


}
