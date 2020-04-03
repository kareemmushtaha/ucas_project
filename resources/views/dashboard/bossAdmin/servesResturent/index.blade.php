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
            <button class="btn btn-primary" type="submit"><a href="servesAllRestaurant/create" style="color:wheat;"><i
                        class="fa fa-plus">Create Serves Restaurant</i>

                </a></button>
            <div class="card-header">
                <h3 class="card-title"> CreateServes Restaurant</h3>
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
                        <th>Name serves</th>
                        <th> follower to restaurant</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->serves_name }} </td>
                            <td> {{$row->getRestaurantByServes->name}}</td>
                            <td>
                                <button class="btn btn-primary" type="submit"><a
                                        href="servesAllRestaurant/{{ $row->id }}/edit/"
                                        class=" btn-primary"><i class="fa fa-edit"> Update</i></a>
                                </button>
                            </td>
                            <td>
                                <form action="{{action('Admin\servesResturentController@destroy', $row->id)}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger"
                                            onclick="return confirm(' ؟  هل أنت متأكد من عملية الحذف{{ $row->serves_name }}')"
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


@endsection
