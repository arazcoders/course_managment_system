@extends('student.master')

@section('title')
    Create New Student
@endsection

@section('content')

    <div class="container row">

        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 class="m-3">Edit Student </h4>

    <form action="/student/{{$student->id}}" method="post">

        @method('put')
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{$student->name}}" class="form-control m-1">
        <input type="text" name="lName" placeholder="Last Name" value="{{$student->lName}}" class="form-control m-1">
        <input type="text" name="points_average" placeholder="Average" value="{{$student->points_average}}" class="form-control m-1">

        <button type="submit" class="btn btn-primary"> Edit</button>
    </form>
        </div>
      <div class="col-md-4"></div>
@endsection
