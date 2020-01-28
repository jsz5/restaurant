<?php

namespace App\Jobs;

use App\Mails\ContactClientMail;
use App\Mails\ContactWorkerMail;
use App\Mails\ReservationMail;
use App\Mails\ReservationRemainderMail;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Voucher;
use App\Services\UserService;
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

/**
 * Class Contact
 * @package App\Jobs
 */
class Contact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * client mail
     * @var
     */
    protected $mail;

    /**
     * array of admins
     * @var
     */
    protected $admins;

    /**
     * client name
     * @var
     */
    protected $name;

    /**
     * client msg
     * @var
     */
    protected $msg;

    /**
     * Create a new job instance.
     *
     * @codeCoverageIgnore
     * @param $admisn
     * @param $mail
     * @param $name
     * @param $msg
     */
    public function __construct($mail, $name, $msg)
    {
        $this->mail = $mail;
        $this->name = $name;
        $this->msg = $msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function handle()
    {
        $admins = (new UserService())->getUsersByRole('admin');
        foreach ($admins as $admin) {
            $this->sentMailWorker($admin->email);
        }
        $this->sentMailClient();
    }

    /**
     * @param $mail
     * @return ResponseFactory|Response
     * @codeCoverageIgnore
     */
    public function sentMailWorker($mail)
    {
        try {
            Mail::to($mail)->queue(new ContactWorkerMail($this->mail, $this->name, $this->msg));
            Log::info("Sending email (contact msg) to worker :" . $mail);
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Swift_TransportException $e) {
            Log::error("Sending email (contact msg) to worker :" . $mail . " failed.");
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * @return ResponseFactory|Response
     * @codeCoverageIgnore
     */
    public function sentMailClient()
    {
        try {
            Mail::to($this->mail)->queue(new ContactClientMail( $this->msg, $this->mail));
            Log::info("Sending email (contact msg) to client :" . $this->mail);
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Swift_TransportException $e) {
            Log::error("Sending email (contact msg) to client :" . $this->mail . " failed.");
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }
}
