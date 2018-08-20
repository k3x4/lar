<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_listing', function (Blueprint $table) {
            $table->integer('field_id')->unsigned();
            $table->integer('listing_id')->unsigned();
            $table->string('value')->nullable();

            $table->foreign('field_id')->references('id')->on('fields')
                ->onUpdate('cascade')->onDelete('cascade');         
            $table->foreign('listing_id')->references('id')->on('listings')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->primary(['field_id', 'listing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_listing');
    }
}
