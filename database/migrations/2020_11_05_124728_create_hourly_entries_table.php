<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourlyEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hourly_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice',100)->nullable();
            $table->date('date')->nullable();
            $table->time('time', 0);
            $table->string('vehicle_number',100)->nullable();
            $table->unsignedBigInteger('vehicle_category_id')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('penalty', 8, 2)->nullable();
            $table->string('phone',100)->nullable();
            $table->tinyInteger('checkin')->default(1);
            $table->tinyInteger('checkout')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('shop')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_category_id')->references('id')->on('vehicle_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hourly_entries');
    }
}
