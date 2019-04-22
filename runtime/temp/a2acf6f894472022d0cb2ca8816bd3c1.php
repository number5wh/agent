<?php /*a:2:{s:80:"C:\Users\Administrator\Desktop\tp5\application\admin\view\account\proxyList.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\admin\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>代理列表</title>
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
    <h2>代理列表</h2>
  </div>

  <div class="layui-card-body">
    <div class="search-proxy" style="margin-bottom: 10px;">
      <div class="layui-inline">
        <input type="text" name="username" id="username" placeholder="代理账号" autocomplete="off" class="layui-input">
      </div>
      <button class="layui-btn" data-type="reload" id="search_proxy">搜索</button>
    </div>
    <table id="proxylist" lay-filter="proxylist"></table>
  </div>
</div>

<div class="layui-row" id="popEditProxy" style="display:none;">
    <div class="layui-col-md12">
        <form class="layui-form" action="" method="post" id="editProxy" style="margin-top:20px;margin-right: 20px;" >
            <div class="layui-form-item">
                <label class="layui-form-label">账号：</label>
                <div class="layui-input-inline">
                    <input type="text" name="username" disabled id="edit_username" lay-verify="required|phone|number" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">密码：</label>
                <div class="layui-input-inline">
                    <input type="password" name="password" id="edit_pwd" lay-verify="required" placeholder="数字+字母，8-12位" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码：</label>
                <div class="layui-input-inline">
                    <input type="password" name="password_confirm" id="edit_pwd_conf" lay-verify="required" placeholder="请确认密码" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分成比例：</label>
                <div class="layui-input-inline">
                    <select name="percent" lay-verify="required" id="edit_list">
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">允许开通下级代理：</label>
                <div class="layui-input-block">
                    <input type="radio" name="allow_addproxy" value="1" title="允许" id="allow_add1" checked>
                    <input type="radio" name="allow_addproxy" value="0" title="不允许" id="allow_add0">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">备注：</label>
                <div class="layui-input-inline">
                    <input type="text" name="descript" id="edit_descript" placeholder="请输入12字内备注" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <div class="layui-input-block">
                    <button type="submit" class="layui-btn layui-btn-radius" lay-submit="" lay-filter="account-edit">保存</button>
                    <button type="button" class="layui-btn layui-btn-primary layui-btn-radius" id="edit_reset">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>



</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script type="text/html" id="proxylist-bar">
  <button class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i><cite></cite></button>
</script>
<script>
  layui.use(['layer','table','form','jquery'],function () {
    var layer = layui.layer
            , form = layui.form
            , table = layui.table
            , $ = layui.$;
    //用户表格初始化
    var dataTable = table.render({
      elem: '#proxylist'
      , height: 500
      , url: "<?php echo url('admin.account.proxyListData'); ?>" //数据接口
      , where: {}
      , page: true //开启分页
      , cols: [[ //表头
         {field: 'proxy_id', title: '代理ID', sort:true}
        , {field: 'parent_id', title: '上级代理ID'}
        , {field: 'username', title: '账号'}
        , {field: 'percent', title: '分成比例', sort:true}
        , {field: 'totalfee', title: '总充值', sort:true}
        , {field: 'total_tax', title: '总业绩', sort:true}
        , {field: 'historyin', title: '总利润', sort:true}
        , {field: 'leftmoney', title: '玩家余额', sort:true}
        , {field: 'descript', title: '备注'}
        , {fixed: 'right', title:'操作', align:'center', toolbar: '#proxylist-bar'}
      ]]
    });

    //搜索代理
    var search = function() {
      var username = $.trim($('#username').val());
      //执行重载
      table.reload('proxylist', {
        page: {
          curr: 1 //重新从第 1 页开始
        },
        where: {'username':username}
      });
    };
    $('#search_proxy').on('click', function() {
      search();
    });

    //编辑
    table.on('tool(proxylist)', function(obj) {
      var data = obj.data //获得当前行数据
          ,layEvent = obj.event; //获得 lay-event 对应的值
         tr = obj.tr; //获得当前行 tr 的DOM对象
      if (layEvent === 'edit') {
          $('#edit_pwd').val('');
          $('#edit_pwd_conf').val('');
          $.ajax({
              type: 'post',
              url: "<?php echo url('admin.account.edit'); ?>",
              data: {
                  'proxyid': $.trim(data.proxy_id),
              },
              dataType: 'json',
              success: function (res) {
                  if (res.code === 0) {
                      $('#edit_username').val(res.data.username);
                      $('#edit_descript').val(res.data.descript);
                      $('#edit_list').html('');
                      for (var i = 0; i < res.percent.length; i++) {
                          $('#edit_list').append("<option value='"+res.percent[i]+"'>"+res.percent[i]+"%</option>")
                      }
                      var selectPercent = $("select[name=percent]"); //
                      $(selectPercent).children("option").each(function () {
                          if ($(this).val() == res.data.percent) {
                              $("select[name=percent]").find('option:eq('+this.index+')').attr('selected', true);
                          }
                      });

                      // form.render('radio');
                      if (res.data.allow_addproxy === 1) {
                          $('#allow_add0').prop('checked', false);
                          $('#allow_add1').prop('checked', true);
                      } else {
                          $('#allow_add0').prop('checked', true);
                          $('#allow_add1').prop('checked', false);
                      }

                      form.render();

                      index = layer.open({
                          type: 1,
                          title: '编辑代理',
                          shadeClose: true,
                          shade: 0.8,
                          content: $('#popEditProxy')
                      });
                  } else {
                      layer.msg(res.msg, {icon: 5});
                  }
              }
          });
      }
    });

    //充值
      $('#edit_reset').on('click', function() {
          $('#edit_pwd').val('');
          $('#edit_pwd_conf').val('');
          $('#edit_descript').val('');
      });


      //更新代理
      form.on('submit(account-edit)', function(data) {
          $.ajax({
              type: 'post',
              url: "<?php echo url('admin.account.doEdit'); ?>",
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
                      layer.msg(res.msg, {icon: 6});
                      //更新信息
                      $(tr).find("td[data-field='percent'] div").html($.trim(data.field.percent));
                      $(tr).find("td[data-field='descript'] div").html($.trim(data.field.descript));
                      layer.close(index);
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

