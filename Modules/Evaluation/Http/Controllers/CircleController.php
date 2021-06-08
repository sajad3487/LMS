<?php

namespace Modules\Evaluation\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleRequest;
use Modules\Evaluation\Http\Requests\QuestionRequest;
use Modules\Evaluation\Http\Requests\ReportRequest;
use Modules\Evaluation\Http\Requests\UserRequest;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\EvaluationService;
use Modules\Evaluation\Http\Service\MessageService;
use Modules\Evaluation\Http\Service\NoteService;
use Modules\Evaluation\Http\Service\ScrollerService;

class CircleController extends Controller
{
    /**
     * @var CircleService
     */
    private $circleService;
    /**
     * @var NoteService
     */
    private $noteService;
    /**
     * @var EvaluationService
     */
    private $evaluationService;
    /**
     * @var MessageService
     */
    private $messageService;
    /**
     * @var ScrollerService
     */
    private $scrollerService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(
        CircleService $circleService,
        NoteService $noteService,
        EvaluationService $evaluationService,
        MessageService $messageService,
        ScrollerService $scrollerService,
        UserService $userService
    )
    {
        $this->circleService = $circleService;
        $this->noteService = $noteService;
        $this->evaluationService = $evaluationService;
        $this->messageService = $messageService;
        $this->scrollerService = $scrollerService;
        $this->userService = $userService;
    }

    public function store(CircleRequest $request)
    {
        $data = $request->all();
        $circle = $this->circleService->createCircle($data);
        $this->evaluationService->addCircleToEvaluation($data['evaluation_id'], $circle->id);
        return back();
    }

    public function duplicate(CircleRequest $request, $circle_id)
    {
        $data = $request->all();
        $new_circle = $this->circleService->createCircle($data);
        $questions = $this->noteService->getNotesOfCircleByType ('question',$circle_id);
        foreach ($questions as $question){
            $question_data['circle_id'] = $new_circle->id;
            $question_data['type'] = $question->type;
            $question_data['title'] = $question->title;
            $question_data['description'] = $question->description;
            $question_data['min_range'] = $question->min_range;
            $question_data['max_range'] = $question->max_range;
            $question_data['status'] = $question->status;
            $this->noteService->createNote($question_data);
        }
        $scrollers = $this->scrollerService->getScrollersOfCircle ($circle_id);
        foreach ($scrollers as $scroller){
            $data['circle_id'] = $new_circle->id;
            $data['behavior_id'] = $scroller->behavior_id;
            $data['min'] = $scroller->min;
            $data['max'] = $scroller->max;
            $data['type'] = $scroller->type;
            $data['title'] = $scroller->title;
            $data['description'] = $scroller->description;
            $data['status'] = $scroller->status;
            $this->scrollerService->createScroller($data);
        }

        $email_template = $this->noteService->getTemplateOfCircle('circle_invitation',$circle_id);
        if ($email_template != null){
            $email_temp_data['circle_id'] = $new_circle->id;
            $email_temp_data['type'] = $email_template->type;
            $email_temp_data['title'] = $email_template->title;
            $email_temp_data['description'] = $email_template->description;
            $email_temp_data['min_range'] = $email_template->min_range;
            $email_temp_data['max_range'] = $email_template->max_range;
            $email_temp_data['status'] = $email_template->status;
            $this->noteService->createNote($email_temp_data);
        }
        $circle = $this->circleService->getCircleById($circle_id);
        if ($circle->users != null){
            foreach ($circle->users as $user){
                $new_circle->users()->attach($user->id);
            }
        }
        $this->circleService->changeStatusOfCircle($new_circle->id,2);
        return back();
    }

    public function new_user(UserRequest $request)
    {
        $circle = $this->circleService->getCircleById($request->circle_id);
        foreach ($circle->users as $user) {
            if ($user->id == $request->user_id) {
                return back();
            }
        }
        $circle->users()->attach($request->user_id);
        $this->circleService->changeStatusOfCircle($request->circle_id, 2);
        return back();
    }

    public function delete_user(UserRequest $request)
    {
        $circle = $this->circleService->getCircleById($request->circle_id);
        $circle->users()->detach($request->user_id);
        return back();
    }

    public function show_report($circle_id)
    {
        $circle = $this->circleService->getCircleById($circle_id);
        $active = 6;
        $report = $this->noteService->getReportOfCircle($circle_id);
        $questions = $this->noteService->getAnswersForQuestionOfCircle($circle_id);
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.report_circle', compact('circle', 'active', 'report', 'questions','user'));
    }

    public function store_report(ReportRequest $request, $circle_id)
    {
        $data['description'] = $request->description;
        $data['circle_id'] = $circle_id;
        $data['type'] = 'report';
        $data['title'] = 'title';
        $data['status'] = 1;
        $report = $this->noteService->createNote($data);
        return back();
    }

    public function update_report(ReportRequest $request, $report_id)
    {
        $data['description'] = $request->description;
        $this->noteService->updateNote($data, $report_id);
        return back();
    }

    public function send_report(ReportRequest $request, $circle_id)
    {
        $data['description'] = $request->description;
        $report = $this->noteService->getReportOfCircle($circle_id);
        if ($report == null){
            $data['circle_id'] = $circle_id;
            $data['type'] = 'report';
            $data['title'] = 'title';
            $data['status'] = 1;
            $report = $this->noteService->createNote($data);
        }else{
            $this->noteService->updateNote($data, $request->report_id);
        }
        $this->circleService->changeStatusOfCircle($circle_id, 5);
        return back()->with('success', 'Your report has been successfully sent');
    }

    public function show_answers ($circle_id){
        $circle = $this->circleService->getCircleById($circle_id);
        foreach ($circle->answers as $answer){
            $counter = 0;
            foreach ($answer->answer_detail as $answer_detail){
                $counter += $answer_detail->new_message->count();
                $result = $this->messageService->makeReadMessageOfAnswer($answer_detail->id);
            }
            $answer->new_message = $counter;
        }
        $active = 6;
        $questions = $this->noteService->getAnswersForQuestionOfCircle($circle_id);
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.answers_evaluation', compact('circle', 'active', 'questions','user'));
    }

}
