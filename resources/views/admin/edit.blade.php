@extends('layouts.adminPanel')

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
                            <form method="post" action="{{ route('update_user',$user->id)}}">
                                @csrf
                                @method('put')

                                <div class="form-horizontal">

                                    <div class="form-group">

                                        <label class="col-md-2 control-label"> کد ملی</label>

                                        <div class="col-md-10">
                                            <input type="text" name="userName" class="form-control"
                                                   value="{{$user->userName}}" readonly="true"/>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">نام</label>

                                        <div class="col-md-10">

                                            <input type="text" name="name" class="form-control"
                                                   value="{{ $user->name }}"/>

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">نام خانوادگی</label>

                                        <div class="col-md-10">
                                            <input type="text" name="last_name" class="form-control"
                                                   value="{{$user->last_name}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">ایمیل</label>

                                        <div class="col-md-10">
                                            <input type="text" name="email" class="form-control"
                                                   value="{{$user->email}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">نقش سامانه ای</label>

                                        <div class="col-md-10" style="display: flex">
                                            <div>

                                                <input type="checkbox" name="teacher" @if($is_teacher)  checked @endif/>
                                                <labe>استاد</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="student"
                                                       @if($is_student)  checked @endif />
                                                <labe>دانشجو</labe>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-2"></div>
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                            ویرایش
                                        </button>

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



    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            <div class="col-md-8">--}}
    {{--                <div class="card">--}}
    {{--                    <div class="card-header">{{ __('Edit User') }}</div>--}}

    {{--                    <div class="card-body">--}}
    {{--                        <form method="POST" action="{{ route('update_user',$user->id) }}">--}}
    {{--                            @csrf--}}
    {{--                            @method('put')--}}
    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="userName" class="col-md-4 col-form-label text-md-end">{{ __('UserName') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ $user->userName}}" required autocomplete="name" autofocus readonly>--}}

    {{--                                    @error('userName')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>--}}

    {{--                                    @error('name')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>--}}

    {{--                                    @error('last_name')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email">--}}

    {{--                                    @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                    @enderror--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="row mb-3">--}}
    {{--                                <label for="Select Roles" class="col-md-4 col-form-label text-md-end">{{ __('Select Roles') }}</label>--}}

    {{--                                <div class="col-md-6">--}}
    {{--                                    <div class="d-block">--}}
    {{--                                        <input type="checkbox" name="teacher" title="teacher" @if($is_teacher)  checked  @endif>--}}
    {{--                                        <label for="teacher">Teacher</label>--}}
    {{--                                    </div>--}}
    {{--                                    <input type="checkbox" name="student" @if($is_student)  checked  @endif>--}}
    {{--                                    <label for="student">Student</label>--}}


    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                            <div class="row mb-0">--}}
    {{--                                <div class="col-md-6 offset-md-4">--}}
    {{--                                    <button type="submit" class="btn btn-primary">--}}
    {{--                                        {{ __('Edit') }}--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
