<?php /*a:2:{s:77:"/Users/seven/feisujie-master/shop/application/manage/view/payments/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <!--<div class="layui-form seller-form"  action="" >
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">支付名称：</label>
            <div class="layui-input-inline seller-inline-3">
                <select name="code" lay-verify="">
                    <option value=""></option>
                    <?php if(is_array($paymentList) || $paymentList instanceof \think\Collection || $paymentList instanceof \think\Paginator): $i = 0; $__LIST__ = $paymentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($vo['code']); ?>"><?php echo htmlentities($vo['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">支付状态：</label>
            <div class="layui-input-inline seller-inline-2">
                <select name="status" lay-verify="">
                    <option value=""></option>
                    <option value="1">启用</option>
                    <option value="2">禁用</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="payments-search"><i class="iconfont icon-chaxun"></i>筛选</button>
        </div>
    </div>
</div>-->
<style>
    @media screen and (max-width: 500px) {
        .layui-layer.layui-layer-page {
            width: 100% !important;
            overflow: hidden !important;
            left: 0 !important;
        }

        .layui-layer-title {
            width: 100% !important;
            box-sizing: border-box;
        }

        .layui-layer-content {
            width: 100% !important;
        }

    }
</style>
<div class="table-body">
    <table id="paymentsSellerTable" lay-filter="paymentsSellerTable"></table>
</div>
<script>
    layui.use(['table', 'form', 'layer'], function () {
        var table = layui.table, form = layui.form, layer = layui.layer;
        //第一个实例
        table.render({
            elem: '#paymentsSellerTable', //指定原始表格元素选择器（推荐id选择器）
            height: 'full-150',
            cellMinWidth: '80',
            id: 'paymentsSellerTable',
            url: "<?php echo url('payments/index'); ?>",
            cols: [[ //表头
                { type: 'numbers' },
                { field: 'name', title: '支付方式名称', align: 'center', width: 300 },
                { field: 'code', title: '支付类型编码', align: 'center' },
                { field: 'is_online', title: '类型', align: 'center', width: 150 },
                { field: 'status', title: '状态', sort: true, align: 'center', width: 150, templet: '#status', unresize: true },
                { field: 'sort', title: '排序', align: 'center', width: 100 },
                { width: 150, title: '操作', align: 'center', toolbar: '#payments' }
            ]]
        });

        form.on('submit(payments-search)', function (data) {
            table.reload('paymentsSellerTable', {
                where: data.field
                , page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        //监听表单提交  (edit)
        form.on('submit(edit-payments)', function (data) {
            JsPost("<?php echo url('payments/edit'); ?>", data.field, function(res){
                if(res.status == true){
                    layer.close(window.box);
                    layer.msg(res.msg, {time: 1300}, function(){
                        table.reload('paymentsSellerTable');
                    });
                }else{
                    layer.msg(res.msg);
                }
            });
        });

        //监听 操作状态
        form.on('switch(status)', function (obj) {
            JsPost("<?php echo url('Payments/changeStatus'); ?>", { id: this.value, status: obj.elem.checked }, function (res) {
                layer.msg(res.msg);
            });
        });

        //监听工具条
        table.on('tool(paymentsSellerTable)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的DOM对象
            if (layEvent === 'edit') { //编辑
                JsGet("<?php echo url('payments/edit'); ?>?code="+data.code, function(res){
                    if (res.status) {
                        window.box = layer.open({
                            type: 1,
                            content: res.data,
                            area: ['500px', '500px'],
                            title: '编辑支付方式',
                            btn: ['保存', '取消'],
                            yes: function (index, layero) {
                                //保存支付方式
                                JsPost("<?php echo url('payments/edit'); ?>", $('#payment_form').serialize(), function(res){
                                    if (res.status){
                                        layer.msg(res.msg);
                                        layer.close(window.box);
                                        layer.msg(res.msg, { time: 1300 }, function () {
                                            table.reload('paymentsSellerTable');
                                        });
                                    }else{
                                        layer.msg(res.msg);
                                    }
                                });
                            }
                        });
                    } else {
                        layer.msg(res.msg);
                    }
                });
            }
        });
    });
</script>

<script type="text/html" id="status">
    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="status" {{ d.status == 1 ? 'checked' : '' }}>
</script>

<script type="text/html" id="payments">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
</script>
</div>
</body>
</html>
