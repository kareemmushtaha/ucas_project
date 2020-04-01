@extends('layout.cp.control1')
@section('TRY')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"> Table User Admin </h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ Route('userAdmin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="name"> Personal Admin Name</label>
            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Personal Name" >
              <span style="color: red;">{{$errors->first('name')}} </span>
          </div>


          <div class="form-group">
            <label for="Gender">Email</label>
            <input type="text" class="form-control" id="email"  name="email"  placeholder="Enter email">
              <span style="color: red;">{{$errors->first('email')}} </span>
          </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="text" class="form-control" id="password"  name="password"  placeholder="Enter password">
                <span style="color: red;">{{$errors->first('password')}} </span>
            </div>

            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <span> chose Photo </span>
                    <input type="file" name="img" id="img" style="margin-left:10%;">
                </div>
                <span style="color: red;">{{$errors->first('img')}} </span>
            </div>

        </div>






        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>










@endsection
