@extends('layout.homeLayout')
@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($cartItem as $caritem)
                    <tr data-id={{$caritem->item[0]->id}}>
                        <td class="align-middle"><img src="img/items/{{$caritem->item[0]->image}}" alt="" style="width: 50px;"> {{$caritem->item[0]->sku}}</td>
                        <td class="align-middle">${{$caritem->item[0]->price}}</td>
                        <td class="align-middle">
                            <div class="input-group mx-auto quantity" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus btn-update-cart">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center input-update-cart input-quantity" value="{{$caritem->qty}}" min=1 max=50>
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus btn-update-cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">${{number_format($caritem->item[0]->price * $caritem->qty)}}</< /td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger btn-delete"><i class="fa fa-times"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$160</h5>
                    </div>
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@stop
@section('script')
<script>
    $(".btn-delete").on('click', function(e) {
        e.preventDefault();

        var ele = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/delete-cart',
            method: "delete",
            data: {
                id: ele.parents("tr").attr("data-id")
            },
            success: function(response) {
                window.location.reload();
            }
        });

    });
    $(".btn-update-cart").on('click', function(e) {
        e.preventDefault();

        var ele = $(this);

        updateCart(ele);
    });
    $(".input-update-cart").on('change', function(e) {
        e.preventDefault();

        var ele = $(this);

        updateCart(ele);

    });

    function updateCart(ele) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/update-cart',
            method: "patch",
            data: {
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".input-quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });

        // window.location.reload();
    }
</script>
@stop