<?php /*a:2:{s:75:"C:\Users\Administrator\Desktop\tp5\application\index\view\detail\index.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\index\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>游戏明细</title>
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
    <h2>游戏明细</h2>
  </div>

  <div class="layui-card-body">
    <table id="detail" lay-filter="detail"></table>
  </div>
</div>


</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>


<script>
  layui.use(['layer','table','form'],function () {
    var layer = layui.layer
        ,form = layui.form
        ,table = layui.table;
    //用户表格初始化
    var dataTable = table.render({
      elem: '#detail'
      , height: 500
      , url: "<?php echo url('detail.getData'); ?>" //数据接口
      , where: {}
      , page: true //开启分页
      , cols: [[ //表头
         {field: 'id', title: 'ID', sort: true, width: 80}
        , {field: 'userid', title: '账号'}
        , {field: 'addtime', title: '时间'}
        , {field: 'roomname', title: '游戏房间'}
        , {field: 'changemoney', title: '输赢详情'}
      ]]
    });
  });
</script>

</body>
</html>

