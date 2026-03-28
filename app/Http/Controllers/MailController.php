<?php

namespace App\Http\Controllers;

use App\Jobs\WelcomeEmailJob;
use Illuminate\Http\Request;

class MailController extends Controller
{
   
    public function demo() {
        WelcomeEmailJob::dispatch();
        return response()->json(['message' => 'Welcome email sent']);
       }
}
