@extends('layout.main')
@section('active_user')
    active
@endsection
@section('body')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left">User</h6>
                        <a href="{{url('user/add')}}" class="btn btn-primary float-right btn-sm">Add New Data</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Balance</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>Rp. {{number_format($value->balance)}}</td>
                                    <td>
                                        <a href="{{url("user", $value->id)}}" class="btn btn-sm btn-warning">edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

