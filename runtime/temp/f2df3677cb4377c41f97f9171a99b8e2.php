<?php /*a:2:{s:78:"/Users/seven/feisujie-master/shop/application/manage/view/promotion/group.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label" style="width:120px;">团购(秒杀)名称：</label>
            <div class="layui-input-inline seller-inline-3">
                <input type="text" name="name" lay-verify="title" placeholder="" autocomplete="off" class="layui-input">
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
            <a href="<?php echo url('Promotion/groupAdd'); ?>" class="layui-btn layui-btn-sm option-add">
                <i class="layui-icon">&#xe608;</i> 添加
            </a>
        </div>
    </div>
</form>

<div class="table-body">
    <table id="promotion" lay-filter="test"></table>
</div>

<script>
    layui.use(['form', 'layedit', 'laydate','table'], function(){
        //时间插件
        layui.laydate.render({
            elem: '#date',
            range: '到',
            type: 'datetime'
        });

        //表格渲染
        var promotionTable = layui.table.render({
            elem: '#promotion',
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'<?php echo config("jshop.page_limit"); ?>',
            url: "<?php echo url('promotion/group'); ?>?_ajax=1",
            id:'promotion',
            cols: [[
                {type:'numbers'},
                {field:'name',title:'团购(秒杀)名称'},
                {field:'sort', sort: true,title:'权重'},
                {field:'type', sort: true,title:'类型',templet:function (data) {
                    if(data.type=='3'){
                        return '团购';
                    }else{
                        return '秒杀';
                    }
                }},
                {field:'status',title:'启用状态', templet: '#status', width: 120},
                {field:'stime',title:'开始时间'},
                {field:'etime',title:'结束时间'},
                {field: 'operating', title: '操作', align: 'center',templet:function(data){
                    var html = '';
                    html += '<a  class="layui-btn layui-btn-xs" href="<?php echo url('promotion/groupEdit'); ?>?id=' + data.id + '">编辑</a>';
                    html += '<a  class="layui-btn layui-btn-danger layui-btn-xs option-del" data-id="' + data.id + '" >删除</a>';
                    return html;
                }}
            ]]
        });
        layui.form.on('submit(*)', function(data){
            layui.table.reload('promotion', {
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });


        //促销删除
        $(document).on('click','.option-del',function(){
            var id = $(this).attr('data-id');
            layer.confirm('您确定删除此活动信息？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                //去删除
                JsPost("<?php echo url('promotion/groupDel'); ?>",{'id':id},function(res){
                    if(res.status){
                        layer.msg('删除成功');
                        promotionTable.reload();
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
            JsPost("<?php echo url('Promotion/changeState'); ?>",{
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
