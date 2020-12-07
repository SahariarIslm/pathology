<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sale_no');
            $table->string('customer')->nullable();
            $table->string('delivery')->nullable();
            $table->date('date');
            $table->integer('totalQty')->nullable();
            $table->double('subTotal', 10,2)->nullable();
            $table->double('discount', 10,2)->nullable();
            $table->string('d_type');
            $table->double('dCharge', 10,2)->nullable();
            $table->double('payable', 10,2)->nullable();
            $table->double('paid', 10,2)->nullable();
            $table->double('return', 10,2)->nullable();
            $table->double('due', 10,2)->nullable();
            $table->string('p_type')->nullable();
            $table->integer('shop');
            $table->string('user');
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
}
