@extends('layout.cp.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Title Table </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('servesAllRestaurant.store') }}">
                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Restaurant Nmae</label>
                        <input type="text" class="form-control" id="serves_name" name="serves_name"
                               placeholder="Enter Resturent Name">
                        <span style="color: red;">{{$errors->first('serves_name')}} </span>
                    </div>

                    <label> chose Restaurant</label>
                    <select class="browser-default custom-select" name="Resturnt_id">
                        @foreach($data as $row)
                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                        @endforeach
                        <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>
                    </select>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>










@endsection
