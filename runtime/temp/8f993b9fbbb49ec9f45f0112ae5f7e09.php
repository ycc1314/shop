<?php /*a:2:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/hooks/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <form class="layui-form seller-form" action="">

    <div class="layui-form-item">

        <div class="layui-inline">
            <label class="layui-form-label seller-inline-2">钩子名称：</label>
            <div class="layui-input-inline seller-inline-4">
                <input type="text" name="name" lay-verify="title" placeholder="请输入钩子名称关键字" autocomplete="off"
                       class="layui-input">
            </div>
        </div>

        <div class="layui-inline">
            <button type="button" class="layui-btn layui-btn-sm" lay-submit lay-filter="hooks-search"><i
                    class="iconfont icon-chaxun"></i>筛选
            </button>
            <button type="button" class="layui-btn layui-btn-sm add-hooks"><i class="layui-icon">&#xe608;</i> 添加
            </button>
        </div>

    </div>

</form>

<div class="table-body">
    <table id="hooksTable" lay-filter="hooksTable"></table>
</div>

<script>
    layui.use(['table', 'form', 'layer', 'laydate'], function () {
        var layer = layui.layer, table = layui.table, form = layui.form, date = layui.laydate;
        //执行渲染
        table.render({
            elem: '#hooksTable', //指定原始表格元素选择器（推荐id选择器）
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit: '20',
            id: 'hooksTable',
            url: "<?php echo url('hooks/index'); ?>",
            cols: [[ //标题栏
                {type: 'numbers'},
                {field: 'name', title: '编码', align: 'center', width: 150},
                {field: 'description', title: '钩子描述', width: 200},
                {
                    field: 'type', sort: true, title: '类型', align: 'center', templet: function (data) {
                        if (data.type == '1') {
                            return '控制器';
                        } else {
                            return '视图';
                        }
                    }, width: 150
                },
                {field: 'addons', sort: true, title: '挂载插件', align: 'center'},
                {width: 150, title: '操作', align: 'center', toolbar: '#hooksBar'}
            ]]
        });

        //search
        date.render({
            elem: '#utime'
        });

        form.on('submit(hooks-search)', function (data) {
            layui.table.reload('hooksTable', {
                where: data.field
                , page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        $(document).on('click', '.add-hooks', function () {
            JsGet("<?php echo url('hooks/add'); ?>", function (e) {
                if (e.status) {
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: ['380px', '400px'],
                        title: '添加钩子'
                    });
                }else{
                    layer.msg(e.msg);
                }
            })
        });

        //ajax提交商品的添加
        form.on('submit(add-hooks)', function (data) {
            JsPost("<?php echo url('hooks/add'); ?>", data.field, function (res) {
                if (res.status) {
                    layer.close(window.box);
                    layer.msg(res.msg, {time: 1300}, function () {
                        table.reload('hooksTable');
                    });
                } else {
                    layer.msg(res.msg);
                }
            })
        });

        form.on('submit(hooks-edit)', function (data) {
            JsPost("<?php echo url('hooks/edit'); ?>", data.field, function (res) {
                if (res.status) {
                    layer.close(window.box);
                    layer.msg(res.msg, {time: 1300}, function () {
                        table.reload('hooksTable');
                    });
                } else {
                    layer.msg(res.msg, {time: 1300});
                }
            })
        });

        //监听工具条
        table.on('tool(hooksTable)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            if (layEvent === 'del') { //删除
                layer.confirm('真的要删除么', {icon: 3}, function (index) {
                    JsGet("<?php echo url('hooks/del'); ?>?id=" + data.id, function (res) {
                        if (res.status) {
                            obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            layer.close(index);//向服务端发送删除指令
                        }
                        layer.msg(res.msg);
                    })
                });
            } else if (layEvent === 'edit') { //编辑
                JsGet("<?php echo url('hooks/edit'); ?>?id=" + data.id, function (e) {
                    if (e.status) {
                        window.box = layer.open({
                            type: 1,
                            content: e.data,
                            area: ['380px', '400px'],
                            title: '编辑钩子'
                        })
                    }else{
                        layer.msg(e.msg);
                    }
                })
            }
        });
    })
</script>
<script type="text/html" id="hooksBar">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

</div>
</body>
</html>
