@php
    $admin = Auth::guard('web')->user();
@endphp
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="home/console.html">
            <span>{{config('app.name')}}</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            @foreach($admin->getMenus() as $key => $rule)
                @if(isset($rule['children']))
                    <li data-name="home" class="layui-nav-item">
                        <a href="javascript:;" lay-tips="{{$rule['name']}}" lay-direction="2">
                            <i class="layui-icon layui-icon-{{$rule['fonts']}}"></i>
                            <cite>{{$rule['name']}}1</cite>
                        </a>

                            <dl class="layui-nav-child">
                                @foreach($rule['children'] as $k=>$item)
                                <dd data-name="console" class="layui-this">
                                    <a lay-href="">{{$item['name']}}</a>
                                </dd>
                                @endforeach
                            </dl>

                    </li>
                @else
                    <li data-name="home" class="layui-nav-item">
                        <a href="javascript:;" lay-tips="{{$rule['name']}}" lay-direction="2" lay-href="">
                            <i class="layui-icon layui-icon-{{$rule['fonts']}}"></i>
                            <cite>{{$rule['name']}}2</cite>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>