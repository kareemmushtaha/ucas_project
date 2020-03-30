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
      <form method="post" action="{{ Route('servesAllRestaurant.store') }}">
        @csrf

        <div class="card-body">
          <div class="form-group">
            <label for="name"> Restaurant Nmae</label>
            <input type="text" class="form-control" id="serves_name"  name="serves_name" placeholder="Enter Resturent Name" >
          </div>


            <select class="browser-default custom-select" name="Resturnt_id">
                <option selected> Chose Restaurant </option>

                @foreach($data as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>






        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>










@endsection
