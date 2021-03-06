<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('waiter_id');
            $table->string('customer_name');
            $table->string('order_status')->default('pending')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_mode');
            $table->float('tax');
            $table->decimal('amount_to_pay');
            $table->decimal('amount_paid');
            $table->timestamps();

            $table->foreign('waiter_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_orders');
    }
}
