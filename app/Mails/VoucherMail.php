<?php

namespace App\Mails;

use App\Models\Reservation;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


/**
 * Class VoucherMail
 * @package App\Mails
 */
class VoucherMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $sendToMail;
    /**
     * @var string
     */
    public $discount;
    /**
     * @var mixed
     */
    public $token;
    /**
     * @var string
     */
    public $date;

    /**
     * OrderOnlineMail constructor.
     * @param string $email
     * @param Voucher $voucher
     * @codeCoverageIgnore
     */
    public function __construct(string $email, Voucher $voucher)
    {
        $this->sendToMail=$email;
        $this->discount=($voucher->discount*100).'%';
        $this->token=$voucher->token;
        $this->date=Carbon::now()->addDays(14)->format('Y-m-d');
    }

    /**
     * Build the message.
     * @codeCoverageIgnore
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.voucherQrCode') ->subject("Promocja w " . config('app.name'));
    }

    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail voucher to:" . $this->sendToMail);
        Mail::to($this->sendToMail)->queue($this);
    }
}
