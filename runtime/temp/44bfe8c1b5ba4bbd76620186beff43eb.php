<?php /*a:2:{s:79:"/Users/seven/feisujie-master/shop/application/manage/view/categories/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
</style>
<form class="layui-form seller-form" action="">
	<div class="layui-form-item">
		<div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit  lay-filter="role-add"><i class="layui-icon">&#xe608;</i>添加</button>
		</div>
	</div>
</form>

<div class="table-body">
    <span class="layui-breadcrumb" style="margin-bottom:0;padding-bottom:0;" id="parent_url"></span>
	<table id="categories" lay-data="{id: 'categories'}"></table>
</div>
<script type="text/html" id="status">
    <input type="checkbox" name="status" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="status" {{ d.status == 1 ? 'checked' : '' }}>
</script>

<script>
    var pid = 0;
    var window_box;
    layui.use(['table', 'layer'], function(){
        var layer = layui.layer, $ = layui.jquery, table = layui.table;

        //获取商品分类数据
        table.render({
            id: 'categories',
            elem: '#categories',
            url: '<?php echo url("categories/index"); ?>',
            method: 'post',
            page: false,
            limit:'2000',
            cols: [[
                {type: 'numbers'},
                { title:'名称',templet:function(data){
                    var html = '';
                    html += '<a class="link-hot option-show" data-id="' + data.id + '">'+data.name+'</a>';
                    return html;
                }},
                {field: 'type_name', title: '商品类型', width:150, align: 'center'},
                {field: 'image_id', title: '图标', width:65, align: 'center', templet: function(data){
                    return '<a href="javascript:void(0);" onclick=viewImage("'+data.image_id+'")><image style="max-width:30px;max-height:30px;" src="'+data.image_id+'"/></a>';
                }},
                {field: 'sort', title: '排序', width:100, align: 'center'},
                {field:'status',title:'前台显示',width:100,align:'center',templet: '#status'},
                {field: 'operating', title: '操作', width:250, align: 'center',templet:function(data){
                    var html = '';
                    html += '<a  class="layui-btn layui-btn-xs option-edit" data-id="' + data.id + '">编辑</a>';
                    html += '<a  class="layui-btn layui-btn-xs option-del layui-btn-primary" data-id="' + data.id + '">删除</a>';
                    return html;
                }},
            ]],
            done: function(res, curr, count){
                $("#parent_url").empty();
                $("#parent_url").append('<a href="javascript:;" class="option-show" data-id="0" >根分类</a>');
                $.each( res.parents, function(i, n){
                    $("#parent_url").append('<span lay-separator="">/</span><a  href="javascript:;" class="option-show" data-id="' + n.id + '" >'+ n.name+'</a>');
                    pid = n.id;
                });
            }
        });
        //监听 操作状态
        layui.form.on('switch(status)', function(obj){
            JsPost("<?php echo url('categories/changeState'); ?>",{id:this.value,status:obj.elem.checked},function(res){
                layer.msg(res.msg);
            });
        });

        //点击跳转到对应菜单
        $(document).on('click','.option-show',function(){
            var id = $(this).attr('data-id');
            layui.table.reload('categories', {
                where: {parent_id:id}
            });
        });
        //监听添加  (add)
        layui.form.on('submit(role-add)',function(data){
            JsGet('<?php echo url("Categories/edit"); ?>',function (tpl) {
            	if(tpl.status){
					layer.open({
						type: 1,
						area: ['450', '550px'],
						data:'',
						title: '添加',
						content: tpl.data,
						btn:['保存','关闭'],
						yes:function (index,layero) {
							var thedata = $('.goodsCatForm').serialize();
							JsPost('<?php echo url("Categories/edit"); ?>',thedata,function (re) {
								if(re.status){
									layer.msg('保存成功');
									layer.close(index);
									//userTables.reload();
									layui.table.reload('categories', {
										where: {parent_id:pid}
									});
								}else{
									layer.msg(re.msg);
								}
							});
						}
					});
				}else{
					layer.msg(tpl.msg);
				}
            });
            return false;
        });
        //编辑分类
        $(document).on('click','.option-edit',function(){
            var id = $(this).attr('data-id');
            JsGet('<?php echo url("Categories/edit"); ?>?id='+id,function (tpl) {
            	if(tpl.status){
					layer.open({
						type: 1,
						area: ['450px', '550px'],
						data:'',
						title: '编辑',
						content: tpl.data,
						btn:['保存','关闭'],
						yes:function (index,layero) {
							var thedata = $('.goodsCatForm').serialize();
							JsPost('<?php echo url("Categories/edit"); ?>',thedata,function (re) {
								if(re.status){
									layer.msg('保存成功');
									layer.close(index);
									layui.table.reload('categories', {
										where: {parent_id:pid}
									});
								}else{
									layer.msg(re.msg);
								}
							});
						}
					});
				}else{
					layer.msg(tpl.msg);
				}
            });
        });

        //删除分类
        $(document).on('click', '.option-del', function(){
            var id = $(this).attr('data-id');
            layer.confirm('确认删除此分类吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function(){
            	JsPost('<?php echo url("Categories/del"); ?>', {'id': id}, function(e){
					if(e.status === true){
						layer.msg('删除成功');
						layui.table.reload('categories', {
							where: {parent_id:pid}
						});
					}else{
						layer.msg(e.msg, {time: 1300});
					}
				});
            });
        });
    });
</script>
</div>
</body>
</html>
