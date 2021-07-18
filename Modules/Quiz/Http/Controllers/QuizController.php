<?php

namespace Modules\Quiz\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Service\CompanyService;
use Modules\Quiz\Http\Requests\QuizRequest;
use Modules\Quiz\Http\Service\OptionService;
use Modules\Quiz\Http\Service\QuestionService;
use Modules\Quiz\Http\Service\QuizService;
use Modules\Result\Http\Service\AnswerQuestionService;
use Modules\Result\Http\Service\AnswerQuizService;
use Modules\Result\Http\Service\ResultService;

class QuizController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var QuizService
     */
    private $quizService;
    /**
     * @var QuestionService
     */
    private $questionService;
    /**
     * @var OptionService
     */
    private $optionService;
    /**
     * @var ResultService
     */
    private $resultService;
    /**
     * @var AnswerQuizService
     */
    private $answerQuizService;
    /**
     * @var AnswerQuestionService
     */
    private $answerQuestionService;
    /**
     * @var CompanyService
     */
    private $companyService;

    public function __construct(
        UserService $userService,
        QuizService $quizService,
        QuestionService $questionService,
        OptionService $optionService,
        ResultService $resultService,
        AnswerQuizService $answerQuizService,
        AnswerQuestionService $answerQuestionService,
        CompanyService $companyService
    )
    {
        $this->userService = $userService;
        $this->quizService = $quizService;
        $this->questionService = $questionService;
        $this->optionService = $optionService;
        $this->resultService = $resultService;
        $this->answerQuizService = $answerQuizService;
        $this->answerQuestionService = $answerQuestionService;
        $this->companyService = $companyService;
    }

    public function index()
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quizzes = $this->quizService->getUserQuizzes(auth()->id());
        foreach ($quizzes as $quiz){
            if ($quiz->type == 'private'){
                $quiz->owner = $this->companyService->getCompanyById($quiz->parent_id);
            }
        }
        return view('customer.quizzes', compact('active', 'user', 'quizzes'));
    }


    public function create()
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $companies = $this->companyService->getAllCompanies();
        return view('customer.new_quiz', compact('active', 'user','companies'));
    }


    public function store(QuizRequest $request)
    {
        $data = $request->all();
        if($data['status'] == 'public'){
            $data['status'] = 1;
        }else{
            $data['parent_id'] = $data['status'];
            $data['status']= 2;
            $data['type']= "private";
        }
        if (isset($request->file)){
            $data['banner'] =$this->quizService->uploadMedia($request->file);
            unset($data['file']);
        }
        if (isset($request->rbanner)){
            $data['result_banner'] =$this->quizService->uploadMedia($request->rbanner);
            unset($data['rbanner']);
        }
        $data['user_id'] = auth()->id();
        $quiz = $this->quizService->createQuiz($data);
        if ($quiz->type == 'subquiz'){
            return redirect("superQuizzes/$quiz->parent_id/edit");
        }
        return redirect("quizzes/$quiz->id/edit");
    }


    public function show($id)
    {
        return view('quiz::show');
    }


    public function edit($id)
    {
        $active = 2;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz($id);
        $sections = $this->questionService->getSectionsOfQuiz($id);
        $questions = $this->questionService->getQuestionsWithoutTitle($id);
        if ($quiz->type == 'super'){
            $active = 4;
            return view('customer.new_super_quiz', compact('active', 'user', 'quiz','questions','sections'));
        }
        $companies = $this->companyService->getAllCompanies();
        return view('customer.new_quiz', compact('active', 'user', 'quiz','questions','sections','companies'));
    }


    public function update(QuizRequest $request, $id)
    {
        $data = $request->all();
        if($data['status'] == 'public'){
            $data['status'] = 1;
        }else{
            $data['parent_id'] = $data['status'];
            $data['status']= 2;
            $data['type']= "private";
        }
        if (isset($request->file)){
            $data['banner'] =$this->quizService->uploadMedia($request->file);
            unset($data['file']);
        }
        if (isset($request->rbanner)){
            $data['result_banner'] =$this->quizService->uploadMedia($request->rbanner);
            unset($data['rbanner']);
        }
        $this->quizService->updateQuiz($data, $id);

        return back();
    }


    public function destroy($id)
    {
        $this->quizService->deleteQuiz($id);
        $questions = $this->questionService->getQuestionsOfQuiz($id);
        foreach ($questions as $question){
            $this->questionService->deleteQuestion($question->id);
        }
        $this->optionService->deleteOptionOfQuiz($id);
        $this->answerQuizService->deleteAllAnswersOfQuiz ($id);
        $this->answerQuestionService->deleteAllQuestionsOfQuiz ($id);
        $this->resultService->deleteSegmentsOfQuiz ($id);
        return back();
    }

    public function view($id)
    {
        $quiz = $this->quizService->getQuiz($id);
        $sections = $this->questionService->getSectionsOfQuiz($id);
        $questions = $this->questionService->getQuestionsWithoutTitle($id);
        if ($quiz != null && $quiz->status) {
            return view('quiz', compact('quiz','sections','questions'));
        }
        return redirect('/');
    }

    public function super_view ($id)
    {
        $super_quiz = $this->quizService->getSuperQuiz($id);
        if ($super_quiz->type == 'quiz') {
            return redirect("quiz/$super_quiz->id/view");
        }
        return view('super_quiz', compact('super_quiz'));
    }

    public function copy($id)
    {
        $quiz = $this->quizService->getQuiz($id);
        $quiz_data['user_id'] = $quiz->user_id;
        $quiz_data['parent_id'] = $quiz->parent_id;
        $quiz_data['title'] = $quiz->title;
        $quiz_data['first_name_label'] = $quiz->first_name_label;
        $quiz_data['first_name_requirement'] = $quiz->first_name_requirement;
        $quiz_data['last_name_label'] = $quiz->last_name_label;
        $quiz_data['last_name_requirement'] = $quiz->last_name_requirement;
        $quiz_data['email_label'] = $quiz->email_label;
        $quiz_data['email_requirement'] = $quiz->email_requirement;
        $quiz_data['first_info_label'] = $quiz->first_info_label;
        $quiz_data['first_info_status'] = $quiz->first_info_status;
        $quiz_data['second_info_label'] = $quiz->second_info_label;
        $quiz_data['second_info_status'] = $quiz->second_info_status;
        $quiz_data['third_info_label '] = $quiz->second_info_label;
        $quiz_data['third_info_status'] = $quiz->second_info_status;
        $quiz_data['date_info_label'] = $quiz->date_info_label;
        $quiz_data['date_info_status'] = $quiz->date_info_status;
        $quiz_data['placeholder'] = $quiz->placeholder;
        $quiz_data['status'] = $quiz->status;
        $quiz_data['taken'] = 0;
        $quiz_data['average_score'] = 0;
        $quiz_data['average_percentage'] = 0;
        $quiz_data['button_text'] = $quiz->button_text;
        $quiz_data['type'] = $quiz->type;
        $quiz_data['intro_video'] = $quiz->intro_video;
        $quiz_data['banner'] = $quiz->banner;
        $quiz_data['result_banner'] = $quiz->result_banner;
        $new_quiz = $this->quizService->createQuiz($quiz_data);
        $this->questionService->duplicateQuestionOfQuiz($new_quiz->id,$id);
        $this->questionService->duplicateSegment ($new_quiz->id,$id);
        return redirect("quizzes/$new_quiz->id/edit");
    }

    public function super_index()
    {
        $active = 4;
        $user = $this->userService->getUserById(auth()->id());
        $quizzes = $this->quizService->getUserSuperQuizzes(auth()->id());
        return view('customer.super_quizzes', compact('active', 'user', 'quizzes'));
    }

    public function super_create()
    {
        $active = 4;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.new_super_quiz', compact('active', 'user'));
    }

    public function super_store (QuizRequest $request){
        $data = $request->all();
        if (isset($request->file)){
            $data['banner'] =$this->quizService->uploadMedia($request->file);
            unset($data['file']);
        }
        if (isset($request->rbanner)){
            $data['result_banner'] =$this->quizService->uploadMedia($request->rbanner);
            unset($data['rbanner']);
        }
        $data['user_id'] = auth()->id();

        $quiz = $this->quizService->createQuiz($data);
        return redirect("superQuizzes/$quiz->id/edit");
    }

    public function super_edit ($id){
        $active = 4;
        $user = $this->userService->getUserById(auth()->id());
        $super_quiz = $this->quizService->getSuperQuiz($id);
        if ($super_quiz->type == 'quiz'){
            $active = 2;
            return view('customer.new_quiz', compact('active', 'user', 'super_quiz'));
        }
        return view('customer.new_super_quiz', compact('active', 'user', 'super_quiz'));
    }


}
