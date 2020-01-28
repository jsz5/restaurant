<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


/**
 * Class ContactClientMail
 * @package App\Mails
 */
class ContactClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $mail;

    /**
     * Contact Info Mail constructor.
     * @param string $msg
     * @param string $mail
     * @codeCoverageIgnore
     */
    public function __construct(string $msg, string $mail)
    {
        $this->msg=$msg;
        $this->mail=$mail;
    }

    /**
     * Build the message.
     * @codeCoverageIgnore
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contactClient')
            ->subject("Zgłoszenie w " . config('app.name'));
    }

    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail contact client to:" . $this->name);
        Mail::to($this->mail)->queue($this);
    }
}
