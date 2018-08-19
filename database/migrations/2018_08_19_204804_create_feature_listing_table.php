<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_listing', function (Blueprint $table) {
            $table->integer('feature_id')->unsigned();
            $table->integer('listing_id')->unsigned();

            $table->foreign('feature_id')->references('id')->on('features')
                ->onUpdate('cascade')->onDelete('cascade');         
            $table->foreign('listing_id')->references('id')->on('listings')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->primary(['feature_id', 'listing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_listing');
    }
}
