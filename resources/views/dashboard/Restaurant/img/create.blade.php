@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Add Photos In Restaurant </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('img.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">

                        <textarea type="text" class="form-control" id="details" name="details"
                                  placeholder="Details Img"></textarea>

                        <span style="color: red;">{{$errors->first('details')}} </span>
                    </div>


                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>


                    <label for="img">Choose Photo</label>
                    <div class="form-group">

                        <td><img src="{{ asset('/images/getImg.png') }}" width="100px" height="100px">
                        </td>
                    </div>
                    <div class="btn btn-primary btn-sm float-left">
                        <input type="file" name="img" id="img" style="margin-left:10%;">
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
