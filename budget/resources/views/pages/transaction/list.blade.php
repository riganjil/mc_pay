@extends('layout.main')
@section('active_transaction')
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
                        <h6 class="m-0 font-weight-bold text-primary float-left">Transaction</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Nominal</th>
                                    <th>Old Balance</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Nominal</th>
                                    <th>Old Balance</th>
                                    <th>Description</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->type}}</td>
                                        <td>Rp. {{number_format($value->nominal)}}</td>
                                        <td>Rp. {{number_format($value->old_balance)}}</td>
                                        <td>{{$value->description}}</td>
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

