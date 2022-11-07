<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StudentController extends Controller
{

    public function  __construct(){

    $this->middleware('auth');

}

    public  function   index(){

       $students= Student::all();

       // return view('student.index',['students'=>$students]);
        return view('student.index',compact('students'));

    }

    public function  show($id){

        $student=Student::all()->find($id);

        return view('student.show',['student'=>$student]);
    }

    public  function   create(){

        return view('student.create');

    }

    public  function  store(Request $request){


        $New_Student=new Student();

       /* $New_Student->name=$request->name;
        $New_Student->lName=$request->lName;
        $New_Student->points_average=$request->points_average;
        $New_Student->save();*/

        //dd($request);

        Student::query()->create($request->except('_token'));


        return redirect('/student');

    }

    public function edit($id){

        $student=Student::all()->find($id);

        return view('student.edit',['student'=>$student]);
    }

    public function update($id ,Request $request){

       /* $student=Student::all()->find($id);

        $student->name=$request->name;
        $student->lName=$request->lName;
        $student->points_average=$request->points_average;
        $student->update();*/

        Student::query()->findOrFail($id)->update($request->except('_token'));

        return redirect('/student');
    }

    public  function  destroy($id){

       if( auth()->user()->can('delete-student')){

           $student=Student::all()->find($id);

           $student->delete();
       }


        return redirect('/student');

    }

    public  function  Test_Roles(){

      /*  Permission::create(['name' => 'create-student']);
        Permission::create(['name' => 'edit-student']);
        Permission::create(['name' => 'delete-student']);
        Permission::create(['name' => 'show-student']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'editor']);

        Role::findByName('admin')->givePermissionTo('delete-student');

        auth()->user()->assignRole('admin');

        Role::create(['name'=>'teacher']);
        Role::create(['name'=>'student']);*/

      /*  Role::create(['name'=>'admin']);
        auth()->user()->assignRole('admin');*/

      /*  Permission::create(['name' => 'manage_users']);
        Role::findByName('admin')->givePermissionTo('manage_users');*/

        return redirect('/student');
    }

}
