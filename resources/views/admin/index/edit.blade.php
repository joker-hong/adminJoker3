@extends('admin.layouts.layout')
@section('body')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">设置我的资料</div>
                    <div class="layui-card-body" pad15>
                        <form method="post" action="{{route('update')}}">
                            {!! csrf_field() !!}
                            <div class="layui-form" lay-filter="">
                            <div class="layui-form-item">
                                <label class="layui-form-label">我的角色</label>
                                <div class="layui-input-inline">
                                    <select lay-verify="">
                                        <option value="1" selected>{{$role['name']}}</option>
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux">当前角色不可更改为其它角色</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">用户名</label>
                                <div class="layui-input-inline">
                                    <input type="text"  value="{{$admin['username']}}" readonly class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux">不可修改。一般用于后台登入名</div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">昵称</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="receiver_name" value="{{$admin['receiver_name']}}" lay-verify="" autocomplete="off" placeholder="请输入昵称" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">头像</label>
                                <div class="layui-input-inline">
                                    <input  lay-verify="required" id="LAY_avatarSrc" placeholder="图片地址" value="http://cdn.layui.com/avatar/168.jpg" class="layui-input">
                                </div>
                                <div class="layui-input-inline layui-btn-container" style="width: auto;">
                                    <button type="button" class="layui-btn layui-btn-primary" id="LAY_avatarUpload">
                                        <i class="layui-icon">&#xe67c;</i>上传图片
                                    </button>
                                    <button class="layui-btn layui-btn-primary" layadmin-event="avartatPreview">查看图片</button >
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">手机</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="receiver_mobile" value="{{$admin['receiver_mobile']}}" lay-verify="phone" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button type="submit" class="layui-btn" >确认修改</button>
                                    {{--<button type="reset" class="layui-btn layui-btn-primary">重新填写</button>--}}
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/admin/admin_joker/layui/layui.js"></script>
    <script>
        layui.config({
            base: '/admin/admin_joker/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'set']);
    </script>
@endsection