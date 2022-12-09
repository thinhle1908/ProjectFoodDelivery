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
            <label for="name">Discount Name</label>
            <input type="text" class="form-control" id="name" placeholder="Discount Name" name="name" value="{{$discount->name}}">
        </div>

        <div class="form-group">
            <label for="name">Discount Percent</label>
            <input type="text" class="form-control" id="name" placeholder="Discount Percent" name="discount_percent" value="{{$discount->discount_percent}}">
        </div>
        <div class="form-group">
        <label for="name">Active</label><br>
            <select class="form-select" aria-label="Default select example" name="active">
                @if($discount->active==1)
                <option selected value="1">Yes</option>
                <option value="0">No</option>
                @else
                <option value="1">Yes</option>
                <option selected value="0">No</option>
                @endif
            </select>
        </div>

        <button type="submit" class="float-right btn btn-primary">Create Discount</button>
    </form>
</div>
@stop