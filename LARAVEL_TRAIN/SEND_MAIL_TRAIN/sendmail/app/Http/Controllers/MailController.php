<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Albert Ndizeye teste',
            'body' => 'This is for testing mail using gmail'
        ];
        Mail::to("becodeexow@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
}
