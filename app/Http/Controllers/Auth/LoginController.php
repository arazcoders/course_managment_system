<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }


    protected  function  authenticated(Request $request ,$user){

        if(Auth::check()){

            $roles= $user->getRoleNames();

            if(count($roles)>1){

                return  redirect('/roleSelection');
            }

            if($user->hasRole('student')){

                return  redirect('/student');

            }else if ($user->hasRole('admin')){

                return  redirect('/admin');

            }else if ($user->hasRole('teacher')){

                return  redirect('/teacher');

            }
            else {

                return  $this->logout( $request);

            }


        }

    }

    public function role_selection(){

        $roles=auth()->user()->getRoleNames();

        return view('roleSelection',compact('roles'));

    }

    public function redirect_to_panels(Request $request){

        if(isset($request['teacher']) && $request['teacher'] ){

            return redirect(route('index_teacher')) ;

        }else if( isset($request['student']) && $request['student']){

            return  redirect(route('index_student'));

        }else if( isset($request['admin']) && $request['admin']){

            return  redirect(route('index_admin'));

        }else{

          Auth::logout();

          return  redirect('/');

        }

    }


}
