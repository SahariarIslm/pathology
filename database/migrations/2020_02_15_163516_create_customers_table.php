<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('p_id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('reference_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('district')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
