<?php

namespace App\Mails;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class ReservationRemainderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sendToMail;
    public $date;
    public $time;
    public $link;
    public $size;

    /**
     * ReservationMail constructor.
     * @param Reservation $reservation
     * @codeCoverageIgnore
     */
    public function __construct(Reservation $reservation)
    {
        $this->sendToMail=$reservation->email;
        $this->date=$reservation->date;
        $this->link=route('reservation.showUser', $reservation->id);
        $this->time=$reservation->start_time;
        $this->size=$reservation->table->size;
    }

    /**
     * Build the message.
     *  @codeCoverageIgnore
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.reservationRemainder') ->subject("Zbliżająca się rezerwacja w "
            . config('app.name'));
    }

    /**
     * sends mail to customer
     * @codeCoverageIgnore
     */
    public function sendMail()
    {
        Log::notice("Mail reservation to:" . $this->sendToMail);
        Mail::to($this->sendToMail)->queue($this);
    }
}
