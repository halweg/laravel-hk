<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sz-hk登录</title>

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{ asset('admin/css/bootstrap.min.css') }}?v=3.3.6" rel="stylesheet">
    <link href="{{ asset('admin/css/font-awesome.css') }}?v=4.4.0" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">
    <div class="text-center">
        <h4 class="logo-name">神州香港</h4>
    </div>
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        @include('admin.shared._errors')
        <div>
            <h3>欢迎使用 神州香港后台</h3>
            <form class="m-t" role="form" action="{{ asset('admin/login') }}" method="POST">
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="账户" required="">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
                <p class="text-muted text-center"> <a href="#"><small>忘记密码了？</small></a>
            </form>

        </div>

    </div>

    <!-- 全局js -->
    <script src="{{ asset('admin/js/jquery.min.js') }}?v=2.1.4"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}?v=3.3.6"></script>

</body>
</html>
