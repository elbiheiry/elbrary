<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('name');
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('phone');
            $table->string('address');
            $table->unsignedInteger('day_id');
            $table->foreign('day_id')->references('id')->on('product_active_days')->onDelete('cascade');
            $table->unsignedInteger('interval_id');
            $table->foreign('interval_id')->references('id')->on('active_day_intervals')->onDelete('cascade');
            $table->text('notes');
            $table->string('payment_method');
            $table->string('confirmation');
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
        Schema::dropIfExists('checkouts');
    }
}
