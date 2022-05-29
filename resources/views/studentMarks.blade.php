@extends('layouts.master')
@section('styles')
@endsection


@section('content')
<div class="container-fluid">

    @if (!empty($success))
    <div class="alert alert-success">
        <ul>
            <li>{{ $success }}</li>
        </ul>
    </div>
@endif
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Maths</th>
            <th scope="col">Science</th>
            <th scope="col">History</th>
            <th scope="col">Term</th>
            <th scope="col">Total Marks</th>
            <th scope="col">Created On</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if(empty($marks))
            <tr>
                <td>No Records Found</td>
            </tr>
            @else
           
              @foreach($marks as $student)  
              @php
              $total = $student->maths + $student->science + $student->history;
              @endphp
              <tr>
                <th scope="row">1</th>
                <td>{{ $student->student->name }}</td>
                <td>{{ $student->maths }}</td>
                <td>{{ $student->science}}</td>
                <td>{{ $student->history }}</td>
                <td>{{ $student->term }}</td>
                <td>{{ $total }}</td>
                <td>{{ $student->created_at->format('F j, Y h:i A') }}</td>
                <td><a href="/studentmarks/edit/{{ $student->id }}">Edit</a>/<a href="/studentmarks/delete/{{ $student->id }}" class="delstudent">Delete</a></td>
            </tr>
              @endforeach  
           
             @endif
        </tbody>
      </table>

</div>
@endsection


