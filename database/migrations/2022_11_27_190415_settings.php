<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->text('url_en')->nullable();
            $table->text('url_de')->nullable();
            $table->text('url_ru')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_de')->nullable();
            $table->text('title_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('keywords_en')->nullable();
            $table->text('keywords_de')->nullable();
            $table->text('keywords_ru')->nullable();
            $table->text('logo', 50)->nullable();
            $table->integer('lang_de')->nullable();
            $table->integer('lang_en')->nullable();
            $table->integer('lang_ru')->nullable();
            $table->datetime('lastDate')->nullable();
            $table->integer('lastAdminId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
