@extends('layout.cp.control1')
@section('TRY')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Title Table </h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ Route('userAdmin.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="name"> Resturent Nmae</label>
            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Resturent Name" >
          </div>


          <div class="form-group">
            <label for="Gender"> Email</label>
            <input type="text" class="form-control" id="email"  name="email"  placeholder="Enter email">
          </div>
        </div>

        <div class="form-group">
          <label for="password">password</label>
          <input type="text" class="form-control" id="password"  name="password"  placeholder="Enter password">
        </div>


          <div class="file-field">
              <div class="btn btn-primary btn-sm float-left">
                  <span> chose logo</span>
                  <input type="file" name="img" id="img" style="margin-left:10%;">
              </div>
          </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>










@endsection
