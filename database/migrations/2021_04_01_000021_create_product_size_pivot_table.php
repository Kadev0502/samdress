<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizePivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_3486811')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id', 'size_id_fk_3486811')->references('id')->on('sizes')->onDelete('cascade');
        });
    }
}
