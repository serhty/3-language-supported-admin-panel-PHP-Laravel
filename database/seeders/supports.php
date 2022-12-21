<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class supports extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supports')->insert([
            'status' => '1',
            'name' => 'test',
            'phone' => 'test',
            'mail' => 'test',
            'message' => 'test',
            'supportDate' => '2022-11-11 20:20:00',
            'replyDate' => '2022-11-11 20:20:00',
            'note' => 'test',
        ]);
    }
}
