<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_no');
            $table->string('supplier')->nullable();
            $table->date('date');
            $table->integer('totalQty')->nullable();
            $table->double('subTotal', 10,2)->nullable();
            $table->double('discount', 10,2)->nullable();
            $table->string('d_type');
            $table->double('payable', 10,2)->nullable();
            $table->double('paid', 10,2)->nullable();
            $table->double('return', 10,2)->nullable();
            $table->double('due', 10,2)->nullable();
            $table->string('p_type')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
