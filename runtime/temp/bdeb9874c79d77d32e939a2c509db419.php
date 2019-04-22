<?php /*a:2:{s:77:"C:\Users\Administrator\Desktop\agent\application\index\view\index\setpwd.html";i:1555642101;s:76:"C:\Users\Administrator\Desktop\agent\application\index\view\common\base.html";i:1555554481;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改密码</title>
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
        <h2>修改密码</h2>
    </div>

    <div class="layui-card-body">
        <form class="layui-form" action="" method="post">
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
                <label class="layui-form-label"></label>
                <div class="layui-input-inline">
                    <button type="submit" class="layui-btn" lay-submit="" lay-filter="safeset-changePwd">确认修改</button>
                </div>
            </div>
        </form>
    </div>
</div>


</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script>
    layui.use(['layer','table','form', 'jquery'],function () {
        var layer = layui.layer
            ,form = layui.form
            ,table = layui.table
            ,$    = layui.$;
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
                },
                dataType:'json',
                success: function(res) {
                    if (res.code === 0) {
                        layer.msg(res.msg,{icon:6});
                        $('#pwd1').val('');
                        $('#pwd2').val('');

                    } else {
                        layer.msg(res.msg, {icon:5});
                    }
                }
            });
            return false;
        });
    });
</script>

</body>
</html>

