@extends('layout.cp_restaurant.control1')
@section('TRY')


    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Photos In Restaurant </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('Ads.update',$ads->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="details"> Details Ads </label>

                        <textarea type="text" class="form-control" name="details"
                                  placeholder="Enter Details Img ">{{$ads->details}}</textarea>
                        <span style="color: red;">{{$errors->first('details')}} </span>
                    </div>

                    <div class="form-group">
                        <input type="date" class="fa fa-calendar-alt form-control " value="{{$ads->finish_add}}"
                               name="finish_add"
                               placeholder=" Enter Finish Ad ">
                        <span style="color: red;">{{$errors->first('finish_add')}} </span>
                    </div>

                    <input type="hidden" value="{{auth('blogger')->user()->id}}" name="Resturnt_id">
                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>

                    <label for="img">Choose Photo</label>
                    <div class="form-group">
                        <div class="file-field">
                            <div>
                                @if($ads->img!="NULL")
                                    <td><img src="{{  asset('/imgresturent/'.$ads->img)  }}" width="100px"
                                             height="100px">
                                    </td>
                                @else
                                    <td><img src="{{ asset('/images/getImg.png') }}" width="100px" height="100px"></td>
                                @endif
                            </div>
                            <div class="btn btn-primary btn-sm float-left">
                                <input type="file" name="img" id="img" style="margin-left:10%;">
                            </div>
                        </div>
                        <span style="color: red;">{{$errors->first('img')}} </span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"> Update</i></button>
                </div>
            </form>
        </div>
    </div>










@endsection
