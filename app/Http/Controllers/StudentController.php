<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public  function __construct(){

        return $this->middleware('can:student_login');

}

    public function index(){

        $user= auth()->user();
        $user_fullName=$user->name .' '. $user->last_name;

        return view('student.index',compact('user_fullName'));

    }


}
