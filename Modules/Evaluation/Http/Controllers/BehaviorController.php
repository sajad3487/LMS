<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\BehaviorRequest;
use Modules\Evaluation\Http\Service\BehaviorService;

class BehaviorController extends Controller
{
    /**
     * @var BehaviorService
     */
    private $behaviorService;

    public function __construct(
        BehaviorService $behaviorService
    )
    {
        $this->behaviorService = $behaviorService;
    }

    public function store(BehaviorRequest $request)
    {
        $data = $request->all();
        $this->behaviorService->createBehavior($data);
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
