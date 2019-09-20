<?php /*a:3:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/index/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;s:74:"/Users/seven/feisujie-master/shop/application/manage/view/common/menu.html";i:1567760372;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities($shop_name); ?>管理平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="/static/css/iconfont.css" media="all"/>
    <!-- <link rel="stylesheet" type="text/css" href="/static/css/iconfont2.css"/> -->

    <link rel="stylesheet" href="/static/lib/layuiadmin/layui/css/layui.css">
    <link rel="stylesheet" href="/static/lib/layuiadmin/style/admin.css" media="all">

    <link rel="stylesheet" href="/static/lib/layuiadmin/layui/css/layui.seller.css">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css"/>
    <script src="/static/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/lib/layuiadmin/layui/layui.js"></script>

    <script>
        <!-- 定义全局变量 -->
        var Jshop_Host = "<?php echo htmlentities($jshopHost); ?>";
        var Jshop_Image = "<?php echo url('images/uploadImage'); ?>";
        var manage_Image = "<?php echo url('images/manage'); ?>";
    </script>
    <script src="/static/js/jshop.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/js/ue/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/js/ue/ueditor.all.min.js"> </script>
</head>
<body>
<div class="layui-fluid">
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities($shop_name); ?>管理平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/lib/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/lib/layuiadmin/style/admin.css" media="all">
	<link rel="stylesheet" type="text/css" href="/static/css/iconfont-none.css"/ media="all">
    <link rel="stylesheet" type="text/css" href="/static/css/iconfont.css"/ media="all">
    <!-- <link rel="stylesheet" type="text/css" href="/static/css/iconfont2.css"/> -->
    <link rel="stylesheet" href="/static/lib/layuiadmin/layui/css/layui.seller.css">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css"/>

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
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="/" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="note">
                        <i class="layui-icon layui-icon-note"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item manage" lay-unselect>
                    <a href="javascript:;">
                        <cite><?php echo session('manage.username'); ?></cite>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a lay-href="<?php echo url('Administrator/information'); ?>">个人中心</a></dd>
                        <dd><a lay-href="<?php echo url('index/clearCache'); ?>">清除缓存</a></dd>
                        <hr>
                        <dd><a data-href="<?php echo url('Common/logout'); ?>"  layadmin-event="logout">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

        <!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo" lay-href="<?php echo url('Index/welcome'); ?>">
                    <span><?php echo htmlentities($shop_name); ?></span>
                </div>
                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
    <li data-name="home" class="layui-nav-item layui-nav-itemed">
        <a class="" lay-href="<?php echo url('index/welcome'); ?>" href="javascript:;" lay-tips="首页" lay-direction="2" ><i class="iconfont">&#xe651;</i>首页</a>
    </li>
    <?php if($menu): foreach($menu as $k=>$v): ?>
    <li data-name="<?php echo strtolower($v['code']); ?>" class="layui-nav-item">
        <?php if(isset($v['children']) && !empty($v['children'])): ?>
            <a class="menu-icon-<?php echo strtolower($v['code']); ?>" href="javascript:;" lay-tips="<?php echo htmlentities($v['name']); ?>"  lay-direction="2">
                <i class="iconfont icon-none icon-<?php echo strtolower($v['code']); ?>"></i><?php echo htmlentities($v['name']); ?>
            </a>

            <dl class="layui-nav-child">
                <?php foreach($v['children'] as $x=>$y): ?>
                <dd data-name="<?php echo strtolower($v['code']); ?>">
                    <?php if(isset($y['children']) && !empty($y['children'])): ?>
                        <a href="javascript:;" href="javascript:;" style="padding-left: 44px;"><?php echo htmlentities($y['name']); ?></a>
                        <dl class="layui-nav-child">
                            <?php foreach($y['children'] as $a=>$b): ?>
                            <dd data-name="<?php echo strtolower($b['code']); ?>" class="<?php if($b['selected']): ?> layui-this<?php endif; ?>">
                                <a lay-href="<?php echo htmlentities($b['url']); ?>"><?php echo htmlentities($b['name']); ?></a>
                            </dd>
                            <?php endforeach; ?>
                        </dl>
                    <?php else: ?>
                        <a href="javascript:;" lay-href="<?php echo htmlentities($y['url']); ?>" style="padding-left: 44px;"><?php echo htmlentities($y['name']); ?></a>
                    <?php endif; ?>
                </dd>
                <?php endforeach; ?>
            </dl>
        <?php else: ?>
            <a class="menu-icon-<?php echo strtolower($v['code']); ?>" lay-href="<?php echo htmlentities($v['url']); ?>" lay-tips="<?php echo htmlentities($v['name']); ?>"  lay-direction="2">
                <i class="iconfont icon-none icon-<?php echo strtolower($v['code']); ?>"></i><?php echo htmlentities($v['name']); ?>
            </a>
        <?php endif; ?>

    </li>
    <?php endforeach; ?>
    <?php endif; ?>
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
                    <li lay-id="<?php echo url('Index/welcome'); ?>" lay-attr="<?php echo url('Index/welcome'); ?>" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>

        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <iframe src="<?php echo url('Index/welcome'); ?>" frameborder="0" class="layadmin-iframe"></iframe>
            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            <p>吉海科技 © jihainet.com - 版权所有</p>
            <a href="https://bbs.jihainet.com/" target="_blank">问题请求|产品建议请上吉海论坛</a>
            <a href="https://www.kancloud.cn/jihainet/jshop_operate" target="_blank">《使用手册》</a>
        </div>
        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>

</div>

<script src="/static/lib/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/static/lib/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('index');
</script>
</body>
</html>



</div>
</body>
</html>
