@extends('layouts.TestLayout')

@section('content')


    <div class="row">
        <div class="col-xs-12 col-lg-12 ">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">نمایش جزییات</h3>
                    <div class="box-tools pull-left">
                        <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-8">

                            <div class="form-horizontal">

                                <div class="form-group">

                                    <label class="col-md-2 control-label" > کد ملی</label>

                                    <div class="col-md-10">
                                        <input  type="text" class="form-control" value="{{$user->userName}}" readonly="true"/>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label" >نام</label>

                                    <div class="col-md-10">

                                        <input  type="text" class="form-control" value="{{ $user->name }}" readonly="true"/>

                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label" >نام خانوادگی</label>

                                    <div class="col-md-10">
                                        <input  type="text" class="form-control" value="{{$user->last_name}}" readonly="true"/>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label" >ایمیل</label>

                                    <div class="col-md-10">
                                        <input  type="text" class="form-control" value="{{$user->email}}" readonly="true"/>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-md-2 control-label" >نقش سامانه ای</label>

                                    <div class="col-md-10" style="display: flex">
                                        <div>

                                            <input type="checkbox" @if($is_teacher)  checked  @endif/>
                                            <labe>استاد</labe>

                                        </div>
                                        <div style="padding-right: 10px;">

                                            <input type="checkbox" @if($is_student)  checked  @endif />
                                            <labe>دانشجو</labe>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>


@endsection
