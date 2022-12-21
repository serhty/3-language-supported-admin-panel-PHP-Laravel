<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'status' => '1',
            'productId' => '1',
            'productName' => 'test',
            'productFeature' => 'test',
            'productType' => 'test',
            'name' => 'test',
            'phone' => 'test',
            'mail' => 'test',
            'message' => 'test',
            'orderDate' => '2022-11-11 20:20:00',
            'price' => '100.00',
            'discountedPrice' => '80.00',
            'discount' => '80',
            'finalPrice' => '80.00',
            'currency' => '$',
            'payment' => '100.00',
            'debt' => '60.00',
            'note' => 'test',
        ]);
    }
}
