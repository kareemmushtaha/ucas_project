@extends('layout.cp.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">All Img In Restaurant </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{ Route('ImgAllRestaurant.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="details"> Details Img</label>
                        <input type="text" class="form-control" id="details" name="details"
                               placeholder="Enter Details Img ">
                        <span style="color: red;">{{$errors->first('details')}} </span>
                    </div>

                    <label> chose Restaurant</label>
                    <select class="browser-default custom-select" name="Resturnt_id">
                        @foreach($data as $row)
                            <option value="{{$row->id}}" selected>{{$row->name}}</option>
                        @endforeach
                        <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>
                    </select>

                    <label for="img">Choose Photo</label>
                    <div class="form-group">
                        <div class="file-field">
                            <div>
                                @if($row->img!="NULL")
                                    <td><img src="{{  asset('/imgresturent/'.$row->img)  }}" width="100px"
                                             height="100px">
                                    </td>
                                @else
                                    <td><img src="{{ asset('/images/defult.jpeg') }}" width="100px" height="100px">
                                    </td>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>










@endsection
