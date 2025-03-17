<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Mail\EmailSignUp;

use Illuminate\Support\Facades\Mail;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EmailSignUpJob implements ShouldQueue
{
    protected $queue = 'email';
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     */

    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $user = $this->user;
        $tieuDe = 'Đăng ký thành công';
        $noiDung = 'Chao mung';
        Mail::to($this->user->email)->send(new EmailSignUp($user, $tieuDe, $noiDung));
    }
}
