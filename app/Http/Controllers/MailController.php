<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Demomail;
use App\Events\SendMails;
use Illuminate\Support\Facades\Event;

class MailController extends Controller
{
    public function index(){
        $mailData=[
            'title'=>'Mail From Himanshu',
            'body'=>'I am Himanshu Porwal',
        ];

         Mail::to('rishuracer7417@gmail.com')->send(new Demomail($mailData));
        //dispatch(new SendMail($mailData));
      //  return "Email is send Successfully";
        return back();
    }

}
