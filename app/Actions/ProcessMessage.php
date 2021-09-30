<?php

namespace App\Actions;

use App\Interfaces\IProcessMessage;

class ProcessMessage implements IProcessMessage
{
    /**
     * Process the chat message.
     *
     * @param  int  $user_id
     * @param  string  $message
     */
    public function process(int $user_id, string $message)
    {
        return $message;
    }
}
