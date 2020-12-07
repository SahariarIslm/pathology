<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('customer')->nullable();
            $table->string('delivery')->nullable();
            $table->string('invoice')->nullable();
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
        Schema::dropIfExists('collections');
    }
}
