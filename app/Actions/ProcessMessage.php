<?php

namespace App\Actions;

use App\Models\Team;
use App\Models\User;
use App\Models\DailyMeeting;
use Illuminate\Support\Facades\Validator;
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
        Validator::make(['user_id' => $user_id, 'message' => $message], [
            'user_id' => ['required', 'exists:users,id'],
            'message' => ['required']
        ])->validate();
        
        if(str_contains( $message, '@daily')) {
            $done = $this->processItem('done:', $message);
            $doing = $this->processItem('doing:', $message);
            $blocking = $this->processItem('blocking:', $message);
            $todo = $this->processItem('todo:', $message);

            DailyMeeting::create([
                'user_id' => $user_id,
                'done' => $done,
                'doing' =>  $doing,
                'blocking' => $blocking,
                'todo' => $todo
            ]);
        }
    }

    private function processItem(string $needle, string $haystack) {
        if(str_contains( $haystack, $needle)) {
            $items = strstr($haystack, $needle);
            $from = strlen($needle);
            $item = substr($items, $from);
            $itemsList = explode("/", $item);
            return $itemsList[0] ? trim($itemsList[0]) : null;
        }
        return null;
    }
}
