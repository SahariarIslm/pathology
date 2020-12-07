<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reference_id')->nullable();
            $table->integer('shop_id')->nullable();
            $table->string('collection')->nullable();
            $table->string('payment')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('reference_payments');
    }
}
