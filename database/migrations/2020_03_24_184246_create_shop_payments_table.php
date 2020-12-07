<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('package');
            $table->string('price')->nullable();
            $table->string('days')->nullable();
            $table->string('type')->nullable();
            $table->string('number')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('shop');
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
        Schema::dropIfExists('shop_payments');
    }
}
