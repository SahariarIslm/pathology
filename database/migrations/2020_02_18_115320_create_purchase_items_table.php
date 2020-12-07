<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_no');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->date('date');
            $table->date('expiry_date')->nullable();
            $table->string('batch_no')->nullable();
            $table->integer('qty')->nullable();
            $table->double('cost', 8,2)->nullable();
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
        Schema::dropIfExists('purchase_items');
    }
}
