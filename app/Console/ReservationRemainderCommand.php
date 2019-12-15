<?php

namespace App\Console;

use App\Jobs\CreateVouchers;
use App\Jobs\ReservationRemainder;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ReservationRemainderCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'reservation:remainder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email about tomorrow reservation';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info("scheduler reservation remainder");
        ReservationRemainder::dispatch();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [

        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }
}
