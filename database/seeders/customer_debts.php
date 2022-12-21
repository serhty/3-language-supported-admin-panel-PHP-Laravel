<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class customer_debts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_debts')->insert([
            'status' => '1',
            'customerId' => '1',
            'debt' => '100.00',
        ]);
    }
}
