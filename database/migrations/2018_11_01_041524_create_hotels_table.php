<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('address');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->text('link');
            $table->integer('brand_id');
            $table->integer('subbrand_id');
            $table->integer('category_id');
            $table->boolean('display')->default(true);
            $table->integer('old_id')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}
