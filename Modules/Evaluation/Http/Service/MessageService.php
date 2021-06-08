<?php


namespace Modules\Evaluation\Http\Service;


use Modules\Evaluation\Repository\MessageRepository;

class MessageService
{
    /**
     * @var MessageRepository
     */
    private $messageRepo;

    public function __construct(
        MessageRepository $messageRepository
    )
    {
        $this->messageRepo = $messageRepository;
    }

    public function createMessage ($data){
        return $this->messageRepo->create($data);
    }

    public function makeReadMessageOfAnswer ($answer_id){
        return $this->messageRepo->makeReadAllMessageOfAnswer ($answer_id);
    }

    public function makeReadMessagesOfClientChat ($user_id){
        return $this->messageRepo->makeReadAllMessageOfClientChat ($user_id);
    }

    public function getMessagesOfClientChat ($user_id){
        $messages = $this->messageRepo->getAllMessageOfClientChat ($user_id);
        $messages->unread_message = $this->countUnreadMessage($messages);
        return $messages;
    }

    public function countUnreadMessage ($messages){
        $counter = 0;
        foreach ($messages as $message) {
            if ($message->owner_id != auth()->id() && $message->status == 1) {
                $counter++;
            }
        }
        return $counter;
    }

}
