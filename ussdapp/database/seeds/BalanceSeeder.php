<?php

use Illuminate\Database\Seeder;
use App\Balance;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $balance = new Balance();
        $balance->name = 'kings';
        $balance->phone_no = '08066056233';
        $balance->balance = 50000;
        $balance->save();

        $balance = new Balance();
        $balance->name = 'kk';
        $balance->phone_no = '09062151376';
        $balance->balance = 90000;
        $balance->save();

        $balance = new Balance();
        $balance->name = 'Anayo';
        $balance->phone_no = '09062156233';
        $balance->balance = 90000;
        $balance->save();
    }
}
