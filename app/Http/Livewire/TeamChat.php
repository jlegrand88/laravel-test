<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Events\SendMessage as SendMessageEvent;
use App\Interfaces\IProcessMessage;

class TeamChat extends Component
{
    public $user;
    public $message;
    public $messages;

    protected $rules = [
        'message' => 'required',
    ];

    protected $listeners = ["messageReceived"];

    public function mount()
    {
        $this->user = auth()->user();
        $this->message = "";
        $this->messages = [];
        
    }

    public function render()
    {
        return view('livewire.team-chat');
    }

    public function sendMessage(IProcessMessage $action)
    {
        $validatedData = $this->validate();
        $action->process($this->user->id, $validatedData['message']);
        event(new SendMessageEvent($this->user, $validatedData['message']));
    }
    
    public function messageReceived($data)
    {
        $this->messages[] = [
            'userId' => $data['user']['id'],
            'userName' => $data['user']['name'],
            'userMail' => $data['user']['email'],
            'message' => $data['message']
        ];
    }
}
