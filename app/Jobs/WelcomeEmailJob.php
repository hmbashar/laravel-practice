<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class WelcomeEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      Mail::to('hmbashar@gmail.com')->send(new WelcomeEmail());
    }
}
