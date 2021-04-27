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

    public function getUserSuperQuizzes ($user_id){
        return $this->quizRepo->getAllUserSuperQuiz($user_id);
    }

    public function uploadMedia ($file) {
        $destination = base_path() . '/public/media/image/';
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

}
