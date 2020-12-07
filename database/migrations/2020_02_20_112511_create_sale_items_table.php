<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sale_no');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->date('date');
            $table->integer('qty')->nullable();
            $table->double('price', 8,2)->nullable();
            $table->double('total', 10,2)->nullable();
            $table->integer('shop');
            $table->integer('user');
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
        Schema::dropIfExists('sale_items');
    }
}
