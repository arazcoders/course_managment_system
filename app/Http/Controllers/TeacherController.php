<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public  function  __construct(){

        return $this->middleware('can:teacher_login');

    }

    public function index(){

        $user= auth()->user();

        $roles= $user->getRoleNames();

        $is_teacher=false; $is_student=false;

        foreach ($roles as $role){

            if ($role=='teacher'){ $is_teacher=true;}
            if ($role=='student'){ $is_student=true;}

        }

        return view('teacher.index',compact('user','is_student','is_teacher'));

    }

    public  function  update($id, Request $request){

        $teacher=Teacher::query()->where('user_id',$id)->first();

        $teacher->update([
            'call_number'=>$request["call_number"],
            'education_level'=>$request["education_level"],
            'birth_date'=>$request["birth_date"],
            'hire_date'=>$request["hire_date"],
        ]);

        if(!is_null($request->file('personnel_pic'))){

            $teacher->personnel_pic=$request->file('personnel_pic')->storeAs('personnel_pics/teachers',$teacher->user->userName.'.jpg','public');
        }
        $teacher->save();

        return redirect('/teacher');

    }


}
