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

                 @foreach($all_courses as $course)

                                <div class="col-xs-4 pt-4 ">
                                    <div class="row">

                                        <img src="{{ asset('storage/images/').'/register_course.png'  }}" width="120" class="col-xs-6">

                                        <div class="col-xs-6 row align-items-center">

                                            <span class="d-block pt-3 pb-2 bold-font">{{$course->title}}</span>
                                            <span class="d-block">{{'مهندس '.$course->teacher->user->last_name}}</span>
                                            <span class="d-block pt-1">جزییات و ثبت نام</span>

                                        </div>

                                    </div>
                                </div>
                @endforeach
                </div>
            </div>
        </div>

    </div>

</div>

@endsection


