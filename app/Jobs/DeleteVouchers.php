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
 * Class DeleteVouchers
 * @package App\Jobs
 */
class DeleteVouchers implements ShouldQueue
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
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     * @codeCoverageIgnore
     */
    public function handle()
    {
        $vouchers = Voucher::all();
        foreach ($vouchers as $voucher) {
            if ( $voucher->expire_at <= Carbon::today()){
                $voucher->delete();
            }
        }
    }
}
