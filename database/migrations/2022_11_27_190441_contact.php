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
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->string('whatsapp', 150)->nullable();
            $table->integer('whatsappButton')->nullable();
            $table->string('phone1', 150)->nullable();
            $table->string('phone2', 150)->nullable();
            $table->string('mail1', 150)->nullable();
            $table->string('mail2', 150)->nullable();
            $table->text('address')->nullable();
            $table->text('location')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('youtube')->nullable();
            $table->text('tumblr')->nullable();
            $table->text('reddit')->nullable();
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
        Schema::dropIfExists('contact');
    }
};
