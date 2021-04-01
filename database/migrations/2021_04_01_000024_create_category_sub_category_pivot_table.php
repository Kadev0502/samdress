<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySubCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('category_sub_category', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id', 'sub_category_id_fk_3486508')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_id_fk_3486508')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
