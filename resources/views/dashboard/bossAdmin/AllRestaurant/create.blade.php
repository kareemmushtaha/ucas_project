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
            <form method="post" action="{{ Route('AllRestaurant.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Restaurant Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Enter Restaurant  Name">
                        <span style="color: red;">{{$errors->first('name')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="email">Email Restaurant</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="Enter Restaurant  Email">
                        <span style="color: red;">{{$errors->first('email')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="password">password Restaurant</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Enter Restaurant  Email">
                        <span style="color: red;">{{$errors->first('password')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="Description">Description Restaurant</label>
                        <input type="Description" class="form-control" id="Description" name="Description"
                               placeholder="Enter Restaurant  Description">
                        <span style="color: red;">{{$errors->first('Description')}} </span>
                    </div>

                    <label for="name"> Type Of </label>
                    <div class="form-group">
                        <select class="browser-default custom-select" name="TypeOf_id">

                            @foreach($data as $row)
                                <option value="{{$row->id}}" selected>{{$row->Type_Name}}</option>
                            @endforeach
                        </select>
                        <span style="color: red;">{{$errors->first('TypeOf_id')}} </span>

                        <label for="img"> choose Photo</label>
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Create</button>
                </div>

            </form>
        </div>
    </div>

@endsection
