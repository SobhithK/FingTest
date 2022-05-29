
@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
          <div class="col">
<form id="frmStudentmarks" method="post" action="{{ route('storemarks') }}">

    @csrf
  <div class="form-group">
    <label for="selName">Name :</label>
    <select class="form-control" id="selName" required name="selName">
      
      @if(empty($students))    
      <option value="0">Select</option>
      @else
        <option value="0">Select</option>
      @foreach($students as $key)
          <option value="{{$key->id}}">{{$key->name}}</option>
       @endforeach
       @endif
      </select>
    @if($errors->has('selName'))
         <div class="alert alert-danger">Please select a student</div>
    @endif
  </div>
  <div class="form-group">
    <label for="selTerm">Term :</label>
    <select class="form-control" id="selTerm" required name="selTerm">
       
          <option value="0">Select</option>
          <option value="ONE">ONE</option>
          <option value="TWO">TWO</option>
       
    </select>
        
      </select>
    @if($errors->has('selTerm'))
         <div class="alert alert-danger">Please select a valid Term</div>
    @endif
  </div>
  <div class="form-group">
    <label for="txtMaths">Maths :</label>
    <input type="number" class="form-control" id="txtMaths" name="txtMaths" value = "{{ old('txtMaths') }}" required placeholder="">
    @if($errors->has('txtMaths'))
         <div class="alert alert-danger">Enter a Valid marks between 1-100</div>
    @endif
  </div>

  <div class="form-group">
    <label for="txtScience">Science :</label>
    <input type="number" class="form-control" id="txtScience" name="txtScience" value = "{{ old('txtScience') }}" required placeholder="">
    @if($errors->has('txtScience'))
         <div class="alert alert-danger">Enter a Valid marks between 1-100</div>
    @endif
  </div>

  <div class="form-group">
    <label for="txtHistory">History :</label>
    <input type="number" class="form-control" id="txtHistory" name="txtHistory" value = "{{ old('txtHistory') }}" required placeholder="">
    @if($errors->has('txtHistory'))
         <div class="alert alert-danger">Enter a Valid marks between 1-100</div>
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
