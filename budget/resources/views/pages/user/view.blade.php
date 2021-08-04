@extends('layout.main')
@section('home')
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
                        <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" placeholder="Enter name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}" placeholder="Enter email" readonly>
                        </div>
                        <a href="{{url('user')}}" class="btn btn-default">Close</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

