<?php

use Illuminate\Database\Seeder;

class FavouriteDishTableSeeder extends Seeder
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
                for ($i = 0; $i < random_int(3, 7); $i++) {
                    $favouriteDish = new \App\Models\FavouriteDish();
                    $favouriteDish->user()->associate($user);
                    $favouriteDish->dish()->associate(\App\Models\Dish::find(random_int(1,  \App\Models\Dish::all()->count())));
                    $favouriteDish->save();
                }
            }
        } catch (Exception $e) {
            echo $e . "\n";
        }
    }
}
