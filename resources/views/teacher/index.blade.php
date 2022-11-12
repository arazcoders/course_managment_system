@extends('layouts.teacherPanel')

@section('title')



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
                <h3 class="box-title" style="color: #645ca8;"><i class="icon-list"></i>اطلاعات استاد</h3>
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
                                <th style="width:5%;">ردیف</th><th>کد ملی</th><th>نام</th><th>نام خانوادگی</th><th>ایمیل</th><th>نقش سامانه ای</th><th>گزینه ها</th>

                            </tr>
                            </thead>
                            <tbody>



                            </tbody>

                        </table>


                    </div>
                </div>
            </div>
        </div>

    </div>



</div>



@endsection


