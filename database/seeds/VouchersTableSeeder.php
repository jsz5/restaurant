<?php

use Illuminate\Database\Seeder;

class VouchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();
        try {
            foreach ($users as $user) {
                for ($i = 0; $i < random_int(1, 4); $i++) {
                    $voucher = new \App\Models\Voucher();
                    $voucher->token = uniqid();
                    $voucher->discount = random_int(1, 99) / 100;
                    $voucher->user()->associate($user);
                    $voucher->save();
                }
            }
        } catch (Exception $e) {
            echo $e . "\n";
        }
    }
}
