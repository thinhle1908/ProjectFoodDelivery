@extends('layout.adminLayout')
@section('content')
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
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="{{$product->name}}">
        </div>
        <select class="form-select selectpicker" multiple aria-label="multiple select example" name="categories[]">
            
            @foreach($categories as $category)
            @php 
            $selected = false;
            @endphp
            @foreach($product->category as $productCategory)
            @if($productCategory->id == $category->id)
            <option selected value="{{$category->id}} ">{{$category->name}} </option>
            @php 
            $selected = true;
            @endphp
            @endif
            @endforeach
            @if($selected==false){
                <option value="{{$category->id}} ">{{$category->name}} </option>
            }
            @endif
            @endforeach
        </select>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="text..." name="description">{{$product->description}}</textarea>
        </div>
        <button type="submit" class="float-right btn btn-primary">Edit Product</button>
    </form>
</div>
</div>
@stop