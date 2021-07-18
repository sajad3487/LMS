<?php

namespace Modules\Result\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Result\Http\Requests\UpdateAnswerQuestionRequest;
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

    public function participant_update_answer (UpdateAnswerQuestionRequest $request, $answer_id){
        $data = $request->all();
        $this->answerQuestionService->updateAnswerQuestion($data,$answer_id);
        return back();
    }
}
