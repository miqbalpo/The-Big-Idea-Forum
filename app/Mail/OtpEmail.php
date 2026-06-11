<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $otpCode;
    public $expiryTime;

    public function __construct($user, $otpCode, $expiryTime = 10)
    {
        $this->user = $user;
        $this->otpCode = $otpCode;
        $this->expiryTime = $expiryTime;
    }

    public function build()
    {
        return $this->subject('Kode OTP untuk Reset Password - ' . config('app.name'))
                    ->view('emails.otp')
                    ->with([
                        'userName' => $this->user->name,
                        'otpCode' => $this->otpCode,
                        'expiryTime' => $this->expiryTime,
                    ]);
    }
}