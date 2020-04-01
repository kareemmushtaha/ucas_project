@extends('layout.cp.control1')
@section('TRY')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Update Restaurant </h3>
            </div>

            <form method="post" action="{{ Route('userAdmin.update',$Admin->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Restaurant Name</label>
                        <input type="text" class="form-control" value="{{$Admin->name}}" name="name"
                               placeholder="Enter Restaurant  Name">
                        <span style="color: red;">{{$errors->first('name')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="email">Email Restaurant</label>
                        <input type="email" class="form-control" value="{{$Admin->email}}" name="email"
                               placeholder="Enter Restaurant  Email">
                        <span style="color: red;">{{$errors->first('email')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="password">password Restaurant</label>
                        <input type="password" class="form-control" value="{{$Admin->password}}" name="password"
                               placeholder="Enter Restaurant  Email">
                        <span style="color: red;">{{$errors->first('password')}} </span>
                    </div>






                        <div class="form-group">
                            <span style="color: red;">{{$errors->first('TypeOf_id')}} </span>

                            <div>
                                @if($Admin->img!="NULL")
                                    <td><img src="{{  asset('/imgresturent/'.$Admin->img)  }}" width="100px"
                                             height="100px">
                                    </td>
                                @else
                                    <td><img src="{{ asset('/images/defult.jpeg') }}" width="100px" height="100px"></td>
                                @endif
                            </div>

                            <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span> choose Photo </span>
                                    <div>
                                        <input type="file" name="img" style="margin-left:10%;">
                                    </div>
                                </div>
                            </div>
                            <span style="color: red;">{{$errors->first('img')}} </span>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </form>
        </div>
    </div>






@endsection
