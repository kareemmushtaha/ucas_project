@extends('layout.cp.control1')
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
            <button class="btn btn-primary" type="submit"><a href="/AllRestaurant/create" style="color:wheat;"><i
                        class="fa fa-plus"> Create Resturent</i>

                </a></button>
            <div class="card-header">
                <h3 class="card-title"><b>ADMIN USER</b></h3>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>TypeOF</th>
                        <th>Logo</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }} </td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->password }}</td>
                            <td>{{ $row->TypeRestaurant->Type_Name }}</td>
                            @if($row->img!="NULL")
                                <td><img src="{{ asset('/imgresturent/'.$row->img) }}" width="100px" height="100px">
                                </td>
                            @else
                                <td><img src="{{ asset('/images/defult.jpeg') }}" width="100px" height="100px"></td>
                            @endif
                            <td>

                                <button class="btn btn-primary" type="submit"><a
                                        href="/AllRestaurant/{{ $row->id }}/edit/"
                                        class=" btn-primary"> <span class="fa fa-edit">Update</span></a>
                                </button>
                            </td>
                            <td>
                                <form action="{{action('Admin\AllRestaurantController@destroy', $row->id)}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger"
                                            onclick="return confirm(' ؟  هل أنت متأكد من عملية الحذف{{ $row->name }}')"
                                            type="submit"><span class="fa fa-trash"> Delete</span>
                                    </button>
                                </form>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>


@endsection
