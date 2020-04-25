@extends('layout.cp_restaurant.control1')
@section('TRY')

    <!--**************************** ERROR AND SUCCESS MESSAGE ********************************-->
    <div class="row">
        <div class="col-md-12">
        </div>
        @if(session()->has('error'))
            <div class="col-md-12">
                <p class="alert alert-danger"> {{session()->get('error')}}</p>
            </div>
        @elseif(session()->has('success'))
            <div class="col-md-12">
                <p class="alert alert-success"> {{session()->get('success')}}</p>
            </div>
        @endif
    </div>
    <!--**************************** END ERROR AND SUCCESS MESSAGE ********************************-->
    <div class="col-12">
        <div class="card">
            <button class="btn btn-primary" type="submit">
                </button>
            <div class="card-header">
                <h3 class="card-title"> Order Restaurant :: <i style="color: #ff5134">{{auth('blogger')->user()->name}} </i> </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table table-striped table-bordered example">
                    <thead>
                    <tr>
                        <th> ID</th>
                        <th> Meal</th>
                        <th> category Name</th>
                        <th> Details Meal</th>
                        <th> User Pay</th>
                        <th> User Count</th>
                        <th> Price</th>
                        <th> Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($meal as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }} </td>
                            <td>{{ $row->getMeal->category_name }} </td>
                            <td>{{ $row->details }} </td>
                            <td>
                                @foreach($row->user as $one_user)
                                    {{$one_user->name .' |& '}}
                                @endforeach
                            </td>
                            <td> {{$row->user->count()}}</td>
                            <td><i style="color:darkred;font-weight: bold;">{{ $row->price }}</i></td>
                            <td> {{$row->user->count() * $row->price}}</td>
{{--                            <td>--}}
{{--                                <button class="btn btn-primary" type="submit"><a--}}
{{--                                        href="meal/{{ $row->id }}/edit/"--}}
{{--                                        class=" btn-primary"><i class="fa fa-edit"> Update</i></a>--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <form action="{{action('Restaurant\mealController@destroy', $row->id)}}"--}}
{{--                                      method="post">--}}
{{--                                    {{csrf_field()}}--}}
{{--                                    <input name="_method" type="hidden" value="DELETE">--}}
{{--                                    <button class="btn btn-danger"--}}
{{--                                            onclick="return confirm(' ؟  هل أنت متأكد من عملية حذف الصورة التي تتبع للمطعم {{ $row->name }}')"--}}
{{--                                            type="submit"><i class="fa fa-trash"> Delete</i>--}}
{{--                                    </button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
