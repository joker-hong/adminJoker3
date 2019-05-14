@extends('admin.layouts.layout')
@section('body')
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <form method="get" action="{{route('user')}}">
                    {!! csrf_field() !!}
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">登录名</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" placeholder="请输入" autocomplete="off" class="layui-input" value="{{$get}}">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-admin" type="submit">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>

            <div class="layui-card-body">
                <div style="padding-bottom: 10px;">
                    <a href="{{route('user.create')}}" class="layui-btn layuiadmin-btn-admin" >添加</a>
                </div>

                <table class="layui-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>管理员账号</th>
                        <th>所在角色组</th>
                        <th>最后登录时间</th>
                        <th>注册时间</th>
                        <th>登录次数</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lists as $k => $item)

                        <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td>{{$item->username}}</td>
                            <td>
                                @foreach($item->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            </td>
                            <td class="text-center">{{$item->created_at->diffForHumans()}}</td>
                            <td class="text-center">{{$item->created_at->diffForHumans()}}</td>
                            <td class="text-center">{{$item->login_count}}</td>
                            <td class="text-center">
                                @if($item->status == 1)
                                    <span class="layui-btn layui-btn-xs">正常</span>
                                @elseif($item->status == 2)
                                    <span class="layui-btn layui-btn-primary layui-btn-xs">锁定</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('user.edit',$item->id)}}">
                                        <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-paste"></i> 修改</button>
                                    </a>
                                    {{--@if($item->status == 2)--}}
                                        {{--<a href="{{route('user.status',['status'=>1,'id'=>$item->id])}}"><button class="btn btn-info btn-xs" type="button"><i class="fa fa-warning"></i> 恢复</button></a>--}}
                                    {{--@else--}}
                                        {{--<a href="{{route('user.status',['status'=>2,'id'=>$item->id])}}"><button class="btn btn-warning btn-xs" type="button"><i class="fa fa-warning"></i> 禁用</button></a>--}}
                                    {{--@endif--}}
                                    {{--<a href="{{route('user.delete',$item->id)}}"><button class="btn btn-danger btn-xs" type="button"><i class="fa fa-trash-o"></i> 删除</button></a>--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/admin/admin_joker/layui/layui.js"></script>
    <script>
        layui.config({
            base: '/admin/admin_joker/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'useradmin', 'table'], function(){

        });
    </script>
@endsection