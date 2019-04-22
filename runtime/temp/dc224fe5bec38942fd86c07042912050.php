<?php /*a:2:{s:75:"C:\Users\Administrator\Desktop\agent\application\index\view\index\home.html";i:1555555823;s:76:"C:\Users\Administrator\Desktop\agent\application\index\view\common\base.html";i:1555554481;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>主页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/src/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/src/layuiadmin/style/admin.css" media="all">
    
</head>
<body>

<div class="layui-fluid">
    
<div class="layui-row layui-col-space30">
    <div class="layui-col-md3 layui-col-lg3 layui-col-xs12 layui-col-sm6 ">
        <div class="layui-card">
            <div class="layui-card-header">
                总玩家
                <span class="layui-badge layui-bg-blue layuiadmin-badge">全部</span>
            </div>
            <div class="layui-card-body layuiadmin-card-list">
                <p class="layuiadmin-big-font"><?php echo htmlentities($user['totaluser']); ?></p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3 layui-col-lg3 layui-col-xs12 layui-col-sm6 ">
        <div class="layui-card">
            <div class="layui-card-header">
                总收入
                <span class="layui-badge layui-bg-blue layuiadmin-badge">全部</span>
            </div>
            <div class="layui-card-body layuiadmin-card-list">
                <p class="layuiadmin-big-font"><?php echo htmlentities($user['totalincome']); ?></p>
            </div>
        </div>
    </div>
    <div class="layui-col-md3 layui-col-lg3 layui-col-xs12 layui-col-sm6 ">
        <div class="layui-card">
            <div class="layui-card-header">
                总充值
                <span class="layui-badge layui-bg-blue layuiadmin-badge">全部</span>
            </div>
            <div class="layui-card-body layuiadmin-card-list">
                <p class="layuiadmin-big-font"><?php echo htmlentities($user['totalcharge']); ?></p>
            </div>
        </div>
    </div>

</div>

</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script>
    layui.config({
        base: '/src/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index']);
</script>

</body>
</html>

