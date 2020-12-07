<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('delivery_id')->nullable();
            $table->unsignedBigInteger('parking_group_id')->nullable();
            $table->unsignedBigInteger('vehicle_category_id')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('penalty', 8, 2)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('details')->nullable();
            $table->integer('shop')->nullable();
            $table->timestamps();

            $table->foreign('delivery_id')->references('id')->on('deliveries');
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
        Schema::dropIfExists('parking_prices');
    }
}
