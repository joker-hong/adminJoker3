

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}}后台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/admin/adminJoker3/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/admin/adminJoker3/style/admin.css" media="all">

</head>
<body class="layui-layout-body">

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <!-- 头部区域 -->
        @include('admin.commons._header')

        <!-- 侧边菜单 -->
        @include('admin.commons._menu')

        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="home/console.html" lay-attr="home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>


        <!-- 主体内容 -->
        @include('admin.commons._body')

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script src="/admin/adminJoker3/layui/layui.js"></script>

<script>
    layui.config({
        base: '/admin/adminJoker3/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('index');
</script>

<!-- 百度统计 -->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?d214947968792b839fd669a4decaaffc";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</body>
</html>


