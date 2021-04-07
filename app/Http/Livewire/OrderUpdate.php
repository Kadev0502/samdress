<?php

namespace App\Http\Livewire;

use App\Models\color_order_product;
use App\Models\Order;
use App\Models\order_product;
use App\Models\order_product_size;
use App\Models\Product;
use Livewire\Component;

class OrderUpdate extends Component
{
    public $order;
    public $orderName;
    public $orderProducts=[];
    public $allProducts=[];
    public $orderProductsRecords=[];
    public $editMode,$deleteMode = false;
    //for update
    public $productId,$productName,$quantity,$sizes,$colors;
    public $oldOrderProductRecord,$oldProductId,$selectedSizes=[],$offeredSizes=[],$oldColors=[];

    public function mount(){
        $this->orderName=$this->order->name;
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
    public function resetAllValues(){
        $this->orderProducts= [];
        $this->editMode=false;
        $this->deleteMode=false;
        $this->oldOrderProductRecord='';
        $this->oldProductId='';
        $this->productId='';
        $this->quantity='';
        $this->colors=[];
        $this->sizes=[];

    }
    public function updateOrderName(){
        $this->validate([
            'orderName' => 'min:4',
        ]);
        $this->order->update([
            'name' => $this->orderName,
        ]);

    }
    public function addNewToOrder()
    {

//        dd($this->orderProducts);
        $this->validate([
            'orderProducts' => 'array',
            'orderProducts.*.product_id' => 'required',
            'orderProducts.*.quantity' => 'required',
            'orderProducts.*.colors' => 'required',
            'orderProducts.*.sizes' => 'required',

        ]);
//  dd('yaha tak aa gya hy');
        foreach ($this->orderProducts as $index => $oneProduct) {
            $orderProduct=order_product::create([
                'order_id' => $this->order->id,
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
        $this->resetAllValues();
        return back();
    }

    public function editProduct($order_productId){
        $this->editMode= true;
        $this->oldOrderProductRecord=order_product::findorfail($order_productId);
        $this->oldProductId=$this->oldOrderProductRecord->product_id;
        $this->productId=$this->oldOrderProductRecord->product_id;
        $this->colors=$this->oldOrderProductRecord->getProductColor->color_id;
        $this->sizes=$this->oldOrderProductRecord->getProductSize->size_id;
        $this->quantity=$this->oldOrderProductRecord->quantity;
    }
    public function UpdateProduct($id){
        $this->validate([
            'productId' => 'required',
            'quantity' => 'required',
            "colors"    => "required|min:1",
            "sizes"    => "required|min:1",
        ]);

        $this->oldOrderProductRecord->update([
//            'order_id' => $this->order->id,
            'product_id' => $this->productId,
            'quantity' => $this->quantity,
        ]);
        //removing old data
        $oldSizeData=order_product_size::where('order_product_id' , $this->oldOrderProductRecord->id)->first();
        $oldColorData=color_order_product::where('order_product_id' , $this->oldOrderProductRecord->id)->first();

        //saving new data
//        dd([$this->colors,$this->sizes]);
        $oldSizeData->update([
//                'order_product_id' => $this->oldOrderProductRecord->id,
                'size_id' => $this->sizes,
            ]);

        $oldColorData->update([
//                'order_product_id' => $this->oldOrderProductRecord->id,
                'color_id' => $this->colors,
            ]);
        $this->resetAllValues();
    }
    public function deleteProduct($oneProduct){
        $productData=order_product::findorfail($oneProduct);
        $allcolors=color_order_product::where('order_product_id',$productData->id)->get();
        foreach( $allcolors as $onecolor){
            $onecolor->delete();
        }
        $allsizes=order_product_size::where('order_product_id',$productData->id)->get();
        foreach( $allsizes as $onesize){
            $onesize->delete();
        }
        $productData->delete();
        $this->resetAllValues();
        return redirect()->back();

    }

    public function render()
    {
        $this->orderProductsRecords=order_product::where('order_id',$this->order->id)->get();
        return view('livewire.order-update');
    }
}
