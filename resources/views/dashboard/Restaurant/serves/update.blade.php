@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Update Serves </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('serves.update',$data->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <label> Restaurant {{auth('blogger')->user()->name}} </label>
                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>

                    <div class="form-group">
                        <label for="category_name">serves Name </label>
                        <textarea type="text" class="form-control" id="serves_name"
                                  name="serves_name" placeholder="Enter serves Details">{{ $data->serves_name }}</textarea>


                        <span style="color: red;">{{$errors->first('serves_name')}} </span>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"> Update</i></button>
                </div>
            </form>
        </div>

    </div>


@endsection
