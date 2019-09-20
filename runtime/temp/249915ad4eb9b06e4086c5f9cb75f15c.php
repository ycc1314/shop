<?php /*a:2:{s:82:"/Users/seven/feisujie-master/shop/application/manage/view/operation_log/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label">操作时间：</label>

            <div class="layui-input-inline seller-inline-4">
                <input type="text" name="date" id="date" placeholder="开始时间 到 结束时间" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <div class="layui-input-inline">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="*"><i class="iconfont icon-chaxun"></i>筛选</button>
                <button class="layui-btn layui-btn-sm"  lay-submit lay-filter="export-operation_log"><i class="iconfont icon-msnui-cloud-download" style="font-size: 20px !important;"></i>导出</button>
            </div>
        </div>
    </div>
</form>

<div class="table-body">
    <table id="operationTable" lay-filter="operation"></table>
</div>
<div id="exportOperationLog" style="display: none;">
    <form class="layui-form export-form"  action="" >
        <div class="layui-form-item">
            <div class="layui-margin-10">
                <blockquote class="layui-elem-quote layui-text">
                    请先选中或筛选要导出的数据
                </blockquote>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">任务名称：</label>
                <input type="text" name="taskname" lay-verify="title" style="width:200px;" placeholder="请输入任务名称" autocomplete="off" class="layui-input">
            </div>
        </div>
    </form>
</div>

<script>
    var pid = 1;
    layui.use(['form', 'layedit', 'laydate', 'table'], function () {

        var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form,
                laydate = layui.laydate;
        //时间插件
        laydate.render({
            elem: '#date',
            range: '到',
            format: 'yyyy-MM-dd'
        });

        var operationTables = layui.table.render({
            elem: '#operationTable',
            height: 'full-99',
            cellMinWidth: '80',
            page: true,
            limit: '20',
            url: "<?php echo url('OperationLog/index'); ?>?_ajax=1",
            id: 'operationTable',
            cols: [[
                {type:'checkbox'},
                {type: 'numbers'},
                {field: 'username', title: '操作员'},
                {field: 'ctime', title: '操作时间'},
                {field: 'desc', title: '操作描述'},
                {field: 'content', title: '操作内容'},
                {field: 'ip', title: '操作IP'}
            ]]
        });

        //筛选条件
        form.on('submit(*)', function(data){
            operationTables.reload({
                where: data.field,
                page: {curr: 1}
            });
            return false;
        });
        //操作日志导出
        layui.form.on('submit(export-operation_log)', function(data){

            layer.open({
                type: 1,
                title:'操作日志导出',
                area: ['400px', '290px'], //宽高
                btn:['确定','取消'],
                content: $("#exportOperationLog").html(),
                yes:function () {
                    //判断是否有选中
                    var checkStatus = layui.table.checkStatus('operationTable');
                    var checkData = checkStatus.data;
                    var length = checkStatus.data.length;
                    var ids = [];
                    if(length){
                        $.each(checkData,function (i,obj) {
                            ids.push(obj.id);
                        });
                    }

                    //判断是否有选中
                    var filter = $(".seller-form").serialize();
                    filter+='&ids='+ids;
                    $(".export-form:last").append("<input type='hidden' name='filter' value='"+filter+"'>");
                    var data = $(".export-form:last").serializeArray();

                    data.push({'name':'model','value':'OperationLog'});

                    JsPost("<?php echo url('Ietask/export'); ?>",data,function(res){
                            layer.msg(res.msg, {time:1500}, function(){
                                if(res.status){
                                    operationTables.reload({
                                        where: data.field,
                                        page: {curr: 1}
                                    });
                                    layer.closeAll();
                                }
                            });
                        }
                    );
                },btn2:function () {
                    layer.closeAll();
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>

</div>
</body>
</html>
