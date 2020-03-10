@extends('layout.cp.control1')
@section('TRY')

<div class="col-md-6">
    <form action="/searchuser" method="post">
        @csrf
        <input type="text" name="q" id="q" class="form-control">
        <button type="submit" class="btn btn-primary"> search </button>
     <a href="/worker"class="btn btn-primary"> cansel</a>
    </form>
</div>
<div class="col-12">
    @if(session('status'))
    <div class="alert alert-info">
        {{session('status')}}
    </div>
    @endif

    <div class="card">
        <button class="btn btn-primary" type="submit"> <a href="/worker/create" style="color:wheat;">Create Element
            </a></button>
        <div class="card-header">
            <h3 class="card-title">Title Table</h3>

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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Worker_Nmae</th>
                        <th>Gender</th>
                        <th>Adress</th>
                        <th>Phone</th>
                        <th>Helthey</th>
                        <th>Notic</th>
                        <th>On_day_work</th>
                        <th>birthday</th>
                        <th>project name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->Worker_Nmae }} </td>
                        <td>{{ $row->Gender }}</td>
                        <td>{{ $row->Adress }}</td>
                        <td>{{ $row->Phone }}</td>
                        <td>{{ $row->Helthey }}</td>
                        <td>{{ $row->Notic }}</td>
                        <td>{{ $row->On_day_work }}</td>
                        <td>{{ $row->birthday }}</td>
                        <td>{{ App\project::find($row->project_id)->ProjectName}}</td>


                        <td><button class="btn btn-primary" type="submit"> <a href="worker/{{ $row->id }}/edit/" style="color:wheat;"> Update</a></button></td>
                        <td>
                            <form action="{{action('WorkerController@destroy', $row->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm(' ؟  هل أنت متأكد من حذف{{ $row->Worker_Nmae }}')" type="submit">حذف</button>
                            </form>
                        </td>


                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection