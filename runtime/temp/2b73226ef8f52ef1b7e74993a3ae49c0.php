<?php /*a:2:{s:74:"C:\Users\Administrator\Desktop\tp5\application\admin\view\login\login.html";i:1554870932;s:73:"C:\Users\Administrator\Desktop\tp5\application\admin\view\login\base.html";i:1554870932;}*/ ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登录界面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/src/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/src/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/src/layuiadmin/style/login.css" media="all">
</head>
<body>

<div class="layadmin-user-login layadmin-user-display-show" >

    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>联运代理后台</h2>
            <p>Enterprise Data Service Solutions</p>
        </div>
        
    <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
        <form action="<?php echo url('admin.doLogin'); ?>" method="post" id="loginForm">
            <!--<?php echo token(); ?>-->
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" value="<?php echo htmlentities($username); ?>" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password"  lay-verify="required" placeholder="密码" class="layui-input">
            </div>

            <!--<div class="layui-form-item" style="margin-bottom: 20px;">-->
                <!--<input type="checkbox" name="remember" lay-skin="primary" title="记住密码">-->
                <!--<a href="forget.html" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>-->
            <!--</div>-->
            <div class="layui-form-item">
                <button type="submit" class="layui-btn layui-btn-fluid" lay-submit lay-filter="login-form">登 录</button>
            </div>
        </form>
    </div>

    </div>
</div>

<script src="/src/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/src/layuiadmin/' //静态资源所在路径
    }).extend({
        getToken:'mymod/getToken'
    }).use(['layer', 'form', 'jquery', 'getToken'],function () {
        var layer = layui.layer
            ,form = layui.form
            ,$    = layui.$
            ,getToken = layui.getToken;

        form.on('submit(login-form)', function(data) {
            $.ajax({
                type:'post',
                url:data.form.action,
                data:{
                    'username' : $.trim(data.field.username),
                    'password' : $.trim(data.field.password),
                    // '__token__': $.trim(data.field.__token__)
                },
                dataType:'json',
                success: function(res) {
                    if (res.code === 0) {
                        location.href = '/admin';
                    } else {
                        layer.msg(res.msg, {icon:5});
                        // var token = getToken.getToken();
                        // $("input[name='__token__']").val(token);
                    }
                }
            });

            return false;
        });
    })
</script>
</body>
</html>