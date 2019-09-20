<?php /*a:2:{s:75:"/Users/seven/feisujie-master/shop/application/manage/view/ietask/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label">任务名称：</label>
            <div class="layui-input-inline seller-inline-3">
                <input type="text" name="name" lay-verify="title" placeholder="请输入任务名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">任务状态：</label>
            <div class="layui-input-inline seller-inline-3">
                <select name="status" id="status">
                    <option value="">全部</option>
                    <option value="0">等待执行</option>
                    <option value="1">正在导出</option>
                    <option value="2">导出成功</option>
                    <option value="3">导出失败</option>
                    <option value="4">正在导入</option>
                    <option value="5">导入成功</option>
                    <option value="6">导入失败</option>
                    <option value="7">导入中断</option>
                    <option value="8">部分导入</option>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="task-search"><i class="iconfont icon-chaxun"></i>筛选</button>
        </div>
    </div>
</form>


<div class="table-body">
    <table id="taskTable" lay-filter="taskTable"></table>
</div>

<script>
    var table = '';
    layui.use(['table','form','layer','laydate'],function(){
        var layer = layui.layer;
        //执行渲染
        table = layui.table.render({
            elem: '#taskTable', //指定原始表格元素选择器（推荐id选择器）
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            id:'taskTable',
            url: "<?php echo url('ietask/index'); ?>",
            cols: [[
                {type:'numbers'},
                {field: 'name', title: '任务名称',align:'center'},
                {field: 'type', title: '任务类型',align:'center'},
                {field: 'file_name', title: '文件名称',align:'center'},
                {field: 'status', title: '状态',align:'center'},
                {field: 'file_size', title: '文件大小',align:'center'},
                {field: 'file_path', title: '文件下载',align:'center',templet:function (data) {
                    return '<button class="layui-btn layui-btn-sm layui-btn-normal" onclick="downfile('+data.id+')">下载文件</button>';
                }},
                {field: 'ctime',sort: true, title: '创建时间' ,align:'center'},
                {field: 'operating', title: '操作', width:100, align: 'center',templet:function(data){
                        var html = '';
                        html += '<a  class="layui-btn layui-btn-xs task-del" data-id="' + data.id + '">删除</a>';
                        return html;
                    }},
            ]]
        });
        //查看操作
        $(document).on('click','.task-del',function(){
            var id = $(this).attr('data-id');
            //删除
            layer.confirm('真的删除么', {icon: 3}, function(index){
                JsGet("<?php echo url('manage/ietask/del'); ?>?id="+id, function(res){
                    if(res.status){
                        layui.table.reload('taskTable');
                        layer.closeAll();
                    }
                    layer.msg(res.msg);
                });
            });
        });

        layui.form.on('submit(task-search)', function(data){

            table.reload({
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
    //文件下载
    function downfile(id) {
        JsGet("<?php echo url('ietask/down'); ?>?id="+id,function (res) {

            if(res.status){
                layer.msg("开始下载");
                window.location.href=res.data.url;
            }else{
                layer.msg(res.msg);
            }

        });
    }
</script>
</div>
</body>
</html>
