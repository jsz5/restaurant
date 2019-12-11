<?php

namespace App\Jobs;

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

class CreateVouchers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * collection of investments
     * @var
     */
    protected $discount;

    /**
     * Create a new job instance.
     *
     * @param $discount
     * @codeCoverageIgnore
     */
    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @codeCoverageIgnore
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $voucher = new Voucher();
            $voucher -> discount = $this->discount;
            $voucher -> token = uniqid();
            $voucher -> user() ->associate($user);
            $voucher ->save();
//            $this->sentMailAll();
            //todo mail z info o kuponie
        }
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
//            Mail::to($mail)->queue(new AdvertisementMail($data));
            Log::channel('subscriptionsMail')->notice("Sending email to " . $mail);
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Swift_TransportException $e) {
            Log::channel('subscriptionsMail')->error("Sending email to " . $mail . " failed.");
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }
}
