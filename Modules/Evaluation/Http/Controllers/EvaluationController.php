<?php

namespace Modules\Evaluation\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\EvaluationRequest;
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

    public function __construct(
        EvaluationService $evaluationService,
        UserService $userService
    )
    {
        $this->evaluationService = $evaluationService;
        $this->userService = $userService;
    }

    public function index()
    {
        $active = 6;
        $evaluations = $this->evaluationService->getAllEvaluationsOfMentor(auth()->id());
//        dd($evaluations);
        return view('customer.evaluations',compact('active','evaluations'));
    }


    public function create()
    {
        $active = 6;
        $users = $this->userService->getUserByType (2);
        return view('customer.new_evaluation',compact('active','users'));
    }

    public function store(EvaluationRequest $request)
    {
        $data = $request->all();
        $data['mentor_id'] = auth()->id();
        $evaluation = $this->evaluationService->createEvaluation($data);
        return redirect("evaluation/$evaluation->id/edit");
    }

    public function show($id)
    {
        return view('evaluation::show');
    }

    public function edit($id)
    {
        $evaluation= $this->evaluationService->getEvaluationById ($id);
        $active = 6;
        return view('customer.new_evaluation',compact('evaluation','active'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
