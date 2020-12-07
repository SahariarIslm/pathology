<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_checkins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice',100)->nullable();
            $table->date('date')->nullable();
            $table->time('time', 0);
            $table->string('vehicle_number',100)->nullable();
            $table->string('vehicle_category')->nullable();
            $table->string('name')->nullable();
            $table->string('phone',100)->nullable();
            $table->tinyInteger('checkin')->default(1);
            $table->tinyInteger('checkout')->default(0);
            $table->string('payment_status')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->integer('shop')->nullable();
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
        Schema::dropIfExists('monthly_checkins');
    }
}
