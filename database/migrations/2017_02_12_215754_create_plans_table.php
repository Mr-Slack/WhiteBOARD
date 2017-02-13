<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('plans');

        Schema::create('plans', function (Blueprint $table) {
          $table->increments('plan_id');
          $table->string('staff_id');
          $table->string('title');
          $table->string('body')->nullable();
          $table->date('plan_date');
          $table->time('plan_start_time');
          $table->time('plan_end_time');
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
        //
    }
}
