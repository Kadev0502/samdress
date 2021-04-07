<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\color_order_product;
use App\Models\Order;
use App\Models\order_product;
use App\Models\order_product_size;
use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class OrderCreate extends Component
{
    public $orderName;
    public $orderProducts=[];
    public $allProducts=[];

    public function mount(){
        $this->allProducts=Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1, 'colors' => '' , 'sizes' => '' ]
        ];
    }
    public function updated($orderName)
    {
        $this->validate([
            'orderName' => 'min:4',
        ]);
    }
    // Adding a New Product Here
    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1 ,  'colors' => '' , 'sizes' => '' ];
    }
    // Deleteing Product section
    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function saveOrder()
    {
        $this->validate([
            'orderName' => 'min:4',
        ]);
//        dd($this->orderProducts);
            $this->validate([
                'orderProducts' => 'array',
                'orderProducts.*.product_id' => 'required',
                'orderProducts.*.quantity' => 'required',
                'orderProducts.*.colors' => 'required',
                'orderProducts.*.sizes' => 'required',

            ]);
        $order=Order::create([
            'name' => $this->orderName,
        ]);
        foreach ($this->orderProducts as $index => $oneProduct) {
            $orderProduct=order_product::create([
                'order_id' => $order->id,
                'quantity' => $oneProduct['quantity'],
                'product_id' => $oneProduct['product_id'],
            ]);
            $orderProductSize=order_product_size::create([
                'order_product_id' => $orderProduct->id,
                'size_id' => $oneProduct['sizes'],
            ]);

            $colorOrderProduct = color_order_product::create([
                'order_product_id' => $orderProduct->id,
                'color_id' => $oneProduct['colors'],
            ]);

        }
        return redirect()->route("admin.orders.index");
    }

    public function render()
    {
        return view('livewire.order-create');
    }
}
