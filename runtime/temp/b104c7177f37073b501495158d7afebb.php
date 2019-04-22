<?php /*a:2:{s:76:"C:\Users\Administrator\Desktop\agent\application\index\view\login\login.html";i:1555552679;s:75:"C:\Users\Administrator\Desktop\agent\application\index\view\login\base.html";i:1555554219;}*/ ?>



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
            <h2>代理管理后台</h2>
            <p>代理管理后台</p>
        </div>
        
    <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
        <form action="<?php echo url('doLogin'); ?>" method="post" id="loginForm">
            <!--<?php echo token(); ?>-->
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                <input type="text" name="username" value="" lay-verify="required" placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item" id="item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                <input type="password" name="password"  lay-verify="required" placeholder="密码" class="layui-input">
            </div>
            <div class="layui-form-item">
                <div id="de111" style="float: left;" >
                    <label class="layadmin-user-login-icon layui-icon layui-icon-code-circle" for="LAY-user-login-password"></label>
                    <input type="text" name="captcha"  lay-verify="required" placeholder="验证码" class="layui-input">
                </div>
                <div id="de222" style="float: left">
                    <img src="<?php echo url('capture'); ?>" alt="captcha" style="width: 200px" id="capimg"/>
                </div>
            </div>
            <div class="layui-form-item">
                <button type="submit" class="layui-btn layui-btn-fluid" lay-submit lay-filter="login-form">登 录</button>
            </div>
        </form>
    </div>

    </div>
</div>

<script src="/src/layuiadmin/layui/layui.js"></script>
<script src="/static/gt.js"></script>
<script>
    layui.config({
        base: '/src/layuiadmin/' //静态资源所在路径
    }).use(['layer', 'form', 'jquery'],function () {
        var layer = layui.layer
            ,form = layui.form
            ,$    = layui.$;

        form.on('submit(login-form)', function(data) {
            $.ajax({
                type:'post',
                url:data.form.action,
                data:{
                    'username' : $.trim(data.field.username),
                    'password' : $.trim(data.field.password),
                    'captcha'  : $.trim(data.field.captcha),
                    // '__token__': $.trim(data.field.__token__)
                },
                dataType:'json',
                success: function(res) {
                    if (res.code === 0) {
                        location.href = '/';
                    } else {
                        layer.msg(res.msg, {icon:5});
                            //
                            // $('#de222').html("<img src=\"<?php echo url('capture'); ?>\" alt=\"captcha\" id='capimg'/>");
                            // $('#capimg').width($('#item').width()*0.4).height($('#item').height());
                    }
                }
            });

            return false;
        });
        $('#de111').width($('#item').width()*0.6);
        $('#de222').width($('#item').width()*0.4);

        //设置二维码宽高
        $('#capimg').width($('#item').width()*0.4).height($('#item').height());

        $('#de222').on('click', function() {
            $(this).html("<img src=\"<?php echo url('capture'); ?>\" alt=\"captcha\" id='capimg'/>");
            $('#capimg').width($('#item').width()*0.4).height($('#item').height());
        });

    })
</script>
</body>
</html>