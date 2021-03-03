<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencySupplierPivotTable extends Migration
{
    public function up()
    {
        Schema::create('currency_supplier', function (Blueprint $table) {
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id', 'currency_id_fk_3328192')->references('id')->on('currencies')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id', 'supplier_id_fk_3328192')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }
}
