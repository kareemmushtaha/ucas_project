@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-12">
        <h6>WELCOME :<i style="color: #ff5134"> {{auth('blogger')->user()->name}} </i>EMAIL :<i
                style="color: #ff5134"> {{auth('blogger')->user()->email}}</i></h6>
    </div>

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
            <button class="btn btn-primary" type="submit"><a href="/Restaurant/aboutUs/create"
                                                             style="color:wheat;"> <i class="fa fa-plus"> Create and
                        Update Information
                    </i>
                </a></button>
            <div class="card-header">
                <h3 class="card-title">Information Restaurant </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width:100%;">

                        <div class="col-md-12">
                            <form action="/Restaurant/searchuser" method="post">
                                @csrf
                                <input type="text" name="q" id="q" class="orm-control" placeholder="Search">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search
                                </button>
                                <a href="/Restaurant/category" class="btn btn-danger"> Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table table-striped table-bordered example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>AboutUs Restaurant</th>
                        <th>phone 1</th>
                        <th>phone2</th>
                        <th>Telephone</th>
                        <th>address</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aboutUs as $kare)
                        <tr>
                            <td>{{ $kare->id }}</td>
                            <td>{{ $kare->aboutUs }}</td>
                            <td>{{ $kare->phone1 }}</td>
                            <td>{{ $kare->phone2 }}</td>
                            <td>{{ $kare->telephon }}</td>
                            <td>{{ $kare->adress }}</td>

                            <td>
                                <form action="{{action('Restaurant\aboutUsController@destroy', $kare->id)}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger"
                                            onclick="return confirm(' ؟  هل أنت متأكد من عملية المعلومات العامة عن المطعم {{ auth('blogger')->user()->name }}')"
                                            type="submit"><i class="fa fa-trash"> Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <div class="card-header">
                    <h3 class="card-title">update type Restaurant </h3>
                </div>
                <form method="post" action="{{ Route('type.update', auth('blogger')->user()->id)}}">
                    @csrf
                    @method('PUT')
                    <select class="browser-default custom-select" name="typeof">
                        @foreach($typeOf as $row)
                            <option value="{{$row->id}}" selected>{{$row->Type_Name}}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-success mt-4" type="submit"><i class="fa fa-edit">
                            Update Type of </i>
                    </button>
                </form>
            </div>
        </div>
    </div>



    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <div class="card-header">
                    <h3 class="card-title">update Logo Restaurant </h3>
                </div>
                <form method="post" action="{{ Route('logo.update', auth('blogger')->user()->id)}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="img">Choose Photo Ads</label>
                    <div class="form-group">
                        <div>
                            @foreach($restaurant as $logo)
                                @if($logo->img !="null")
                                    <img src="{{  asset('/imgresturent/'.$logo->img)}}" width="100px"
                                         height="100px">
                                @else
                                    <img src="{{ asset('/images/defult.jpeg') }}" width="100px" height="100px">
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <div class="btn btn-primary btn-sm float-left">
                        <input type="file" name="img" id="img" style="margin-left:10%; ">
                    </div>

                    <span style="color: red;">{{$errors->first('img')}} </span>
                    <button class="btn btn-success" style="margin-left: 1%;" type="submit"><i class="fa fa-edit">
                            Save Update Logo </i>
                    </button>
                </form>
            </div>

        </div>
    </div>









@endsection
