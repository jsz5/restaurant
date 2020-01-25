<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


/**
 * Class ContactWorkerMail
 * @package App\Mails
 */
class ContactWorkerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $msg;
    public $mail;

    /**
     * Contact Info Mail constructor.
     * @param string $msg
     * @param string $name
     * @param string $mail
     * @codeCoverageIgnore
     */
    public function __construct(string $mail, string $name, string $msg)
    {
        $this->name=$name;
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
        return $this->view('mails.contactWorker') ->subject("Nowe zgłoszenie w " . config('app.name'));
    }

    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail contact worker to:" . $this->name);
        Mail::to($this->name)->queue($this);
    }
}
