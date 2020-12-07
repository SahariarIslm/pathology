<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseCancelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_cancels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_no');
            $table->string('supplier')->nullable();
            $table->date('cancel_date');
            $table->date('p_date');
            $table->integer('totalQty')->nullable();
            $table->double('subTotal', 10,2)->nullable();
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
        Schema::dropIfExists('purchase_cancels');
    }
}
