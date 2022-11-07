@extends('layouts.TestLayout')

@section('title')

Users List

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
                <h3 class="box-title" style="color: #645ca8;"><i class="icon-info"></i>دانشگاه در یک نگاه</h3>
                <div class="box-tools pull-left">
                    <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="font-size:13px!important;text-align:center!important">


                    <div class="col-md-3 " >

                        <div class="border_Shadow" >
                            <div> <i class="icon-chart" style="font-size:15px;"></i> </div>
                            <div style="margin-right:10px;">
                                <span style="display:block;color:#645ca8;margin-bottom:10px;">آمار اساتید</span>
                                <span style="font-weight:bold;"></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3 ">

                        <div class="border_Shadow">
                            <div> <i class="icon-chart" style="font-size:15px;"></i> </div>
                            <div style="margin-right:10px;">
                                <span style="display:block;color:#645ca8;margin-bottom:10px;">آمار دانشجویان</span>
                                <span style="font-weight:bold;"></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3 ">

                        <div class="border_Shadow">
                            <div> <i class="icon-chart" style="font-size:15px;"></i> </div>
                            <div style="margin-right:10px;">
                                <span style="display:block;color:#645ca8;margin-bottom:10px;">ترم های بسته شده</span>
                                <span style="font-weight:bold;">  </span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3 ">

                        <div class="border_Shadow">
                            <div> <i class="icon-chart" style="font-size:15px;"></i> </div>
                            <div style="margin-right:10px;">
                                <span style="display:block;color:#645ca8;margin-bottom:10px;">آمار فارغ التحصیلان</span>
                                <span style="font-weight:bold;"> </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>



    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-lg-12 ">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title" style="color: #645ca8;"><i class="icon-list"></i>مدیریت نیروی انسانی</h3>
                <div class="box-tools pull-left">
                    <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <div style="margin-bottom:10px;"><a href="/admin/create" class="btn btn-primary" id="New_Hmi">استخدام نیرو جدید</a></div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width:5%;">ردیف</th><th>کد ملی</th><th>نام</th><th>نام خانوادگی</th><th>ایمیل</th><th>نقش سامانه ای</th><th>گزینه ها</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$user->userName}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>

                                        {{$role_field[$loop->iteration-1]}}

                                    </td>
                                   <td>
{{--  options filed--}}
                                       <button class="btn btn-info"> <a href="/admin/{{$user->id}}" style="color: white;">جزییات</a> </button>
                                       <button class="btn btn-warning"> <a href="/admin/{{$user->id}}/edit" style="color: white;">ویرایش</a> </button>

                                       <form method="post" action="{{route('delete_user',$user->id)}}" style="display: inline-block;">

                                           @csrf
                                           @method('delete')
                                           <button type="submit" class="btn btn-danger">حذف</button>

                                       </form>


                                   </td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>



</div>



@endsection


