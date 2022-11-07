@extends('student.master')

@section('title')
Create New Student
@endsection

@section('content')

    <div class="container row">

        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h4 class="m-3">Enroll New Student</h4>
    <form action="/student" method="post">

        @csrf
        <input type="text" name="name" placeholder="Name" class="form-control m-1">
        <input type="text" name="lName" placeholder="Last Name" class="form-control m-1">
        <input type="text" name="points_average" placeholder="points_average" class="form-control m-1">

        <button type="submit" class="btn btn-primary"> Add</button>
    </form>
        </div>
        <div class="col-md-4"></div>

    </div>
@endsection
