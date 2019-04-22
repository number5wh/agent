<?php /*a:2:{s:79:"C:\Users\Administrator\Desktop\tp5\application\index\view\account\addProxy.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\index\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新增代理</title>
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
    <h2>新增代理</h2>
  </div>

  <div class="layui-card-body">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
      <legend>基本信息</legend>
    </fieldset>
    <form class="layui-form" action="<?php echo url('account.doAddProxy'); ?>" method="post" id="addProxy">
      <!--<?php echo token(); ?>-->

      <div class="layui-form-item">
          <label class="layui-form-label">账号：</label>
          <div class="layui-input-inline">
            <input type="text" name="username" placeholder="请输入手机号" lay-verify="required|phone|number" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
          <label class="layui-form-label">密码：</label>
          <div class="layui-input-inline">
            <input type="password" name="password" lay-verify="required" placeholder="数字+字母，8-12位" autocomplete="off" class="layui-input">
          </div>
      </div>
      <div class="layui-form-item">
          <label class="layui-form-label">确认密码：</label>
          <div class="layui-input-inline">
            <input type="password" name="password_confirm" lay-verify="required" placeholder="请确认密码" autocomplete="off" class="layui-input">
          </div>
      </div>
      <div class="layui-form-item">
          <label class="layui-form-label">分成比例：</label>
          <div class="layui-input-inline">
              <select name="percent" lay-verify="required" id="percentList">
              </select>
          </div>
      </div>
        <div class="layui-form-item">
            <label class="layui-form-label">允许开通下级代理：</label>
            <div class="layui-input-block">
                <input type="radio" name="allow_addproxy" value="1" title="允许" checked>
                <input type="radio" name="allow_addproxy" value="0" title="不允许">
            </div>
        </div>
      <div class="layui-form-item">
        <label class="layui-form-label">备注：</label>
        <div class="layui-input-inline">
          <input type="text" name="descript" placeholder="请输入12字内备注" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-block">
          <button type="submit" class="layui-btn layui-btn-radius" lay-submit="" lay-filter="account-doAddProxy">保存</button>
          <button type="reset" class="layui-btn layui-btn-primary layui-btn-radius" id="reset-addproxy">重置</button>
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
          , form = layui.form
          , table = layui.table
          , $ = layui.$
          , getToken = layui.getToken;
    //获取分成比例
      function getPercent() {
          $.ajax({
              type:'get',
              url:"<?php echo url('account.getPercent'); ?>",
              dataType:'json',
              success: function(res) {
                  if (res.code === 0) {
                      $('#percentList').html('');
                      for (var i = 0; i < res.data.length; i++) {
                          $('#percentList').append("<option value='"+res.data[i]+"'>"+res.data[i]+"%</option>")
                      }
                      form.render('select')
                  }
              }
          });
      }
      getPercent();
      //添加代理
      form.on('submit(account-doAddProxy)', function(data) {
          $.ajax({
              type: 'post',
              url: data.form.action,
              data: {
                  'username': $.trim(data.field.username),
                  'password': $.trim(data.field.password),
                  'password_confirm': $.trim(data.field.password_confirm),
                  'percent': $.trim(data.field.percent),
                  'allow_addproxy': $.trim(data.field.allow_addproxy),
                  'descript': $.trim(data.field.descript),
              },
              dataType: 'json',
              success: function (res) {
                  if (res.code === 0) {
                      $('#reset-addproxy').click();
                      getPercent();
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

