<?php

namespace App\Mails;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


/**
 * Class OrderOnlineMail
 * @package App\Mails
 */
class OrderOnlineMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sendToMail;
    public $link;

    /**
     * OrderOnlineMail constructor.
     * @param string $email
     * @param string $token
     * @codeCoverageIgnore
     */
    public function __construct(string $email, string $token)
    {
        $this->sendToMail=$email;
        $this->link=route('order.show',$token);
    }

    /**
     * Build the message.
     * @codeCoverageIgnore
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order') ->subject("Nowe zamówienie w " . config('app.name'));
    }

    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail order online to:" . $this->sendToMail);
        Mail::to($this->sendToMail)->queue($this);
    }
}
