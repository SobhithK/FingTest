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
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Reporting Teacher</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if(empty($students))
            <tr>
                <td>No Records Found</td>
            </tr>
            @else
           
              @foreach($students as $student)  
              <tr>
                <th scope="row">1</th>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->gender == 'M'?'Male':'Female' }}</td>
                <td>{{ $student->teacher->name }}</td>
                <td><a href="/student/edit/{{ $student->id }}">Edit</a>/<a href="/student/delete/{{ $student->id }}" class="delstudent">Delete</a></td>
            </tr>
              @endforeach  
           
             @endif
        </tbody>
      </table>

</div>
@endsection


