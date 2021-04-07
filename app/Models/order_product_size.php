<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product_size extends Model
{
    protected $fillable=[
        'order_product_id',
        'size_id',
    ];
    use HasFactory;
    public function size(){
        return $this->hasOne(Size::class,'id','size_id');
    }

}
