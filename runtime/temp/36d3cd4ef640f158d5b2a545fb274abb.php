<?php /*a:2:{s:76:"C:\Users\Administrator\Desktop\tp5\application\index\view\withdraw\list.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\index\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>提现记录</title>
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
    <h2>提现总额:<span id="total_amount">0</span></h2>
  </div>

  <div class="layui-card-body">
    <table id="dataTable" lay-filter="dataTable"></table>
  </div>
</div>


</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script>
  layui.use(['layer','table','form','jquery'],function () {
    var layer = layui.layer
            ,form = layui.form
            ,table = layui.table
            ,$ = layui.$;
    //用户表格初始化
    var dataTable = table.render({
      elem: '#dataTable'
      , height: 500
      , url: "<?php echo url('withdraw.listData'); ?>" //数据接口
      , where: {}
      , page: true //开启分页
      , cols: [[ //表头
        {field: 'id', title: 'ID', sort: true, width: 80}
        , {field: 'checktypeName', title: '账号类型'}
        , {field: 'account', title: '账号'}
        , {field: 'getname', title: '姓名'}
        , {field: 'statusInf', title: '状态'}
        , {field: 'amount', title: '金额'}
        , {field: 'info', title: '备注'}
      ]]
    });
    $.ajax({
      type:'get',
      url:'/withdraw/getAmount',
      dataType:'json',
      success: function(res) {
        if (res.code === 0) {
          $('#total_amount').html(res.amount);
        }
      }
    });
  });
</script>

</body>
</html>

