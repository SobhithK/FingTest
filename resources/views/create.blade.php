
@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
          <div class="col">
<form id="frmStudents" method="post" action="{{ route('addstudent') }}">

    @csrf
  <div class="form-group">
    <label for="txtName">Name :</label>
    <input type="text" class="form-control" id="txtName" name="txtName" value="{{ old('txtName') }}" required placeholder="">
    @if($errors->has('txtName'))
         <div class="alert alert-danger">Enter a valid name</div>
    @endif
  </div>
  <div class="form-group">
    <label for="txtAge">Age :</label>
    <input type="number" class="form-control" id="txtAge" name="txtAge" value = "{{ old('txtAge') }}" required placeholder="">
    @if($errors->has('txtAge'))
         <div class="alert alert-danger">Enter a Valid age between 1 - 25</div>
    @endif
  </div>
  <div class="form-group">
    <label for="txtGender">Gender :</label>
    <select class="form-control" id="selGender" required name="selGender">
        <option>Select</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
        
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
        <option value="{{$key->id}}">{{$key->name}}</option>
     @endforeach
     @endif
    </select>
    @if($errors->has('selRepteacher'))
    <div class="alert alert-danger">Please select a reporting teacher</div>
@endif
  </div>
  <button type="submit" id="btAdd" name="btAdd" class="btn btn-outline-primary">Add</button>

</form>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')

@endsection
