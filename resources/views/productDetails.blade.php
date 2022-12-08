@extends('layout.homeLayout')
@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">All PRODUCT</span></h2>
    <div class="row px-xl-5">
        @foreach($items as $item)

        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="{{asset('img/items')}}/{{$item->image}}" alt="">
                    <div class="product-action" data-id={{$item->id}}>
                        <a class="btn btn-outline-dark btn-square btn-add-to-cart" href=""><i class="fa fa-shopping-cart "></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href="{{asset('item-details')}}/{{$item->id}}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="">{{$item->product->name}} @foreach($item->item_configuration as $item_config) ({{$item_config->variation->name}}:{{$item_config->value}}) @endforeach</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{$item->price}}</h5>
                        <h6 class="text-muted ml-2"><del>${{$item->sale_price}}</del></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
<!-- Products End -->

@stop

@section('script')
<script>
    $(".btn-add-to-cart").on('click', function(e) {
        e.preventDefault();

        var ele = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/add-to-cart',
            method: "post",
            data: {
                product_id: ele.parents("div").attr("data-id"),
                product_qty: 1,
            },
        success: function(response) {
            window.location.reload();
        }
        });

    });
</script>
@stop