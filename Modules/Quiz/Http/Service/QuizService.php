<?php


namespace Modules\Quiz\Http\Service;


use App\Http\Services\UserService;
use Modules\Quiz\Repository\QuizRepository;
use Modules\Result\Http\Service\AnswerQuizService;
use Modules\Result\Repository\AnswerQuizRepository;

class QuizService
{
    /**
     * @var QuizRepository
     */
    private $quizRepo;
    /**
     * @var AnswerQuizRepository
     */
    private $answerQuizRepo;
    /**
     * @var UserService
     */
    private $userService;


    public function __construct(
        QuizRepository $quizRepository,
        AnswerQuizRepository $answerQuizRepository,
        UserService $userService
    )
    {
        $this->quizRepo = $quizRepository;
        $this->answerQuizRepo = $answerQuizRepository;
        $this->userService = $userService;
    }

    public function getUserQuizzes ($user_id){
        return $this->quizRepo->getAllUserQuizzes ($user_id);
    }

    public function createQuiz ($data){
        return $this->quizRepo->create($data);
    }

    public function getQuiz ($id){
        return $this->quizRepo->getQuizById($id);
    }

    public function updateQuiz ($data,$id){
        return $this->quizRepo->update($data,$id);
    }

    public function getUserSuperQuizzes ($user_id){
        return $this->quizRepo->getAllUserSuperQuiz($user_id);
    }

    public function uploadMedia ($file) {
        $destination = base_path() . '/public_html/media/image/';
        $filename = rand(1111111, 99999999);
        $newFileName = $filename . $file->getClientOriginalName();
        $file->move($destination, $newFileName);
        return '/media/image/' . $newFileName;
    }

    public function getSuperQuiz ($quiz_id){
        return $this->quizRepo->getSuperQuizById ($quiz_id);
    }

    public function getQuizWithParent ($quiz_id){
        return $this->quizRepo->getQuizWithParentById ($quiz_id);
    }

    public function deleteQuiz ($id){
        return $this->quizRepo->delete($id);
    }

    public function getQuizzesOfUserWithAnswersInfo ($user_id){
        $user = $this->userService->getUserById($user_id);
        $quizzes = $this->quizRepo->getActiveUserQuizzes($user);
        $quizzes_answers = $this->answerQuizRepo->getAllAnswersOfUser($user_id);
        foreach ($quizzes as $quiz){
            $quiz->answer_status = 0 ;
            foreach ($quizzes_answers as $answer){
                if ($answer->form_id == $quiz->id){
                    $quiz->answer_status = 1;
                }
            }
        }
        return $quizzes;
    }

}
