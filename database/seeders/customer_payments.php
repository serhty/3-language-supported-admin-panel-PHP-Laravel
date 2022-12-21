<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class customer_payments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_payments')->insert([
            'status' => '1',
            'customerId' => '1',
            'payment' => '100.00',
        ]);
    }
}
