<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class page_images extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_images')->insert([
            'status' => '1',
            'pageId' => '1',
            'cover' => '1',
            'image' => 'test.jpg',
        ]);
    }
}
