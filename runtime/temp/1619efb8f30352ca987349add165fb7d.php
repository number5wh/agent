<?php /*a:2:{s:75:"C:\Users\Administrator\Desktop\tp5\application\index\view\withdraw\set.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\index\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>结算账号</title>
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
    <h2>结算账号</h2>
  </div>

  <div class="layui-card-body">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>支付宝</legend>
    </fieldset>
    <form class="layui-form" action="<?php echo url('withdraw.doSetAlipay'); ?>" method="post">
      <?php echo token(); ?>
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">姓名：</label>
          <div class="layui-input-inline">
            <input type="text" name="alipay_name" value="<?php echo htmlentities($info['alipay_name']); ?>" lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
          </div>
        </div>

        <div class="layui-inline">
          <label class="layui-form-label">账号：</label>
          <div class="layui-input-inline">
            <input type="text" name="alipay" value="<?php echo htmlentities($info['alipay']); ?>" placeholder="请输入账号" lay-verify="required" autocomplete="off" class="layui-input">
          </div>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-inline">
          <button type="submit" class="layui-btn" lay-submit="" lay-filter="withdraw-doSetAlipay">新增/修改</button>
        </div>
      </div>

    </form>


    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>银行卡</legend>
    </fieldset>

    <form class="layui-form" action="<?php echo url('withdraw.doSetBank'); ?>" method="post">
      <?php echo token(); ?>
      <div class="layui-form-item">

        <div class="layui-inline">
          <label class="layui-form-label">姓名：</label>
          <div class="layui-input-inline">
            <input type="text" name="name" value="<?php echo htmlentities($info['name']); ?>" lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input">
          </div>
        </div>

        <div class="layui-inline">
          <label class="layui-form-label">账号：</label>
          <div class="layui-input-inline">
            <input type="text" name="cardaccount" value="<?php echo htmlentities($info['cardaccount']); ?>" lay-verify="required" placeholder="请输入账号" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-inline">
          <label class="layui-form-label">开户行：</label>
          <div class="layui-input-inline" >
            <input type="text" name="bank" value="<?php echo htmlentities($info['bank']); ?>" lay-verify="required" placeholder="请输入开户行" autocomplete="off" class="layui-input">
          </div>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-inline">
          <button type="submit" class="layui-btn" lay-submit="" lay-filter="withdraw-doSetBank">新增/修改</button>
        </div>
      </div>
    </form>
  </div>
</div>


</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script>
  layui.extend({
    getToken:'../src/layuiadmin/mymod/getToken'
  }).use(['layer','table','form','jquery','getToken'],function () {
    var layer = layui.layer
        ,form = layui.form
        ,table = layui.table
            ,$ = layui.$
            ,getToken = layui.getToken;

    //支付宝
    form.on('submit(withdraw-doSetAlipay)', function(data) {
      $.ajax({
        type: 'post',
        url: data.form.action,
        data: {
          'alipay_name': $.trim(data.field.alipay_name),
          'alipay': $.trim(data.field.alipay),
          //'__token__': $.trim(data.field.__token__)
        },
        dataType: 'json',
        success: function (res) {
          // var token = getToken.getToken();
          // $("input[name='__token__']").val(token);
          if (res.code === 0) {
            layer.msg(res.msg, {icon: 6});
          } else {
            layer.msg(res.msg, {icon: 5});
          }
        }
      });
      return false;
    });

    //银行卡
    form.on('submit(withdraw-doSetBank)', function(data) {
      $.ajax({
        type: 'post',
        url: data.form.action,
        data: {
          'name': $.trim(data.field.name),
          'bank': $.trim(data.field.bank),
          'cardaccount': $.trim(data.field.cardaccount),
          // '__token__': $.trim(data.field.__token__)
        },
        dataType: 'json',
        success: function (res) {
          // var token = getToken.getToken();
          // $("input[name='__token__']").val(token);
          if (res.code === 0) {
            layer.msg(res.msg, {icon: 6});
          } else {
            layer.msg(res.msg, {icon: 5});
          }
        }
      });
      return false;
    });
  });
</script>

</body>
</html>

