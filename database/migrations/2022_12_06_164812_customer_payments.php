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
        Schema::create('customer_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->integer('customerId')->nullable();
            $table->decimal('payment', 10,2)->nullable();
            $table->text('title')->nullable();
            $table->string('currency')->nullable();
            $table->datetime('paymentDate')->nullable();
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
        Schema::dropIfExists('customer_payments');
    }
};
