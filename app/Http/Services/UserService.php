<?php


namespace App\Http\Services;


use App\Repository\UserRepository;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepo;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepo =$userRepository;
    }

    public function getCustomer(){
        return $this->userRepo->getAllCustomer();
    }

    public function getUserById($id){
        return $this->userRepo->getById($id);
    }

    public function updateUser ($data,$id){
        return $this->userRepo->update($data,$id);
    }

    public function getAdminUsers (){
        return $this->userRepo->getAdmins();
    }

    public function deleteAdmin ($id){
        return $this->userRepo->delete($id);
    }

    public function countAllUser (){
        return $this->userRepo->countUser();
    }

}
