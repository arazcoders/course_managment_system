@extends('layouts.TestLayout')

@section('content')


    <div class="row">
        <div class="col-xs-12 col-lg-12 ">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت نام جدید</h3>
                    <div class="box-tools pull-left">
                        <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-8">
                            <form method="post" action="{{ route('store_user')}}">
                                @csrf

                                <div class="form-horizontal">

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" > کد ملی</label>

                                        <div class="col-md-10">
                                            <input  type="text"  name="userName" class="form-control"  />
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >نام</label>

                                        <div class="col-md-10">

                                            <input  type="text"  name="name" class="form-control" />

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >نام خانوادگی</label>

                                        <div class="col-md-10">
                                            <input  type="text"   name="last_name" class="form-control"  />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >ایمیل</label>

                                        <div class="col-md-10">
                                            <input  type="text" name="email" class="form-control"  />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >رمز</label>

                                        <div class="col-md-10">
                                            <input  type="password" name="password" class="form-control"  />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >تکرار رمز</label>

                                        <div class="col-md-10">
                                            <input  type="password" name="password_confirmation" class="form-control"  />
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label" >نقش سامانه ای</label>

                                        <div class="col-md-10" style="display: flex">
                                            <div>

                                                <input type="checkbox" name="teacher" />
                                                <labe>استاد</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="student"  />
                                                <labe>دانشجو</labe>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-2"></div>
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">ثبت نام</button>

                                    </div>


                                </div>

                            </form>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
