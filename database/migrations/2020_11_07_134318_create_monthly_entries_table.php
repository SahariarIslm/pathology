<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice',100)->nullable();
            $table->date('date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('time',0);
            $table->string('vehicle_number',100)->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('vehicle_category_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('vehicle_category')->nullable();
            $table->decimal('price',8,2)->nullable();
            $table->string('mobile')->nullable();
            $table->tinyInteger('payment_status')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->integer('shop')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('monthly_entries');
    }
}
