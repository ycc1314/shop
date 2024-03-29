<?php /*a:2:{s:75:"/Users/seven/feisujie-master/shop/application/manage/view/notice/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <div class="layui-form seller-form"  action="" >
    <div class="layui-form-item">

        <div class="layui-inline">
            <label class="layui-form-label seller-inline-2">公告标题：</label>
            <div class="layui-input-inline seller-inline-4">
                <input type="text" name="title" lay-verify="title" placeholder="请输入标题关键字" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label seller-inline-2">更新时间：</label>
            <div class="layui-input-inline seller-inline-4">
                <input type="text" id="date" name="ctime" lay-verify="title" placeholder="开始时间 到 结束时间" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="notice-search"><i class="iconfont icon-chaxun"></i>筛选</button>

            <button type="button" class="layui-btn layui-btn-sm add-notice"><i class="layui-icon">&#xe608;</i> 添加</button>
        </div>

    </div>
</div>

<div class="table-body">
	<table id="noticeTable" lay-filter="noticeTable"></table>
</div>

<script>
    layui.use(['table','form','laydate'],function(){
        var table = layui.table,form = layui.form,date = layui.laydate;
        table.render({
            elem: '#noticeTable',
            height: 'full-99',
            cellMinWidth: '80',
            url: "<?php echo url('Notice/index'); ?>", //数据接口
            id: "noticeTable",
            page: true ,//开启分页
            limit:'20',
            cols: [[ //表头
                {type: 'numbers'},
                {field: 'title', title: '公告标题'},
                {field: 'content', title: '公告描述内容',align:'center'},
                {field: 'ctime', title: '更新时间', width: 200, sort: true,align:'center'},
                {field: 'sort', title: '排序', width: 80, sort: true,align:'center'},
                {field: 'right', title:'操作', width: 150,align:'center', toolbar:'#notice'}
            ]]
        });

        date.render({
            elem: '#date',
            range: '~'
        });

        form.on('submit(notice-search)', function(data){
            layui.table.reload('noticeTable', {
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });


        //添加弹出层
        $(document).on('click','.add-notice',function(){
            JsGet("<?php echo url('Notice/add'); ?>", function (e) {
                if (e.status) {
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: ['400px', '400px'],
                        title: '添加公告'
                    });
                }else{
                    layer.msg(e.msg);
                }
            })
        });


        //监听表单提交
        form.on('submit(add-notice)',function(data){
            JsPost("<?php echo url('Notice/add'); ?>", data.field, function(res){
                if(res.status){
                    layer.close(window.box);
                    layer.msg(res.msg, {time:1300},function(){
                        table.reload('noticeTable');
                    });
                }else{
                    layer.msg(res.msg);
                }
            })
        });

        //监听表单提交 (edit)
        form.on('submit(edit-notice)',function(data){
            JsPost("<?php echo url('Notice/edit'); ?>", data.field, function(res){
                if(res.status){
                    layer.close(window.box);
                    layer.msg(res.msg, {time:1300},function(){
                        table.reload('noticeTable');
                    });
                }else{
                    layer.msg(res.msg);
                }
            })
        });


        //监听工具条
        table.on('tool(noticeTable)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的DOM对象

            if(layEvent === 'del'){ //删除
                layer.confirm('真的要删除吗?', function(index){
                    JsPost("<?php echo url('Notice/del'); ?>",{id:data.id},function(res){
                        if(res.status){
                            obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            layer.close(index);//向服务端发送删除指令
                        }
                        layer.msg(res.msg);
                    });
                });
            } else if(layEvent === 'edit'){ //编辑
                JsGet("<?php echo url('Notice/edit'); ?>?id=" + data.id, function(e){
                    if (e.status) {
                        window.box = layer.open({
                            type: 1,
                            content: e.data,
                            area: ['400px', '400px'],
                            title: '修改公告'
                        })
                    }else{
                        layer.msg(e.msg);
                    }
                })
            }
        });
    })
</script>
<script type="text/html" id="notice">
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
</div>
</body>
</html>
