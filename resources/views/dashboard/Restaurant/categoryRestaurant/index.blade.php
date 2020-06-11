@extends('layout.cp_restaurant.control1')
@section('TRY')

    <div class="col-12">
        <h6>WELCOME :<i style="color: #ff5134"> {{auth('blogger')->user()->name}} </i>EMAIL :<i style="color: #ff5134"> {{auth('blogger')->user()->email}}</i></h6>
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
            <button class="btn btn-primary" type="submit"><a href="/Restaurant/category/create"
                                                             style="color:wheat;"> <i class="fa fa-plus"> Create
                        Category</i>

                </a></button>
            <div class="card-header">
                <h3 class="card-title">All Category </h3>
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
                        <th>Category Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $rest)
                        <tr>
                            <td>{{ $rest->id }}</td>
                            <td>{{ $rest->category_name }}</td>
                            <td>
                                <button class="btn btn-primary" type="submit"><a
                                        href="/Restaurant/category/{{ $rest->id }}/edit/"
                                        class=" btn-primary"><i class="fa fa-edit"> Update</i></a>
                                </button>
                            </td>
                            <td>
                                <form action="{{action('Restaurant\showCategorysController@destroy', $rest->id)}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger"
                                            onclick="return confirm(' ؟  هل أنت متأكد من عملية الحذف{{ $rest->category_name }}')"
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
@endsection
