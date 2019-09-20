<?php /*a:2:{s:73:"/Users/seven/feisujie-master/shop/application/manage/view/role/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <link rel="stylesheet" href="/static/lib/layuiadmin/layui/layui_ext/dtree/dtree.css">
<link rel="stylesheet" href="/static/lib/layuiadmin/layui/layui_ext/dtree/font/dtreefont.css">
<form class="layui-form seller-form"  action="" >
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">角色名称：</label>
            <div class="layui-input-inline seller-inline-3">
                <input type="text" name="name" lay-verify="title" placeholder="请输入角色名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="*"><i class="iconfont icon-chaxun"></i>筛选</button>
            <button class="layui-btn layui-btn-sm" lay-submit  lay-filter="role-add"><i class="layui-icon">&#xe608;</i>添加</button>
        </div>
    </div>
</form>

<div class="table-body">
    <table id="userTable" lay-filter="test"></table>
</div>

<script>
    layui.extend({
        dtree: '/static/lib/layuiadmin/layui/layui_ext/dtree/dtree'
    }).use(['table', 'form', 'layer', 'dtree','util'], function() {
        var element = layui.element,
                layer = layui.layer,
                table = layui.table,
                util = layui.util,
                dtree = layui.dtree,
                form = layui.form,
                laytpl = layui.laytpl,
                $ = layui.$;
        form.render();
        var userTables = layui.table.render({
            elem: '#userTable',
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            url: "<?php echo url('role/index'); ?>?_ajax=1",
            id:'userTable',
            cols: [[
                {type:'numbers'},
                {field:'name',title:'角色名称'},
                {field:'utime',title:'创建时间'},
                {field: 'operating', title: '操作', width:250, align: 'center', templet:function(data){
                    var html = '';
                    html += '<a  class="layui-btn layui-btn-xs option-perm" data-id="' + data.id + '">编辑权限</a>';
                    html += '<a  class="layui-btn layui-btn-xs option-del layui-btn-danger" data-id="' + data.id + '">删除</a>';
                    return html;
                }}
            ]]
        });
        layui.form.on('submit(*)', function(data){
            layui.table.reload('userTable', {
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
        //监听form提交  (add)
        layui.form.on('submit(role-add)',function(data){
            JsGet("<?php echo url('role/add'); ?>", function(e){
                if(e.status){
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: ['400px', '300px'],
                        title:'添加角色',
                        btn: ['确定','取消'],
                        yes: function(index, layero){
                            if($('#edit_name').val() != ''){
                                //保存支付方式
                                JsPost("<?php echo url('role/add'); ?>", $('#edit_form').serialize(), function(res){
                                    if(res.status){
                                        layer.close(index);
                                        layer.msg(res.msg,{time:1300},function(){
                                            userTables.reload();
                                        });
                                    }else{
                                        layer.msg(res.msg);
                                    }
                                });
                            }else{
                                layer.msg('请输入角色名称');
                            }
                        }
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
            return false;
        });

        //角色删除
        $(document).on('click','.option-del',function(){
            var id = $(this).attr('data-id');
            layer.confirm('您确定删除此角色吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                //去删除
                JsPost("<?php echo url('role/del'); ?>",{'id':id},function(res){
                    if(res.status){
                        layer.msg('删除成功');
                        userTables.reload();
                    }else{
                        layer.msg(res.msg);
                    }

                });
            }, function(){
                layer.close(1);
            });
        });

        //设置权限
        $(document).on('click','.option-perm',function(){
            var id = $(this).attr('data-id');
            layer.open({
                type: 1,
                area: ['400px', '600px'],
                content:'<ul id="areaTree" class="dtree" data-id="0"></ul>',
                title: '配置权限',
                btn:['保存','关闭'],
                success: function(layero, index) {
                    var obj = $(layero).find("#areaTree");
                    DTree = dtree.render({
                        obj: obj,
                        initLevel: 1,
                        request:{"id":id},
                        url: '<?php echo url("role/getOperation"); ?>',
                        checkbar: true,
                        cache: true,
                        checkbarType:'all-self',//选中类型
                        response:{message:"msg",statusCode:0},
                        dataStyle: "layuiStyle",
                    });
                },
                yes:function (index,layero) {
                    var thedata = dtree.getCheckbarNodesParam(DTree);
                    var ids = [];
                    $.each(thedata,function (i,obj) {
                        ids.push({'id':obj.nodeId,'pid':obj.parentId,'name':obj.context});
                    });
                    JsPost('<?php echo url("role/savePerm"); ?>',{'id':id,'data':ids},function (re) {
                        if(re.status){
                            layer.msg('保存成功');
                            layer.close(index);
                        }else{
                            layer.msg(re.msg);
                        }
                    });
                }
            });
        });
    });
</script>
</div>
</body>
</html>
