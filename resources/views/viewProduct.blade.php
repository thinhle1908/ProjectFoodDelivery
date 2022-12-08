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
            <a href="create-product"><button type="button" class="m-3 btn btn-primary">Create</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th>{{$product->id}}</th>
                            <th>{{$product->name}}</th>
                            <th>@foreach($product->category as $cate)
                                {{$cate->name }}
                                @endforeach</th>
                            <th>{{$product->description}}</th>
                            <th><img height="100px" width="100px" src="{{asset('img/products').'/'.$product->image}}" alt=""></th>
                            <th>{{$product->updated_at}}</th>
                            <th><a href="product/{{$product->id}}/items"><button type="button" class="btn btn-primary">View Item</button></a> <a href="edit-product/{{$product->id}}"><button type="button" class="btn btn-info">Edit</button></a> <a href="delete-product/{{$product->id}}"><button type="button" class="btn btn-danger">Delete</button></a></th>
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