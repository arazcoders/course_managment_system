@extends('layouts.studentPanel')

@section('title')

پنل دانشجویان

@endsection

@section('content')

<style>

    td,th{

        text-align:center;
        font-size:13px;

    }

    .btn{

        font-size:12.5px;

    }

    .border_Shadow{

        border: 1px solid rgb(234, 235, 239);
        box-shadow: 0 1px 2px 0 rgba(157,157,157,0.2),0 17px 50px 0 rgba(251,251,251,0.05);
        padding:8px;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    #New_Hmi:hover{

        color:unset!important;

    }

    a:hover{

        background-color:unset!important;

    }
</style>

<div class="row">
    <div class="col-xs-12 col-lg-12 ">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title" style="color: #645ca8;"><i class="icon-list"></i>دوره های فعال</h3>
                <div class="box-tools pull-left">
                    <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="box-body container">
                <div class="row">

                    <div class="col-md-3"></div>
                    <div class="col-md-6 row">

                        <img src="{{ asset('storage/images/').'/register_course.png'  }}" width="120" >

                        <h3>{{$course->title}}</h3>
                        <span>{{ 'مدرس دوره: مهندس '.$course->teacher->user->last_name  }}</span>
                        <h5 class="pt-1">این دوره برای دانشجویان مهندسی و تمامی افراد علاقه مند مفید است.</h5>
                        <p class="pt-2">
                            سرفصل ها
                            <br>
                            -آشنایی با اصول مهندسی<br>
                            -شروع به کار با نرم افزار مرتبط

                        </p>
                        <form method="post" action="{{route('course_register_store',$course->id)}}">
                            @csrf
                         <button class="btn btn-default">ثبت نام</button>

                        </form>
                    </div>
                    <div class="col-md-3"></div>


                </div>
            </div>
        </div>

    </div>

</div>

@endsection


