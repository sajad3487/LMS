<?php

namespace Modules\Result\Http\Controllers;

use App\Http\Services\UserService;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\OptionService;
use Modules\Quiz\Http\Service\QuestionService;
use Modules\Quiz\Http\Service\QuizService;
use Modules\Result\Http\Requests\AnswerRequest;
use Modules\Result\Http\Requests\AnswerSuperRequest;
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
    /**
     * @var QuizService
     */
    private $quizService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var QuestionService
     */
    private $questionService;

    public function __construct(
        AnswerQuizService $answerQuizService,
        OptionService $optionService,
        AnswerQuestionService $answerQuestionService,
        ResultService $resultService,
        QuizService $quizService,
        UserService $userService,
        QuestionService $questionService
    )
    {
        $this->answerQuizService = $answerQuizService;
        $this->optionService = $optionService;
        $this->answerQuestionService = $answerQuestionService;
        $this->resultService = $resultService;
        $this->quizService = $quizService;
        $this->userService = $userService;
        $this->questionService = $questionService;
    }

    public function index()
    {
        $quizzes = $this->quizService->getUserQuizzes(auth()->id());
        $active = 3;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.quizzes_result', compact('quizzes', 'active', 'user'));
    }

    public function create()
    {
        return view('result::create');
    }

    public function store(AnswerRequest $request)
    {
        $result = $this->answerQuizService->checkUniqueEmail ($request->email,$request->form_id);
        if ($result != null){
            return back();
        }
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['form_id'] = $request->form_id;
        if (isset($request->first_info)) {
            $data['first_info'] = $request->first_info;
        }
        if (isset($request->second_info)) {
            $data['second_info'] = $request->second_info;
        }
        if (isset($request->date_info)) {
            $data['date_info'] = $request->date_info;
        }
        $answer = $this->answerQuizService->createAnswer($data);
        $additional_info = $request->additional_info;
        if (isset($request->question)) {
            foreach ($request->question as $key => $answered_option) {
                $answer_data['form_id'] = $request->form_id;
                $answer_data['answer_id'] = $answer->id;
                $answer_data['question_id'] = $key;
                if (is_array($answered_option)) {
                    foreach ($answered_option as $multi_answer) {
                        $answer_data['option_id'] = $multi_answer;
                        $answer_data['type'] = 'option';
                        $option = $this->optionService->getOptionById($multi_answer);
                        $answer_data['answer'] = $option->body;
                        $answer_data['score'] = $option->score;
                        $answer_data['additional_info'] = $additional_info[$key];
                        $answer_question = $this->answerQuestionService->createAnswerQuestion($answer_data);
                    }
                } else {
                    $answer_data['option_id'] = $answered_option;
                    $answer_data['type'] = 'option';
                    $option = $this->optionService->getOptionById($answered_option);
                    $answer_data['answer'] = $option->body;
                    $answer_data['score'] = $option->score;
                    $answer_data['additional_info'] = $additional_info[$key];
                    $answer_question = $this->answerQuestionService->createAnswerQuestion($answer_data);
                }
            }
        }
        $score = $this->answerQuizService->calculateSumScore($answer->id);
        $updated_data['score'] = $score;
        $this->answerQuizService->updateAnswerQuiz($updated_data, $answer->id);
        return redirect("quiz/$answer->id/result");
    }

    public function show ($answer_id){
        $answer = $this->answerQuizService->getAnswerById($answer_id);
        $score = $answer->score;
        $segment = $this->resultService->findSegment($answer->score, $answer->form_id);
        $quiz = $this->quizService->getQuiz($answer->form_id);
        return view('result', compact('segment', 'score', 'quiz'));
    }

    public function answer_index($quiz_id)
    {
        $row_questions = $this->questionService->getQuestionsOfQuiz($quiz_id);
        if ($row_questions->count() == 0) {
            return back();
        }
        foreach ($row_questions as $key => $question) {

            $questions[$key] = $question->toArray();
            $questions[$key]['taken'] = $question->answer->count();
            $sum_score = 0;
            foreach ($question->answer as $answer) {
                $sum_score += $answer->score;
            }
            if ($questions[$key]['taken'] != 0) {
                $questions[$key]['average_score'] = $sum_score / $questions[$key]['taken'];
            } else {
                $questions[$key]['average_score'] = 0;
            }
            foreach ($question->option as $option_key => $option) {
                $choosed = $this->answerQuestionService->countOptionAnswer($option->id);
                $questions[$key]['option'][$option_key]['choosed'] = $choosed;
                if ($questions[$key]['taken'] != 0) {
                    $questions[$key]['option'][$option_key]['average_percentage'] = round(($choosed / $questions[$key]['taken']) * 100, 2);
                } else {
                    $questions[$key]['option'][$option_key]['average_percentage'] = 0;
                }
            }
        }
        $active = 3;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuiz($quiz_id);
        return view('customer.questions_result', compact('questions', 'active', 'user', 'quiz'));
    }

    public function segment_answer_index($quiz_id)
    {
        $results = $this->resultService->getResultSegments($quiz_id);
        if ($results->count() == 0) {
            return back();
        }
        foreach ($results as $key => $result) {
            $segments[$key] = $result->toArray();
            $participants = $this->answerQuizService->getUsersOfSegment($result->min_score, $result->max_score,$result->form_id);
            $segments[$key]['users'] = $participants->toArray();
            $sum_score = 0;
            foreach ($participants as $participant) {
                $sum_score += $participant->score;
            }
            $segments[$key]['achieved'] = $participants->count();
            if ($participants->count() != 0) {
                $segments[$key]['average_score'] = ($sum_score / ($participants->count()));
            } else {
                $segments[$key]['average_score'] = 0;
            }

        }
        $quiz = $this->quizService->getQuiz($quiz_id);
        if ($quiz->type == 'quiz'){
            $active = 3;
        }else{
            $active = 5;
        }

        $user = $this->userService->getUserById(auth()->id());
        return view('customer.segment_result', compact('segments', 'active', 'user','quiz'));
    }

    public function user_answer_index($quiz_id)
    {
        $participants = $this->answerQuizService->getUsersOfQuiz($quiz_id);
        $active = 6;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.user_result', compact('participants', 'active', 'user'));
    }

    public function super_store (AnswerSuperRequest $request){
        $result = $this->answerQuizService->checkUniqueEmail ($request->email,$request->form_id);
        if ($result != null){
            return back()->withErrors(['Error', 'The email is not valid']);
        }
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['type'] = 'superquiz';
        $data['form_id'] = $request->form_id;
        if (isset($request->first_info)) {
            $data['first_info'] = $request->first_info;
        }
        if (isset($request->second_info)) {
            $data['second_info'] = $request->second_info;
        }
        if (isset($request->date_info)) {
            $data['date_info'] = $request->date_info;
        }
        $answer = $this->answerQuizService->createAnswer($data);
        $additional_info = $request->additional_info;
        if (isset($request->quiz)) {
            foreach ($request->quiz as $quizKey=>$quiz) {
                $data['first_name'] = $request->first_name;
                $data['last_name'] = $request->last_name;
                $data['email'] = $request->email;
                $data['parent_id'] = $answer->id;
                $data['type'] = 'subquiz';
                $data['form_id'] = $quizKey;
                $supquiz_answer = $this->answerQuizService->createAnswer($data);

                foreach ($quiz as $questionKey => $answered_option){
                    $answer_data['form_id'] = $quizKey;
                    $answer_data['answer_id'] = $supquiz_answer->id;
                    $answer_data['question_id'] = $questionKey;
                    if (is_array($answered_option)) {
                        foreach ($answered_option as $multi_answer) {
                            $answer_data['option_id'] = $multi_answer;
                            $answer_data['type'] = 'option';
                            $option = $this->optionService->getOptionById($multi_answer);
                            $answer_data['answer'] = $option->body;
                            $answer_data['score'] = $option->score;
                            $answer_data['additional_info'] = $additional_info[$questionKey];
                            $answer_question = $this->answerQuestionService->createAnswerQuestion($answer_data);
                        }
                    } else {
                        $answer_data['option_id'] = $answered_option;
                        $answer_data['type'] = 'option';
                        $option = $this->optionService->getOptionById($answered_option);
                        $answer_data['answer'] = $option->body;
                        $answer_data['score'] = $option->score;
                        $answer_data['additional_info'] = $additional_info[$questionKey];
                        $answer_question = $this->answerQuestionService->createAnswerQuestion($answer_data);
                    }
                }

            }
        }
        $result = $this->answerQuizService->getAnswersOfSuperQuiz ($answer->id);
        foreach ($result->quiz_answer as $sub_quiz_answer){
            $score = $this->answerQuizService->calculateSumScore($sub_quiz_answer->id);
            $updated_data['score'] = $score;
            $this->answerQuizService->updateAnswerQuiz($updated_data, $sub_quiz_answer->id);
        }
        $overall_score = $this->answerQuizService->calculateOveralScore($answer->id);
        $updated_overall_data['score'] = $overall_score;
        $this->answerQuizService->updateAnswerQuiz($updated_overall_data, $answer->id);

        return redirect("superQuizzes/$answer->id/result");
    }

    public function super_show ($answer_id){
        $answer = $this->answerQuizService->getAnswersOfSuperQuiz($answer_id);
        $segment = $this->resultService->findSegment($answer->score, $answer->form_id);
        $quiz = $this->quizService->getQuiz($answer->form_id);
        return view('super_result', compact('segment', 'answer','quiz'));
    }

    public function sub_quiz_show ($subquiz_answer_id,$answer_id){
        $answer = $this->answerQuizService->getAnswerById($subquiz_answer_id);
        $score = $answer->score;
        $segment = $this->resultService->findSegment($answer->score, $answer->form_id);
        $quiz = $this->quizService->getQuiz($answer->form_id);
        $super_quiz = $this->quizService->getSuperQuiz($quiz->parent_id);
        return view('subquiz_result', compact('segment', 'score', 'quiz','super_quiz','answer_id'));
    }

    public function super_index (){
        $super_quizzes = $this->quizService->getUserSuperQuizzes(auth()->id());
        $active = 5;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.super_quizzes_result', compact('super_quizzes', 'active', 'user'));
    }

    public function super_answer_index ($quiz_id){
        $row_questions = $this->questionService->getQuestionsOfQuiz($quiz_id);
        if ($row_questions->count() == 0) {
            return back();
        }
        foreach ($row_questions as $key => $question) {

            $questions[$key] = $question->toArray();
            $questions[$key]['taken'] = $question->answer->count();
            $sum_score = 0;
            foreach ($question->answer as $answer) {
                $sum_score += $answer->score;
            }
            if ($questions[$key]['taken'] != 0) {
                $questions[$key]['average_score'] = $sum_score / $questions[$key]['taken'];
            } else {
                $questions[$key]['average_score'] = 0;
            }
            foreach ($question->option as $option_key => $option) {
                $choosed = $this->answerQuestionService->countOptionAnswer($option->id);
                $questions[$key]['option'][$option_key]['choosed'] = $choosed;
                if ($questions[$key]['taken'] != 0) {
                    $questions[$key]['option'][$option_key]['average_percentage'] = round(($choosed / $questions[$key]['taken']) * 100, 2);
                } else {
                    $questions[$key]['option'][$option_key]['average_percentage'] = 0;
                }
            }
        }
        $active = 5;
        $user = $this->userService->getUserById(auth()->id());
        $quiz = $this->quizService->getQuizWithParent($quiz_id);
        return view('customer.super_questions_result', compact('questions', 'active', 'user', 'quiz'));
    }

    public function super_user_answer_index ($quiz_id){
        $participants = $this->answerQuizService->getUsersOfSuperQuiz($quiz_id)->toArray();
        $active = 5;
        $user = $this->userService->getUserById(auth()->id());
//        dd($participants);
        return view('customer.super_user_result', compact('participants', 'active', 'user'));
    }

}
