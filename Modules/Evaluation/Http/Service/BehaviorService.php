<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\BehaviorRepository;

class BehaviorService
{
    /**
     * @var BehaviorRepository
     */
    private $behaviorRepo;

    public function __construct(
        BehaviorRepository $behaviorRepository
    )
    {
        $this->behaviorRepo = $behaviorRepository;
    }

    public function createBehavior ($data){
        return $this->behaviorRepo->create($data);
    }

    public function getClientBehavior ($evaluation_id){
        $behaviors = $this->behaviorRepo->getBehaviorOfClient ($evaluation_id);
        foreach ($behaviors as $behavior){
            foreach ($behavior->scrollers as $scroller){
                $score = 0;
                $counter = 0;
                foreach ($scroller->scroller_answers_detail as $key=>$answer){
                    $score += $answer->score;
                    $counter ++;
                }
                if ($counter != 0){
                    $scroller->average_score = ($score/$counter);
                }else{
                    $scroller->average_score = 0 ;
                }
            }
        }
        return $behaviors;
    }

}
