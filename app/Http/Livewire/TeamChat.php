<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Interfaces\IProcessMessage;

class TeamChat extends Component
{
    public $user;
    public $message;
    public $messages;

    protected $rules = [
        'message' => 'required',
    ];

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
        $message = $action->process($this->user->id, $validatedData['message']);
        $this->messages[] = [
            'userId' => $this->user->id,
            'userName' => $this->user->name,
            'userMail' => $this->user->email,
            'message' => $message
        ];
    }
}
