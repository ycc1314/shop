<?php /*a:2:{s:75:"/Users/seven/feisujie-master/shop/application/manage/view/addons/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    .layui-btn .layui-icon{
        margin-right: 0;
    }
    @media screen and (max-width: 500px) {
        .layui-layer.layui-layer-page {
            width: 100% !important;
            overflow-x: scroll !important;
            left: 0 !important;
        }

        .layui-layer-title {
            width: 600px !important;
            box-sizing: border-box;
        }

        .layui-layer-content {
            width:600px !important;
        }

    }
</style>

<div class="table-body">
	<table id="typeTable" lay-filter="test"></table>
</div>

<script>
    var table;
    layui.use(['form', 'layedit', 'laydate','table'], function(){
        var form = layui.form;
        table = layui.table.render({
            elem: '#typeTable',
            height: 'full-47',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            url: "<?php echo url('Addons/index'); ?>?_ajax=1",
            id:'typeTable',
            cols: [[
                {field:'title', width:200,title:'插件名称'},
                {field:'name', width:150,title:'编码'},
                {field:'description', width:300,title:'插件描述'},
                {field:'author', width:100,title:'作者'},
                {field:'version', width:150,title:'版本号'},
                {field:'operating',title:'操作',templet:function(data){
                    var html = '';
                    if (data.install == 1) {
                        var html = '<a  class="layui-btn layui-btn-xs setting-class" data-title="' + data.title + '" data-name="' + data.name + '">配置</a>';
                        html += '<a class="layui-btn layui-btn-danger layui-btn-xs uninstall-class" data-name="' + data.name + '" data-title="' + data.title + '">卸载</a>';
                        html += '<a class="layui-btn layui-btn-danger layui-btn-xs refresh-class" data-name="' + data.name + '" data-title="' + data.title + '">刷新</a>';
                        html += '<a class="layui-btn layui-btn-danger layui-btn-xs stop-class" data-name="' + data.name + '" data-title="' + data.title + '">停用</a>';
                    } else if (data.install == 2) {
                        var html = '<a  class="layui-btn layui-btn-xs setting-class" data-title="' + data.title + '" data-name="' + data.name + '">配置</a>';
                        html += '<a class="layui-btn layui-btn-danger layui-btn-xs uninstall-class" data-name="' + data.name + '" data-title="' + data.title + '">卸载</a>';
                        html += '<a class="layui-btn layui-btn-danger layui-btn-xs refresh-class" data-name="' + data.name + '" data-title="' + data.title + '">刷新</a>';
                        html += '<a class="layui-btn layui-btn-danger layui-btn-xs stop-class" data-name="' + data.name + '" data-title="' + data.title + '">启用</a>';
                    } else {
                        html = '<a  class="layui-btn layui-btn-xs install-class" data-name="' + data.name + '" data-title="' + data.title + '">安装</a>';
                    }
                    return html;
                }}
            ]]
        });

        //安装插件
        $(document).on('click', '.install-class', function(){
            var name = $(this).attr('data-name');
            var title = $(this).attr('data-title');
            layer.confirm('确认安装插件：'+title+' 吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function(){
                installAddon(name);
            });
        });

        //安装插件
        function installAddon(name){
            JsPost('<?php echo url("Addons/install"); ?>',{name:name},function (e) {
                layer.msg(e.msg, {time: 1300}, function(){
                    table.reload('typeTable');
                });
            });
        }

        //插件设置
        $(document).on('click', '.setting-class', function(){
            var title = $(this).attr('data-title');
            var name = $(this).attr('data-name');
            JsPost('<?php echo url("Addons/setting"); ?>',{name:name},function (e) {
                if(e.status){
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: [e.dialog.width, e.dialog.height],
                        title:'插件配置',
						btn:['保存','取消'],
						yes:function (index,obj) {
							var settingForm = obj.find('form');
                            var addonData = settingForm.serializeArray();
                            addonData.push({'name':'name','value':name});
							JsPost('<?php echo url("Addons/doSetting"); ?>',addonData,function (res) {
							    if(res.status){
							        layer.closeAll();
                                    layer.msg(res.msg, {time: 1300}, function(){
                                        table.reload('typeTable');
                                    });
								}else{
                                    layer.msg(e.msg);
                                }
                            });
                        }
                    });
				}else{
                    layer.msg(e.msg);
				}
            });
        });

        //改变插件状态
        $(document).on('click', '.stop-class', function(){
            var title = $(this).attr('data-title');
            var name = $(this).attr('data-name');
            var type = $(this).html();
            layer.confirm('确认'+type+'插件：'+title+' 吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function(){
                changeStatus(name);
            });
        });
        //刷新插件
        $(document).on('click', '.refresh-class', function(){
            var title = $(this).attr('data-title');
            var name = $(this).attr('data-name');
            var type = $(this).html();
            layer.confirm('确认'+type+'插件：'+title+' 吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function(){
                JsPost('<?php echo url("Addons/refresh"); ?>',{name:name},function(e){
                    layer.msg(e.msg, {time: 1300}, function(){
                        table.reload('typeTable');
                    });
                });
            });
        });



        function changeStatus(name){
            JsPost('<?php echo url("Addons/changeStatus"); ?>',{name:name},function (e) {
                layer.msg(e.msg, {time: 1300}, function(){
                    table.reload('typeTable');
                });
            });
        }


        //卸载插件
        $(document).on('click', '.uninstall-class', function(){
            var name = $(this).attr('data-name');
            var title = $(this).attr('data-title');
            layer.confirm('确认卸载插件：'+title+' 吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function(){
                uninstallAddon(name);
            });
        });

        //卸载插件
        function uninstallAddon(name){
            JsPost('<?php echo url("Addons/uninstall"); ?>',{name:name},function (e) {
                layer.msg(e.msg, {time: 1300}, function(){
                    table.reload('typeTable');
                });
            });
        }

    });

</script>

</div>
</body>
</html>
