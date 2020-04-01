@extends('layout.cp.control1')
@section('TRY')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Serves Name </h3>
            </div>

            <form method="post" action="{{ Route('servesAllRestaurant.update',$data->id)}}">
                @csrf
                @method('PUT')
                <div class="card-body">


                    <select class="browser-default custom-select" name="Resturnt_id">
                        @foreach($blogger as $row)
                            <option @if($data->Resturnt_id == $row->id) selected @endif
                            value="{{$row->id}}">{{ $row->name }}</option>
                        @endforeach
                        <span style="color: red;">{{$errors->first('Resturnt_id')}} </span>
                    </select>

                    <div class="form-group">
                        <label for="serves_name">Serves Name </label>
                        <input type="text" value="{{ $data->serves_name }}" class="form-control" id="serves_name"
                               name="serves_name" placeholder="Enter serves_name">
                    </div>
                    <span style="color: red;">{{$errors->first('serves_name')}} </span>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"> Update</i></button>
                </div>
            </form>
        </div>


    </div>










@endsection
