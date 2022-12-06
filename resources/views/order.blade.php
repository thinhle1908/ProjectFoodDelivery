@extends('layout.homeLayout')
@section('content')
<div class="container-fluld mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="rounded">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="toggle-btn">
                                        <div class="inner-circle"></div>
                                    </div>
                                </th>
                                <th>Order ID</th>
                                <th>Total</th>
                                <th>Quantity</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach($orders as $order)
                            <tr class="cell-1">
                                <td class="text-center">
                                    <div class="toggle-btn">
                                        <div class="inner-circle"></div>
                                    </div>
                                </td>
                                <td>{{$order->id}}</td>
                                <td>${{$order->total}}</td>
                                <td><span class="badge badge-success">{{$order->quantity}}</span></td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td><i class="fa fa-ellipsis-h text-black-50"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop