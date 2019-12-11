<?php

namespace App\Console;

use App\Jobs\CreateVouchers;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class VoucherActions extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'voucher:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email and create vouchers';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'voucher:create
                        {discount : voucher discount}';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        CreateVouchers::dispatch($this->argument('discount'));
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
