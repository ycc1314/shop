<?php /*a:2:{s:82:"/Users/seven/feisujie-master/shop/application/manage/view/administrator/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
<form class="layui-form seller-form" action="">
    <div class="layui-form-item">
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="role-add"><i class="layui-icon">&#xe608;</i>添加</button>
        </div>
    </div>
</form>

<div class="table-body">
    <table id="userTable" lay-filter="test"></table>
</div>

<script>
    layui.use(['form', 'layedit', 'laydate', 'table'], function () {
        var userTables = layui.table.render({
            elem: '#userTable',
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit: '20',
            url: "<?php echo url('administrator/index'); ?>?_ajax=1",
            id: 'userTable',
            cols: [[
                { type: 'numbers' },
                { field: 'username', width: 100, title: '账号' },
                { field: 'mobile', title: '手机号码' },
                { field: 'nickname', title: '昵称' },
                { field: 'role_name', title: '角色' },
                {
                    field: 'operating', title: '操作', width: 250, align: 'center', templet: function (data) {
                        var html = '';
                        html += '<a class="layui-btn layui-btn-xs option-edit" data-id="' + data.id + '">编辑</a>';
                        html += '<a class="layui-btn layui-btn-xs option-del layui-btn-danger" data-id="' + data.id + '">删除</a>';
                        return html;
                    }
                },
            ]]
        });
        //监听form提交  (add)
        layui.form.on('submit(role-add)', function (data) {
            JsGet('<?php echo url("administrator/add"); ?>', function (tpl) {
                layer.open({
                    type: 1,
                    area: ['500px', '350px'],
                    data: '',
                    title: '添加管理员',
                    content: tpl.data,
                    btn: ['保存', '关闭'],
                    yes: function (index, layero) {
                        var thedata = $('#edit_form').serialize();
                        JsPost('<?php echo url("administrator/add"); ?>', thedata, function (re) {
                            if (re.status) {
                                layer.msg('保存成功');
                                layer.close(index);
                                userTables.reload();
                            } else {
                                layer.msg(re.msg);
                            }
                        });
                    }
                });
            });
            return false;
        });

        //角色删除
        $(document).on('click', '.option-del', function () {
            var id = $(this).attr('data-id');
            layer.confirm('您确定删除此管理员吗？', {
                btn: ['确认', '取消'] //按钮
            }, function () {
                //去删除
                JsPost("<?php echo url('administrator/del'); ?>", { 'id': id }, function (res) {
                    if (res.status) {
                        layer.msg('删除成功');
                        userTables.reload();
                    } else {
                        layer.msg(res.msg);
                    }
                });
            }, function () {
                layer.close(1);
            });
        });

        //编辑
        $(document).on('click', '.option-edit', function () {
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("administrator/edit"); ?>?id=' + id, function (tpl) {
                if(tpl.status){
                    layer.open({
                        type: 1,
                        area: ['800px', '600px'],
                        data: '',
                        title: '编辑管理员',
                        content: tpl.data,
                        btn: ['保存', '关闭'],
                        yes: function (index, layero) {
                            var thedata = $('#edit_form').serialize();
                            JsPost('<?php echo url("administrator/edit"); ?>', thedata, function (re) {
                                if (re.status) {
                                    layer.msg('保存成功');
                                    layer.close(index);
                                    userTables.reload();
                                } else {
                                    layer.msg(re.msg);
                                }
                            });
                        }
                    });
                }else{
                    layer.msg(tpl.msg);
                }
            });
        });
    });
</script>
</div>
</body>
</html>
