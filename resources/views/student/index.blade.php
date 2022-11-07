@extends('student.master')

@section('title')

Students List

@endsection

@section('content')

    <a href="/student/create" class="btn btn-secondary m-2">Create New Student</a>

    <table class="table table-striped">

        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Average</th>
            <th>Options</th>

        </tr>

@foreach($students as $student)

    <tr>
        <td>  {{ $student->name  }} </td>
        <td>  {{ $student->lName  }} </td>
        <td>  {{ $student->points_average  }} </td>
        <td>  <a href="/student/{{$student->id}}" class="btn">show</a>  <a href="/student/{{$student->id}}/edit"  class="btn">Edit</a> <form action="/student/{{$student->id}}" method="post" style="display:inline-flex;"> @csrf @method('delete') <button type="submit" class="btn">Delete</button> </form></td>

    </tr>

    @endforeach

    </table>

@endsection


