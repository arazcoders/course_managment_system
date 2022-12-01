<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Table;
use App\Helpers\WebOne;
use SoapClient;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use const http\Client\Curl\Features\HTTP2;

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

    public function  course_create(){

        $teachers=Cache::remember('Test',now()->addSecond(30),function (){ return Teacher::with('user')->get();});


        $array=array();
        foreach ($teachers as $teacher){

            $array[]=array( $teacher->id,$teacher->user->name.' '.$teacher->user->last_name);
        }

        $all_courses= Course::all();

        return view('admin.course_create',['teachers_list'=>$array,'courses'=>$all_courses]);
    }

    public function course_store(){

      $data= \request()->validate([
           'title'=>'required',
           'course_start'=>'required',
           'course_end'=>'required'
       ]);

        /*Save new course in database  */

        $new_course= Teacher::find(\request('teacher'))->courses()->create($data);

        $days_array=array();
        $days_array[]=\request('saturday') ? 1 : 0;
        $days_array[]=\request('sunday') ? 1 : 0;
        $days_array[]=\request('monday') ? 1 : 0;
        $days_array[]=\request('tuesday') ? 1 : 0;
        $days_array[]=\request('wednesday') ? 1 : 0;
        $days_array[]=\request('thursday') ? 1 : 0;
        $days_array[]=\request('friday') ? 1 : 0;

        $pivot_table_rows=array();
        $new_course_id= $new_course->id;
        foreach ($days_array as $index=>$day){

            if($day==1){ $pivot_table_rows[]=['course_id'=>$new_course_id,'day_id'=>$index+1]; }

        }

        DB::table('course_day')->insert($pivot_table_rows);

        return redirect('course/create');

    }

    /**
     * @throws \SoapFault
     */

    public  function  test_sms(){

        $webOne=new WebOne();

         $webOne->sendSMS();
        /*$webOne->getCredit();*/
        // -1001097528978
       /*dd(Http::get('https://api.telegram.org/bot1636885349:AAHxO0Qd9igyY3fVbsX80Kpd-EcARmJtjPQ/sendMessage?chat_id=-1001097528978&&text=Believing is Magic'));*/

        return redirect('/admin');
    }

}
