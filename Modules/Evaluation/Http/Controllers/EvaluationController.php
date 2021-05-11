<?php

namespace Modules\Evaluation\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\EvaluationRequest;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\EvaluationService;

class EvaluationController extends Controller
{
    /**
     * @var EvaluationService
     */
    private $evaluationService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var CircleService
     */
    private $circleService;

    public function __construct(
        EvaluationService $evaluationService,
        UserService $userService,
        CircleService $circleService
    )
    {
        $this->evaluationService = $evaluationService;
        $this->userService = $userService;
        $this->circleService = $circleService;
    }

    public function index()
    {
        $active = 6;
        $evaluations = $this->evaluationService->getAllEvaluationsOfMentor(auth()->id());
//        dd($evaluations);
        return view('customer.evaluations', compact('active', 'evaluations'));
    }


    public function create()
    {
        $active = 6;
        $targets = $this->userService->getUserByType(2);
        return view('customer.new_evaluation', compact('active', 'targets'));
    }

    public function store(EvaluationRequest $request)
    {
        $data = $request->all();
        $data['mentor_id'] = auth()->id();
        $target = $this->userService->getUserById($data['user_id']);
        $data['target'] = $target->name;
        $evaluation = $this->evaluationService->createEvaluation($data);
        return redirect("evaluation/$evaluation->id/edit");
    }


    public function edit($id)
    {
        $evaluation = $this->evaluationService->getEvaluationById($id);
        $active = 6;
        $targets = $this->userService->getUserByType(2);
        $circles = $this->circleService->getCirclesOfEvaluations($id);
        $users = $this->userService->getUserByType(3);
        return view('customer.new_evaluation', compact('evaluation', 'active', 'targets', 'circles', 'users'));
    }

    public function client_panel()
    {
        $client = $this->userService->getClientWithCircles(auth()->id());
//        dd($user);
//        $client = $this->userService->getUserById(auth()->id());
        return view('client.client_panel', compact('client'));
    }

    public function client_quiz()
    {
        return view('client.client_quiz');
    }

    public function client_profile()
    {
        $client = $this->userService->getUserById(auth()->id());
        return view('client.client_profile', compact('client'));
    }

    public function client_circle ($circle_id){
        $active_circle = $this->circleService->getCircleById($circle_id);
        $client = $this->userService->getUserById(auth()->id());
        return view('client.client_quiz',compact('active_circle','client'));

    }

    public function client_submit (Request $request,$circle_id){
        dd($request->all(),$circle_id);
    }

    public function done_quiz()
    {
        return view('client.done_quiz');
    }

    public function target_panel()
    {
        return view('target.target_panel');
    }
}
