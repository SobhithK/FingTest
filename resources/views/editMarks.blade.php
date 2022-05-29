
@extends('layouts.master')
@section('styles')
@endsection
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
          <div class="col">
<form id="frmStudentmark" method="post" action="{{ route('updatestudentMark') }}">

    @csrf
    <input id="txtid" name="txtid" type="hidden" value="{{$marks->id}}">
    <div class="form-group">
        <label for="txtName">Name :</label>
        <input type="text" class="form-control" id="txtName" name="txtName" value="{{ $marks->student->name }}" readonly placeholder="">
     
      </div>
  <div class="form-group">
    <label for="selTerm">Term :</label>
    <select class="form-control" id="selTerm" required name="selTerm">
       
          <option value="0">Select</option>
          <option value="ONE" {{ $marks->term=='ONE'?'selected':''}}>ONE</option>
          <option value="TWO" {{ $marks->term=='TWO'?'selected':''}}>TWO</option>
       
    </select>
        
      </select>
    @if($errors->has('selTerm'))
         <div class="alert alert-danger">Please select a valid Term</div>
    @endif
  </div>
  <div class="form-group">
    <label for="txtMaths">Maths :</label>
    <input type="number" class="form-control" id="txtMaths" name="txtMaths" value = "{{ $marks->maths }}" required placeholder="">
    @if($errors->has('txtMaths'))
         <div class="alert alert-danger">Enter a Valid marks between 1-100</div>
    @endif
  </div>

  <div class="form-group">
    <label for="txtScience">Science :</label>
    <input type="number" class="form-control" id="txtScience" name="txtScience" value = "{{ $marks->science }}" required placeholder="">
    @if($errors->has('txtScience'))
         <div class="alert alert-danger">Enter a Valid marks between 1-100</div>
    @endif
  </div>

  <div class="form-group">
    <label for="txtHistory">History :</label>
    <input type="number" class="form-control" id="txtHistory" name="txtHistory" value = "{{ $marks->history }}" required placeholder="">
    @if($errors->has('txtHistory'))
         <div class="alert alert-danger">Enter a Valid marks between 1-100</div>
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
