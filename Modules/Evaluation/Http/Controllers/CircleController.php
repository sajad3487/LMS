<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleRequest;
use Modules\Evaluation\Http\Requests\QuestionRequest;
use Modules\Evaluation\Http\Requests\UserRequest;
use Modules\Evaluation\Http\Service\CircleService;

class CircleController extends Controller
{
    /**
     * @var CircleService
     */
    private $circleService;

    public function __construct(
        CircleService $circleService
    )
    {
        $this->circleService = $circleService;
    }

    public function store(CircleRequest $request)
    {
        $data = $request->all();
        $circle = $this->circleService->createCircle ($data);
        return back();
    }

    public function new_user (UserRequest $request){
        $circle = $this->circleService->getCircleById ($request->circle_id);
        foreach ($circle->users as $user){
            if ($user->id == $request->user_id){
                return back();
            }
        }
        $circle->users()->attach($request->user_id);
        return back();
    }

    public function delete_user (UserRequest $request){
        $circle = $this->circleService->getCircleById($request->circle_id);
        $circle->users()->detach($request->user_id);
        return back();
    }

}
