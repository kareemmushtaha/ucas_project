@extends('layout.cp.control1')
@section('TRY')

    <div class="col-12">
        <div class="card">
            <button class="btn btn-primary" type="submit"><a href="servesAllRestaurant/create" style="color:wheat;">Create
                    Resturent
                </a></button>
            <div class="card-header">
                <h3 class="card-title">Serves Restaurant</h3>
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
                            <td> {{ App\Blogger::find($row->Resturnt_id)->name}}</td>
                            <td>
                                <button class="btn btn-primary" type="submit"><a href="servesAllRestaurant/{{ $row->id }}/edit/"
                                                                                 class=" btn-primary"> Update</a>
                                </button>
                            </td>
                            <td>
                                <form action="{{action('Admin\servesResturentController@destroy', $row->id)}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger"
                                            onclick="return confirm(' ؟  هل أنت متأكد من عملية الحذف{{ $row->serves_name }}')"
                                            type="submit">Delete
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
