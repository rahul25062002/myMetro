<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\Demomail;
class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $mailData;
    /**
     * Create a new job instance.
     */
    public function __construct($mailData)
    {
        $this->mailData=$mailData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('rishuracer7417@gmail.com')->send(new Demomail($this->mailData));
    }
}
