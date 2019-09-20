<?php /*a:2:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/store/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
        .layui-table-view {
            width: 100% !important;
            overflow-x: scroll !important;
            left: 0 !important;
        }

        .layui-table-box {
            width: 1400px !important;
            box-sizing: border-box;
        }
    }
</style>
<form class="layui-form seller-form">
    <div class="layui-form-item">

        <div class="layui-inline">
            <button type="button" class="layui-btn layui-btn-sm add-store"><i class="layui-icon">&#xe608;</i> 添加</button>
        </div>

    </div>
</form>

<div class="table-body">
    <table class="" id="storeTable" lay-filter="storeTable"></table>
</div>

<script>
    layui.use(['table','form'], function(){
        var table = layui.table,form = layui.form;

        table.render({
            elem: '#storeTable',
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            id:'storeTable',
            url: "<?php echo url('Store/index'); ?>",
            cols: [[ //标题栏
                {type: 'numbers'},
                {field: 'store_name', width:200, title: '门店名称'},
                {field: 'logo', title: 'LOGO' ,align:'center',width:100, templet: function(data){
                    return '<a href="javascript:void(0);" onclick=viewImage("'+data.logo+'")><image style="max-width:30px;max-height:30px;" src="'+data.logo+'"/></a>';
                }},
                {field: 'mobile', title: '门店电话',align:'center',width:120},
                {field: 'linkman',title: '联系人',align:'center',width:100},
                {field: 'area', title: '门店地区'},
                {field: 'address', title:  '详细地址'},
                {field: 'ctime', sort: true, width:200, title: '创建时间',align:'center'},
                {field: 'utime', sort: true, width:200, title: '更新时间',align:'center'},
                {title:'操作',align:'center',toolbar:'#storeBar',width: 190}
            ]] //设置表头
        });

        $(document).on('click','.add-store',function(){
           window.location.href = "<?php echo url('Store/add'); ?>";
        });

        //监听工具条
        table.on('tool(storeTable)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）

            if(layEvent === 'del'){ //删除
                layer.confirm('真的删除么',{icon:3}, function(index){
                    JsGet("<?php echo url('Store/del'); ?>?id="+data.id,function(res){
                        if(res.status){
                            obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            layer.close(index);//向服务端发送删除指令
                        }
                        layer.msg(res.msg);
                    });
                });
            } else if(layEvent === 'edit'){
                window.location.href = "<?php echo url('Store/edit'); ?>?id="+data.id;
            } else if(layEvent === 'clerk'){
                window.location.href = "<?php echo url('Store/clerkList'); ?>?id="+data.id;
            }
        });
    });
</script>

<script type="text/html" id="storeBar">
    <a class="layui-btn layui-btn-xs" lay-event="clerk">店员列表</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
</div>
</body>
</html>
