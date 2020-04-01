@extends('layout.cp.control1')
@section('TRY')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Update Restaurant </h3>
            </div>

            <form method="post" action="{{ Route('AllRestaurant.update',$Restaurant->id)}}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group">
                        <label for="name"> Restaurant Name</label>
                        <input type="text" class="form-control" value="{{$Restaurant->name}}" name="name"
                               placeholder="Enter Restaurant  Name">
                        <span style="color: red;">{{$errors->first('name')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="email">Email Restaurant</label>
                        <input type="email" class="form-control" value="{{$Restaurant->email}}" name="email"
                               placeholder="Enter Restaurant  Email">
                        <span style="color: red;">{{$errors->first('email')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="password">password Restaurant</label>
                        <input type="password" class="form-control" value="{{$Restaurant->password}}" name="password"
                               placeholder="Enter Restaurant  Email">
                        <span style="color: red;">{{$errors->first('password')}} </span>
                    </div>


                    <div class="form-group">
                        <label for="Description">Description Restaurant</label>
                        <input type="Description" class="form-control" value="{{$Restaurant->Description}}"
                               name="Description"
                               placeholder="Enter Restaurant  Description">
                        <span style="color: red;">{{$errors->first('Description')}} </span>
                    </div>

                    <label for="name"> Type Of </label>
                    <div class="form-group">
                        <select class="browser-default custom-select" value="{{$Restaurant->TypeOf_id}}"
                                name="TypeOf_id">

                            @foreach($TypeOf as $row)
                                <option value="{{$row->id}}" selected>{{$row->Type_Name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <span style="color: red;">{{$errors->first('TypeOf_id')}} </span>

                            <div>
                                @if($row->img!="NULL")
                                    <td><img src="{{  asset('/imgresturent/'.$Restaurant->img)  }}" width="100px"
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
