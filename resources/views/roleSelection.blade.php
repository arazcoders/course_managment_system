<!DOCTYPE html>
<html lang="en">
<head>
    <title>انتخاب نقش</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background:linear-gradient(90deg, #C7C5F4, #776BCC);direction: rtl;">

<div class="container" >

    <div class="panel panel-default" style="margin-top:70px;">
        <div class="panel-heading">لطفا جهت ورود به سیستم یکی از نقش ها را انتخاب کنید:</div>
        <div class="panel-body">

            <form action="/redirect_to_panels" method="post">

            @csrf
            <div class="form-group">
        @foreach($roles as $role)

                <div >

                    <input type="checkbox" name="{{$role}}" />
                    <label>{{ $role}}</label>

                </div>

        @endforeach
            </div>
            <button type="submit" >ورود</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
