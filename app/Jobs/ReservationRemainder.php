<?php

namespace App\Jobs;

use App\Mails\ReservationMail;
use App\Mails\ReservationRemainderMail;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class ReservationRemainder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @codeCoverageIgnore
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();
        Reservation::where('date', $tomorrow)->get()->each(function ($reservation){
            $this->sentMail($reservation->email, $reservation);
        });
    }

    /**
     * @param $mail
     * @param $data
     * @return ResponseFactory|Response
     * @codeCoverageIgnore
     */
    public function sentMail($mail, $data)
    {
        try {
            Mail::to($mail)->queue(new ReservationRemainderMail($data));
            Log::channel('subscriptionsMail')->notice("Sending email to " . $mail);
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Swift_TransportException $e) {
            Log::channel('subscriptionsMail')->error("Sending email to " . $mail . " failed.");
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }
}
