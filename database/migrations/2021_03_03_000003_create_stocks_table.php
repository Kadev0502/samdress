<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->nullable();
            $table->decimal('total_price', 15, 2)->nullable();
            $table->string('preorder_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
