<?php /*a:2:{s:75:"/Users/seven/feisujie-master/shop/application/manage/view/images/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label">图片ID：</label>
            <div class="layui-input-inline">
                <input type="text" name="id" style="width:200px;" placeholder="请输入图片ID" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">图片名称：</label>
            <div class="layui-input-inline">
                <input type="text" name="name"  style="width:200px;" placeholder="请输入图片名称" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="image-search"><i class="iconfont icon-chaxun"></i>筛选</button>
            <button type="button" class="layui-btn layui-btn-sm add-image"><i class="layui-icon">&#xe608;</i> 添加</button>
        </div>
    </div>
</form>
<div class="table-body">
    <table id="imagesTable" lay-filter="imagesTable"></table>
</div>


<script>
    var table = '';

    layui.use(['table','form','layer','laydate'],function(){
        var layer = layui.layer;
        var table = layui.table,form = layui.form;
        //执行渲染
        var imageTable = table.render({
            elem: '#imagesTable', //指定原始表格元素选择器（推荐id选择器）
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            id:'imagesTable',
            url: "<?php echo url('images/index'); ?>",
            cols: [[ //标题栏
                {type:'numbers'},
                {field: 'id', title: 'ID',width:350,align:'center'},
                {field: 'url', title: '缩略图',width:100,align:'center',templet: function(data){
                    return '<a href="javascript:void(0);" onclick=viewImage("'+data.url+'")><image style="max-width:30px;max-height:30px;" src="'+data.url+'"/></a>';
                }},
                {field: 'name', title: '图片名称',align:'center'},
                {field: 'url', title: '图片地址',align:'center'},
                {field: 'ctime',sort: true, width:200, title: '创建时间' ,align:'center'},
                {title:'操作',align:'center',toolbar:'#imageBar',width: 190}
            ]]
        });

        layui.form.on('submit(image-search)', function(data){
            imageTable.reload({
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        //监听工具条
        table.on('tool(imagesTable)', function(obj){
            var data = obj.data;
            var layEvent = obj.event;
            if(layEvent === 'del'){ //删除
                layer.confirm('真的删除么',{icon:3}, function(index){
                    JsGet("<?php echo url('images/del'); ?>?id="+data.id,function(res){
                        if(res.status){
                            imageTable.reload();
                            layer.close(index);//向服务端发送删除指令
                        }
                        layer.msg(res.msg);
                    });
                });
            }
        });

        var _editor = UE.getEditor("edit_image",{
            initialFrameWidth:800,
            initialFrameHeight:300,
            single:true
        });
        _editor.ready(function (){
            _editor.hide();
            _editor.addListener('beforeInsertImage',function(t,arg){
                if(arg.length>5){
                    layer.msg("最多只能选择5张图片，请重新选择");
                    return false;
                }
                if(arg.length>0) {
                    imageTable.reload();
                }else{
                    layer.msg("请先上传图片");
                    return false;
                }
            });
        });

        $(document).on('click','.add-image',function(){
            upImage();
        });
        //上传dialog
        function upImage(){
            var myImage = _editor.getDialog("insertimage");
            myImage.open();
        }
    });
</script>

<script type="text/html" id="imageBar">
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<textarea id="edit_image" style="display: none;"></textarea>
</div>
</body>
</html>
