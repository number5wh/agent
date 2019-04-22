<?php /*a:2:{s:81:"C:\Users\Administrator\Desktop\tp5\application\index\view\account\playerList.html";i:1554870932;s:74:"C:\Users\Administrator\Desktop\tp5\application\index\view\common\base.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>玩家列表</title>
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
    <h2>玩家列表</h2>
  </div>

  <div class="layui-card-body">
    <div class="search-userid" style="margin-bottom: 10px;">
      <div class="layui-inline">
        <input type="text" name="userid" id="userid" placeholder="玩家账号" autocomplete="off" class="layui-input">
      </div>
      <button class="layui-btn" data-type="reload" id="search_user">搜索</button>
    </div>

    <table id="playerlist" lay-filter="playerlist">
      <thead style="display: none" id="hlist">
      <th lay-data="{field:'id'}">序号</th>
      <th lay-data="{field:'userid'}">账号</th>
      <th lay-data="{field:'roomname'}">游戏房间</th>
      <th lay-data="{field:'totalfee'}">总充值</th>
      <th lay-data="{field:'total_tax'}">总业绩</th>
      <th lay-data="{field:'balance'}">余额</th>
      <th lay-data="{field:'descript'}">备注</th>
      <th lay-data="{fixed: 'right', title:'操作', align:'center', toolbar: '#playerlist-bar'}">操作</th>
      </thead>
      <tbody id="plist">

      </tbody>

    </table>
    <!--<div id="test"></div>-->
  </div>
</div>
<div class="layui-row" id="popEditPlayer" style="display:none;">
  <div class="layui-col-md12">
    <form class="layui-form" action="" method="post" id="editPlayer" style="margin-top:20px;margin-right: 20px;" >
      <div class="layui-form-item">
        <label class="layui-form-label">账号：</label>
        <div class="layui-input-inline">
          <input type="text" name="userid" disabled id="edit_userid" lay-verify="required" autocomplete="off" class="layui-input">
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
          <button type="submit" class="layui-btn layui-btn-radius" lay-submit="" lay-filter="player-edit">保存</button>
          <button type="button" class="layui-btn layui-btn-primary layui-btn-radius" id="edit_reset">重置</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>

<script src="/src/layuiadmin/layui/layui.js?t=1"></script>

<script type="text/html" id="playerlist-bar">
  <button class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i><cite></cite></button>
</script>
<script>
  layui.use(['layer','table','form','jquery', 'laypage'],function () {
    var layer = layui.layer
        ,form = layui.form
        ,table = layui.table
            ,$ = layui.$
            ,laypage = layui.laypage;

    //用户表格初始化
    function playerList() {
      var userid = $.trim($('#userid').val());
      $.ajax({
        type: 'get',
        url: "<?php echo url('account.playerListData'); ?>",
        data: {'userid':userid},
        dataType: 'json',
        success: function (res) {
          var plist = $('#plist');
          plist.html('');
          if (res.code === 0) {
            content = '';
            $.each(res.data, function(k, v) {
              content+="<tr>" +
                      "<td>"+v.id+"</td>" +
                      "<td>"+v.userid+"</td>" +
                      "<td>"+v.roomname+"</td>" +
                      "<td>"+v.totalfee+"</td>" +
                      "<td>"+v.total_tax+"</td>" +
                      "<td>"+v.balance+"</td>" +
                      "<td>"+v.descript+"</td>" +
                      "</tr>"
            });

            plist.html(content);
            table.init('playerlist', {
              height:500
            });
          }
        }
      });
    }
    $('#search_user').on('click', function() {
      playerList();
    });
    playerList();
    var t1 = window.setInterval(playerList,1000*30);
    // playerList();
    // var t1 = window.setInterval(active,1000*5);

    table.on('tool(playerlist)', function(obj) {
      var data = obj.data //获得当前行数据
          ,layEvent = obj.event; //获得 lay-event 对应的值
          tr = obj.tr; //获得当前行 tr 的DOM对象
      if (layEvent === 'edit') {
        var userid = data.userid;
        var descript = data.descript;
        $('#edit_userid').val(userid);
        $('#edit_descript').val(descript);
        form.render();
        index2 = layer.open({
          type: 1,
          title: '编辑备注',
          shadeClose: true,
          shade: 0.8,
          content: $('#popEditPlayer')
        });
      }
    });
 //重置
    $('#edit_reset').on('click', function() {
      $('#edit_descript').val('');
    });

    //更新备注
    form.on('submit(player-edit)', function(data) {
      $.ajax({
        type: 'post',
        url: "<?php echo url('account.doPlayerEdit'); ?>",
        data: {
          'userid': $.trim(data.field.userid),
          'descript': $.trim(data.field.descript)
        },
        dataType: 'json',
        success: function (res) {
          if (res.code === 0) {
            layer.msg(res.msg, {icon: 6});
            //更新信息
            $(tr).find("td[data-field='descript'] div").html($.trim(data.field.descript));
            layer.close(index2);
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

