<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();
            $table->boolean('crop')->default(false);
            $table->string('crop_position')->default('center');
            $table->boolean('enabled')->default(true);
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
        Schema::dropIfExists('media_sizes');
    }
}
