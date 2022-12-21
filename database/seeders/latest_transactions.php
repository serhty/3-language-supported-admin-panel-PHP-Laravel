<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class latest_transactions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('latest_transactions')->insert([
            'status' => '1',
            'adminId' => '1',
            'transaction' => 'test',
        ]);
    }
}
