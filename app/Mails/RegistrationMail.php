<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


/**
 * Class RegistrationMail
 * @package App\Mails
 */
class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sendToMail;
    public $password;
    public $link;
    private $role;

    /**
     * RegistrationMail constructor.
     * @param string $password
     * @param string $login
     * @param string $role
     * @codeCoverageIgnore
     */
    public function __construct(string $password, string $login, string $role)
    {
        $this->sendToMail=$login;
        $this->password=$password;
        $this->link=route('login');
        $this->role=$role;
    }

    /**
     * Build the message.
     * @codeCoverageIgnore
     * @return $this
     */
    public function build()
    {
        return $this->checkRole();
    }

    /**
     * @return RegistrationMail
     * different mail for customer and worker
     * @codeCoverageIgnore
     */
    private function checkRole()
    {
        if($this->role=='customer'){
            return $this->view('mails.registrationCustomer')->subject("Rejestracja w "
                . config('app.name'));
        }
        return $this->view('mails.registration')->subject("Rejestracja w " . config('app.name'));
    }
    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail registration to:" . $this->sendToMail);
        Mail::to($this->sendToMail)->queue($this);
    }
}
