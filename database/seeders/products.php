<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'status' => '1',
            'categoryId' => '1',
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
            'stock' => '1',
            'price' => '100.00',
            'discountedPrice' => '80.00',
            'discount' => '80',
            'finalPrice' => '80.00',
            'currency' => '$',
            'orderForm' => '1',
            'feature_de' => 'Beden',
            'feature_en' => 'Beden',
            'feature_ru' => 'Beden',
            'type_de' => 'Large, Small',
            'type_en' => 'Large, Small',
            'type_ru' => 'Large, Small',
            'formTitle_de' => 'test',
            'formTitle_en' => 'test',
            'formTitle_ru' => 'test',
            'comments' => '1',
            'featureId' => '1',
            'coverImage' => 'test.jpg',
        ]);
    }
}
