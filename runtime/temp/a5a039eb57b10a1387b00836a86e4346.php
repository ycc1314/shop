<?php /*a:2:{s:78:"/Users/seven/feisujie-master/shop/application/manage/view/operation/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <form class="layui-form seller-form"  action="" >
    <div class="layui-form-item">
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit  lay-filter="role-add"><i class="layui-icon">&#xe608;</i>添加</button>
        </div>
    </div>
</form>

<div class="table-body">
    <span class="layui-breadcrumb" style="margin-bottom:0;padding-bottom:0;" id="parent_url"></span>
    <table id="operationTable" lay-filter="operation"></table>
</div>

<script>
    var pid = 1;
    layui.use(['form', 'layedit', 'laydate','table'], function(){
        var userTables =layui.table.render({
            elem: '#operationTable',
            height: 'full-134',
            cellMinWidth: '80',
            page: false,
            limit:'2000',
            url: "<?php echo url('Operation/index'); ?>?_ajax=1",
            id:'operationTable',
            cols: [[
                {field:'id',title:'ID',width:60},
                {field:'code', title:'编码'},
                { title:'名称',templet:function(data){
                    var html = '';
                    if(data.type != '方法'){
                        html += '<a class="link-hot option-show" data-id="' + data.id + '">'+data.name+'</a>';
                    }else{
                        html += data.name;
                    }

                    return html;
                }},
                {field:'type',title:'类型'},
                {field:'parent_menu_name',title:'父菜单'},
                {field:'perm_type',title:'许可类型'},
                {field:'sort',title:'排序'},
                {field: 'operating', title: '操作', width:250, align: 'center',templet:function(data){
                    var html = '';
                    html += '<a  class="layui-btn layui-btn-xs option-edit" data-id="' + data.id + '">编辑</a>';
                    html += '<a  class="layui-btn layui-btn-xs option-del layui-btn-primary" data-id="' + data.id + '">删除</a>';
                    return html;
                }},
            ]],
            done: function(res, curr, count){
                $("#parent_url").empty();
                $("#parent_url").append('<a href="javascript:;" class="option-show" data-id="1" >根节点</a>');
                $.each( res.parents, function(i, n){
                    $("#parent_url").append('<span lay-separator="">/</span><a  href="javascript:;" class="option-show" data-id="' + n.id + '" >'+ n.name+'</a>');
                    pid = n.id;
                });
            }
        });
        //监听添加  (add)
        layui.form.on('submit(role-add)',function(data){
            JsGet('<?php echo url("Operation/add"); ?>',function (tpl) {
                if(tpl.status){
                    layer.open({
                        type: 1,
                        area: ['600px', '500px'],
                        data:'',
                        title: '添加',
                        content: tpl.data,
                        btn:['保存','关闭'],
                        yes:function (index,layero) {
                            var thedata = $('.operationForm').serialize();
                            var parent_id = $("#parent_id").val();
                            if (parent_id == '' || !parent_id) {
                                layer.msg("请选择父节点");
                                return false;
                            }
                            var parent_menu_id = $("#parent_menu_id").val();
                            if (parent_menu_id == '' || !parent_menu_id) {
                                layer.msg("请选择菜单节点");
                                return false;
                            }
                            JsPost('<?php echo url("Operation/add"); ?>',thedata,function (re) {
                                if(re.status){
                                    layer.msg('保存成功');
                                    layer.close(index);
                                    //userTables.reload();
                                    layui.table.reload('operationTable', {
                                        where: {parent_id:pid}
                                    });
                                }else{
                                    layer.msg(re.msg);
                                }
                            });
                        }
                    });
                }else{
                    layer.msg(tpl.msg);
                }
            });
            return false;
        });
        //点击跳转到对应菜单
        $(document).on('click','.option-show',function(){
            var id = $(this).attr('data-id');
            layui.table.reload('operationTable', {
                where: {parent_id:id}
            });
        });

        //角色删除
        $(document).on('click','.option-del',function(){
            var id = $(this).attr('data-id');
            layer.confirm('您确定删除此节点吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                //去删除
                JsPost("<?php echo url('Operation/del'); ?>",{'id':id},function(res){
                    if(res.status){
                        layer.msg('删除成功');
                        layui.table.reload('operationTable', {
                            where: {parent_id:pid}
                        });
                    }else{
                        layer.msg(res.msg);
                    }

                });
            }, function(){
                layer.close(1);
            });
        });

        //编辑
        $(document).on('click','.option-edit',function(){
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("Operation/add"); ?>?id='+id,function (tpl) {
                if(tpl.status){
                    layer.open({
                        type: 1,
                        area: ['600px', '500px'],
                        data:'',
                        title: '编辑',
                        content: tpl.data,
                        btn:['保存','关闭'],
                        yes:function (index,layero) {
                            var thedata = $('.operationForm').serialize();
                            var parent_id = $("#parent_id").val();
                            if (parent_id == '' || !parent_id) {
                                layer.msg("请选择父节点");
                                return false;
                            }
                            var parent_menu_id = $("#parent_menu_id").val();
                            if (parent_menu_id == '' || !parent_menu_id) {
                                layer.msg("请选择菜单节点");
                                return false;
                            }
                            JsPost('<?php echo url("Operation/add"); ?>',thedata,function (re) {
                                if(re.status){
                                    layer.msg('保存成功');
                                    layer.close(index);
                                    //userTables.reload();
                                    layui.table.reload('operationTable', {
                                        where: {parent_id:pid}
                                    });
                                }else{
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
