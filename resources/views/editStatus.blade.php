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
            <label for="name">Status Name</label>
            <input type="text" class="form-control" id="name" placeholder="Status Name" name="status" value="{{$status->name}}">
        </div>
        <button type="submit" class="float-right btn btn-primary">Edit Status</button>
    </form>
</div>
@stop