<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_images extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_images')->insert([
            'status' => '1',
            'categoryId' => '1',
            'cover' => '1',
            'image' => 'test.jpg',
        ]);
    }
}
