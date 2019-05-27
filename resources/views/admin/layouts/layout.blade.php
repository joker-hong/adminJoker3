
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin 主页示例模板二</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/admin/adminJoker3/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/admin/adminJoker3/style/admin.css" media="all">
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" media="all">



</head>
<body>
    <div class="col-sm-12" style="margin-top:15px;margin-bottom:-15px;">@include('flash::message')</div>
    @yield('body')
    <script src="/admin/js/pages/public/jquery.min.js"></script>
    <script src="/admin/js/pages/public/jquery-2.1.1.min.js"></script>
    <script src="/admin/js/pages/public/jquery-migrate-1.2.1.min.js"></script>
    <script src="/admin/js/pages/public/jquery.mmenu.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/adminJoker3/layui/layui.js"></script>
    @yield('js')
</body>

</html>