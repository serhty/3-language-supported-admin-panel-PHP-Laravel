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
        Schema::create('supports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->string('name', 150)->nullable();
            $table->string('phone', 150)->nullable();
            $table->string('mail', 150)->nullable();
            $table->text('message')->nullable();
            $table->datetime('supportDate')->nullable();
            $table->datetime('replyDate')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('supports');
    }
};
