<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(admins::class);
        $this->call(blogs::class);
        $this->call(categories::class);
        $this->call(category_images::class);
        $this->call(contact::class);
        $this->call(customers::class);
        $this->call(footer_menus::class);
        $this->call(gallery_images::class);
        $this->call(header_menus::class);
        $this->call(latest_transactions::class);
        $this->call(notes::class);
        $this->call(page_images::class);
        $this->call(pages::class);
        $this->call(product_comments::class);
        $this->call(product_images::class);
        $this->call(products::class);
        $this->call(sales::class);
        $this->call(settings::class);
        $this->call(sliders::class);
        $this->call(stories::class);
        $this->call(supports::class);
        $this->call(orders::class);
    }
}
