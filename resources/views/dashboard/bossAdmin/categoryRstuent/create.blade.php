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
            <form method="post" action="{{ Route('categoryAllRestaurant.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Category Name </label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                               placeholder="Enter category  Name">
                        <span style="color: red;">{{$errors->first('category_name')}} </span>
                    </div>
                    <label for="name"> Resturen follow</label>
                    <select class="browser-default custom-select" name="8">

                        @foreach($data as $row)
                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                        @endforeach
                    </select>
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
