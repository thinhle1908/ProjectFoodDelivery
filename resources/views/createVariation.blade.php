@extends('layout.salerLayout')
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
            <label for="name">Variation Name</label>
            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name">
        </div>

        <select class="form-select" aria-label="Default select example" name="category_id">
        <option selected>Select a category</option>
            @foreach($categories as $category)
            
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <button type="submit" class="float-right btn btn-primary">Create Variation</button>
    </form>
</div>
@stop