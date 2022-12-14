@extends('layouts.adminPanel')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-lg-12 ">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ثبت دوره جدید</h3>
                    <div class="box-tools pull-left">
                        <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-8">
                            <form method="post" action="{{ route('course_store')}}">
                                @csrf

                                <div class="form-horizontal">

                                    <div class="form-group">

                                        <label class="col-md-2 control-label"> عنوان دوره</label>

                                        <div class="col-md-10">
                                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid': '' }} " />
                                            @if($errors->has('title'))
                                            <span  class="invalid-feedback" role="alert">
                                                <strong> {{$errors->first('title')}}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">مدرس دوره</label>

                                        <div class="col-md-10">
                                            <select name="teacher" class="form-control">

                                                @foreach($teachers_list as $teacher)

                                                <option value="{{$teacher[0]}}"> {{ $teacher[1] }} </option>

                                                @endforeach

                                            </select>


                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">تاریخ شروع دوره</label>

                                        <div class="col-md-10">
                                            <input type="date" name="course_start" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">تاریخ پایان دوره</label>

                                        <div class="col-md-10">
                                            <input type="date" name="course_end" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-md-2 control-label">روز های برگزاری</label>

                                        <div class="col-md-10" style="display: flex">

                                            <div>

                                                <input type="checkbox" name="saturday" >
                                                <labe>شنبه</labe>

                                            </div>

                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="sunday" />

                                                <labe>یک شنبه</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="monday" />

                                                <labe>دوشنبه</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="tuesday" />

                                                <labe>سه شنبه</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="wednesday" />

                                                <labe>چهارشنبه</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="thursday" />

                                                <labe>پنج شنبه</labe>

                                            </div>
                                            <div style="padding-right: 10px;">

                                                <input type="checkbox" name="friday" />

                                                <labe>جمعه</labe>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-2"></div>
                                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">ثبت
                                            نام
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

    <div class="row">
        <div class="col-xs-12 col-lg-12 ">

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #645ca8;"><i class="icon-list"></i>لیست دوره های فعال</h3>
                    <div class="box-tools pull-left">
                        <a href="#" class="action-box" data-widget="collapse"><i class="icon-arrow-down"></i></a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th style="width:5%;">ردیف</th>
                                    <th>عنوان دوره</th>
                                    <th>مدرس </th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th>روز های برگزاری</th>
                                    <th>تعداد ثبت نامی</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($courses as $course)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$course->title}}</td>
                                        <td>{{'مهندس '.$course->teacher->user->last_name}}</td>
                                        <td>{{$course->course_start}}</td>
                                        <td>{{$course->course_end}}</td>
                                        <td>

                                          @foreach($course->days as $day)
                                                {{$day->day_name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $course->students->count()}}</td>
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
