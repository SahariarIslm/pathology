<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ticket_no')->nullable();
            $table->string('b_name')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('subject')->nullable();
            $table->tinyInteger('department')->nullable();
            $table->tinyInteger('priority')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->nullable();
            $table->text('attachment')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
