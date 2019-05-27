@extends('admin.layouts.layout')
@section('body')
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-header">表单组合</div>
            <div class="layui-card-body" style="padding: 15px;">
                <form class="layui-form" action="" lay-filter="component-form-group">
                    <div class="layui-form-item">
                        <label class="layui-form-label">单行输入框</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">验证必填项</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">验证手机</label>
                            <div class="layui-input-inline">
                                <input type="tel" name="phone" lay-verify="required|phone" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">验证邮箱</label>
                            <div class="layui-input-inline">
                                <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">多规则验证</label>
                            <div class="layui-input-inline">
                                <input type="text" name="number" lay-verify="required|number" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">验证日期</label>
                            <div class="layui-input-inline">
                                <input type="text" name="date" id="LAY-component-form-group-date" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">验证链接</label>
                            <div class="layui-input-inline">
                                <input type="tel" name="url" lay-verify="url" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">验证身份证</label>
                        <div class="layui-input-block">
                            <input type="text" name="identity" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">自定义验证</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">范围</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="text" name="price_min" placeholder="￥" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-form-mid">-</div>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="text" name="price_max" placeholder="￥" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">单行选择框</label>
                        <div class="layui-input-block">
                            <select name="interest" lay-filter="aihao">
                                <option value=""></option>
                                <option value="0">写作</option>
                                <option value="1" selected="">阅读</option>
                                <option value="2">游戏</option>
                                <option value="3">音乐</option>
                                <option value="4">旅行</option>
                            </select>
                        </div>
                    </div>


                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">分组选择框</label>
                            <div class="layui-input-inline">
                                <select name="quiz">
                                    <option value="">请选择问题</option>
                                    <optgroup label="城市记忆">
                                        <option value="你工作的第一个城市">你工作的第一个城市</option>
                                    </optgroup>
                                    <optgroup label="学生时代">
                                        <option value="你的工号">你的工号</option>
                                        <option value="你最喜欢的老师">你最喜欢的老师</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">搜索选择框</label>
                            <div class="layui-input-inline">
                                <select name="modules" lay-verify="required" lay-search="">
                                    <option value="">直接选择或搜索选择</option>
                                    <option value="1">layer</option>
                                    <option value="2">form</option>
                                    <option value="3">layim</option>
                                    <option value="4">element</option>
                                    <option value="5">laytpl</option>
                                    <option value="6">upload</option>
                                    <option value="7">laydate</option>
                                    <option value="8">laypage</option>
                                    <option value="9">flow</option>
                                    <option value="10">util</option>
                                    <option value="11">code</option>
                                    <option value="12">tree</option>
                                    <option value="13">layedit</option>
                                    <option value="14">nav</option>
                                    <option value="15">tab</option>
                                    <option value="16">table</option>
                                    <option value="17">select</option>
                                    <option value="18">checkbox</option>
                                    <option value="19">switch</option>
                                    <option value="20">radio</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">联动选择框</label>
                        <div class="layui-input-block">
                            <div class="layui-inline">
                                <select name="quiz1">
                                    <option value="">请选择省</option>
                                    <option value="浙江" selected="">浙江省</option>
                                    <option value="你的工号">江西省</option>
                                    <option value="你最喜欢的老师">福建省</option>
                                </select>
                            </div>
                            <div class="layui-inline">
                                <select name="quiz2">
                                    <option value="">请选择市</option>
                                    <option value="杭州">杭州</option>
                                    <option value="宁波" disabled="">宁波</option>
                                    <option value="温州">温州</option>
                                    <option value="温州">台州</option>
                                    <option value="温州">绍兴</option>
                                </select>
                            </div>
                            <div class="layui-inline">
                                <select name="quiz3">
                                    <option value="">请选择县/区</option>
                                    <option value="西湖区">西湖区</option>
                                    <option value="余杭区">余杭区</option>
                                    <option value="拱墅区">临安市</option>
                                </select>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-form-mid layui-word-aux">此处只是演示联动排版，并未做联动交互</div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">复选框</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="like[write]" title="写作">
                            <input type="checkbox" name="like[read]" title="阅读" checked="">
                            <input type="checkbox" name="like[game]" title="游戏">
                        </div>
                    </div>

                    <div class="layui-form-item" pane="">
                        <label class="layui-form-label">原始复选框</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="like1[write]" lay-skin="primary" title="写作" checked="">
                            <input type="checkbox" name="like1[read]" lay-skin="primary" title="阅读">
                            <input type="checkbox" name="like1[game]" lay-skin="primary" title="游戏" disabled="">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">开关-默认关</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="close" lay-skin="switch" lay-text="ON|OFF">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">开关-默认开</label>
                        <div class="layui-input-block">
                            <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="component-form-switchTest" lay-text="ON|OFF">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">单选框</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="男" title="男" checked="">
                            <input type="radio" name="sex" value="女" title="女">
                            <input type="radio" name="sex" value="禁" title="禁用" disabled="">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">普通文本域</label>
                        <div class="layui-input-block">
                            <textarea name="text" placeholder="请输入内容" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-layout-admin">
                        <div class="layui-input-block">
                            <div class="layui-footer" style="left: 0;">
                                <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        layui.config({
            base: '/admin/adminJoker3/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'form', 'laydate'], function(){
            var $ = layui.$
                ,admin = layui.admin
                ,element = layui.element
                ,layer = layui.layer
                ,laydate = layui.laydate
                ,form = layui.form;

            form.render(null, 'component-form-group');

            laydate.render({
                elem: '#LAY-component-form-group-date'
            });

            /* 自定义验证规则 */
            form.verify({
                title: function(value){
                    if(value.length < 5){
                        return '标题至少得5个字符啊';
                    }
                }
                ,pass: [/(.+){6,12}$/, '密码必须6到12位']
                ,content: function(value){
                    layedit.sync(editIndex);
                }
            });

            /* 监听指定开关 */
            form.on('switch(component-form-switchTest)', function(data){
                layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                    offset: '6px'
                });
                layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
            });

            /* 监听提交 */
            form.on('submit(component-form-demo1)', function(data){
                parent.layer.alert(JSON.stringify(data.field), {
                    title: '最终的提交信息'
                })
                return false;
            });
        });
    </script>
@endsection