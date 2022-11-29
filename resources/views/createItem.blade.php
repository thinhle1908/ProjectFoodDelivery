@extends('layout.salerLayout')
@section('content')
<!-- End of Topbar -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Sku</label>
            <input type="text" class="form-control" id="name" placeholder="Sku " name="sku">
        </div>

        <div class="form-group">
            <label for="name">Price</label>
            <input type="text" class="form-control" id="name" placeholder="Price" name="price">
        </div>

        <div class="form-group">
            <label for="name">Sale_Price</label>
            <input type="text" class="form-control" id="name" placeholder="Sale_Price" name="sale_price">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="name">Quantity</label>
            <input type="text" class="form-control" id="name" placeholder="Quantity" name="quantity">
        </div>

     
        <div class="form-group">
            <label for="name">Sold</label>
            <input type="text" class="form-control" id="name" placeholder="Sold" name="sold">
        </div>

        @foreach($variations as $variation)

        <div class="form-group">
            <label for="name">{{$variation->name}}</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="variation_option[]">
                @foreach($variation->variation_option as $option)

                <option value="{{$option->id}}">{{$option->value}}</option>
                @endforeach
            </select>
        </div>

        @endforeach

        <div class="form-group">
            <label for="name">Discount</label>
            <br>
            <select class="form-select" aria-label="Default select example" name="discount">
                @foreach($discounts as $discount)

                <option value="{{$discount->id}}">{{$discount->name}}({{$discount->discount_percent}})</option>
                @endforeach
            </select>
        </div>




        <button type="submit" class="float-right btn btn-primary">Create Item</button>
    </form>
</div>
</div>
<!-- End of Main Content -->

@stop