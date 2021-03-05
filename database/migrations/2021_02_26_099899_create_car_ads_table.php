<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarAdsTable extends Migration
{
    /**
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('color');
            $table->longText('description');
            $table->integer('views');
            $table->integer('engine_volumne');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')
            ->onDelete('cascade');
            $table->unsignedBigInteger('body_id');
            $table->foreign('body_id')->references('id')->on('bodies')
            ->onDelete('cascade');
            $table->unsignedBigInteger('transmission_id');
            $table->foreign('transmission_id')->references('id')->on('transmissions')
            ->onDelete('cascade');
            $table->unsignedBigInteger('wheel_id');
            $table->foreign('wheel_id')->references('id')->on('wheels')
            ->onDelete('cascade');
            $table->unsignedBigInteger('drive_id');
            $table->foreign('drive_id')->references('id')->on('drives')
            ->onDelete('cascade');
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
        Schema::dropIfExists('car_ads');
    }
}
