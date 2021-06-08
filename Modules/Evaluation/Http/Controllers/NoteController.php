<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\EmailTemplateRequest;
use Modules\Evaluation\Http\Requests\JournalRequest;
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

    public function new_question(QuestionRequest $request)
    {
        $data = $request->all();
        $data['type'] = "question";
//        dd($data);
        $question = $this->noteService->createNote($data);
        $this->circleService->changeStatusOfCircle($data['circle_id'], 2);

        return back();
    }

//    public function new_scroller(ScrollerRequest $request)
//    {
//        $data = $request->all();
//        $data['type'] = "scroller";
//        $scroller = $this->noteService->createNote($data);
//        $this->circleService->changeStatusOfCircle($data['circle_id'], 2);
//        return back();
//    }

    public function edit_question(QuestionRequest $request, $question_id)
    {
        $data = $request->all();
        $this->noteService->updateNote($data, $question_id);
        return back();
    }

    public function edit_scroller(ScrollerRequest $request, $question_id)
    {
        $data = $request->all();
        $this->noteService->updateNote($data, $question_id);
        return back();
    }

    public function destroy($question_id)
    {
        $this->noteService->deleteNote($question_id);
        return back();
    }

    public function store_journal (JournalRequest $request){
        $data = $request->all();
        $data['type'] = 'journal';
        $journal =$this->noteService->createNote($data);
        return back();
    }

    public function email_template_edit (){
        $email_template = $this->noteService->getTemplateByType ('user_invitation_template');
        return view('customer.evaluation_email_template',compact('email_template'));
    }

    public function email_template_store (EmailTemplateRequest $request){
        $data['description'] = $request->description;
        $data['type'] = 'user_invitation_template';
        $data['circle_id'] = 0;
        $data['title'] = 'invitation email template for users';
        $this->noteService->createNote($data);
        return back();
    }

    public function email_template_update (EmailTemplateRequest $request,$note_id){
        $data['description'] = $request->description;
        $data['type'] = 'user_invitation_template';
        $data['circle_id'] = 0;
        $data['title'] = 'invitation email template for users';
        $this->noteService->updateNote($data,$note_id);
        return back();
    }

    public function circle_email_temp (EmailTemplateRequest $request,$circle_id){
        $temp = $this->noteService->getTemplateOfCircle('circle_invitation',$circle_id);
        $data['description'] = $request->description;
        $data['type'] = 'circle_invitation';
        $data['circle_id'] = $circle_id;
        $data['title'] = 'invitation email template for users';
        if ($temp == null){
            $this->noteService->createNote($data);
        }else{
            $this->noteService->updateNote($data,$temp->id);
        }
        return back();
    }

    public function store_behavior_template (Request $request,$evaluation_id){
        $data['description'] = $request->description;
        $data['type'] = 'behavior_template';
        $data['circle_id'] = $evaluation_id;
        $data['title'] = 'Behavior template to send client';
        $this->noteService->createNote($data);
        return back();
    }

    public function update_behavior_template (Request $request,$note_id){
        $data['description'] = $request->description;
        $this->noteService->updateNote($data,$note_id);
        return back();
    }
}
