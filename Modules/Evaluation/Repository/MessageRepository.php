<?php


namespace Modules\Evaluation\Repository;


use App\DesignPatterns\Repository;
use Modules\Evaluation\Entities\Message;

class MessageRepository extends Repository
{
    /**
     * @var Message
     */
    public $model;

    public function __construct()
    {
        $this->model = new Message();
    }

    public function makeReadAllMessageOfAnswer ($answer_id){
        return Message::where('destination_id',$answer_id)
            ->where('type','question_comment')
            ->where('owner_id','!=',auth()->id())
            ->update(['status'=>2]);
    }

    public function makeReadAllMessageOfClientChat ($user_id){
        return Message::where('destination_id',$user_id)
            ->where('type','client_chat')
            ->where('owner_id','!=',auth()->id())
            ->update(['status'=>2]);
    }

    public function getAllMessageOfClientChat ($user_id){
        return Message::where('destination_id',$user_id)
            ->where('type','client_chat')
            ->with('owner')
            ->get();
    }


}
