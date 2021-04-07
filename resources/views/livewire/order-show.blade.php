<div>
    <div class="container-fluid">

            @foreach($orderProductsRecords as $oneOrderDetails)
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 align-content-center ">
                <h4>Product Name :{{ $oneOrderDetails->product->name }}</h4>
                <a style="font-size: 15px" href="{{$oneOrderDetails->product->link}}" target="_blank"> {{$oneOrderDetails->product->link}} </a>
                <?php
                $colors=\App\Models\color_order_product::where('order_product_id',$oneOrderDetails->id)->get();
                ?>
                <h4 style="color: #1b4b72">Selected Colors :</h4>
                @foreach($colors as $color)
                    <h4 style="color: blue"> {{ $color->color->name }}</h4>
                @endforeach
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h3>Product Quantity:{{ $oneOrderDetails->quantity }}</h3>

                <?php
                $sizes=\App\Models\order_product_size::where('order_product_id',$oneOrderDetails->id)->get();
                ?>
                <h4 style="color: #1b4b72">Selected Sizes :</h4>
                @foreach($sizes as $size)
                    <h4 style="color: blue"> {{ $size->size->name }}</h4>
                @endforeach

            </div>
            </div>
                <hr>
            @endforeach
    </div>
</div>
