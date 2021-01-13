<?php


namespace Modules\Quiz\Http\Service;


use Modules\Quiz\Repository\QuizRepository;

class QuizService
{
    /**
     * @var QuizRepository
     */
    private $quizRepo;

    public function __construct(
        QuizRepository $quizRepository
    )
    {
        $this->quizRepo = $quizRepository;
    }

    public function getUserQuizzes ($user_id){
        return $this->quizRepo->getAllUserQuizzes ($user_id);
    }

    public function createQuiz ($data){
        return $this->quizRepo->create($data);
    }

    public function getQuiz ($id){
        return $this->quizRepo->getQuizById ($id);
    }

    public function updateQuiz ($data,$id){
        return $this->quizRepo->update($data,$id);
    }

}
