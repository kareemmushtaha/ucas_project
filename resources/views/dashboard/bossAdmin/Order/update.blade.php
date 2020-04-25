@extends('layout.cp.control1')
@section('TRY')

{{--    <div class="col-md-12">--}}
{{--        <!-- general form elements -->--}}
{{--        <div class="card card-primary">--}}
{{--            <div class="card-header">--}}
{{--                <h3 class="card-title">Update Meal  </h3>--}}
{{--            </div>--}}
{{--            <!-- /.card-header -->--}}
{{--            <!-- form start -->--}}
{{--            <form method="post" action="{{ Route('MealRestaurant.update',$Meal->id)}}"--}}
{{--                  enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}

{{--                <div class="card-body">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="name"> Meal Name </label>--}}
{{--                        <input type="text" class="form-control" value="{{$Meal->name}}" name="name"--}}
{{--                               placeholder="Enter Meal  Name">--}}
{{--                        <span style="color: red;">{{$errors->first('name')}} </span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="details"> Meal Details </label>--}}
{{--                        <input type="text" class="form-control" value="{{$Meal->details}}" name="details"--}}
{{--                               placeholder="Enter Meal details">--}}
{{--                        <span style="color: red;">{{$errors->first('details')}} </span>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="price"> Meal price </label>--}}
{{--                        <input type="text" class="form-control" value="{{$Meal->price}}"  name="price"--}}
{{--                               placeholder="Enter Meal Price">--}}
{{--                        <span style="color: red;">{{$errors->first('price')}} </span>--}}
{{--                    </div>--}}

{{--                    <label for="category_name"> Category Follow</label>--}}
{{--                    <select class="browser-default custom-select" value="{{$Meal->category_name}}" name="category_id">--}}
{{--                        @foreach($category as $row)--}}
{{--                            <option value="{{$row->id}}" selected>{{$row->category_name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <span style="color: red;">{{$errors->first('category_id')}} </span>--}}


{{--                    <label for="Resturnt_id"> Restaurant Follow</label>--}}
{{--                    <select class="browser-default custom-select" value="{{$Meal->Resturnt_id}}" name="Resturnt_id">--}}
{{--                        @foreach($data as $row)--}}
{{--                            <option value="{{$row->id}}" selected>{{$row->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>--}}


{{--                    <label for="img"> choose Photo Meal</label>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="file-field">--}}
{{--                            <div>--}}
{{--                                @if($Meal->img!="NULL")--}}
{{--                                    <td><img src="{{  asset('/imgresturent/'.$Meal->img)  }}" width="100px"--}}
{{--                                             height="100px">--}}
{{--                                    </td>--}}
{{--                                @else--}}
{{--                                    <td><img src="{{ asset('/images/defult.jpeg') }}" width="100px" height="100px">--}}
{{--                                    </td>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="btn btn-primary btn-sm float-left">--}}
{{--                                <input type="file" name="img" id="img" style="margin-left:10%;">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <span style="color: red;">{{$errors->first('img')}} </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-footer">--}}
{{--                    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
