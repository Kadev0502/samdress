<div>
    <form method="POST" wire:submit.prevent="saveOrder" enctype="multipart/form-data">
    @csrf
    <!-------------Order Name------------------->
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="required" for="name">{{ trans('cruds.order.fields.name') }}</label>
            <input wire:model="orderName" class="form-control" type="text" name="orderName" id="orderName" value="{{ old('name', '') }}" required>
            @error('orderName') <span class="text-red-600" style="color: red">{{$message}}</span>@enderror
        </div>
        <!-------------------This Section Belongs to Products of This Order-------------->
        <!-------------All Products Name------------------->

        @foreach($orderProducts as $index => $orderProduct)
            <center>
                <a class="btn btn-danger btn-outline-success " href="#" wire:click.prevent="removeProduct({{$index}})">Delete Below Product Section</a>
            </center>
            <div class="border border-black-5">
            <div class="form-group">
                <label class="required" >Select Product</label>
                <select wire:model="orderProducts.{{$index}}.product_id" class="form-control" type="text" name="orderProducts[{{$index}}][product_id]" id="orderName" value="{{ old('name', '') }}" >
                    <option value="">-- choose product --</option>
                    @foreach($allProducts as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} (${{ number_format($product->price, 2) }})
                        </option>
                        @endforeach
                </select>
                @error('product_id') {{ $message }} @enderror
{{--                @error('orderProducts[{{$index}}][product_id]') <span class="text-red-600" style="color: red">{{$message}}</span> @enderror--}}
            </div>
            <!------------------------For Quantity--------------------------->
            <div class="form-group">
                <label class="required" >Select Product Quantity</label>
                <input type="number"
                       name="orderProducts[{{$index}}][quantity]"
                       class="form-control"
                       wire:model="orderProducts.{{$index}}.quantity" />
{{--                @error('allProducts') <span class="text-red-600" style="color: red">{{$message}}</span> @enderror--}}
            </div>
        @if($orderProduct['product_id'] != '')
        <!----------------Colors Details-------------------------->
            <?php
            $product=\App\Models\Product::findorfail($orderProduct['product_id']);
            ?>
            {{--            @foreach( $orderProduct['colors'] as $aColor)--}}
            {{--                {{ $aColor }}--}}
            {{--                @endforeach--}}
            <div class="form-group">
                <label for="colors">Select Color</label><br>
                <select wire:model="orderProducts.{{$index}}.colors" class="form-control" type="text" name="orderProducts[{{$index}}][colors]" id="orderName" value="{{ old('name', '') }}" >
                    <option value="">-- choose Color --</option>
                    @foreach($product->colors as $key => $color)
                        <option value="{{ $color->id }}">
                            {{ $color->name }}
                        </option>
                    @endforeach
                </select>

            </div>
        <!----------------Sizes Details-------------------------->
            <?php
            $product=\App\Models\Product::findorfail($orderProduct['product_id']);
            ?>
{{--                        @foreach( $orderProduct['sizes'] as $aColor)--}}
{{--                            {{ $aColor }}--}}
{{--                            @endforeach--}}
            <div class="form-group">
                <label for="Sizes">Select Size</label><br>
                <select wire:model="orderProducts.{{$index}}.sizes" class="form-control" type="text"
                        name="orderProducts[{{$index}}][sizes]" id="orderName" value="{{ old('name', '') }}" >
                    <option value="">-- choose Sizes --</option>
                    @foreach($product->sizes as $key => $size)
                        <option value="{{ $size->id }}">
                            {{ $size->name }}
                        </option>
                    @endforeach
                </select>


            </div>
        @endif
            </div>
            <hr class="border-4-black">
    @endforeach


        <!-------------------This Section Belongs to Products of This Order Ends Here-------------->
        <!-----------As One Order Ends Here we can ask for another Order Option Here Starts Here---------------->
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-primary"
                        wire:click.prevent="addProduct">+ Add Another Product</button>
            </div>
        </div>
        <!-----------As One Order Ends Here we can ask for another Order Option Here Ends Here---------------->

        <!-------------Submit Button------------------->
        <br>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                Save Order
            </button>
        </div>
    </form>
</div>
