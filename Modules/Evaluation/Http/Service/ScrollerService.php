<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\ScrollerRepository;

class ScrollerService
{
    /**
     * @var ScrollerRepository
     */
    private $scrollerRepo;

    public function __construct(
        ScrollerRepository $scrollerRepository
    )
    {
        $this->scrollerRepo = $scrollerRepository;
    }

    public function createScroller ($data){
        return $this->scrollerRepo->create($data);
    }

    public function updateScroller ($data,$id){
        return $this->scrollerRepo->update($data,$id);
    }

    public function destroyScroller ($id) {
        return $this->scrollerRepo->delete($id);
    }

    public function getScrollersOfCircle ($circle_id){
        return $this->scrollerRepo->getAllScrollersOfCircle ($circle_id);
    }

    public function getScrollerById ($id){
        return $this->scrollerRepo->getById($id);
    }

    public function checkBehaviorScrollerOfCircle ($behavior_id,$circle_id){
        return $this->scrollerRepo->getCircleBehaviorScroller ($behavior_id,$circle_id);
    }

}
