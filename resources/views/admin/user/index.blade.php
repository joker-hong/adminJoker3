@extends('admin.layouts.layout')
@section('body')
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <form method="get" action="{{route('user')}}">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">登录名</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" placeholder="请输入" autocomplete="off" class="layui-input" value="{{$get}}">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-admin" lay-submit type="submit">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
                </form>
            </div>

            <div class="layui-card-body">
                <div style="padding-bottom: 10px;">
                    <button class="layui-btn layuiadmin-btn-admin" data-type="batchdel">删除</button>
                    <button class="layui-btn layuiadmin-btn-admin" data-type="add">添加</button>
                </div>

                <table id="LAY-user-back-manage" lay-filter="LAY-user-back-manage">

                </table>
                <script type="text/html" id="buttonTpl">
                    {{#  if(d.check == true){ }}
                    <button class="layui-btn layui-btn-xs">已审核</button>
                    {{#  } else { }}
                    <button class="layui-btn layui-btn-primary layui-btn-xs">未审核</button>
                    {{#  } }}
                </script>
                <script type="text/html" id="table-useradmin-admin">
                    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
                    {{#  if(d.role == '超级管理员'){ }}
                    <a class="layui-btn layui-btn-disabled layui-btn-xs"><i class="layui-icon layui-icon-delete"></i>删除</a>
                    {{#  } else { }}
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
                    {{#  } }}
                </script>
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
            var $ = layui.$
                ,form = layui.form
                ,table = layui.table;

            //监听搜索
            form.on('submit(LAY-user-back-search)', function(data){
                var field = data.field;

                //执行重载
                table.reload('LAY-user-back-manage', {
                    where: field
                });
            });

            //事件
            var active = {
                batchdel: function(){
                    var checkStatus = table.checkStatus('LAY-user-back-manage')
                        ,checkData = checkStatus.data; //得到选中的数据

                    if(checkData.length === 0){
                        return layer.msg('请选择数据');
                    }

                    layer.prompt({
                        formType: 1
                        ,title: '敏感操作，请验证口令'
                    }, function(value, index){
                        layer.close(index);

                        layer.confirm('确定删除吗？', function(index) {

                            //执行 Ajax 后重载
                            /*
                            admin.req({
                              url: 'xxx'
                              //,……
                            });
                            */
                            table.reload('LAY-user-back-manage');
                            layer.msg('已删除');
                        });
                    });
                }
                ,add: function(){
                    layer.open({
                        type: 2
                        ,title: '添加管理员'
                        ,content: 'adminform.html'
                        ,area: ['420px', '420px']
                        ,btn: ['确定', '取消']
                        ,yes: function(index, layero){
                            var iframeWindow = window['layui-layer-iframe'+ index]
                                ,submitID = 'LAY-user-back-submit'
                                ,submit = layero.find('iframe').contents().find('#'+ submitID);

                            //监听提交
                            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
                                var field = data.field; //获取提交的字段

                                //提交 Ajax 成功后，静态更新表格中的数据
                                //$.ajax({});
                                table.reload('LAY-user-front-submit'); //数据刷新
                                layer.close(index); //关闭弹层
                            });

                            submit.trigger('click');
                        }
                    });
                }
            }
            $('.layui-btn.layuiadmin-btn-admin').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
        });
    </script>
@endsection