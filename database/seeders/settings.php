<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'status' => '1',
            'url_en' => 'test-en',
            'url_ru' => 'test-ru',
            'url_de' => 'test-de',
            'title_en' => 'test-en',
            'title_de' => 'test-de',
            'title_ru' => 'test-ru',
            'description_en' => 'test-en',
            'description_de' => 'test-de',
            'description_ru' => 'test-ru',
            'keywords_en' => 'test-en',
            'keywords_de' => 'test-de',
            'keywords_ru' => 'test-ru',
            'logo' => 'test.jpg',
            'lang_de' => '1',
            'lang_en' => '1',
            'lang_ru' => '1',
        ]);
    }
}
