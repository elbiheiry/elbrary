<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveDayIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_day_intervals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' ,'150');
            $table->time('start');
            $table->time('end');
            $table->unsignedInteger('day_id');
            $table->foreign('day_id')->references('id')->on('product_active_days')->onDelete('cascade');
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
        Schema::dropIfExists('active_day_intervals');
    }
}
