<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku', 6);
            $table->unique('sku');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('ordered_quantity')->default(0);
            $table->integer('available_quantity')->default(0);
            $table->boolean('is_available')->default(false);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }
}
