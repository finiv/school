<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Message;

class EmailSend implements ShouldQueue
{
    public $message;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
       $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = [];

        if($this->message->students->count() > 0){
            foreach($this->message->students as $value){
                $emails[] = $value['email'];
            }
        }

        if($this->message->teachers->count() > 0){
            foreach($this->message->teachers as $value){
                $emails[] = $value['email'];
            }
        }

        $subject = $this->message->subject;
        
        \Mail::send('emails.index', ['details' => $this->message], function($recepients) use ($emails, $subject){
            $recepients->to($emails)->subject($subject);
        });
        
        $this->message->send = true;
        $this->message->save();
    }
}
