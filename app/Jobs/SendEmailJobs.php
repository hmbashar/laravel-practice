<?php

namespace App\Jobs;

use App\Mail\DemoEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmailJobs implements ShouldQueue
{
    use Queueable;

    public $email_to;
    public $email_subject;
    public $email_form;
    public $email_body;

    /**
     * Create a new job instance.
     */
    public function __construct($email_to, $email_subject, $email_form, $email_body)
    {
        $this->email_to = $email_to;
        $this->email_subject = $email_subject;
        $this->email_form = $email_form;
        $this->email_body = $email_body;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email_to)->send(new DemoEmail($this->email_subject, $this->email_body));
    }
}
