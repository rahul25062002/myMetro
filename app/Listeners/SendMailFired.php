<?php

namespace App\Listeners;

use App\Events\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendMailFired
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(SendMails $event): void
    {
        $user=User::find($event->userId);
        
        Mail::send('eventview',$user->toArray(),function($message) use ($user){
            $message->to($user['email']);
            $message->subject("Hello I am Himanshu");
        });
    }

}
