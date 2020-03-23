<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sz-hongkong</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @yield('css')
</head>

<body>
<div id="wrapper">

    @include('admin.main.nav_bar_slide')

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            @include('admin.main.nav_bar_top')
        </div>
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('admin.main.footer')
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/toastr/toastr.min.js"></script>
@include('admin.shared._toastr')
@yield('javascript')
</body>
</html>
