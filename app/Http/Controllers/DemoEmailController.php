<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DemoEmailController extends Controller
{
    function demoEmail() {
        $email_subject = 'This is for testing email';
        $email_to = 'hmbashar@gmail.com';
        $email_form= "admin@bashardev.me";
        $email_body = "this is laravel smtp email body test";

        SendEmailJobs::dispatch($email_to, $email_subject, $email_form, $email_body);

        return "email sent";
    }

    function queueRun() {
        Artisan::call('queue:work');
        return "Queue Sent";
    }

    function queueFailedRun() {
        Artisan::call('queue:retry', ['id' => 'all']);
        return "Queue Sent";
    }


   
}