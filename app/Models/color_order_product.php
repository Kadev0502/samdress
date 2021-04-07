<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color_order_product extends Model
{
    protected $fillable=[
      'order_product_id',
      'color_id'
    ];
    use HasFactory;
    public function color(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
