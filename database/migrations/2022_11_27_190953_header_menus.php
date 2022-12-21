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
        Schema::create('header_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->integer('topMenu')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_de')->nullable();
            $table->text('title_ru')->nullable();
            $table->text('link_en')->nullable();
            $table->text('link_de')->nullable();
            $table->text('link_ru')->nullable();
            $table->integer('row')->nullable();
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
        Schema::dropIfExists('header_menus');
    }
};
