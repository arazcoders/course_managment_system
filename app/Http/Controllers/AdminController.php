<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{

    use hasRoles;

    public function  __construct(){

        $this->middleware('can:manage_users');



    }

    public  function  index(){

        $users=User::all();
        $role_field=[];

        foreach ($users as $user){

            $role_string="";
            $roles=$user->getRoleNames();

            foreach ($roles as $role){

                if($role=='teacher'){

                    $role_string.='استاد ' ;

                }

                if($role=='student'){

                    $role_string.='دانشجو ';

                }

            }

            $role_field[]=$role_string;

        }

        return view('admin.index',compact('users','role_field'));
    }

    public  function  show($id){

        $user=User::query()->findOrFail($id);

        $roles= $user->getRoleNames();

        $is_teacher=false; $is_student=false;

        foreach ($roles as $role){

            if ($role=='teacher'){ $is_teacher=true;}
            if ($role=='student'){ $is_student=true;}

        }


        return view('admin.show',compact('user','is_teacher','is_student'));

    }

    public  function  store(Request $request){



        $register_controller= new RegisterController();

        $register_controller->register($request);

        $is_teacher=$request['teacher'];
        $is_student=$request['student'];

        if($is_teacher){

          $user=  User::query()->where('userName','=',$request['userName'])->get()->firstOrFail();

          $user->assignRole('teacher');

        }

        if($is_student){

            $user=  User::query()->where('userName','=',$request['userName'])->get()->firstOrFail();

            $user->assignRole('student');

        }

        return redirect('/admin');
    }

    public  function  create(){

        return view('admin.create');
    }

    public  function  edit($id){

        $user=User::query()->findOrFail($id);

        $roles= $user->getRoleNames();

        $is_teacher=false; $is_student=false;

        foreach ($roles as $role){

            if ($role=='teacher'){ $is_teacher=true;}
            if ($role=='student'){ $is_student=true;}

        }


        return view('admin.edit',compact('user','is_teacher','is_student'));

    }

    public  function  update($id, Request $request){

        $user=User::query()->findOrFail($id);

        $user->name=$request['name'];
        $user->last_name=$request['last_name'];
        $user->email=$request['email'];
        $user->save();

        if($request['teacher']){

            $user->assignrole('teacher');

            if(!isset($user->Get_Teacher_Data)){

                DB::table('teachers')->insert([

                    'user_id'=>$user->id

                ]);

            }


        }else{  $user->removeRole('teacher'); }

        if($request['student']){

            $user->assignrole('student');

            if(!isset($user->Get_Student_Data)){

                DB::table('students')->insert([

                    'user_id'=>$user->id

                ]);

            }

        }else{  $user->removeRole('student'); }



        return redirect('/admin');

    }

    public  function destroy($id){

        $user=User::query()->findOrFail($id);

        $user->delete();

        return redirect('/admin');

    }


    public function  Test_Roles(){

        Permission::create(['name' => 'manage_users']);

        $admin = Role::create(['name' => 'admin']);

        $admin->givePermissionTo('manage_users');

        auth()->user()->assignRole($admin);

        return view('admin.index');

    }

}
