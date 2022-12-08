@extends('layout.adminLayout')
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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Discount Percent</th>
                            <th>Active</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>ID</th>
                            <th>Name</th>
                            <th>Discount Percent</th>
                            <th>Active</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($discounts as $discount)
                        <tr>
                            <th>{{$discount->id}}</th>
                            <th>{{$discount->name}}</th>
                            <th>{{$discount->discount_percent}}</th>
                            <th>{{$discount->active}}</th>
                            <th>{{$discount->created_at}}</th>
                            <th>{{$discount->updated_at}}</th>
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