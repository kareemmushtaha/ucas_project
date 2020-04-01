@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Update </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('category.update',$data->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <label> Restaurant {{auth('blogger')->user()->name}} </label>
                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>
                    <div class="form-group">
                        <label for="category_name">Category Name </label>
                        <input type="text" value="{{ $data->category_name }}" class="form-control" id="category_name"
                               name="category_name" placeholder="Enter category_name">
                        <span style="color: red;">{{$errors->first('category_name')}} </span>
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </form>
        </div>

    </div>


@endsection
