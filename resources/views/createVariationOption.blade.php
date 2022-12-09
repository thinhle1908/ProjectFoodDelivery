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
            <h3>Variation: {{$variation->name}}</h3>
            <label for="name">Value </label>
            <input type="text" class="form-control" id="name" placeholder="Value-variation-option" name="value">
        </div>

        <br>
        <button type="submit" class="float-right btn btn-primary">Add Variation-Option</button>
    </form>
</div>
@stop