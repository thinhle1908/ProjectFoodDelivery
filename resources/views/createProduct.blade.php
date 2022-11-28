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
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name">
        </div>

        <select class="form-select selectpicker" multiple aria-label="multiple select example" name="categories[]">
            @foreach($categories as $category)
            <option value="{{$category->id}} ">{{$category->name}} </option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="text..." name="description"></textarea>
        </div>
        <button type="submit" class="float-right btn btn-primary">Add Product</button>
    </form>
</div>
</div>
<!-- End of Main Content -->

@stop