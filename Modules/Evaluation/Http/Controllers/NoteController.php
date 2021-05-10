<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\QuestionRequest;
use Modules\Evaluation\Http\Requests\ScrollerRequest;
use Modules\Evaluation\Http\Service\NoteService;

class NoteController extends Controller
{
    /**
     * @var NoteService
     */
    private $noteService;

    public function __construct(
        NoteService $noteService
    )
    {
        $this->noteService = $noteService;
    }

    public function new_question(QuestionRequest $request){
        $data = $request->all();
        $data['type']="question";
        $question = $this->noteService->createNote($data);
        return back();
    }

    public function new_scroller (ScrollerRequest $request){
        $data = $request->all();
        $data['type']="scroller";
        $scroller = $this->noteService->createNote($data);
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
