<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_comments')->insert([
            'status' => '1',
            'productId' => '1',
            'name' => 'test',
            'mail' => 'test',
            'comment' => 'test',
            'commentDate' => '2022-11-11 20:00:00',
        ]);
    }
}
