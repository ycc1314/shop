<?php /*a:2:{s:77:"/Users/seven/feisujie-master/shop/application/manage/view/pintuan/record.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label">团ID：</label>
            <div class="layui-input-inline seller-inline-2">
                <input type="text" name="team_id" lay-verify="title" placeholder="" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">状态：</label>
            <div class="layui-input-inline seller-inline-2">
                <select name="status" lay-verify="">
                    <option value=""></option>
                    <option value="1">拼团中</option>
                    <option value="2">拼团成功</option>
                    <option value="3">拼团失败</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label" style="width:120px;">订单号：</label>
            <div class="layui-input-inline seller-inline-3">
                <input type="text" name="order_id" lay-verify="title" placeholder="" autocomplete="off" class="layui-input">
            </div>
        </div>
        <!--<div class="layui-inline">-->
            <!--<label class="layui-form-label">起止时间：</label>-->
            <!--<div class="layui-input-inline seller-inline-6">-->
                <!--<input  type="text" name="date" value="" id="date" placeholder="请输入起止时间" autocomplete="off" class="layui-input">-->
            <!--</div>-->
        <!--</div>-->
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="*"><i class="iconfont icon-chaxun"></i>筛选</button>
        </div>
    </div>
</form>

<div class="table-body">
    <table id="pintuan" lay-filter="pintuan"></table>
</div>

<script>
    layui.use(['form', 'layedit', 'laydate','table'], function(){
        var table = layui.table;
        //时间插件
        layui.laydate.render({
            elem: '#date',
            range: '到',
            type: 'datetime'
        });

        //表格渲染
        layui.table.render({
            elem: '#pintuan',
            height: 'full-220',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            url: "<?php echo url('record'); ?>",
            id:'pintuan',
            cols: [[
                {type:'numbers'},
                {field:'team_id',title:'团ID',templet:function(data){
                    var str = data.team_id;
                    if(data.id == data.team_id){
                        str = str + "(团长)";
                    }
                    return str;
                }},
                {field:'user_nickname' ,title:'用户', align: 'center'},
                {field:'status_name',title:'状态'},
                {field:'order_id',title:'订单号'},
                {field:'close_time',title:'关闭时间'},
                {field:'ctime',title:'创建时间'},
                {field:'utime',title:'更新时间'}
            ]]
        });

        //搜索
        layui.form.on('submit(*)', function(data){
            layui.table.reload('pintuan', {
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

    });
</script>
</div>
</body>
</html>
