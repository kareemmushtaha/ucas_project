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
            <button class="btn btn-primary" type="submit">
            </button>
            <div class="card-header">
                <h3 class="card-title">All Meal Restaurant</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width:100%;">

                        <div class="col-md-12">
                            <form action="#" method="post">
                                @csrf
                                <input type="text" name="q" id="q" class="orm-control" placeholder="Search">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search
                                </button>
                                <a href="/MealRestaurant" class="btn btn-danger"> Cancel</a>
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
                        <th> ID</th>
                        <th> Name</th>
                        <th> category Name</th>
                        <th> Restaurant Name</th>
                        <th> User Pay</th>
                        <th> User Count</th>
                        <th> Price</th>
                        <th> Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($meal as $rest)
                        <tr>
                            <td>{{ $rest->id }}</td>
                            <td>{{ $rest->name }}</td>
                            <td>{{ $rest->getMeal->category_name }}</td>
                            <td>{{ $rest->RestaurantMeal->name }}</td>

                            <td>
                                @foreach($rest->user as $one_user)
                                    {{$one_user->name .' |& '}}
                                @endforeach
                            </td>
                            <td> {{$rest->user->count()}}</td>
                            <td>{{ $rest->price }}</td>
                            <td> {{$rest->user->count() * $rest->price}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
             {{$meal->links() }}
            </div>
        </div>
    </div>
    <div>
    </div>





@endsection
