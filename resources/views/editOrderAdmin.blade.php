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
            <label for="name">Status</label>
            <select class="form-control" aria-label="Default select example" name="status_id">
                @foreach($statuses as $status)
                @if($order->status_id == $status->id)
                <option selected value="{{$status->id}}">{{$status->name}}</option>
                @else
                <option value="{{$status->id}}">{{$status->name}}</option>
                @endif
                @endforeach
            </select>
        </div>


        <button type="submit" class="float-right btn btn-primary">Edit Status</button>
    </form>
</div>
@stop