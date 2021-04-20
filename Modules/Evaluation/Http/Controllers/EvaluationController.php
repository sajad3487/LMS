<?php

namespace Modules\Evaluation\Http\Controllers;

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

    public function __construct(
        EvaluationService $evaluationService
    )
    {
        $this->evaluationService = $evaluationService;
    }

    public function index()
    {
        $active = 6;
        return view('customer.evaluations',compact('active'));
    }


    public function create()
    {
        $active = 6;
        return view('customer.new_evaluation',compact('active'));
    }

    public function store(EvaluationRequest $request)
    {
        $data = $request->all();
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
