<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public  function  __construct(){

        return $this->middleware('can:teacher_login');

    }

    public function index(){

        $user= auth()->user();
        $user_fullName=$user->name .' '. $user->last_name;

        return view('teacher.index');

    }
}
