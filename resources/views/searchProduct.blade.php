@extends('layout.homeLayout')
@section('content')
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">SEARCH PRODUCT</span></h2>
    <div class="row px-xl-5">
        @foreach($products as $product)

        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <a href="">
                        <img class="img-fluid w-100" src="{{asset('img/products')}}/{{$product->image}}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark" href="/product-details/{{$product->id}}">View Details</a>
                        </div>
                    </a>
                </div>
                <div class="text-center py-4">
                    <a class="h4 text-decoration-none text-truncate">{{$product->name}}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h6 class="text-muted">{{$product->description}}</h6>
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
        </a>
        @endforeach
    </div>
</div>
<!-- Products End -->
@stop