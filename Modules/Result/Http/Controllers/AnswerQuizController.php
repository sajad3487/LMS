<?php

namespace Modules\Result\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\OptionService;
use Modules\Quiz\Http\Service\QuestionService;
use Modules\Quiz\Http\Service\QuizService;
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
        return view('customer.quizzes_result',compact('quizzes','active','user'));
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
        $updated_data['score'] = $score;
        $this->answerQuizService->updateAnswerQuiz ($updated_data,$answer->id);
        $segment = $this->resultService->findSegment($score,$request->form_id);
        return view('result',compact('segment','score'));
    }

    public function answer_index ($quiz_id){
        $row_questions = $this->questionService->getQuestionsOfQuiz ($quiz_id);
        foreach ($row_questions as $key=>$question){

            $questions[$key] = $question->toArray();
            $questions[$key]['taken']=$question->answer->count();
            $sum_score = 0;
            foreach ($question->answer as $answer){
                $sum_score += $answer->score;
            }
            $questions[$key]['average_score'] = $sum_score / $questions[$key]['taken'];
            foreach ($question->option as $option_key=>$option){
                $choosed = $this->answerQuestionService->countOptionAnswer($option->id);
                $questions[$key]['option'][$option_key]['choosed'] = $choosed;
                $questions[$key]['option'][$option_key]['average_percentage'] = round(($choosed/$questions[$key]['taken'])*100,2);
            }
        }
        $active = 3;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.questions_result',compact('questions','active','user'));
    }

    public function segment_answer_index ($quiz_id){
        $results = $this->resultService->getResultSegments($quiz_id);
        foreach ($results as $key=>$result){
            $segments[$key] = $result->toArray();
            $participants = $this->answerQuizService->getUsersOfSegment($result->min_score,$result->max_score);
            $segments[$key]['users'] = $participants->toArray();
            $sum_score = 0;
            foreach ($participants as $participant){
                $sum_score += $participant->score;
            }
            $segments[$key]['achieved'] = $participants->count();
            if ($participants->count() !=0){
                $segments[$key]['average_score'] = ($sum_score/($participants->count()));
            }else{
                $segments[$key]['average_score'] = 0;
            }

        }
        $active = 3;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.segment_result',compact('segments','active','user'));
    }

    public function user_answer_index ($quiz_id){
        $participants = $this->answerQuizService->getUsersOfQuiz($quiz_id);
        $active = 3;
        $user = $this->userService->getUserById(auth()->id());
        return view('customer.user_result',compact('participants','active','user'));
    }

}
