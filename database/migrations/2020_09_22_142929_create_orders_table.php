<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');

            $table->string('receiver_name');
            $table->string('phone');
            $table->string('address');
            $table->double('subtotal');
            $table->double('shipping_fee');
            $table->double('total');

            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->foreignId('order_status_id')->constrained('order_statuses');
            $table->foreignId('user_id')->constrained('users');

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
        Schema::dropIfExists('orders');
    }
}
