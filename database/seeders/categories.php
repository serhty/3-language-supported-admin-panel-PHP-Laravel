<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'status' => '1',
            'title_en' => 'test-en',
            'title_de' => 'test-de',
            'title_ru' => 'test-ru',
            'link_en' => 'test-en',
            'link_de' => 'test-de',
            'link_ru' => 'test-ru',
            'description_en' => 'test-en',
            'description_de' => 'test-de',
            'description_ru' => 'test-ru',
            'keywords_en' => 'test-en',
            'keywords_de' => 'test-de',
            'keywords_ru' => 'test-ru',
            'content_en' => 'test-en',
            'content_de' => 'test-de',
            'content_ru' => 'test-ru',
            'coverImage' => 'test.jpg',
        ]);
    }
}
