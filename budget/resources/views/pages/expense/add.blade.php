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
                        <h6 class="m-0 font-weight-bold text-primary">Add Expense</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url("expense")}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Nominal</label>
                                <input type="text" name="nominal" class="form-control" id="name" placeholder="Enter nominal">
                            </div>
                            <div class="form-group">
                                <label for="type">Category</label>
                                <select class="form-control" id="category" name="category_id">
                                    @foreach($data_category as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Enter description">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('expense')}}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

