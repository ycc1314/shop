<?php /*a:2:{s:76:"/Users/seven/feisujie-master/shop/application/manage/view/pintuan/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label" style="width:120px;">商品名称：</label>
            <div class="layui-input-inline seller-inline-3">
                <input type="text" name="goods_name" lay-verify="title" placeholder="" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">启用状态：</label>
            <div class="layui-input-inline seller-inline-2">
                <select name="status" lay-verify="">
                    <option value=""></option>
                    <option value="1">开启</option>
                    <option value="2">关闭</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">起止时间：</label>
            <div class="layui-input-inline seller-inline-6">
                <input  type="text" name="date" value="" id="date" placeholder="请输入起止时间" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="*"><i class="iconfont icon-chaxun"></i>筛选</button>
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="add">
                <i class="layui-icon">&#xe608;</i>添加</button>
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
            url: "<?php echo url('index'); ?>",
            id:'pintuan',
            cols: [[
                {type:'numbers'},
                {field:'name',title:'活动名称'},
                {field:'sort', edit: 'text',title:'权重', align: 'center'},
                {field:'status',title:'启用状态', templet: '#status'},
                {field:'stime',title:'开始时间'},
                {field:'etime',title:'结束时间'},
                {field:'people_number', align: ' center',title:'开团人数',templet:function(data){return data.people_number + "人"}},
                {field:'discount_amount',title:'优惠金额',templet:function(data){return '￥'+data.discount_amount}},
                {field:'ctime',title:'创建时间'},
                {field: 'operating', width:220,title: '操作',  align: 'center',templet:function(data){
                        var html = '';
                        html += '<a  class="layui-btn layui-btn-xs option-edit" data-id="' + data.id + '">编辑</a>';
                        html += '<a  class="layui-btn layui-btn-danger layui-btn-xs option-del" data-id="' + data.id + '" >删除</a>';
                        return html;
                    }}
            ]]
        });
        //排序
        layui.table.on('edit(pintuan)', function(obj){

            JsPost("<?php echo url('updateSort'); ?>",{'field':obj.field,'value':obj.value,'id':obj.data.id},function(res){
                    layer.msg(res.msg, {time:1500}, function(){
                        if(res.status){
                            table.reload('pintuan');
                        }
                    });
                }
            );
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

        //添加
        layui.form.on('submit(add)', function () {
            $.ajax({
                type: 'get',
                url: "<?php echo url('edit'); ?>",
                success: function (e) {
                    if(e.status){
                        window.box = layer.open({
                            type: 1,
                            content: e.data,
                            area: ['600px', '550px'],
                            title: '添加',
                            btn: ['确定', '取消'],
                            zIndex: 1800,
                            yes: function () {
                                var data = $("#pintuanAdd").serializeArray();
                                console.log(data);
                                $.ajax({
                                    type: 'post',
                                    url: '<?php echo url("edit"); ?>',
                                    data: data,
                                    dataType: 'json',
                                    success: function (e) {
                                        if (e.status) {
                                            layer.close(window.box);
                                            layer.msg(e.msg, { time: 1300 }, function () {
                                                layui.table.reload('pintuan');
                                            });
                                        } else {
                                            layer.msg(e.msg);
                                        }
                                    }
                                });
                            }
                        });
                    }else{
                        layer.msg(e.msg);
                    }
                }
            });
            return false;
        });
        //编辑
        $(document).on('click','.option-edit',function(){
            var id = $(this).attr('data-id');
            JsGet(" <?php echo url('edit'); ?>?id="+id,function(e){
                if(e.status){
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: ['600px', '550px'],
                        title: '编辑',
                        btn: ['确定', '取消'],
                        zIndex: 1800,
                        yes: function () {
                            var data = $("#pintuanAdd").serializeArray();
                            console.log(data);
                            $.ajax({
                                type: 'post',
                                url: '<?php echo url("edit"); ?>',
                                data: data,
                                dataType: 'json',
                                success: function (e) {
                                    if (e.status) {
                                        layer.close(window.box);
                                        layer.msg(e.msg, { time: 1300 }, function () {
                                            layui.table.reload('pintuan');
                                        });
                                    } else {
                                        layer.msg(e.msg);
                                    }
                                }
                            });
                        }
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
        });

        //删除
        $(document).on('click','.option-del',function(){
            var id = $(this).attr('data-id');
            layer.confirm('您确定删除此拼团信息吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                //去删除
                JsPost(" <?php echo url('del'); ?>",{'id':id},function(res){
                    if(res.status){
                        layer.msg("删除成功");
                        table.reload('pintuan');
                    }else{
                        layer.msg(res.msg);
                    }
                });
            }, function(){
                layer.close(1);
            });
        });


        //监听 操作状态
        layui.form.on('switch(change)', function(obj){

            JsPost("<?php echo url('changeState'); ?>",{
                id: obj.value,
                elem: obj.elem.name,
                state: obj.elem.checked
            },function(res){
                layer.msg(res.msg);
            });
        });

    });
</script>

<script type="text/html" id="status">
    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="change" {{ d.status == 1 ? 'checked' : '' }}>
</script>

</div>
</body>
</html>