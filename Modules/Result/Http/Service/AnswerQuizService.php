<?php


namespace Modules\Result\Http\Service;


use Facade\Ignition\Support\Packagist\Package;
use Modules\Result\Repository\AnswerQuizRepository;

class AnswerQuizService
{

    /**
     * @var AnswerQuizRepository
     */
    private $answerQuizRepo;

    public function __construct(
        AnswerQuizRepository $answerQuizRepository
    )
    {
        $this->answerQuizRepo = $answerQuizRepository;
    }

    public function createAnswer($data)
    {
        return $this->answerQuizRepo->create($data);
    }

    public function calculateSumScore($answer_id)
    {
        $answer = $this->answerQuizRepo->getAnswerWithQuestion($answer_id);
        $score = 0;
        foreach ($answer->question_answer as $question_answer) {
            $score += $question_answer->score;
        }
        return $score;
    }

    public function calculateOveralScore($answer_id){
        $answers = $this->answerQuizRepo->getAllAnswerOfSuperQuiz($answer_id);
        $score = 0;
        foreach ($answers->quiz_answer as $question_answer) {
            $score += $question_answer->score;
        }
        return $score;
    }

    public function updateAnswerQuiz ($data,$id){
        return $this->answerQuizRepo->update($data,$id);
    }

    public function getUsersOfSegment ($min,$max,$form_id){
        return $this->answerQuizRepo->getAllAnswerOfSegment($min,$max,$form_id);
    }

    public function getUsersOfQuiz ($quiz_id){
        return $this->answerQuizRepo->getAllUsersOfQuiz($quiz_id);
    }

    public function getAnswersOfSuperQuiz ($answer_id){
        return $this->answerQuizRepo->getAllAnswerOfSuperQuiz ($answer_id);
    }

    public function getAnswerById ($answer_id){
        return $this->answerQuizRepo->getAnswerWithQuestion($answer_id);
    }

    public function getUsersOfSuperQuiz ($quiz_id){
        return $this->answerQuizRepo->getAllUsersOfSuperQuiz($quiz_id);
    }

    public function checkUniqueEmail ($email,$form_id){
        return $this->answerQuizRepo->getEmailAnswer($email,$form_id);
    }

}
