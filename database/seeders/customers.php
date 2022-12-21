<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'status' => '1',
            'name' => 'test',
            'phone' => 'test',
            'mail' => 'test',
            'paid' => '100.00',
            'debt' => '50.00',
            'note' => 'test',
        ]);
    }
}
