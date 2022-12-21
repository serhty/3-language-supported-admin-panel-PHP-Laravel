<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class customer_sales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_sales')->insert([
            'status' => '1',
            'customerId' => '1',
            'productId' => '1',
            'productName' => 'deneme ürün',
            'price' => '100.00',
            'payment' => '80.00',
            'debt' => '20.00',
        ]);
    }
}
