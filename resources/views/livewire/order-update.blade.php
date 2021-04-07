<div>

    <!----------------------------------------Update Order Name ---------------------------------------->
    <center><h1> Change Order Title</h1></center>
{{--    <form method="POST" wire:submit.prevent="updateOrderName" enctype="multipart/form-data">--}}
{{--    @csrf--}}
    <!-------------Order Name------------------->
        <h3>Order Name</h3>
        <h3 wire:model="orderName" >{{ $orderName }}</h3>
    {{--    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">--}}
    {{--        <label class="required" for="name">{{ trans('cruds.order.fields.name') }}</label>--}}
    {{--        <input wire:model="orderName" class="form-control" type="text" name="orderName" id="orderName"  required>--}}
    {{--        @error('orderName') <span class="text-red-600" style="color: red">{{$message}}</span>@enderror--}}
    {{--    </div>--}}
    {{--        <div class="form-group">--}}
    {{--            <button class="btn btn-success" type="submit">--}}
    {{--                Update Order Name--}}
    {{--            </button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
    <!----------------------------------------Update Order Products ---------------------------------------->
        @if($editMode)
            <center><h1>Update Product Information</h1></center>
            <!-------------Starting Form for Edit-------------------------------------------------------------------->
            <div class="border border-black-5">
                <form method="POST" wire:submit.prevent="UpdateProduct({{ $productId }})" enctype="multipart/form-data">
                    <!----------------Product----------------------->
                    <div class="form-group">
                        <label class="required" >Select Product</label>
                        <select wire:model="productId" class="form-control" type="text" name="productId" id="orderName" value="{{ old('name', '') }}" >
                            @foreach($allProducts as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }} (${{ number_format($product->price, 2) }})
                                </option>
                            @endforeach
                        </select>
                        @error('product_id') <p style="color: red">{{ $message }} </p> @enderror
                        {{--                @error('orderProducts[{{$index}}][product_id]') <span class="text-red-600" style="color: red">{{$message}}</span> @enderror--}}
                    </div>
                    <!------------------------For Quantity--------------------------->
                    <div class="form-group">
                        <label class="required" >Select Product Quantity</label>
                        <input type="number"
                               name="quantity"
                               class="form-control"
                               wire:model="quantity" />
                        @error('quantity') <p style="color: red">{{ $message }} </p> @enderror
                        {{--                @error('allProducts') <span class="text-red-600" style="color: red">{{$message}}</span> @enderror--}}
                    </div>

                    @if($productId != $oldProductId)
                        <center><h3>You have Chosen new product so Choose colors/sizes for that Product</h3></center>
                        <!----------------Colors Details-------------------------->
                        <?php
                        $product=\App\Models\Product::findorfail($productId);
                        ?>
                        {{--            @foreach( $orderProduct['colors'] as $aColor)--}}
                        {{--                {{ $aColor }}--}}
                        {{--                @endforeach--}}
                        <div class="form-group">
                            <label for="colors">Select Color</label><br>
                            <select wire:model="colors" class="form-control" type="text" name="colors" id="orderName" value="{{ old('name', '') }}" >
                                <option value="">-- choose Color --</option>
                                @foreach($product->colors as $key => $color)
                                    <option value="{{ $color->id }}">
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
{{--                            <label for="colors">Select Color</label><br>--}}
{{--                            <div class="container">--}}
{{--                                <div class="row">--}}
{{--                                    @foreach($product->colors as $key => $color)--}}
{{--                                        <div class="col-sm-6 col-lg-3 col-md-6">--}}
{{--                                            <input type="checkbox" value="{{ $color->id }}" wire:model="colors"--}}
{{--                                                   name="colors"--}}
{{--                                            >{{ $color->name }}--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                @error('colors') <p style="color: red">{{ $message }} </p> @enderror--}}
{{--                            </div>--}}

                        </div>
                        <!----------------Sizes Details-------------------------->
                        <?php
                        $product=\App\Models\Product::findorfail($productId);
                        ?>
                        {{--                        @foreach( $orderProduct['sizes'] as $aColor)--}}
                        {{--                            {{ $aColor }}--}}
                        {{--                            @endforeach--}}
                        <div class="form-group">
                            <label for="Sizes">Select Size</label><br>
                            <select wire:model="sizes" class="form-control" type="text"
                                    name="sizes" id="orderName" value="{{ old('name', '') }}" >
                                <option value="">-- choose Sizes --</option>
                                @foreach($product->sizes as $key => $size)
                                    <option value="{{ $size->id }}">
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    @else
                        <center><h3>You have Chosen old product so Update colors and Sizes for that Old Product</h3></center>
                        <!----------------Colors Details-------------------------->
                        <?php
                        $product=\App\Models\Product::findorfail($productId);
                        ?>
                        {{--            @foreach( $orderProduct['colors'] as $aColor)--}}
                        {{--                {{ $aColor }}--}}
                        {{--                @endforeach--}}
                        <div class="form-group">
                            <label for="colors">Select Color</label><br>
                            <select wire:model="colors" class="form-control" type="text" name="colors" id="orderName" value="{{ old('name', '') }}" >
                                <option value="">-- choose Color --</option>
                                @foreach($product->colors as $key => $color)
                                    <option value="{{ $color->id }}">
                                        {{ $color->name }}
                                    </option>
                                @endforeach
                            </select>
{{--                            <label for="colors">Select Color</label><br>--}}
{{--                            <div class="container">--}}
{{--                                <div class="row">--}}
{{--                                    @foreach($product->colors as $key => $color)--}}
{{--                                        @if(\App\Models\color_order_product::where([--}}
{{--                ['order_product_id',$oldOrderProductRecord->id],--}}
{{--                ['color_id' , $color->id]--}}
{{--            ])->exists())--}}
{{--                                            <div class="col-sm-6 col-lg-3 col-md-6">--}}
{{--                                                <input type="checkbox" value="{{ $color->id }}" wire:model="colors"--}}
{{--                                                       name="colors"--}}
{{--                                                >{{ $color->name }}<p style="color: red ">Selected</p>--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            <div class="col-sm-6 col-lg-3 col-md-6">--}}
{{--                                                <input type="checkbox" value="{{ $color->id }}" wire:model="colors"--}}
{{--                                                       name="colors"--}}
{{--                                                >{{ $color->name }}<p style="color: red "> Not Selected</p>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}

{{--                                </div>--}}
{{--                                @error('colors') <p style="color: red">{{ $message }} </p> @enderror--}}
{{--                            </div>--}}

                        </div>
                        <!----------------Sizes Details-------------------------->
                    <?php
                    $product=\App\Models\Product::findorfail($productId);
                    ?>
                    <!----------getting sizes offered by product ---------------->
                        <div class="form-group">
                            <label for="Sizes">Select Size</label><br>
                            <select wire:model="sizes" class="form-control" type="text"
                                    name="sizes" id="orderName" value="{{ old('name', '') }}" >
                                <option value="">-- choose Sizes --</option>
                                @foreach($product->sizes as $key => $size)
                                    <option value="{{ $size->id }}">
                                        {{ $size->name }}
                                    </option>
                                @endforeach
                            </select>
{{--                            <label for="Sizes">Select Size</label><br>--}}
{{--                            <div class="container">--}}
{{--                                <div class="row">--}}
{{--                                @foreach($product->sizes as $key => $size)--}}

{{--                                    <!------------Checking if the size exists with this product in database------------->--}}

{{--                                        @if(\App\Models\order_product_size::where([--}}
{{--                                              ['order_product_id',$oldOrderProductRecord->id],--}}
{{--                                              ['size_id' , $size->id]--}}
{{--                                          ])->exists())--}}
{{--                                            <div class="col-sm-6 col-lg-3 col-md-6">--}}
{{--                                                <input type="checkbox" value="{{ $size->id }}"--}}
{{--                                                       wire:model="sizes.{{ $size->id  }}" checked--}}
{{--                                                       name="sizes"--}}
{{--                                                >{{ $size->name }} <p style="color: red ">Selected</p>--}}
{{--                                            </div>--}}
{{--                                            --}}{{--          <?php $check = '' ?>--}}
{{--                                        @else--}}
{{--                                            <div class="col-sm-6 col-lg-3 col-md-6">--}}
{{--                                                <input type="checkbox" value="{{ $size->id }}"--}}
{{--                                                       wire:model="sizes.{{ $size->id  }}"--}}
{{--                                                       name="sizes"--}}
{{--                                                >{{ $size->name }}<p style="color: red ">Not Selected</p>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                @error('sizes') <p style="color: red">{{ $message }} </p> @enderror--}}
{{--                            </div>--}}

                        </div>
                @endif
                <!------------------------------Now Finally Submitting the form---------------------------------------->
                    <br>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            Update This Product Information
                        </button>
                    </div>
                </form>
            </div>
            <!-------------Ending Form for Edit-------------------------------------------------------------------->

            <!-------------Edit Mode------------------------>

    @else
        <!------------------------------------->
            <center><h1>Manage Order Products</h1></center>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="table table-responsive container table-striped">
                            <table class="table table-primary">
                                <thead>
                                <tr>
                                    <th class="font-italic" scope="col">Product Name</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Product Quantity</th>
                                    <th scope="col">Edit Record</th>
                                    <th scope="col">Delete Record</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderProductsRecords as $index => $oneProduct)
                                    <tr>
                                        <td>{{$oneProduct->product->name}}</td>
                                        <td><a href="{{$oneProduct->product->link}}" target="_blank"> {{$oneProduct->product->link}} </a></td>
                                        <td>{{ $oneProduct->quantity }}</td>
                                        <td><button wire:click.prevent="editProduct({{ $oneProduct->id }})"
                                                    data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"
                                                    class="btn btn-primary">Edit</button></td>
                                        <td><button wire:click.prevent="deleteProduct({{ $oneProduct->id }})" class="btn btn-danger">Delete</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
    @endif


    <!----------------------------------------Add New Record To exsisting Record---------------------------------------->
        <center><h1> Add New Record to Exsisting Record</h1></center>
        <form method="POST" wire:submit.prevent="addNewToOrder" enctype="multipart/form-data">
        @csrf
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
                    Add New Products To Order
                </button>
            </div>

        </form>
        <!--------------------------------------Edit Mode------------------------------------------------------------------>

</div>
