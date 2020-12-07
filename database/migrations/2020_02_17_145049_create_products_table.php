<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->bigInteger('code')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('minimum')->nullable();
            $table->string('maximum')->nullable();
            $table->decimal('discount',20,2)->nullable();
            $table->decimal('price',20,2)->nullable();
            $table->decimal('mrp',20,2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('shop')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
