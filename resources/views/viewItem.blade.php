@extends('layout.salerLayout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="create-item"><button type="button" class="m-3 btn btn-primary">Create</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sku</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Sale_price</th>
                            <th>Quantity</th>
                            <th>Sold</th>
                            <th>Created_by</th>
                            <th>Updated_by</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Product_id</th>
                            <th>Discount_id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Sku</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Sale_price</th>
                            <th>Quantity</th>
                            <th>Sold</th>
                            <th>Created_by</th>
                            <th>Updated_by</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Product_id</th>
                            <th>Discount_id</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <th>{{$item->id}}</th>
                            <th>{{$item->sku}}</th>
                            <th><img height="100px" width="100px" src="{{asset('img/items').'/'.$item->image}}" alt=""></th>
                            <th>{{$item->price}}</th>
                            <th>{{$item->sale_price}}</th>
                            <th>{{$item->quantity}}</th>
                            <th>{{$item->sold}}</th>
                            <th>{{$item->created_by}}</th>
                            <th>{{$item->updated_by}}</th>
                            <th>{{$item->created_at}}</th>
                            <th>{{$item->updated_at}}</th>
                            <th>{{$item->product_id}}</th>
                            <th>{{$item->discount_id}}</th>
                            <th><a href="product/{{$item->id}}/items"><button type="button" class="btn btn-primary">View Item</button></a> <a href="edit-product/{{$item->id}}"><button type="button" class="btn btn-info">Edit</button></a> <a href="delete-product/{{$item->id}}"><button type="button" class="btn btn-danger">Delete</button></a></th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@stop