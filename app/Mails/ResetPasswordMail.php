<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


/**
 * Class ResetPasswordMail
 * @package App\Mails
 */
class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $sendToMail;
    /**
     * @var string
     */
    public $link;

    /**
     * ResetPasswordMail constructor.
     * @param string $token
     * @param string $email
     * @codeCoverageIgnore
     */
    public function __construct(string $token, string $email)
    {
        $this->sendToMail=$email;
        $this->link=route('password.reset',$token);
    }

    /**
     * Build the message.
     *  @codeCoverageIgnore
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.resetPassword') ->subject("Zmiana hasła " . config('app.name'));;
    }

    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail reset password to:" . $this->sendToMail);
        Mail::to($this->sendToMail)->queue($this);
    }
}
