<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'status' => '1',
            'whatsapp' => 'test',
            'whatsappButton' => '1',
            'phone1' => 'test',
            'phone2' => 'test',
            'mail1' => 'test',
            'mail2' => 'test',
            'address' => 'test',
            'facebook' => 'test',
            'instagram' => 'test',
            'twitter' => 'test',
            'pinterest' => 'test',
            'linkedin' => 'test',
            'youtube' => 'test',
            'tumblr' => 'test',
            'reddit' => 'test',
        ]);
    }
}
