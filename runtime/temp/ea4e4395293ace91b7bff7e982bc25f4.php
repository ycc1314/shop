<?php /*a:2:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/pages/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <button type="button" class="layui-btn layui-btn-sm add"><i class="layui-icon">&#xe608;</i> 添加</button>
        </div>

    </div>

</form>

<div class="table-body">
    <table id="pagesTable" lay-filter="pagesTable"></table>
</div>
<script>
    layui.use(['table','form','layer','laydate'],function(){
        var layer = layui.layer, table = layui.table,form = layui.form,date = layui.laydate;
        //执行渲染
        table.render({
            elem: '#pagesTable', //指定原始表格元素选择器（推荐id选择器）
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            id:'pagesTable',
            url: "<?php echo url('Pages/index'); ?>",
            cols: [[ //标题栏
                {type:'numbers'},
                {field: 'name', title: '名称', align:'center'},
                {field: 'code', title: '编码',align:'center'},
                {field: 'desc',sort: true, title: '描述' ,align:'center'},
                {field: 'layout', sort: true, title: '布局样式',align:'center'},
                {field: 'type', sort: true, title: '布局类型',align:'center'},
                {title:'操作', toolbar:'#pagesBar'}
            ]]
        });

        form.on('submit(brand-search)', function(data){
            layui.table.reload('pagesTable', {
                where: data.field
                ,page: {
                    curr: 1
                }
            });
            return false;
        });
        //监听工具条
        table.on('tool(pagesTable)', function (obj) {
            var data = obj.data;
            var layEvent = obj.event;
            if (layEvent === 'edit') {
                window.location.href = "<?php echo url('Pages/custom'); ?>?page_code=" + data.code;
            }
            if (layEvent === 'del') {
                layer.confirm('真的要删除么',{icon: 3}, function(index){
                    JsGet("<?php echo url('Pages/del'); ?>?id=" + data.id, function (res) {
                        if(res.status){
                            obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            layer.close(index);//向服务端发送删除指令
                        }
                        layer.msg(res.msg);
                    });
                });
            }
        });


        $(document).on('click', '.add', function () {
            JsGet("<?php echo url('Pages/add'); ?>", function(e){
                window.box = layer.open({
                    type: 1,
                    content: e,
                    area: ['400px', '450px'],
                    title:'添加'
                });
            })
        })



        form.on('submit(add_submit)', function (data) {
            JsPost("<?php echo url('Pages/add'); ?>", data.field, function (res) {
                if (res.status) {
                    layer.close(window.box)
                    layer.msg(res.msg, {time: 1300}, function () {
                        table.reload('pagesTable')
                    })
                } else {
                    layer.msg(res.msg)
                }
            })
        })
    })
</script>
<script type="text/html" id="pagesBar">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    {{# if (d.code != 'mobile_home') { }}
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    {{# }; }}
</script>

</div>
</body>
</html>
