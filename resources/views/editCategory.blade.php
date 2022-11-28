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
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="{{$category->name}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" rows="3" placeholder="text..." name="description">{{$category->description}}</textarea>
        </div>
        <button type="submit" class="float-right btn btn-primary">Create Category</button>
    </form>
</div>
@stop