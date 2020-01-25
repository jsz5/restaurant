<?php

namespace App\Jobs;

use App\Mails\VoucherMail;
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
use Swift_TransportException;

/**
 * Class CreateVouchers
 * @package App\Jobs
 */
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
            $voucher->discount = $this->discount;
            $voucher->token = uniqid();
            $voucher->expire_at = Carbon::today()->addDays(config('vouchers.expire_in'));
            $voucher->user()->associate($user);
            if ($voucher->save()) {
                $this->sendMail($user->email, $voucher);
            }

        }
    }

    /**
     * @param $mail
     * @param Voucher $voucher
     * @return ResponseFactory|Response
     * @codeCoverageIgnore
     */
    public function sendMail($mail, Voucher $voucher)
    {
        try {
            (new VoucherMail($mail, $voucher))->sendMail();
            Log::info("Sending email with voucher to " . $mail);
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Swift_TransportException $e) {
            Log::error("Sending email with voucher to " . $mail . " failed.");
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }
}
