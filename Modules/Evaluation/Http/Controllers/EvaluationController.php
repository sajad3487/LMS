<?php

namespace Modules\Evaluation\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\CircleAnswerRequest;
use Modules\Evaluation\Http\Requests\EvaluationRequest;
use Modules\Evaluation\Http\Service\AnswerEvaluationService;
use Modules\Evaluation\Http\Service\CircleService;
use Modules\Evaluation\Http\Service\EvaluationService;
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

    public function __construct(
        EvaluationService $evaluationService,
        UserService $userService,
        CircleService $circleService,
        AnswerEvaluationService $answerEvaluationService,
        NoteService $noteService
    )
    {
        $this->evaluationService = $evaluationService;
        $this->userService = $userService;
        $this->circleService = $circleService;
        $this->answerEvaluationService = $answerEvaluationService;
        $this->noteService = $noteService;
    }

    public function index()
    {
        $active = 6;
        $evaluations = $this->evaluationService->getAllEvaluationsOfMentor(auth()->id());
        return view('customer.evaluations', compact('active', 'evaluations'));
    }


    public function create()
    {
        $active = 6;
        $targets = $this->userService->getUserByType(2);
        return view('customer.new_evaluation', compact('active', 'targets'));
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
        return view('customer.new_evaluation', compact('evaluation', 'active', 'targets', 'circles', 'users','all_questions'));
    }

    public function update (EvaluationRequest $request,$evaluation_id){
        $data = $request->all();
        $this->evaluationService->updateEvaluation($data,$evaluation_id);
        return back();
    }

    public function participant_panel()
    {
        $user = $this->userService->getClientWithCircles(auth()->id());
//        dd($user);
//        $client = $this->userService->getUserById(auth()->id());
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
        $user = $this->userService->getUserById(auth()->id());
        $user_answer = $this->answerEvaluationService->getCircleAnswerOfUser(auth()->id(), $circle_id);
        if ($user_answer == null) {
            return view('user.user_quiz', compact('active_circle', 'user'));
        } else {
            return view('user.user_answer', compact('active_circle', 'user_answer', 'user'));
        }
    }

    public function show($evaluation_id)
    {
        $evaluation = $this->evaluationService->getEvaluationById($evaluation_id);
        $active = 6;
//        dd($evaluation);
        return view('customer.result_evaluation', compact('evaluation', 'active'));
    }

    public function edit_email ($circle_id){
        $email_template = $this->noteService->getTemplateByType ('circle_invitation');
        dd($email_template);
        return view('customer.send_email',compact('email_template'));
    }

    public function send_user($circle_id)
    {
        $this->circleService->changeStatusOfCircle($circle_id, 3);
        return back();
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
        $behaviours = ['jan'=>3,'Jul'=>4,'Oct'=>2];
//        dd($evaluation);
        return view('client.client_panel', compact('evaluation', 'users','behaviours'));

    }


}
