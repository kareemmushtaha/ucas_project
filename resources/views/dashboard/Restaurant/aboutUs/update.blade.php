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
            <form method="post" action="{{ Route('aboutUs.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <label> Restaurant : {{auth('blogger')->user()->email}} </label>
                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>

                    <div class="form-group">
                        <label for="aboutUs"> About Us Details </label>
                        <textarea type="text" class="form-control" id="aboutUs"
                                  name="aboutUs" placeholder="Enter serves Details">{{ $data->aboutUs }}</textarea>
                        <span style="color: red;">{{$errors->first('aboutUs')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="aboutUs"> Adress Restaurant </label>
                        <input type="text" class="form-control" value="{{ $data->adress }}"
                               name="adress" placeholder="Enter serves Details">
                        <span style="color: red;">{{$errors->first('adress')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="aboutUs"> phone 1 Restaurant </label>
                        <input type="number" class="form-control" value="{{ $data->phone1 }}"
                               name="phone1" placeholder="Enter First phone  Restaurant ">
                        <span style="color: red;">{{$errors->first('phone1')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="aboutUs"> phone 2 Restaurant </label>
                        <input type="number" class="form-control" value="{{ $data->phone2 }}"
                               name="phone2" placeholder="Enter second phone Restaurant ">
                        <span style="color: red;">{{$errors->first('phone2')}} </span>
                    </div>

                    <div class="form-group">
                        <label for="telephon"> telephon Restaurant </label>
                        <input type="number" class="form-control" value="{{ $data->telephon }}"
                               name="telephon" placeholder="Enter second Telephone Restaurant ">
                        <span style="color: red;">{{$errors->first('telephon')}} </span>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"> Update</i></button>
                </div>
            </form>
        </div>

    </div>



@endsection
