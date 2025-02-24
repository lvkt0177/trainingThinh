<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Mail\WelcomeMail;

use Illuminate\Support\Facades\Mail;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class EmailJob implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $user;
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
        $token = Password::broker()->createToken($user);

        $resetLink = 'http://127.0.0.1:8000/reset-password?token=' . $token . '&email=' . urlencode($user->email);
        $tieuDe = " Yêu cầu đặt lại mật khẩu cho tài khoản của bạn";
        $link = $resetLink;

        Mail::to($this->user->email)->send(new WelcomeMail($user, $tieuDe, $link));

    }
}
