<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_media', function (Blueprint $table) {
            $table->integer('listing_id')->unsigned();
            $table->integer('media_id')->unsigned();

            $table->foreign('listing_id')->references('id')->on('listings')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['listing_id', 'media_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_media');
    }
}
