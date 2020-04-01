@extends('layout.cp.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Update </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('categoryAllRestaurant.update',$data->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <label> Restaurant Name</label>
                    <select class="browser-default custom-select" name="Resturnt_id">

                        @foreach($blogger as $row)
                            <option @if($data->Resturnt_id == $row->id) selected @endif
                            value="{{$row->id}}">{{ $row->name }}</option>
                        @endforeach
                    </select>
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
