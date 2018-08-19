<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFieldGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_field_group', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('field_group_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');         
            $table->foreign('field_group_id')->references('id')->on('field_groups')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->primary(['category_id', 'field_group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_field_group');
    }
}
