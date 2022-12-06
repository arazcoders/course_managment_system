<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public  function __construct(){

        return $this->middleware('can:student_login');

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

    public  function  courses(){


        $all_courses=Course::all();
        $registered_courses=\auth()->user()->Get_Student_Data->courses;

        $all_courses=$all_courses->diff($registered_courses);


        return view('student.courses',compact('all_courses','registered_courses'));

    }

    public function  course_register($id){

       $course=Course::query()->findOrFail($id);

       return view('student.course_register',compact('course'));
    }

    public  function  course_register_store($id){

        $student_id=\auth()->user()->Get_Student_Data->id;

        DB::table('course_student')->insert([

            'course_id'=>$id,
            'student_id'=>$student_id
        ]);

        return redirect('/student/courses');

    }



}
