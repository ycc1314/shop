<?php /*a:2:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/order/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <style>
    .layui-btn .layui-icon {
        margin-right: 0;
    }

    .layui-form-pane .layui-form-label,
    .layui-form-pane .layui-input-inline {
        width: auto;
    }

    .view-data {
        height: 36px;
        line-height: 36px;
        display: inline-block;
        padding: 0 20px;
        border-style: solid;
        border-width: 1px;
        background-color: #fff;
        border-radius: 2px;
        border-color: #e6e6e6;
    }

    .table-body .layui-btn .iconfont {
        font-size: 17px !important;
    }

    .layui-card-body {
        background-color: #fff;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #e6e6e6;
    }

    .layui-tab-card>.layui-tab-title {
        background-color: #f9f9f9;
        border-bottom: none;
    }

    .layui-tab-content {
        padding: 0;
    }

    .layui-table,
    .layui-table-view {
        margin: 0;
    }

    #layui-btn-group-container .layui-btn {
        margin-right: 10px !important;
        margin-bottom: 10px !important;
    }

    @media screen and (max-width: 500px) {
        .layui-layer.layui-layer-page {
            width: 100% !important;
            overflow-x: scroll !important;
            left: 0 !important;
        }

        .layui-layer-title {
            width: 800px !important;
        }

        .layui-layer-content {
            width: 800px !important;
        }
    }
    .layui-layer-page .layui-layer-content{
        overflow: initial;
    }
</style>

<form class="layui-form seller-form" action="">
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">订单号：</label>
            <!-- <div class="layui-input-inline seller-inline-3"> -->
            <div class="layui-input-inline">
                <input type="text" name="order_id" placeholder="请输入订单号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">下单时间：</label>
            <div class="layui-input-inline">
                <input type="text" name="date" id="date" placeholder="开始时间 到 结束时间" autocomplete="off"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">订单类型：</label>
            <div class="layui-input-inline">
                <select name="type" id="type">
                    <option value="">请选择</option>
                    <option value="1">普通订单</option>
                    <option value="2">拼团订单</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">订单来源：</label>
            <div class="layui-input-inline">
                <select name="source" id="source">
                    <option value="">-- 全部 --</option>
                    <?php foreach($source as $key=>$vo): ?>
                    <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($vo); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">用户：</label>
            <div class="layui-input-inline">
                <input type="text" name="username" placeholder="用户名、昵称、手机" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">手机号：</label>
            <div class="layui-input-inline">
                <input type="tel" name="ship_mobile" placeholder="收货人手机号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-btn-group" id="layui-btn-group-container">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="*"><i
                    class="iconfont icon-chaxun"></i>筛选</button>
            <button class="layui-btn layui-btn-sm" id="pay-order-array"><i
                    class="iconfont icon-zhifu-01"></i>批量支付</button>
            <button class="layui-btn layui-btn-sm" id="cancel-order-array"><i
                    class="iconfont icon-cancel"></i>取消</button>
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="export-order"><i
                    class="iconfont icon-msnui-cloud-download" style="font-size: 20px !important;"></i>导出</button>
            <?php echo hook('orderExtBtn'); ?>
        </div>
    </div>
    <!-- <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">手机号：</label>
            <div class="layui-input-inline seller-inline-3">
                <input type="tel" name="ship_mobile" placeholder="收货人手机号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="*"><i class="iconfont icon-chaxun"></i>筛选</button>
            <button class="layui-btn layui-btn-sm" id="pay-order-array"><i class="iconfont icon-zhifu-01"></i>批量支付</button>
            <button class="layui-btn layui-btn-sm" id="cancel-order-array"><i class="iconfont icon-cancel"></i>取消</button>
            <button class="layui-btn layui-btn-sm"  lay-submit lay-filter="export-order"><i class="iconfont icon-msnui-cloud-download" style="font-size: 20px !important;"></i>导出</button>
            <?php echo hook('orderExtBtn'); ?>
        </div>
    </div> -->
</form>

<div class="table-body">
    <div class="layui-tab layui-tab-card" lay-filter="order-tab">
        <ul class="layui-tab-title">
            <li class="layui-this" lay-id="all">全部订单<span class="layui-badge layui-bg-gray"><?php echo htmlentities((isset($count['all']) && ($count['all'] !== '')?$count['all']:0)); ?></span></li>
            <li lay-id="payment">待支付<span class="layui-badge layui-bg-green"><?php echo htmlentities((isset($count['payment']) && ($count['payment'] !== '')?$count['payment']:0)); ?></span></li>
            <li lay-id="delivered">待发货<span class="layui-badge layui-bg-black"><?php echo htmlentities((isset($count['delivered']) && ($count['delivered'] !== '')?$count['delivered']:0)); ?></span></li>
            <li lay-id="receive">待收货<span class="layui-badge layui-bg-blue"><?php echo htmlentities((isset($count['receive']) && ($count['receive'] !== '')?$count['receive']:0)); ?></span></li>
            <li lay-id="evaluated">待评价<span class="layui-badge layui-bg-orange"><?php echo htmlentities((isset($count['evaluated']) && ($count['evaluated'] !== '')?$count['evaluated']:0)); ?></span></li>
            <li lay-id="cancel">已取消<span class="layui-badge layui-bg-gray"><?php echo htmlentities((isset($count['cancel']) && ($count['cancel'] !== '')?$count['cancel']:0)); ?></span></li>
            <li lay-id="complete">已完成<span class="layui-badge layui-bg-gray"><?php echo htmlentities((isset($count['complete']) && ($count['complete'] !== '')?$count['complete']:0)); ?></span></li>
        </ul>
        <div class="layui-tab-content">
            <table id="order" lay-data="{id:'order'}"></table>
        </div>
    </div>
</div>

<div id="exportOrder" style="display: none;">
    <form class="layui-form export-form" action="">
        <div class="layui-form-item">
            <div class="layui-margin-10">
                <blockquote class="layui-elem-quote layui-text">
                    请先选中或筛选要导出的订单
                </blockquote>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">任务名称：</label>
                <input type="text" name="taskname" lay-verify="title" style="width:200px;" placeholder="请输入任务名称"
                    autocomplete="off" class="layui-input">
            </div>
        </div>
    </form>
</div>
<script>
    var window_box, table;
    layui.use(['table', 'layer', 'laydate', 'form', 'element'], function () {
        var layer = layui.layer,
            $ = layui.jquery,
            laydate = layui.laydate,
            form = layui.form,
            element = layui.element,
            tables = layui.table,
            filter = {};

        //时间插件
        laydate.render({
            elem: '#date',
            range: '到',
            format: 'yyyy-MM-dd'
        });

        //获取订单数据
        table = layui.table.render({
            id: 'order',
            elem: '#order',
            height: 'full-181',
            cellMinWidth: '80',
            page: 'true',
            limit: '20',
            url: '<?php echo url("order/index"); ?>',
            method: 'post',
            response: {
                statusName: 'status',
                statusCode: 1
            },
            cols: [[
                { type: 'checkbox' },
				{ field: 'operating', title: '操作', width: 200, align: 'center' },
                { field: 'order_id_k', title: '订单号', width: 140, align: 'center' },
                { field: 'type', title: '订单类型', width: 90, align: 'center' },
                {
                    field: 'order_id', title: '打印', align: 'center', width: 100, templet: function (data) {
                        var html = '<a href="<?php echo url("order/print_tpl"); ?>?order_id=' + data.order_id + '&type=1" target="_blank">购</a>&nbsp;';
                        html += '<a href="<?php echo url("order/print_tpl"); ?>?order_id=' + data.order_id + '&type=2"  target="_blank">配</a>&nbsp;';
                        html += '<a href="<?php echo url("order/print_tpl"); ?>?order_id=' + data.order_id + '&type=3"  target="_blank">联</a>&nbsp;';
                        if (data.print) {
                            html += '<a href="javascript:void(0);" style="color: green;" onclick="printExpress(' + data.order_id + ')">递</a>';
                        } else {
                            html += '<a href="javascript:void(0);"  onclick="printExpress(' + data.order_id + ')">递</a>';
                        }
                        return html;
                    }
                },
                { field: 'ctime', title: '下单时间', width: 160, align: 'center' },
                { field: 'status_text', title: '订单状态', width: 90, align: 'center' },
                { field: 'after_sale_status', title: '售后状态', width: 150, align: 'center' },
                { field: 'username', title: '用户', width: 120, align: 'center' },
                { field: 'ship_mobile', title: '收货人手机号', width: 120, align: 'center' },
                { field: 'area_name', title: '收货地址', width: 110, align: 'center' },
                { field: 'pay_status', title: '支付状态', width: 90, align: 'center' },
                { field: 'ship_status', title: '发货状态', width: 90, align: 'center' },
                { field: 'order_amount', title: '订单总额', width: 100, align: 'center', templet: function (data) { return '￥' + data.order_amount } },
                { field: 'source', title: '订单来源', width: 130, align: 'center' },

            ]]
        });

        element.on('tab(order-tab)', function (data) {
            var type = this.getAttribute('lay-id');
            if (type === 'all') {
                filter = {};
            } else if (type === 'payment') {
                filter.order_unified_status = 1;
            } else if (type === 'delivered') {
                filter.order_unified_status = 2;
            } else if (type === 'receive') {
                filter.order_unified_status = 3;
            } else if (type === 'evaluated') {
                filter.order_unified_status = 4;
            } else if (type === 'cancel') {
                filter.order_unified_status = 7;
            } else if (type === 'complete') {
                filter.order_unified_status = 6;
            }
            var basefilter = $(".seller-form").serializeArray();
            $.each(basefilter, function (i, obj) {
                if (!filter.hasOwnProperty(obj.name)) {
                    filter[obj.name] = obj.value;
                }
            });
            table.reload({
                where: filter,
                page: { curr: 1 }
            });
        });

        //筛选条件
        form.on('submit(*)', function (data) {
            table.reload({
                where: data.field,
                page: { curr: 1 }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        //查看订单
        $(document).on('click', '.view-order', function () {
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("order/view"); ?>?id='+id, function(e){
                if(e.status){
                    window_box = layer.open({
                        type: 1,
                        title: '订单详情',
                        area: ['800px', '445px'], //宽高
                        content: e.data,
                        moveOut: true
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
        });

        //编辑订单
        $(document).on('click', '.edit-order', function () {
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("order/edit"); ?>?id='+id+"&order_type="+$(this).attr('data-type'), function(e){
                if(e.status) {
                    window_box = layer.open({
                        type: 1,
                        title: '编辑订单',
                        area: ['660px', '280px'], //宽高
                        content: e.data
                    });
                } else {
                    layer.msg(e.msg);
                }
            });
        });

        //保存编辑订单
        $(document).on('click', '.order-edit-btn', function () {
            var order_id = $("#order_id").val();
            var edit_type = $("#edit_type").val();
            var store_id = $("#store_id").val();
            var ship_area_id = $("input[name='ship_area_id']").val();
            var ship_address = $("#ship_address").val();
            var ship_name = $("#ship_name").val();
            var ship_mobile = $("#ship_mobile").val();
            var order_amount = $("#order_amount").val();
            var __Jshop_Token__ = $(".Jshop_Token:last").val();

            JsPost('<?php echo url("order/edit"); ?>', {
                'order_id': order_id,
                'edit_type': edit_type,
                'store_id': store_id,
                'ship_area_id': ship_area_id,
                'ship_address': ship_address,
                'ship_name': ship_name,
                'ship_mobile': ship_mobile,
                'order_amount': order_amount,
                __Jshop_Token__:__Jshop_Token__
            }, function(e){
                layer.close(window_box);
                layer.msg(e.msg, { time: 1300 }, function () {
                    table.reload();
                });
            });
        });

        //单个去支付订单页面展示
        $(document).on('click', '.pay-order', function () {
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("bill_payments/pay"); ?>?order_id='+id+"&type=1", function(e){
                if (e.status) {
                    window_box = layer.open({
                        type: 1,
                        title: '支付订单',
                        area: ['500px', '420px'], //宽高
                        content: e.data.tpl
                    });
                } else {
                    layer.msg(e.msg, { time: 1300 }, function () {
                        table.reload();
                    });
                }
            });
        });
        //多个去支付订单页面展示
        var pay_order_array = function () { //获取选中数据
            var checkStatus = tables.checkStatus('order'), data = checkStatus.data;
            var ids = '';
            $.each(data, function () {
                ids += this.order_id + ',';
            });
            ids = ids.substring(0, ids.length - 1);
            if (ids) {
                JsGet('<?php echo url("bill_payments/pay"); ?>?order_id='+ids+"&type=1", function(e){
                    if (e.status) {
                        window_box = layer.open({
                            type: 1,
                            title: '支付订单',
                            area: ['530px', '520px'], //宽高
                            content: e.data.tpl
                        });
                    } else {
                        layer.msg(e.msg, { time: 1300 }, function () {
                            table.reload();
                        });
                    }
                });
            } else {
                layer.msg('请勾选需要支付的订单');
            }
            return false;
        };
        $('#pay-order-array').on('click', function () {
            pay_order_array ? pay_order_array.call(this) : '';
            return false;
        });

        //去支付
        $(document).on('click', '.goto-pay', function () {
            var order_id = $("#input_order_id").val();
            var type = $("#input_type").val();
            var payment_code = $("#payment_code").val();
            var __Jshop_Token__ = $(".Jshop_Token:last").val();
            JsPost('<?php echo url("bill_payments/toPay"); ?>', {'order_id': order_id,
                'type': type,
                'payment_code': payment_code,
                __Jshop_Token__:__Jshop_Token__
            }, function(e){
                layer.close(window_box);
                layer.msg(e.msg, { time: 1300 }, function () {
                    table.reload();
                });
            });
            return false;
        });

        //发货页面
        $(document).on('click', '.ship-order', function () {
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("order/ship"); ?>?order_id='+id, function(e){
                if(e.status){
                    window_box = layer.open({
                        type: 1,
                        title: '订单发货',
                        area: ['800px', '500px'], //宽高
                        content: e.data
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
            return false;
        });

        //发货生成
        $(document).on('click', '.order-ship-btn', function () {
            var ship_data = [];
            var order_id = $("#order_id").val();
            var logi_no = $("#logi_no").val();
            var logi_code = $("#logi_code").val();
            var memo = $("#memo").val();
            var flag = true;
            $(".order-ship-nums").each(function () {
                var ship_num = $(this).val();
                var max = $(this).attr('max');
                var id = $(this).attr('data-id');
                if (ship_num > max || ship_num < 0) {
                    flag = false;
                    layer.msg('发货数量不符合真实情况');
                    return false;
                } else {
                    var item = [id, ship_num];
                    ship_data.push(item);
                }
            });
            if (flag) {
                JsPost('<?php echo url("order/ship"); ?>', {
                    'order_id': order_id,
                    'logi_no': logi_no,
                    'memo': memo,
                    'logi_code': logi_code,
                    'ship_data': ship_data
                }, function(e){
                    layer.close(window_box);
                    layer.msg(e.msg, { time: 1300 }, function () {
                        table.reload();
                    });
                });
            }
        });

        //取消订单
        $(document).on('click', '.cancel-order', function () {
            var id = $(this).attr('data-id');
            layer.confirm('确认取消订单号：' + id + ' 的订单吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function () {
                JsPost('<?php echo url("order/cancel"); ?>', {id: id}, function(e){
                    layer.msg(e.msg, { time: 1300 }, function () {
                        table.reload();
                    });
                });
            });
            return false;
        });

        //取消多个订单
        var cancel_order_array = function () { //获取选中数据
            var checkStatus = tables.checkStatus('order'), data = checkStatus.data;
            var ids = '';
            $.each(data, function () {
                ids += this.order_id + ',';
            });
            ids = ids.substring(0, ids.length - 1);
            if (ids) {
                layer.confirm('确认取消这些订单吗？', {
                    title: '提示', btn: ['确认', '取消'] //按钮
                }, function () {
                    JsPost('<?php echo url("order/cancel"); ?>', {id: ids}, function(e){
                        layer.msg(e.msg, { time: 1300 }, function () {
                            table.reload();
                        });
                    });
                });
            } else {
                layer.msg('请勾选要取消的订单');
            }
            return false;
        };
        $('#cancel-order-array').on('click', function () {
            cancel_order_array ? cancel_order_array.call(this) : '';
            return false;
        });

        //完成订单
        $(document).on('click', '.complete-order', function () {
            var id = $(this).attr('data-id');
            layer.confirm('确认设置订单号：' + id + ' 为完成吗？<br /><font style="color:#f00">完成订单后将不能再对订单进行任何操作。</font>', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function () {
                JsPost('<?php echo url("order/complete"); ?>', {id: id}, function(e){
                    layer.msg(e.msg, { time: 1300 }, function () {
                        table.reload();
                    });
                });
            });
        });

        //删除订单
        $(document).on('click', '.del-order', function () {
            var id = $(this).attr('data-id');
            layer.confirm('确认删除订单号：' + id + ' 的订单吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function () {
                JsPost('<?php echo url("order/del"); ?>', {id:id}, function(e){
                    layer.msg(e.msg, { time: 1300 }, function () {
                        table.reload();
                    });
                });
            });
        });

        //已发货的物流信息查看
        $(document).on('click', '.order-logistics', function () {
            var id = $(this).attr('data-id');
            JsGet("<?php echo url('order/logistics'); ?>?order_id=" + id, function (res) {
                if(res.status){
                    window_box = layer.open({
                        type: 1,
                        title: '物流信息',
                        area: ['700px', '400px'], //宽高
                        content: res.data
                    });
                }else{
                    layer.msg(res.msg);
                }
            })
        });

        //订单导出
        layui.form.on('submit(export-order)', function (data) {
            var tabStatus = filter.order_unified_status;
            layer.open({
                type: 1,
                title: '订单导出',
                area: ['400px', '290px'], //宽高
                btn: ['确定', '取消'],
                content: $("#exportOrder").html(),
                yes: function () {
                    //判断是否有选中
                    var checkStatus = layui.table.checkStatus('order');
                    var checkData = checkStatus.data;
                    var length = checkStatus.data.length;
                    var selectIds = '';
                    var ids = [];
                    if (length) {
                        $.each(checkData, function (i, obj) {
                            ids.push(obj.order_id);
                        });
                    }
                    var filter = $(".seller-form").serialize();
                    filter += '&order_ids=' + ids + '&order_unified_status=' + tabStatus;

                    $(".export-form:last").append("<input type='hidden' name='filter' value='" + filter + "'>");
                    var data = $(".export-form:last").serializeArray();

                    data.push({ 'name': 'model', 'value': 'Orders' });
                    JsPost("<?php echo url('Ietask/export'); ?>", data, function (res) {
                        layer.msg(res.msg, { time: 1500 }, function () {
                            if (res.status) {
                                table.reload();
                                layer.closeAll();
                            }
                        });
                    }
                    );
                }, btn2: function () {
                    layer.closeAll();
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        /**
         * 打印快递单
         * @param order_id
         */
        printExpress = function (order_id) {
            if (!order_id) {
                layer.msg("订单号不存在！");
                return false;
            }
            JsGet('<?php echo url("order/print_form"); ?>?order_id=' + order_id, function (e) {
                if ((e.hasOwnProperty('status') && !e.status) || (e.hasOwnProperty('code') && e.code == 0)) {
                    layer.msg(e.msg); return false;
                }
                if(e.status){
                    window_box = layer.open({
                        type: 1,
                        title: '选择快递',
                        area: ['450px', '305px'], //宽高
                        content: e.data,
                        btnAlign: 'c',
                        btn: ['直接打单', '只获取单号', '只打单', '关闭'],
                        yes: function (index, layero) {
                            var data = getFormData();
                            if (data) {
                                var url = "<?php echo url('order/print_tpl'); ?>?type=4&bt=1&" + data;
                                window.open(url, "_blank");
                            }
                        },
                        btn2: function (index, layero) {
                            var data = getFormData();
                            if (data) {
                                var url = "<?php echo url('order/print_tpl'); ?>?type=4&bt=2&" + data;
                                JsGet(url, function (res) {
                                    layer.msg(res.msg, { time: 1500 }, function () {
                                        if (res.status) {
                                            table.reload();
                                            layer.closeAll();
                                        }
                                    });
                                });
                            }
                        },
                        btn3: function (index, layero) {
                            var data = getFormData();
                            if (data) {
                                var url = "<?php echo url('order/print_tpl'); ?>?type=4&bt=3&" + data;
                                window.open(url, "_blank");
                            }
                        }
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
        };
        <?php echo hook('orderExtJs'); ?>

        //保存卖家备注
        $(document).on('click', '.mark-save', function () {
            var mark = $("#mark").val();
            var id = $("#mark-order-id").val();
            if (mark.length > 500) {
                layer.msg('备注内容不能大于500字');
            } else {
                JsPost('<?php echo url("order/saveMark"); ?>', {
                    'mark': mark,
                    'id': id
                }, function(e){
                    layer.msg(e.msg, { time: 1500 }, function () {
                        layer.close(window_box);
                    });
                });
            }
        });
    });

</script>

</div>
</body>
</html>
