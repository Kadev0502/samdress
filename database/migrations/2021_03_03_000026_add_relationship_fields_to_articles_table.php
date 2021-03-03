<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToArticlesTable extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3325606')->references('id')->on('users');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id', 'color_fk_3328111')->references('id')->on('colors');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_3328112')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_3328113')->references('id')->on('sub_categories');
        });
    }
}
