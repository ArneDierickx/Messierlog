<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("username");
            $table->string("messier_object");
            $table->string("telescope_type");
            $table->string("aperture");
            $table->string("focal_length");
            $table->string("camera");
            $table->integer("no_of_images");
            $table->string("exposure_time");
            $table->string("location");
            $table->date("date");
            $table->string("image");
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
        Schema::dropIfExists('logs');
    }
}
