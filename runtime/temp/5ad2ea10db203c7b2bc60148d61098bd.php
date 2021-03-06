<?php /*a:1:{s:69:"C:\Users\Administrator\Desktop\tp5\application\index\view\layout.html";i:1554870932;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>联运管理系统</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/src/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/src/layuiadmin/style/admin.css" media="all">
</head>
<body class="layui-layout-body">
  
  <div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <!-- 头部区域 -->
        <ul class="layui-nav layui-layout-left">
          <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
              <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
          </li>
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" layadmin-event="refresh" title="刷新">
              <i class="layui-icon layui-icon-refresh-3"></i>
            </a>
          </li>
          <li class="layui-nav-item" lay-unselect data-name="template-index">
            <a href="javascript:;" title="分享" lay-href="<?php echo url('template.index'); ?>">
              <i class="layui-icon layui-icon-share"></i><cite>&nbsp;推广分享</cite>
            </a>
          </li>
        </ul>
        <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;">
              <cite id="username"><?php echo htmlentities($proxyid); ?></cite>
            </a>
            <dl class="layui-nav-child">
              <!--<dd><a lay-href="set/user/info.html">基本资料</a></dd>-->
              <!--<dd><a lay-href="set/user/password.html">修改密码</a></dd>-->
              <!--<hr>-->
              <dd style="text-align: center;"><a href="<?php echo url('logout'); ?>">退出</a></dd>
            </dl>
          </li>
          <!--<li class="layui-nav-item" lay-unselect>-->
            <!--<a lay-href="app/message/index.html" layadmin-event="message" lay-text="消息中心">-->
              <!--<i class="layui-icon layui-icon-notice"></i>  -->
              <!---->
              <!--&lt;!&ndash; 如果有新消息，则显示小圆点 &ndash;&gt;-->
              <!--<span class="layui-badge-dot"></span>-->
            <!--</a>-->
          <!--</li>-->
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="theme">
              <i class="layui-icon layui-icon-theme"></i>
            </a>
          </li>
          <li class="layui-nav-item layui-hide-xs" lay-unselect>
            <a href="javascript:;" layadmin-event="fullscreen">
              <i class="layui-icon layui-icon-screen-full"></i>
            </a>
          </li>

        </ul>
      </div>
      
      <!-- 侧边菜单 -->
      <div class="layui-side layui-side-menu">
        <div class="layui-side-scroll">
          <div class="layui-logo" lay-href="<?php echo url('home'); ?>">
            <span>联运管理系统</span>
          </div>
          
          <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item layui-nav-itemed">
              <a href="javascript:;" lay-href="<?php echo url('home'); ?>" lay-tips="主页" lay-direction="2">
                <i class="layui-icon layui-icon-home"></i>
                <cite>主页</cite>
              </a>
            </li>
            <li data-name="account" class="layui-nav-item">
              <a href="javascript:;" lay-tips="账号管理" lay-direction="2">
                <i class="layui-icon layui-icon-list"></i>
                <cite>账号管理</cite>
              </a>
              <dl class="layui-nav-child">

                <dd>
                  <a lay-href="<?php echo url('account.proxyList'); ?>">代理列表</a>
                </dd>
                <dd data-name="workorder">
                  <a lay-href="<?php echo url('account.playerList'); ?>">玩家列表</a>
                </dd>
                <?php if($addproxy == 1): ?>
                <dd>
                  <a lay-href="<?php echo url('account.addProxy'); ?>">新增代理</a>
                </dd>
                <?php endif; ?>
              </dl>
            </li>
            <li data-name="detail" class="layui-nav-item">
              <a href="javascript:;" lay-tips="明细查询" lay-direction="2">
                <i class="layui-icon layui-icon-list"></i>
                <cite>明细查询</cite>
              </a>
              <dl class="layui-nav-child">
                <dd><a lay-href="<?php echo url('detail.index'); ?>">玩家游戏明细</a></dd>
              </dl>
            </li>

            <li data-name="withdraw" class="layui-nav-item">
              <a href="javascript:;" lay-tips="提现管理" lay-direction="2">
                <i class="layui-icon layui-icon-list"></i>
                <cite>提现管理</cite>
              </a>
              <dl class="layui-nav-child">
                <dd data-name="withdraw-list">
                  <a lay-href="<?php echo url('withdraw.list'); ?>">提现记录</a>
                </dd>
                <dd data-name="withdraw-account">
                  <a lay-href="<?php echo url('withdraw.set'); ?>">结算账号</a>
                </dd>

                <dd data-name="withdraw-get">
                  <a lay-href="<?php echo url('withdraw.apply'); ?>">提现申请</a>
                </dd>

              </dl>
            </li>
            <li data-name="set" class="layui-nav-item">
              <a href="javascript:;" lay-tips="安全设置" lay-direction="2">
                <i class="layui-icon layui-icon-list"></i>
                <cite>安全设置</cite>
              </a>
              <dl class="layui-nav-child">
                <dd>
                  <a lay-href="<?php echo url('safeset.index'); ?>">安全设置</a>
                </dd>
              </dl>
            </li>
          </ul>
        </div>
      </div>

      <!-- 页面标签 -->
      <div class="layadmin-pagetabs" id="LAY_app_tabs">
        <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-down">
          <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
            <li class="layui-nav-item" lay-unselect>
              <a href="javascript:;"></a>
              <dl class="layui-nav-child layui-anim-fadein">
                <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
          <ul class="layui-tab-title" id="LAY_app_tabsheader">
            <li lay-id="<?php echo url('home'); ?>" lay-attr="<?php echo url('home'); ?>" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
          </ul>
        </div>
      </div>
      
      
      <!-- 主体内容 -->
      <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show">
          <iframe src="<?php echo url('home'); ?>" frameborder="0" class="layadmin-iframe"></iframe>
        </div>
      </div>
      
      <!-- 辅助元素，一般用于移动设备下遮罩 -->
      <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
  </div>

  <script src="/src/layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: '/src/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use('index');
  </script>

</body>
</html>


