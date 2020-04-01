@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Title Table </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('category.store') }}">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Category Nmae</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                               placeholder="Enter category  Name">
                        <span style="color: red;">{{$errors->first('category_name')}} </span>
                    </div>
                    <label for="name"> Resturen follow</label>


                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">


                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>










@endsection
