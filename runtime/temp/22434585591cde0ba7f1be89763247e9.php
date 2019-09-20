<?php /*a:2:{s:76:"/Users/seven/feisujie-master/shop/application/manage/view/index/welcome.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <script src="/static/lib/echarts/build/dist/echarts.js"></script>
<div class="layadmin-tabsbody-item layui-show">

    <div class="layui-row layui-col-space15">
            <div class="layui-col-md8">
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-md6">
                        <div class="layui-card">
                            <div class="layui-card-header">
                                <i class="iconfont icon-caozuo"></i>快捷操作
                            </div>
                            <div class="layui-card-body">
                                <div class="layui-carousel layadmin-carousel layadmin-shortcut">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('goods/index'); ?>">
                                                <i class="iconfont icon-goods"></i>
                                                <cite>商品</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('order/index'); ?>">
                                                <i class="iconfont icon-dingdan1"></i>
                                                <cite>订单</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('user/index'); ?>">
                                                <i class="iconfont icon-user"></i>
                                                <cite>会员</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('notice/index'); ?>">
                                                <i class="iconfont icon-gonggao"></i>
                                                <cite>公告</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('promotion/index'); ?>">
                                                <i class="iconfont icon-promotion"></i>
                                                <cite>促销</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('ship/index'); ?>">
                                                <i class="iconfont icon-bangzhupeisongfuwu"></i>
                                                <cite>配送</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('payments/index'); ?>">
                                                <i class="iconfont icon-zhifu-01"></i>
                                                <cite>支付方式</cite>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs3">
                                            <a href="javascript:;" lay-href="<?php echo url('setting/index'); ?>">
                                                <i class="iconfont icon-review"></i>
                                                <cite>平台设置</cite>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layui-col-md6">
                        <div class="layui-card">
                            <div class="layui-card-header">
                                <i class="iconfont icon-daiban"></i>待办事项
                            </div>
                            <div class="layui-card-body">
                                <div class="layui-carousel layadmin-carousel layadmin-backlog">
                                    <ul class="layui-row layui-col-space10 layui-this">
                                        <li class="layui-col-xs6">
                                            <a href="javascript:;" lay-href="<?php echo url('order/index'); ?>" class="layadmin-backlog-body">
                                                <h3>待支付</h3>
                                                <p><cite><?php echo htmlentities($unpaid_count); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs6">
                                            <a href="javascript:;" lay-href="<?php echo url('order/index'); ?>" class="layadmin-backlog-body">
                                                <h3>待发货</h3>
                                                <p><cite><?php echo htmlentities($unship_count); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs6">
                                            <a href="javascript:;" lay-href="<?php echo url('bill_aftersales/index'); ?>" class="layadmin-backlog-body">
                                                <h3>待售后</h3>
                                                <p><cite><?php echo htmlentities($after_sales_count); ?></cite></p>
                                            </a>
                                        </li>
                                        <li class="layui-col-xs6">
                                            <a href="javascript:;" lay-href="<?php echo url('goods/index'); ?>" class="layadmin-backlog-body">
                                                <h3>库存报警</h3>
                                                <p><cite><?php echo htmlentities($goods_statics['totalWarn']); ?></cite></p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <i class="iconfont icon-gonggao"></i>版本信息
                    </div>

                    <div class="layui-card-body layui-text" id="view">

                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <i class="iconfont icon-dingdan1"></i>订单统计
                    </div>
                    <div class="layui-card-body">
                        <div id="graphic" class="">
                            <div id="main" class="main" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <i class="iconfont icon-user"></i>会员统计
                    </div>
                    <div class="layui-card-body">
                        <div id="graphics" class="">
                            <div id="users" class="main" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <i class="iconfont icon-dingdan1"></i>最近登录
                    </div>

                    <div class="layui-card-body" id="loginLog"></div>

                </div>
            </div>

            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header loading-more">
                        <div><i class="iconfont icon-dingdan1"></i>操作日志</div>
                        <a href="<?php echo url('OperationLog/index'); ?>">查看更多>></a>
                    </div>
                    <div class="layui-card-body" id="oplog-table"></div>
                </div>
            </div>

            <script id="demo" type="text/html">
                <table class="layui-table">
                    <tbody>
                        {{# for(var i = 0; i
                        < d.length; i++){ }} <tr>
                            <td><i>{{i+1}}</i><a class="notice" href="javascript:;" id="{{d[i].id}}">{{ d[i].title }}</a></td>
                            </tr>
                            {{# } }} {{# if(d.length === 0){ }} 没有最新的数据 {{# } }}
                    </tbody>
                </table>
            </script>


            <script id="log" type="text/html">

                {{# if(d.length === 0){ }} 没有历史记录 {{# }else{ }}
                <table class="layui-table">
                    <thead>
                        <tr>
                            <th>状态</th>
                            <th>记录时间</th>
                            <th>登录IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{# layui.each(d, function(index, item){ }}
                        <tr>
                            <td>{{ item.state }}</td>
                            <td>{{ item.ctime }}</td>
                            <td>{{ item.ip }}</td>
                        </tr>
                        {{# }); }}
                    </tbody>
                </table>
                {{# } }}
            </script>

            <script id="version" type="text/html">
                <table class="layui-table">
                    <colgroup>
                        <col width="100">
                        <col>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>产品名称</td>
                            <td>
                                {{ d.product }}
                            </td>
                        </tr>
                        <tr>
                            <td>当前版本</td>
                            <td>
                                {{ d.version }} <a href="https://gitee.com/hnjihai/jshop_mall" target="_blank" style="padding-left: 15px;">更新日志</a>
                            </td>
                        </tr>
                        <tr>
                            <td>是否授权</td>
                            <td>
                                {{# if(d.is_authorization ==true){ }}
                                <a href="https://www.jihainet.com/" style="color: green;" target="_blank">已授权</a> {{# }else{ }}
                                <a href="https://www.jihainet.com/" style="color: red;" target="_blank">未授权</a> {{# } }}
                            </td>
                        </tr>
                        <tr>
                            <td>产品授权</td>
                            <td style="padding-bottom: 0;">
                                <div class="layui-btn-container">
                                    {{# if(d.is_authorization ==true){ }}
                                    <a href="https://www.jihainet.com" target="_blank" class="layui-btn  layui-btn-bg">下载更新</a> {{# }else{ }}
                                    <a href="https://www.jihainet.com/" target="_blank" class="layui-btn layui-btn-danger  layui-btn-bg">获取授权</a>
                                    <a href="https://www.jihainet.com/" target="_blank" class="layui-btn  layui-btn-bg">立即下载</a> {{# } }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </script>


            <script id="oplog" type="text/html">

                {{# if(d.length === 0){ }} 没有操作记录 {{# }else{ }}
                <table class="layui-table">
                    <thead>
                        <tr>
                            <th>操作员</th>
                            <th>操作时间</th>
                            <th>操作内容</th>
                            <th>操作IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{# layui.each(d, function(index, item){ }}
                        <tr>
                            <td>{{ item.username }}</td>
                            <td>{{ item.ctime }}</td>
                            <td>{{ item.desc }}</td>
                            <td>{{ item.ip }}</td>
                        </tr>
                        {{# }); }}
                    </tbody>
                </table>
                {{# } }}
            </script>


            <script type="text/javascript">
                layui.use(['laytpl', 'layer'], function() {
                    var $ = layui.$,
                        laytpl = layui.laytpl,
                        layer = layui.layer;
                    $.get("<?php echo url('manage/administrator/getVersion'); ?>", function(data) {
                        var getTpl = version.innerHTML,
                            view = document.getElementById('view');
                        laytpl(getTpl).render(data.data, function(html) {
                            view.innerHTML = html;
                        });
                    });


                    //获取历史登录记录
                    $.get("<?php echo url('manage/User/userLogList',array('state'=>1)); ?>", function(data) {
                        var getTpl = log.innerHTML,
                            view = document.getElementById('loginLog');
                        laytpl(getTpl).render(data.data, function(html) {
                            view.innerHTML = html;
                        })
                    });
                    JsGet("<?php echo url('manage/OperationLog/getLastLog'); ?>", function(data) {
                        var getTpl = oplog.innerHTML,
                            view = document.getElementById('oplog-table');
                        laytpl(getTpl).render(data.data, function(html) {
                            view.innerHTML = html;
                        })
                    });
                });
                // 路径配置
                require.config({
                    paths: {
                        echarts: '/static/lib/echarts/build/dist'
                    }
                });
                require(
                    ['echarts', 'echarts/chart/line'],
                    function(ec) {
                        var myChart = ec.init(document.getElementById('main'));
                        var option = {
                            title: {
                                text: '最近7天订单量统计'
                            },
                            tooltip: {
                                show: true
                            },
                            legend: {},
                            yAxis: [{
                                type: 'value'
                            }],
                            xAxis: [],
                            series: []
                        };
                        $.get('<?php echo url("order/statistics"); ?>').done(function(data) {
                            myChart.setOption({
                                legend: data.legend,
                                xAxis: data.xAxis,
                                series: data.series
                            });
                        });
                        myChart.setOption(option);
                    }
                );
                require(
                    [
                        'echarts',
                        'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
                    ],


                    function(ec) {
                        // 基于准备好的dom，初始化echarts图表
                        var myChart = ec.init(document.getElementById('users'));

                        var option = {

                            tooltip: {
                                show: true
                            },
                            legend: {},
                            xAxis: [],
                            yAxis: [],
                            series: []
                        };
                        $.get('<?php echo url("user/statistics"); ?>').done(function(data) {
                            myChart.setOption({
                                legend: data.legend,
                                xAxis: data.xAxis,
                                series: data.series
                            });
                        });
                        // 为echarts对象加载数据
                        myChart.setOption(option);
                    }
                );
            </script>
        </div>
</div>
<style>
    .loading-more {
        overflow: hidden;
    }

    .loading-more>div {
        display: inline-block;
    }

    .loading-more a {
        float: right;
        font-size: 12px;
        margin-top: 5px;
    }
</style>

</div>
</body>
</html>
