<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



</head>
<body>

    <main class="py-4">

        <div class="container">
            <div class="screen">
                <div class="screen__content">
                    <form class="login" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <h3>سامانه دانشجویی یار دبستانی</h3>
                        </div>

                        <div class="login__field">
                            <i class="login__icon fas fa-user" style="padding-left: 5px;"></i>
                            <input type="text" name="userName" class="login__input" placeholder="  نام کاربری">
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-lock" style="padding-left: 5px;"></i>
                            <input type="password" name="password" class="login__input" placeholder="   رمز عبور">
                        </div>
                        <button class="button login__submit" type="submit">
                            <span class="button__text">ورود به حساب</span>
                            <i class="button__icon fa-solid fa-chevron-right"></i>
                        </button>
                    </form>
                    <div class="social-login" hidden>
                        <h3>log in via</h3>
                        <div class="social-icons">
                            <a href="#" class="social-login__icon fab fa-instagram"></a>
                            <a href="#" class="social-login__icon fab fa-facebook"></a>
                            <a href="#" class="social-login__icon fab fa-twitter"></a>
                        </div>
                    </div>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>
            </div>
        </div>


    </main>

</body>
</html>
