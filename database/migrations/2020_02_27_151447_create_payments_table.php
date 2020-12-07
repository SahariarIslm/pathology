<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('supplier')->nullable();
            $table->string('purchase_no')->nullable();
            $table->double('paid', 10,2)->nullable();
            $table->double('due', 10,2)->nullable();
            $table->double('amount', 10,2)->nullable();
            $table->string('details')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
