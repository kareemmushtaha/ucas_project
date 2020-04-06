@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Create Serves </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('serves.store') }}">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Serves Details</label>
                        <textarea type="text" class="form-control" id="serves_name" name="serves_name"
                                  placeholder="Enter Serves  Details"></textarea>
                        <span style="color: red;">{{$errors->first('serves_name')}} </span>
                    </div>

                    <label for="name"> Restaurant follow :</label>
                    <i> {{auth('blogger')->user()->name}}</i>

                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">

                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> Create</i></button>
                    </div>
            </form>
        </div>
    </div>










@endsection
