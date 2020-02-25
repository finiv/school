<?php

namespace App\Observers;

use App\Message;

class MessageObserver
{
    public function deleting(Message $message)
    {
        if($message->students->count() > 0){
            $message->students()->detach();
        }
        
        if($message->teachers->count() > 0){
            $message->teachers()->detach();
        }
    }
}
