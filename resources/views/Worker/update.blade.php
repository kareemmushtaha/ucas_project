@extends('layout.cp.control1')
@section('TRY')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">  لاسماء </h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post" action="{{ Route('worker.update',$data->id)}}">
        @csrf
        @method('PUT')
        <div class="card-body">
          

          <select class="browser-default custom-select" name="project_id">
            <option selected>إختر تصنيف</option>                           
            
            @foreach($cat as $row)
            <option @if($data->project_id==$row->id) selected @endif 
             value="{{$row->id}}">{{ $row->ProjectName }}</option>
            
            @endforeach
            </select>


         

          <div class="form-group">
            <label for="Worker_Nmae">Worker_Nmae  </label>
            <input type="text" value="{{ $data->Worker_Nmae }}"class="form-control" id="Worker_Nmae" name="Worker_Nmae"  placeholder="Enter Worker_Nmae">  
          </div>


          <div class="form-group">
            <label for="Gender">Gender  </label>
            <input type="text" value="{{ $data->Gender }}"class="form-control" id="Gender" name="Gender"  placeholder="Enter Gender">  
          </div>


          <div class="form-group">
            <label for="Adress">Adress  </label>
            <input type="text" value="{{ $data->Adress }}"class="form-control" id="Adress" name="Adress"  placeholder="Enter Adress">  
          </div>


          <div class="form-group">
            <label for="Phone">Phone  </label>
            <input type="text" value="{{ $data->Phone }}"class="form-control" id="Phone" name="Phone"  placeholder="Enter Phone">  
          </div>



          <div class="form-group">
            <label for="Helthey">Helthey  </label>
            <input type="text" value="{{ $data->Helthey }}"class="form-control" id="Helthey" name="Helthey"  placeholder="Enter Helthey">  
          </div>



          <div class="form-group">
            <label for="Notic">Notic  </label>
            <input type="text" value="{{ $data->Notic }}"class="form-control" id="Notic" name="Notic"  placeholder="Enter Notic">  
          </div>

          <div class="form-group">
            <label for="On_day_work">On_day_work  </label>
            <input type="text" value="{{ $data->On_day_work }}"class="form-control" id="On_day_work" name="On_day_work"  placeholder="Enter On_day_work">  
          </div>


          <div class="form-group">
            <label for="birthday">birthday  </label>
            <input type="date" value="{{ $data->birthday }}"class="form-control" id="birthday" name="birthday"  placeholder="Enter birthday">  
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
      </form>
    </div>
    



  </div>










@endsection