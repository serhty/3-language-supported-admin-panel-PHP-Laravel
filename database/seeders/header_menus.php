<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class header_menus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('header_menus')->insert([
            'status' => '1',
            'topMenu' => '1',
            'title_en' => 'test-en',
            'title_de' => 'test-de',
            'title_ru' => 'test-ru',
            'link_en' => 'test-en',
            'link_de' => 'test-de',
            'link_ru' => 'test-ru',
            'row' => '1',
        ]);
    }
}
