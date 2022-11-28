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
            <label for="name">Variation_Option Value</label>
            <input type="text" class="form-control" id="name" placeholder="Value" name="value" value="{{ $variation_option->value }}">
        </div>
        <br>
        <button type="submit" class="float-right btn btn-primary">Edit Variation</button>
    </form>
</div>
@stop