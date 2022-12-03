<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public  function __construct(){

        return $this->middleware('can:student_login');

}

    public  function  my_courses(){

        $all_courses=Course::all();

        return view('student.myCourses',compact('all_courses'));

    }

    public function index(){

        $user= auth()->user();

        $roles= $user->getRoleNames();

        $is_teacher=false; $is_student=false;

        foreach ($roles as $role){

            if ($role=='teacher'){ $is_teacher=true;}
            if ($role=='student'){ $is_student=true;}

        }

        return view('student.index',compact('user','is_student','is_teacher'));

    }

    public  function  update($id, Request $request){

        $student=Student::query()->where('user_id',$id)->first();

        $student->call_number=$request["call_number"];
        $student->education_level=$request["education_level"];
        $student->birth_date=$request["birth_date"];

        if(!is_null($request->file('personnel_pic'))){

            $student->personnel_pic=$request->file('personnel_pic')->storeAs('personnel_pics/students',$student->user->userName.'.jpg','public');

        }

        $student->save();

        return redirect('/student');

    }

}
