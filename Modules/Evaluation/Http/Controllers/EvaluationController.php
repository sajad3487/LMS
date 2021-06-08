<?php

namespace Modules\Evaluation\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleAnswerRequest;
use Modules\Evaluation\Http\Requests\EmailTemplateRequest;
use Modules\Evaluation\Http\Requests\EvaluationRequest;
use Modules\Evaluation\Http\Service\AnswerEvaluationService;
use Modules\Evaluation\Http\Service\AnswerScrollerService;
use Modules\Evaluation\Http\Service\BehaviorService;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\EvaluationService;
use Modules\Evaluation\Http\Service\MessageService;
use Modules\Evaluation\Http\Service\NoteService;

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
    /**
     * @var AnswerEvaluationService
     */
    private $answerEvaluationService;
    /**
     * @var NoteService
     */
    private $noteService;
    /**
     * @var MessageService
     */
    private $messageService;
    /**
     * @var AnswerScrollerService
     */
    private $answerScrollerService;
    /**
     * @var BehaviorService
     */
    private $behaviorService;

    public function __construct(
        EvaluationService $evaluationService,
        UserService $userService,
        CircleService $circleService,
        AnswerEvaluationService $answerEvaluationService,
        NoteService $noteService,
        MessageService $messageService,
        AnswerScrollerService $answerScrollerService,
        BehaviorService $behaviorService
    )
    {
        $this->evaluationService = $evaluationService;
        $this->userService = $userService;
        $this->circleService = $circleService;
        $this->answerEvaluationService = $answerEvaluationService;
        $this->noteService = $noteService;
        $this->messageService = $messageService;
        $this->answerScrollerService = $answerScrollerService;
        $this->behaviorService = $behaviorService;
    }

    public function index()
    {
        $active = 6;
        $evaluations = $this->evaluationService->getAllEvaluationsOfMentor(auth()->id());
        foreach ($evaluations as $evaluation) {
            $counter = 0;
            foreach ($evaluation->circles as $circle) {
                $counter += $this->circleService->countCircleNeMessage($circle->id);
            }
            $evaluation->new_message = $counter;
        }
        $user = $this->userService->getUserById(auth()->id());

        return view('customer.evaluations', compact('active', 'evaluations','user'));
    }


    public function create()
    {
        $active = 6;
        $targets = $this->userService->getUserByType(2);
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.new_evaluation', compact('active', 'targets','user'));
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
        $all_questions = $this->noteService->getQuestions();
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.new_evaluation', compact('evaluation', 'active', 'targets', 'circles', 'users', 'all_questions','user'));
    }

    public function update(EvaluationRequest $request, $evaluation_id)
    {
        $data = $request->all();
        $this->evaluationService->updateEvaluation($data, $evaluation_id);
        return back();
    }

    public function participant_panel()
    {
        $user = $this->userService->getClientWithCircles(auth()->id());
        return view('user.user_panel', compact('user'));
    }

    public function participant_quiz()
    {
        return view('user.user_quiz');
    }

    public function participant_profile()
    {
        $user = $this->userService->getUserById(auth()->id());
        return view('user.user_profile', compact('user'));
    }

    public function participant_circle($circle_id)
    {
        $active_circle = $this->circleService->getCircleById($circle_id);
        $user = $this->userService->getClientWithCircles(auth()->id());
        foreach ($user->circles as $circle) {
            $circle->new_message = $this->circleService->countCircleNeMessage($circle->id);
        }
        $user_answer = $this->answerEvaluationService->getCircleAnswerOfUser(auth()->id(), $circle_id);
        $user_scroller_answer = $this->answerScrollerService->getCircleAnswerScrollerOfUser(auth()->id(), $circle_id);
//        dd($user_scroller_answer,auth()->id());
        if ($user_answer == null && $user_scroller_answer == null) {
            return view('user.user_quiz', compact('active_circle', 'user'));
        } else {
            if (isset($user_answer->answer_detail)) {
                foreach ($user_answer->answer_detail as $answer) {
                    $counter = 0;
                    foreach ($answer->message as $message) {
                        if ($message->owner_id != auth()->id() && $message->status == 1) {
                            $counter++;
                        }
                    }
                    $answer->new_message = $counter;
                    $this->messageService->makeReadMessageOfAnswer($answer->id);
                }
            }

            $scroller_answers = $this->answerScrollerService->getClientAnswersByCircleId($circle_id, auth()->id());
            return view('user.user_answer', compact('active_circle', 'user_answer', 'user', 'scroller_answers'));
        }
    }

    public function show($evaluation_id)
    {
        $evaluation = $this->evaluationService->getEvaluationById($evaluation_id);
        $active = 6;
        foreach ($evaluation->circles as $circle) {
            $circle->new_message = $this->circleService->countCircleNeMessage($circle->id);
        }
        $behavior_template = $this->noteService->getTemplateOfCircle('behavior_template', $evaluation_id);
        $behaviors = $this->behaviorService->getClientBehavior($evaluation->id);
        $messages = $this->messageService->getMessagesOfClientChat($evaluation->user_id);
        $this->messageService->makeReadMessagesOfClientChat($evaluation->user_id);
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.result_evaluation', compact('evaluation', 'active', 'behavior_template', 'behaviors', 'messages','user'));
    }

    public function edit_email($circle_id)
    {
        $email_template = $this->noteService->getTemplateOfCircle('circle_invitation', $circle_id);
        if ($email_template == null) {
            $email_template = $this->noteService->getTemplateByType('user_invitation_template');
        }
        $circle = $this->circleService->getCircleById($circle_id);
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.send_email', compact('email_template', 'circle','user'));
    }

    public function send_user(EmailTemplateRequest $request, $circle_id)
    {
        $temp = $this->noteService->getTemplateOfCircle('circle_invitation', $circle_id);
        $data['description'] = $request->description;
        $data['type'] = 'circle_invitation';
        $data['circle_id'] = $circle_id;
        $data['title'] = 'invitation email template for users';
        if ($temp == null) {
            $this->noteService->createNote($data);
        } else {
            $this->noteService->updateNote($data, $temp->id);
        }
        $this->circleService->changeStatusOfCircle($circle_id, 3);
        $circle = $this->circleService->getCircleById($circle_id);
        return redirect("evaluation_result/$circle->evaluation_id/show");
    }


    public function done_quiz()
    {
        return view('user.done_quiz');
    }

    public function target_panel()
    {
        return view('client.user_panel');
    }

    public function client_panel()
    {
        $evaluation = $this->evaluationService->getEvaluationOfClient(auth()->id());
        $users = $this->userService->getUserByType(3);
        if ($evaluation != null) {
            $behaviors = $this->behaviorService->getClientBehavior($evaluation->id);
            $behavior_template = $this->noteService->getBehaviorTemplateOfEvaluation($evaluation->id);
        } else {
            $behaviors = null;
            $behavior_template = null;
        }
        $messages = $this->messageService->getMessagesOfClientChat(auth()->id());

        $this->messageService->makeReadMessagesOfClientChat($evaluation->user_id);
        $user = $this->userService->getUserById(auth()->id());
        return view('client.client_panel', compact('evaluation', 'users', 'behaviors', 'behavior_template', 'messages','user'));

    }


}
