<?php

namespace Modules\Result\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\OptionService;
use Modules\Result\Http\Service\AnswerQuestionService;
use Modules\Result\Http\Service\AnswerQuizService;
use Modules\Result\Http\Service\ResultService;

class AnswerQuizController extends Controller
{
    /**
     * @var AnswerQuizService
     */
    private $answerQuizService;
    /**
     * @var OptionService
     */
    private $optionService;
    /**
     * @var AnswerQuestionService
     */
    private $answerQuestionService;
    /**
     * @var ResultService
     */
    private $resultService;

    public function __construct(
        AnswerQuizService $answerQuizService,
        OptionService $optionService,
        AnswerQuestionService $answerQuestionService,
        ResultService $resultService
    )
    {
        $this->answerQuizService = $answerQuizService;
        $this->optionService = $optionService;
        $this->answerQuestionService = $answerQuestionService;
        $this->resultService = $resultService;
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
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['form_id'] = $request->form_id;
        $answer = $this->answerQuizService->createAnswer($data);
        $additional_info = $request->additional_info;
        foreach ($request->question as $key=>$option) {
            $answer_data['form_id'] = $request->form_id;
            $answer_data['answer_id'] = $answer->id;
            $answer_data['question_id'] = $key;
            $answer_data['option_id'] = $option;
            $answer_data['type'] = 'option';
            $option = $this->optionService->getOptionById($option);
            $answer_data['answer'] = $option->body;
            $answer_data['score'] = $option->score;
            $answer_data['additional_info'] = $additional_info[$key];
            $answer_question = $this->answerQuestionService->createAnswerQuestion($answer_data);
        }

        $score = $this->answerQuizService->calculateSumScore($answer->id);
        $segment = $this->resultService->findSegment($score,$request->form_id);
//        $sum_score = $this->answerQuizService->calculateSumScore ($answer->id);

        dd($answer);
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
