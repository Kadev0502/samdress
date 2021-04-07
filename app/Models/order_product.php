<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    protected $fillable=[
      'order_id',
      'quantity',
      'product_id'
    ];
    use HasFactory;

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function getProductSize(){
        return $this->hasOne(order_product_size::class,'order_product_id','id')->select('size_id');
    }
    public function getProductColor(){
        return $this->hasOne(color_order_product::class,'order_product_id','id')->select('color_id');
    }
}
