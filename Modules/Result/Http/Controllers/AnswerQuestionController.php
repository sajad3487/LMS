<?php

namespace Modules\Result\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Result\Http\Service\AnswerQuestionService;

class AnswerQuestionController extends Controller
{
    /**
     * @var AnswerQuestionService
     */
    private $answerQuestionService;

    public function __construct(
        AnswerQuestionService $answerQuestionService
    )
    {
        $this->answerQuestionService = $answerQuestionService;
    }

    public function index()
    {
        return view('result::index');
    }
    
    public function create()
    {
        return view('result::create');
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        return view('result::show');
    }
    
    public function edit($id)
    {
        return view('result::edit');
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
