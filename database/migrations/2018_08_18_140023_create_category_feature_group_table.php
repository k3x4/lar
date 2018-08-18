<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFeatureGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_feature_group', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('feature_group_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');         
            $table->foreign('feature_group_id')->references('id')->on('feature_groups')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->primary(['category_id', 'feature_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_feature_group');
    }
}
