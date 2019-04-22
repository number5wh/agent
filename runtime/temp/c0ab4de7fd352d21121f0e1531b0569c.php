<?php /*a:2:{s:76:"C:\Users\Administrator\Desktop\tp5\application\index\view\safeset\index.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\index\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>安全设置</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/src/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/src/layuiadmin/style/admin.css" media="all">
    
</head>
<body>

<div class="layui-fluid">
    
<div class="layui-card">
    <div class="layui-card-header layuiadmin-card-header-auto">
        <h2>安全设置</h2>
    </div>

    <div class="layui-card-body">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>修改密码</legend>
        </fieldset>
        <form class="layui-form" action="<?php echo url('safeset.changePwd'); ?>" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label">新密码：</label>
                <div class="layui-input-inline">
                    <input type="password" id="pwd1" name="password" lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">确认密码：</label>
                <div class="layui-input-inline">
                    <input type="password" id="pwd2" name="password_confirm" lay-verify="required" placeholder="请确认新密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">

                <label class="layui-form-label">验证码：</label>
                <div class="layui-input-inline">
                    <input type="text" id="code1" name="code" placeholder="请输入验证码" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <button type="button" class="layui-btn layui-btn-normal" id="sms1">获取验证码</button>
                </div>

            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="safeset-changePwd">确认修改</button>
                </div>
            </div>
        </form>


        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
            <legend>修改密保手机</legend>
        </fieldset>

        <form class="layui-form" action="<?php echo url('safeset.changeMobile'); ?>" method="post">
            <div class="layui-form-item">

                    <label class="layui-form-label">新手机号：</label>
                    <div class="layui-input-inline">
                        <input type="text" id="mb1" lay-verify="required|phone|number" name="mobile" placeholder="请输入新手机号" autocomplete="off" class="layui-input">
                    </div>
            </div>

            <div class="layui-form-item">

                    <label class="layui-form-label">确认手机：</label>
                    <div class="layui-input-inline">
                        <input type="text" id="mb2" lay-verify="required|phone|number" name="mobile_confirm" placeholder="请确认手机号" autocomplete="off" class="layui-input">
                    </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">验证码：</label>
                <div class="layui-input-inline">
                    <input type="text" id="code2" lay-verify="required" name="code" placeholder="请输入验证码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline">
                    <button type="button" class="layui-btn layui-btn-normal" id="sms2">获取验证码</button>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="safeset-changeMobile">确认修改</button>
                </div>
            </div>
        </form>
    </div>
</div>


</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script>
    layui.extend({
        sendmsg:'../src/layuiadmin/mymod/sendmsg'
    }).use(['layer','table','form', 'jquery', 'sendmsg'],function () {
        var layer = layui.layer
            ,form = layui.form
            ,table = layui.table
            ,$    = layui.$
            ,sendmsg = layui.sendmsg
            ,sendmsg2 = layui.sendmsg2;
        //用户表格初始化
        form.on('submit(safeset-changePwd)', function(data) {
            var password = $.trim(data.field.password)
                ,password_confirm = $.trim(data.field.password_confirm)
                ,code = $.trim(data.field.code);
            $.ajax({
                type:'post',
                url:data.form.action,
                data:{
                    'password' : password,
                    'password_confirm' : password_confirm,
                    'code': code
                },
                dataType:'json',
                success: function(res) {
                    if (res.code === 0) {
                        layer.msg(res.msg,{icon:6});
                        $('#pwd1').val('');
                        $('#pwd2').val('');
                        $('#code1').val('');

                    } else {
                        layer.msg(res.msg, {icon:5});
                        $('#code1').val('');
                    }
                }
            });
            return false;
        });

        form.on('submit(safeset-changeMobile)', function(data) {
            var mobile = $.trim(data.field.mobile)
                ,mobile_confirm = $.trim(data.field.mobile_confirm)
                ,code = $.trim(data.field.code);
            $.ajax({
                type:'post',
                url:data.form.action,
                data:{
                    'mobile' : mobile,
                    'mobile_confirm' : mobile_confirm,
                    'code': code
                },
                dataType:'json',
                success: function(res) {
                    if (res.code === 0) {
                        layer.msg(res.msg,{icon:6});
                        $('#mb1').val('');
                        $('#mb2').val('');
                        $('#code2').val('');
                    } else {
                        layer.msg(res.msg, {icon:5});
                        $('#code2').val('');
                    }
                }
            });
            return false;
        });
        $('#sms1').on('click', function(){
            sendmsg.sendmsg('#sms1',1,'');
        });
        $('#sms2').on('click', function(){
            sendmsg.sendmsg('#sms2', 2, $.trim($('#mb1').val()));
        });
    });
</script>

</body>
</html>

