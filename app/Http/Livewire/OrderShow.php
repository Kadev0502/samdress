<?php

namespace App\Http\Livewire;

use App\Models\order_product;
use Livewire\Component;

class OrderShow extends Component
{
    public $order;
    public $orderProductsRecords;
    public function render()
    {
        $this->orderProductsRecords=order_product::where('order_id',$this->order->id)->get();

        return view('livewire.order-show');
    }
}
