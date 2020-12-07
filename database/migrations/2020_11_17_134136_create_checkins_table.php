<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice',100)->nullable();
            $table->dateTime('datetime')->nullable();
            $table->string('vehicle_number',100)->nullable();
            $table->unsignedBigInteger('vehicle_category_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('parking_group_id')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->decimal('monthly_price', 20, 2)->nullable();
            $table->decimal('penalty', 20, 2)->nullable();
            $table->string('phone',100)->nullable();
            $table->tinyInteger('checkin')->default(1);
            $table->tinyInteger('checkout')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->integer('shop')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('parking_group_id')->references('id')->on('parking_groups');
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
        Schema::dropIfExists('checkins');
    }
}
