<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Entities\Circle;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\ScrollerService;

class ScrollerController extends Controller
{
    /**
     * @var ScrollerService
     */
    private $scrollerService;
    /**
     * @var CircleService
     */
    private $circleService;

    public function __construct(
        ScrollerService $scrollerService,
        CircleService $circleService
    )
    {
        $this->scrollerService = $scrollerService;
        $this->circleService = $circleService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['type'] = 'behavior';
        $scroller = $this->scrollerService->checkBehaviorScrollerOfCircle ($data['behavior_id'],$data['circle_id']);
        if ($scroller != null){
            return back();
        }
        $this->scrollerService->createScroller($data);
        $this->circleService->changeStatusOfCircle($data['circle_id'], 2);
        return back();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->scrollerService->updateScroller($data,$id);
        return back();
    }

    public function destroy($id)
    {
        $this->scrollerService->destroyScroller($id);
        return back();
    }
}
