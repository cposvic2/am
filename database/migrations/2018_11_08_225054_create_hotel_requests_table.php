<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('brand_id')->nullable();
            $table->integer('subbrand_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('points')->nullable();
            $table->text('name')->nullable();
            $table->text('address')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->text('link')->nullable();
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('hotel_requests');
    }
}
