<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\QuestionRequest;
use Modules\Evaluation\Http\Requests\ScrollerRequest;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\NoteService;

class NoteController extends Controller
{
    /**
     * @var NoteService
     */
    private $noteService;
    /**
     * @var CircleService
     */
    private $circleService;

    public function __construct(
        NoteService $noteService,
        CircleService $circleService
    )
    {
        $this->noteService = $noteService;
        $this->circleService = $circleService;
    }

    public function new_question(QuestionRequest $request){
        $data = $request->all();
        $data['type']="question";
//        dd($data);
        $question = $this->noteService->createNote($data);
        $this->circleService->changeStatusOfCircle ($data['circle_id'],2);

        return back();
    }

    public function new_scroller (ScrollerRequest $request){
        $data = $request->all();
        $data['type']="scroller";
        $scroller = $this->noteService->createNote($data);
        $this->circleService->changeStatusOfCircle ($data['circle_id'],2);
        return back();
    }

    public function edit_question (QuestionRequest $request,$question_id){
        $data = $request->all();
        $this->noteService->updateNote($data,$question_id);
        return back();
    }

    public function edit_scroller (ScrollerRequest $request,$question_id){
        $data = $request->all();
        $this->noteService->updateNote($data,$question_id);
        return back();
    }

    public function destroy ($question_id){
        $this->noteService->deleteNote($question_id);
        return back();
    }
}
