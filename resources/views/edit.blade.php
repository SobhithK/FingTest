
@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
          <div class="col">
<form id="frmStudents" method="post" action="{{ route('updatestudent') }}">
<input type="hidden" id="txtid" name="txtid" value="{{ $students->id }}">
    @csrf
  <div class="form-group">
    <label for="txtName">Name :</label>
    <input type="text" class="form-control" id="txtName" name="txtName" value="{{ $students->name }}" required placeholder="">
    @if($errors->has('txtName'))
         <div class="alert alert-danger">Enter a valid name</div>
    @endif
  </div>
  <div class="form-group">
    <label for="txtAge">Age :</label>
    <input type="number" class="form-control" id="txtAge" name="txtAge" value = "{{ $students->age }}" required placeholder="">
    @if($errors->has('txtAge'))
         <div class="alert alert-danger">Enter a Valid age between 1 - 25</div>
    @endif
  </div>
  <div class="form-group">
    <label for="txtGender">Gender :</label>
    <select class="form-control" id="selGender" required name="selGender">
        <option>Select</option>
        <option {{$students->gender=='M'?'selected':''}} value="M">Male</option>
        <option {{$students->gender=='F'?'selected':''}} value="F">Female</option>
        
      </select>
    @if($errors->has('selGender'))
         <div class="alert alert-danger">Gender is required</div>
    @endif
  </div>
  <div class="form-group">
    <label for="selRepteacher">Reporting Teacher</label>
    <select class="form-control" id="selRepteacher" required name="selRepteacher">
      
    @if(empty($teachers))    
    <option value="0">Select</option>
    @else
      <option value="0">Select</option>
    @foreach($teachers as $key)
        <option value="{{$key->id}}" {{$students->teacher->id==$key->id?'selected':''}}>{{$key->name}}</option>
     @endforeach
     @endif
    </select>
    @if($errors->has('selRepteacher'))
    <div class="alert alert-danger">Please select a reporting teacher</div>
@endif
  </div>
  <button type="submit" id="btAdd" name="btAdd" class="btn btn-outline-primary">Update</button>

</form>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')

@endsection
