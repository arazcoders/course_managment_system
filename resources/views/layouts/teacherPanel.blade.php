
<!DOCTYPE html>
<html dir="rtl" style="height: auto; min-height: 100%;">
<head>
    <title>پنل اساتید </title>
    <meta charset="utf-8">
    <meta name="description">
    <meta name="keywords">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="Persian">
    <link rel="shortcut icon" href="~/images/Fartak_Logo.png" type="image/x-icon">

    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet/less" href="{{\Illuminate\Support\Facades\URL::asset('css/app-styles.less')}}">
    <link rel="stylesheet/less" href="{{\Illuminate\Support\Facades\URL::asset('css/skin-cyan.less')}}">
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/main.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/4.1.3/less.min.js" integrity="sha512-6gUGqd/zBCrEKbJqPI7iINc61jlOfH5A+SluY15IkNO1o4qP1DEYjQBewTB4l0U4ihXZdupg8Mb77VxqE+37dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('js/jquery.numeric-min.js')}}"></script>

    <meta name="theme-color" content="#2a9bc0">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2a9bc0">

    <!-- Scripts NewLayout -->

    <script src="{{\Illuminate\Support\Facades\URL::asset('js/public.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::asset('js/main.js')}}"></script>

    <style>
        a span {
            color: white;
            font-size: 14px;
        }

        li a i {
            font-size: 15px !important;
        }



        label{

            font-weight:normal!important;

        }

        a:hover{

            background-color: rgb(245, 247, 253)!important;

        }

        .active{

            background:#ebeefb;

        }

        .active span{

            color: #6076E2;
            font-weight: 700;

        }

        .active i {

            font-weight:700;
        }


        .waiting{

            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 10000;

            text-align:center;
        }

    </style>

</head>



<body class="sidebar-mini fixed sidebar-mini-expand-feature  pace-done" style="height: auto; min-height: 100%;overflow:hidden">


<div class="pace  pace-inactive">
    <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>

<div class="wrapper" style="height: auto; min-height: 100%;">
    <header class="main-header">

        <div class="logo hidden-xs" style="height:70px;display:inline-flex!important;">


            <div style="font-size:13px;">

                <span style="height:30px;display:block;color:white;">سامانه دانشجویی "یار دبستانی"</span>
                <span style="font-size:12px; color:white;display:block;text-align:center;">پنل استاد</span>

            </div>

        </div>

        <nav class="navbar navbar-static-top" style="height:70px;box-shadow: 0 6px 17px 0 rgba(157,157,157,0.2),0 17px 50px 0 rgba(251,251,251,0.05);">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="toggle-arrow"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <li class="navbar-nav-item">

                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="padding-top:70px; background-color: #645ca8; ">
        <!-- sidebar: style can be found in sidebar.less -->
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 303px;border:1px solid #eaebef;box-shadow: 0 6px 17px 0 rgba(157,157,157,0.2),0 17px 50px 0 rgba(251,251,251,0.05);">
            <section class="sidebar" style="overflow: hidden; width: auto; height: 303px;">
                <!-- Sidebar user panel -->
                <div class="welcome" style="border-bottom: 1px solid rgb(234, 235, 239);">
                    <i class="icon-user icon-user-following" style="color:white;"></i>

                    <p style="color:white;">
                        <span style="color:white;">{{ auth()->user()->name.' '.auth()->user()->last_name }} _</span>استاد
                    </p>

                </div>

                <div class="welcome" style="border-bottom: 1px solid rgb(234, 235, 239);">
                    <p style="color:gray;">


                    </p>

                </div>

                <ul class="sidebar-menu tree" id="menu" data-widget="tree">
                    <li id="Dashboard" >
                        <a href="/admin" class=""><i class="icon-grid" style="color:white;"></i><span>مدیریت نیروی انسانی </span></a>
                    </li>

                    <li id="Announcement" >
                        <a href="/Home/Change_Pass" class="@ViewBag.Change_Pass">
                            <i class="icon-key" style="color:white;"></i><span>تغییر رمز عبور</span>
                        </a>
                    </li>

                    <li> <form method="post" action="{{route('logout')}}" >@csrf <button type="submit"  style="width: 100%;border: none;text-align: right;padding-right: 20px;padding-top: 10px;background-color: unset;"><i class="icon-logout" style="margin-left: 12px;color: white;"></i><span style="color: white;">خروج</span></button> </form></li>
                </ul>



            </section><div class="slimScrollBar" style="background: rgba(133, 133, 169, 0.7) none repeat scroll 0% 0%; width: 4.5px; position: absolute; top: 0px; opacity: 1; display: block; border-radius: 7px; z-index: 99; left: 1px; height: 129.674px;"></div><div class="slimScrollRail" style="width: 4.5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; left: 1px;"></div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 280px;background:#f7fafc;">

        <section  class="content" style="padding:40px 16px;height:100vh;overflow-y:scroll;background-color: #c2bff2;">

      @yield('content')


        </section>




    </div>



</div>




</body>
</html>

