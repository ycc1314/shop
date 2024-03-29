<?php /*a:2:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/goods/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <style type="text/css">
	.layui-card-body{
		background-color: #fff;
		padding: 10px;
		margin-top: 10px;
		border: 1px solid #e6e6e6;
	}

	.layui-tab-card>.layui-tab-title{
		background-color: #f9f9f9;
		border-bottom: none;
	}
	.layui-tab-content{
		padding: 0;
	}
	.layui-table, .layui-table-view{
		margin: 0;
	}
    .layui-margin-10{
        margin:10px ;
    }
	.layui-layer-page .layui-layer-content{
		overflow: initial;
	}
</style>
<script src="/static/js/jquery.form.js" type="text/javascript" charset="utf-8"></script>

<form class="layui-form seller-form"  action="" >
    <div class="layui-form-item">

        <div class="layui-inline">
            <label class="layui-form-label">商品名称：</label>
            <div class="layui-input-inline seller-inline-4">
                <input type="text" name="name" lay-verify="title" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">上架状态：</label>
            <div class="layui-input-inline seller-inline-2">
                    <select name="marketable" id="marketable">
                        <option value="">全部</option>
                        <option value="1">上架</option>
                        <option value="2">下架</option>
                    </select>
            </div>
        </div>

        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="goods-search"><i class="iconfont icon-chaxun"></i>筛选</button>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" id="addGoods" lay-filter="goods-add"><i class="layui-icon">&#xe608;</i>添加商品</button>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">批量操作：</label>
            <div class="layui-input-inline seller-inline-2">
                <select name="batchOperate" id="batchOperate" lay-filter="batchOperate">
                    <option value=""></option>
                    <option value="modify_price">修改价格</option>
                    <option value="modify_stock">调整库存</option>
                    <option value="marketable_up">批量上架</option>
                    <option value="marketable_down">批量下架</option>
                    <option value="label">打标签</option>
                    <option value="dellabel">去标签</option>
                    <option value="del">删除</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
                <button type="button" class="layui-btn layui-btn-sm" lay-submit lay-filter="import-goods"><i class="layui-icon"></i>导入商品</button>
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm"  lay-submit lay-filter="export-goods"><i class="iconfont icon-msnui-cloud-download" style="font-size: 20px !important;"></i>导出</button>
        </div>
        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" id="Goods" lay-submit lay-filter="advance-goods-search"><i class="iconfont icon-shaixuan"></i>高级筛选</button>
        </div>
    </div>
</form>

<div class="layui-card-body">
	<div class="layui-tab layui-tab-card" lay-filter="goods-tab" style="margin:0;">
		<ul class="layui-tab-title">
            <li class="layui-this" lay-id="all">全部商品<span class="layui-badge layui-bg-gray"><?php echo htmlentities((isset($statics['totalGoods']) && ($statics['totalGoods'] !== '')?$statics['totalGoods']:0)); ?></span></li>
            <li lay-id="up">上架商品<span class="layui-badge layui-bg-green"><?php echo htmlentities((isset($statics['totalMarketableUp']) && ($statics['totalMarketableUp'] !== '')?$statics['totalMarketableUp']:0)); ?></span></li>
            <li lay-id="down">下架商品<span class="layui-badge layui-bg-black"><?php echo htmlentities((isset($statics['totalMarketableDown']) && ($statics['totalMarketableDown'] !== '')?$statics['totalMarketableDown']:0)); ?></span></li>
            <li lay-id="warn">库存报警<span class="layui-badge"><?php echo htmlentities((isset($statics['totalWarn']) && ($statics['totalWarn'] !== '')?$statics['totalWarn']:0)); ?></span></li>
        </ul>
        <div class="layui-tab-content" >
            <table id="goodsTable" lay-filter="test"></table>
        </div>
	</div>
</div>


<div id="exportGoods" style="display: none;">
    <form class="layui-form export-form"  action="" >
        <div class="layui-form-item">
            <div class="layui-margin-10">
                <blockquote class="layui-elem-quote layui-text">
                    请先选中或筛选要导出的商品
                </blockquote>
            </div>

            <div class="layui-inline">
                <label class="layui-form-label">任务名称：</label>
                <input type="text" name="taskname" lay-verify="title" style="width:200px;" placeholder="请输入任务名称" autocomplete="off" class="layui-input">
            </div>
        </div>
    </form>
</div>

<div id="importGoods" style="display: none;">
    <form class="layui-form import-form" method="post" action="<?php echo url('ietask/import'); ?>" enctype="multipart/form-data">
        <div class="layui-form-item">
            <div class="layui-margin-10">
                <blockquote class="layui-elem-quote layui-text">
                    请先下载<a href="<?php echo url('ietask/importTemplete',['tplName'=>'goods']); ?>">导入模板</a>
                </blockquote>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">
                    <input type="file" class="layui-file" name="importFile" id="importFile">
                    <input type="hidden" name="model" value="Goods">
                </label>
            </div>
        </div>
    </form>
</div>
<script>
    var table, window_box;
    layui.use(['form', 'layedit','upload', 'laydate','table','element'], function(){
        var upload = layui.upload;
        var element = layui.element;
        var filter = {};

        table = layui.table.render({
            elem: '#goodsTable',
            height: 'full-181',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            url: "<?php echo url('Goods/index'); ?>?_ajax=1",
            id:'goodsTable',
            cols: [[
                {type:'checkbox'},
                {type:'numbers'},
                {field:'operating',width:180,title:'操作', align: 'center',templet:function(data){
                    var html = '';
                    html += '<a class="layui-btn layui-btn-xs edit-class" data-id="' + data.id + '">编辑</a>';
                    html += '<a class="layui-btn layui-btn-danger layui-btn-xs del-class" data-name="'+data.name+'" data-id="' + data.id + '">删除</a>';
                    html += '<a class="layui-btn layui-btn-xs comment-class" href="<?php echo url('goods/commentList'); ?>?goods_id=' + data.id + '">查看评价</a>';
                    return html;
                }},
                {field:'state',sort: true,title:'热门',width:80,align:'center',templet: '#hot', unresize: true},
                {field:'state',sort: true,title:'推荐',width:80,align:'center',templet: '#rec', unresize: true},
                {field:'image', width:100,title:'缩略图', align: 'center',templet: function(data){
                        return '<a href="javascript:void(0);" onclick=viewImage("'+data.image+'")><image style="max-width:30px;max-height:30px;" src="'+data.image+'"/></a>';
                }},
                {field:'name', width:250,title:'名称', align: 'center'},
                {field:'sort', edit: 'text', width:80,title:'排序', align: 'center',templet: function (data) {
                    var html = '<a class="link-hot option-show sort" data-id="' + data.sort + '">' + data.sort + '</a>';
                    return html;
                }},
                {field:'label_ids', width:120,title:'标签', align: 'center',templet:function (data) {
                    if(data.hasOwnProperty('label_ids') && data.label_ids){
                        return getLabel(data.label_ids);
                    }else{
                        return '';
                    }
                }},
                {field:'price', width:100,title:'销售价', align: 'center', templet:function(data){return '￥'+data.price}},
                {field:'costprice', width:100,title:'成本价', align: 'center', templet:function(data){return '￥'+data.costprice}},
                {field:'mktprice', width:100,title:'市场价', align: 'center', templet:function(data){return '￥'+data.mktprice}},
                {field:'cat_name', width:150,title:'分类', align: 'center'},
                {field:'type_name', width:150,title:'类型', align: 'center'},
                {field:'brand_name', width:100,title:'品牌', align: 'center'},
                {field:'marketable', width:100,title:'上下架', align: 'center',templet:function(data){
                    if(data.marketable == '1'){
                        return '<a href="javascript:void(0);">上架</a>';
                    }else{
                        return '<a href="javascript:void(0);">下架</a>';
                    }
                }},
                {field:'stock', width:100,title:'库存', align: 'center'}

            ]]
        });

        layui.table.on('edit(test)', function(obj){

            JsPost("<?php echo url('goods/updateSort'); ?>",{'field':obj.field,'value':obj.value,'id':obj.data.id},function(res){
                    layer.msg(res.msg, {time:1500}, function(){
                        if(res.status){
                            table.reload();
                        }
                    });
                }
            );
        });

        //商品导入
        layui.form.on('submit(import-goods)', function(data) {
            layer.open({
                type: 1,
                title:'商品导入',
                area: ['400px', '290px'], //宽高
                btn:['确定','取消'],
                content: $("#importGoods").html(),
                yes:function (index,obj) {
                    $(obj).find('.import-form').ajaxSubmit({
                        type:'post',
                        dataType:'json',
                        success:function(result){
                            layer.msg(result.msg, {time:1500}, function(){
                                if(result.status){
                                    table.reload();
                                    layer.closeAll();
                                }
                            });
                        },
                        error:function(result){
                            layer.msg("导入失败");
                        }
                    });
                },btn2:function () {
                    layer.closeAll();
                }
            });
        });

        //商品导出
        layui.form.on('submit(export-goods)', function(data){
            layer.open({
                type: 1,
                title:'商品导出',
                area: ['400px', '290px'], //宽高
                btn:['确定','取消'],
                content: $("#exportGoods").html(),
                yes:function () {
                    //判断是否有选中
                    var checkStatus = layui.table.checkStatus('goodsTable');
                    var checkData = checkStatus.data;
                    var length = checkStatus.data.length;
                    var selectIds = '';
                    var ids = [];
                    if(length){
                        $.each(checkData,function (i,obj) {
                            ids.push(obj.id);
                        });
                    }
                    var filter=$(".seller-form").serialize();
                    filter+='&ids='+ids;
                    $(".export-form:last").append("<input type='hidden' name='filter' value='"+filter+"'>");
                    var data = $(".export-form:last").serializeArray();

                    data.push({'name':'model','value':'Goods'});

                    JsPost("<?php echo url('Ietask/export'); ?>",data,function(res){
                                layer.msg(res.msg, {time:1500}, function(){
                                    if(res.status){
                                        table.reload();
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

        element.on('tab(goods-tab)', function (data) {
            var type = this.getAttribute('lay-id');
            if (type == 'all') {
                filter = {};
            } else if (type == 'up') {
                delete filter.warn;
                filter['marketable'] = '1';
            } else if (type == 'down') {
                delete filter.warn;
                filter['marketable'] = '2';
            } else if (type == 'warn') {
                delete filter.marketable;
                filter['warn'] = 'true';
            }

            var basefilter = $(".seller-form").serializeArray();
            $.each(basefilter,function (i,obj) {
                if(!filter.hasOwnProperty(obj.name)){
                    filter[obj.name]=obj.value;
                }
            });
            table.reload({
                where: filter
                , page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
        });

        layui.form.on('submit(goods-search)', function(data){
            var tempfilter=$.extend({},filter,data.field);//合并tab筛选和普通搜索
            table.reload({
                where: tempfilter
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        layui.form.on('button("goods-add")', function(data){
            return false;
        });

        layui.form.on('submit(advance-goods-search)', function(data){
            JsGet("<?php echo url('goods/goodsSearch'); ?>",function (html) {
                if(html.status){
                    layer.open({
                        type: 1,
                        area: ['500px', '450px'],
                        fixed: false,
                        title:'高级筛选',
                        maxmin: false,
                        shade: 0,
                        content:html.data,
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var searchData = getFormData();
                            var advance = $(".advance-goods-search").serializeArray();
                            $.each(advance,function (i,obj) {
                                $(".seller-form").append('<input type="hidden" name="'+obj.name+'" value="'+obj.value+'">');
                            })

                            table.reload({
                                where: searchData
                                , page: {
                                    curr: 1 //重新从第 1 页开始
                                }
                            });
                            layer.close(index);
                        }
                        ,btn2: function(){
                            layer.closeAll();
                        }
                    });
                }else{
                    layer.msg(html.msg);
                }
            });
            return false;
        });
        //批量操作
        layui.form.on('select(batchOperate)', function(data){
            //判断是否有选中
            var checkStatus = layui.table.checkStatus('goodsTable');
            var checkData = checkStatus.data;
            var operate = data.value;
            var length = checkStatus.data.length;
            if(length<=0){
                layer.msg("请先选要操作的数据");
                return false;
            }
            var ids = [];
            $.each(checkData,function (i,obj) {
                ids.push(obj.id);
            });
            switch (operate){
                case 'marketable_up':
                    marketable(ids,'up');
                    break;
                case 'marketable_down':
                    marketable(ids,'down');
                    break;
                case 'label':
                    setLabel(ids);
                    break;
                case 'del':
                    delGoods(ids);
                    break;
                case 'dellabel':
                    dellabel(ids);
                    break;
                case 'modify_price':
                    modifyPrice(ids);
                    break;
                case 'modify_stock':
                    modifyStock(ids);
                    break;
                default :
                    layer.msg('请选择操作类型');
                    return false;
            }
        });
        //上下架操作
        function marketable(data,type) {
            layer.confirm('是否确定该操作？', {
                title:'提示',
                btn: ['是','否'] //按钮
            }, function(){
                JsPost("<?php echo url('Goods/batchMarketable'); ?>",{'ids':data,'type':type},function(res){
                        layer.msg(res.msg);
                        table.reload();
                    }
                );
                }
                , function(){
                    layer.closeAll();
                }
            );
        }
        //设置标签
        function setLabel(data) {
            JsPost('<?php echo url("label/setLabel"); ?>',{'ids':data,'model':'Goods'},function (res) {
                if(res.status){
                    layer.open({
                        type: 1,
                        area: ['700px', '450px'],
                        fixed: false, //不固定
                        title:'标签设置',
                        shade: 0,
                        content: res.data,
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            //do something
                            var selectedData = getSelected();
                            if(selectedData){
                                JsPost("<?php echo url('Label/doSetLabel'); ?>",{'ids':data,'label':selectedData,'model':'Goods'},function(res){
                                        layer.msg(res.msg);
                                        table.reload();
                                        layer.close(index);
                                    }
                                );
                            }

                        }
                        ,btn2: function(){
                            layer.closeAll();
                        }
                    });
                }else{
                    layer.msg(res.msg);
                }
            });
        }

        /**
         * 去标签
         * @param data
         */
        function dellabel(data) {
            JsPost('<?php echo url("label/delLabel"); ?>',{'ids':data,'model':'Goods'},function (res) {
                if(res.status){
                    layer.open({
                        type: 1,
                        area: ['500px', '350px'],
                        fixed: false, //不固定
                        title:'取消标签',
                        shade: 0,
                        content: res.data,
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            var selectedData = getSelected();
                            JsPost("<?php echo url('Label/doDelLabel'); ?>",{'ids':data,'label':selectedData,'model':'Goods'},function(res){
                                    layer.msg(res.msg);
                                    table.reload();
                                    layer.close(index);
                                }
                            );
                        }
                        ,btn2: function(){
                            layer.closeAll();
                        }
                    });
                }else{
                    layer.msg(res.msg);
                }
            });
        }

        //删除商品
        function delGoods(data) {
            layer.confirm('确认删除选中商品吗？', {
                title: '提示', btn: ['确认', '取消'] //按钮
            }, function(){
                JsPost("<?php echo url('Goods/batchDel'); ?>",{'ids':data},function(res){
                        layer.msg(res.msg);
                        table.reload();
                    }
                );
            });
        }

        /**
         * 修改价格
         */
        function modifyPrice(data){
            JsPost('<?php echo url("Goods/batchModifyPrice"); ?>',{'ids':data},function (res) {
                if(res.status){
                    layer.open({
                        type: 1,
                        area: ['700px', '450px'],
                        fixed: false, //不固定
                        title:'价格设置',
                        shade: 0,
                        content: res.data,
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            //do something
                            var formData = getFormData();
                            JsPost('<?php echo url("Goods/doBatchModifyPrice"); ?>',formData,function(e){
                                layer.msg(e.msg);
                                if(e.status){
                                    table.reload();
                                    layer.closeAll();
                                }

                            });
                        }
                        ,btn2: function(){
                            layer.closeAll();
                        }
                    });
                }else{
                    layer.msg(res.msg);
                }
            });
        }

        /**
         * 修改库存
         */
        function modifyStock(data){
            JsPost('<?php echo url("Goods/batchModifyStock"); ?>',{'ids':data},function (res) {
                if(res.status){
                    layer.open({
                        type: 1,
                        area: ['700px', '450px'],
                        fixed: false, //不固定
                        title:'库存设置',
                        shade: 0,
                        content: res.data,
                        btn: ['确定', '取消'],
                        yes: function(index, layero){
                            //do something
                            var formData = getFormData();
                            JsPost('<?php echo url("Goods/doBatchModifyStock"); ?>',formData,function(e){
                                layer.msg(e.msg);
                                if(e.status){
                                    table.reload();
                                    layer.closeAll();
                                }

                            });
                        }
                        ,btn2: function(){
                            layer.closeAll();
                        }
                    });
                }else{
                    layer.msg(res.msg);
                }
            });
        }

        //监听 操作状态
        layui.form.on('switch(is_hot)', function(obj){
            JsPost("<?php echo url('Goods/changeState'); ?>",{id:this.value,type:'hot',state:obj.elem.checked},function(res){
                layer.msg(res.msg);
            });
        });
        layui.form.on('switch(is_recommend)', function(obj){
            JsPost("<?php echo url('Goods/changeState'); ?>",{id:this.value,type:'rec',state:obj.elem.checked},function(res){
                layer.msg(res.msg);
            });
        });
    });

    //编辑商品
    $(document).on('click', '.edit-class', function(){
        var id = $(this).attr('data-id');
        var url = '<?php echo url("Goods/edit"); ?>?id='+id;
        window.location.href = url;
    });

    //删除商品
    $(document).on('click', '.del-class', function(){
        var id = $(this).attr('data-id');
        var goodsName = $(this).attr('data-name');
        layer.confirm('确认删除商品：'+goodsName+' 吗？', {
            title: '提示', btn: ['确认', '取消'] //按钮
        }, function(){
            delClass(id);
        });
    });

    //删除操作
    function delClass(id){
        JsPost('<?php echo url("goods/del"); ?>',{id:id},function(e){
            layer.msg(e.msg, {time: 1300}, function(){
                table.reload('goodsTable');
            });
        });
    }

    $("#addGoods").click(function(){
        window.location.href="<?php echo url('Goods/add'); ?>";
        return false;
    });
</script>

<script type="text/html" id="hot">
    <input type="checkbox" name="is_hot" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="is_hot" {{ d.is_hot == 1 ? 'checked' : '' }}>
</script>

<script type="text/html" id="rec">
    <input type="checkbox" name="is_recommend" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="is_recommend" {{ d.is_recommend == 1 ? 'checked' : '' }}>
</script>
</div>
</body>
</html>
