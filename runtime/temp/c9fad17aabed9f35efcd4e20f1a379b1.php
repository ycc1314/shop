<?php /*a:2:{s:83:"/Users/seven/feisujie-master/shop/application/manage/view/message_center/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <div class="table-body">
    <table id="userTable" lay-filter="userTable"></table>
</div>
<script type="text/html" id="smsTpl">
    <input type="checkbox" name="sms" value="{{d.code}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="smsDemo" {{ d.sms == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="messageTpl">
    <input type="checkbox" name="message" value="{{d.code}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="smsDemo" {{ d.message == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="wxTpl">
    <input type="checkbox" name="wx_tpl_message" value="{{d.code}}" lay-skin="switch" lay-text="启用|禁用" lay-filter="smsDemo" {{ d.wx_tpl_message == 1 ? 'checked' : '' }}>
</script>

<script>
    layui.use(['form', 'layedit', 'laydate','table'], function(){
        layui.table.render({
            elem: '#userTable',
            height: 'full-150',
            cellMinWidth: '80',
            page: false,
            limit:'20',
            url: "<?php echo url('MessageCenter/index'); ?>?_ajax=1",
            id:'userTable',
            cols: [[
                {type:'numbers'},
                {field: 'code', title: '消息节点',templet:function(data){
                    var html = '';
                    html += data.name + '('+data.code+')';
                    return html;
                }},
                {field:'sms', title:'短信', width:200, templet: '#smsTpl', unresize: true},
                {field:'message', title:'站内消息', width:200, templet: '#messageTpl', unresize: true},
                {field:'wx_tpl_message', title:'微信消息', width:200, templet: '#wxTpl', unresize: true}
            ]]
        });
        //监听操作
        layui.form.on('switch(smsDemo)', function(obj){
            var data = {
                code:this.value
            };
            if(obj.elem.checked){
                data[this.name] = 1;
            }else{
                data[this.name] = 2;
            }
            JsPost("<?php echo url('MessageCenter/edit'); ?>", data, function(e){
                if(e.status){
                    layer.msg('修改成功');
                }else{
                    layer.msg(e.msg);
                }
            });
        });
    });
</script>
</div>
</body>
</html>
