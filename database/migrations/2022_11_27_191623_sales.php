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
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->integer('productId')->nullable();
            $table->text('productName')->nullable();
            $table->integer('customerId')->nullable();
            $table->datetime('saleDate')->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->decimal('discountedPrice', 10,2)->nullable();
            $table->integer('discount')->nullable();
            $table->decimal('finalPrice', 10,2)->nullable();
            $table->string('currency', 10)->nullable();
            $table->decimal('payment', 10,2)->nullable();
            $table->decimal('debt', 10,2)->nullable();
            $table->text('note')->nullable();
            $table->integer('saleAdminId')->nullable();
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
        Schema::dropIfExists('sales');
    }
};
