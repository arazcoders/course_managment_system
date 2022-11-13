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
                <h3 class="box-title" style="color: #645ca8;"><i class="icon-list"></i>اطلاعات دانشجویی</h3>
                <div class="box-tools pull-left">
                    <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="/student/{{$user->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="col-lg-12">

                        <div class="form-group">

                            <label class="col-md-2 control-label"> کد ملی</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$user->userName}}"
                                       readonly="true"/>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">نام</label>

                            <div class="col-md-10">

                                <input type="text" class="form-control" value="{{ $user->name }}"
                                       readonly="true"/>

                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">نام خانوادگی</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$user->last_name}}"
                                       readonly="true"/>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">ایمیل</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" value="{{$user->email}}"
                                       readonly="true"/>
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">نقش سامانه ای</label>

                            <div class="col-md-10" style="display: flex">
                                <div>

                                    <input type="checkbox" @if($is_teacher)  checked @endif disabled/>
                                    <labe>استاد</labe>

                                </div>
                                <div style="padding-right: 10px;">

                                    <input type="checkbox" @if($is_student)  checked @endif disabled/>
                                    <labe>دانشجو</labe>

                                </div>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">َشماره تماس</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="call_number" value="{{$user->Get_Student_Data->call_number}}"  />

                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">سطح تحصیلات</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="education_level" value="{{$user->Get_Student_Data->education_level}}"  />

                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">تاریخ تولد</label>

                            <div class="col-md-10">
                                <input type="date" class="form-control" name="birth_date" value="{{$user->Get_Student_Data->birth_date}}"
                                       />
                            </div>
                        </div>

                        <div class="form-group">

                            <label class="col-md-2 control-label">آپلود عکس</label>

                            <div class="col-md-10">
                                <input type="file" class="form-control" name="personnel_pic"  />

                            </div>
                        </div>


                        <div class="form-group">

                        <button type="submit"  class="btn btn-info">تکمیل اطلاعات</button>

                        </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>



@endsection


