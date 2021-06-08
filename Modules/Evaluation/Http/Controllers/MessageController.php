<?php

namespace Modules\Evaluation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Evaluation\Http\Requests\MessageRequest;
use Modules\Evaluation\Http\Service\MessageService;

class MessageController extends Controller
{
    /**
     * @var MessageService
     */
    private $mesageService;

    public function __construct(
        MessageService $messageService
    )
    {
        $this->mesageService = $messageService;
    }

    public function store (MessageRequest $request){
        $data = $request->all();
        $data['owner_id'] = auth()->id();
        $message = $this->mesageService->createMessage($data);
        return back();
    }
}
