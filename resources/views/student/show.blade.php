@extends('student.master')

@section('title')
    Show Student
@endsection

@section('content')

    <div class="container row">

        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 class="m-3"> Student Info</h4>
        <input type="text" name="name" placeholder="Name" value="{{$student->name}}" class="form-control m-1">
        <input type="text" name="lName" placeholder="Last Name" value="{{$student->lName}}" class="form-control m-1">
        <input type="text" name="average" placeholder="Average" value="{{$student->points_average}}" class="form-control m-1">
        </div>
        <div class="col-md-4"></div>

@endsection
