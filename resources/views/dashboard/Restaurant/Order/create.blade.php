@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-utensils"></i> Create Meal to Restaurant </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('meal.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="category_id"> Name Meal</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Name Ads">
                        <span style="color: red;">{{$errors->first('name')}} </span>
                    </div>

                    <label for="category_id"> Details Meal</label>
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="details" name="details"
                                  placeholder="Details Ads"></textarea>
                        <span style="color: red;">{{$errors->first('details')}} </span>
                    </div>

                    <label for="category_id"> Category Follow</label>
                    <select class="browser-default custom-select" name="category_id">
                        @foreach($category as $row)
                            <option value="{{$row->id}}" selected>{{$row->category_name}}</option>
                        @endforeach
                    </select>
                    <span style="color: red;">{{$errors->first('category_id')}} </span>
                    <label for="price"> Price Meal</label>
                    <div class="form-group">
                        <input type="number" class="fa fa-calendar-alt form-control " id="price" name="price"
                               placeholder=" Enter price  ">
                        <span style="color: red;">{{$errors->first('price')}} </span>
                    </div>
                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>
                    <label for="img">Choose Photo Ads</label>
                    <div class="form-group">
                        <td><img src="{{ asset('/images/getImg.png') }}" width="100px" height="100px">
                        </td>
                    </div>
                    <div class="btn btn-primary btn-sm float-left">
                        <input type="file" name="img" id="img" style="margin-left:10%; ">
                    </div>
                </div>
                <span style="color: red;">{{$errors->first('img')}} </span>

        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"> Create</i></button>
    </div>
    </form>
    </div>
    </div>


@endsection
