<?php /*a:2:{s:79:"/Users/seven/feisujie-master/shop/application/manage/view/form/submit_list.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label class="layui-form-label seller-inline-2">表单：</label>
            <div class="layui-input-inline seller-inline-4">
                <select name="form_id" >
                    <option>请选择</option>
                    <?php if(is_array($formList) || $formList instanceof \think\Collection || $formList instanceof \think\Paginator): $i = 0; $__LIST__ = $formList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['name']); ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <button type="button" class="layui-btn layui-btn-sm" lay-submit lay-filter="form-search"><i class="iconfont icon-chaxun"></i>筛选</button>
        </div>
    </div>

</form>

<div class="table-body">
    <table id="formTable" lay-filter="formTable"></table>
</div>

<script>
    layui.use(['table','form','layer','laydate'],function(){
        var layer = layui.layer, table = layui.table,form = layui.form,date = layui.laydate;
        //执行渲染
        table.render({
            elem: '#formTable', //指定原始表格元素选择器（推荐id选择器）
            height: 'full-99',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            id:'formTable',
            url: "<?php echo url('form/formSubmit'); ?>",
            cols: [[ //标题栏
                {type:'numbers'},
                {field: 'form_name', title: '表单名称',align:'center'},
                {field: 'user_name', title: '用户',align:'center'},
                {field: 'ip', title: '用户IP',align:'center'},
                {field: 'status', title: '状态',align:'center'},
                {field: 'feedback', title: '反馈',align:'center'},
                {field: 'money', title: '支付金额',align:'center'},
                {field: 'pay_status', title: '支付状态',align:'center'},
                {field: 'ctime',sort: true, title: '提交时间' ,align:'center'},
                {field: 'utime', sort: true, title: '更新时间',align:'center'},
                {width:150, title:'操作',align:'center', toolbar:'#formBar'}
            ]]
        });
        //search
        date.render({
            elem:'#utime'
        });
        form.on('submit(form-search)', function(data){
            layui.table.reload('formTable', {
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        $(document).on('click','.add-form',function(){
            window.location.href="<?php echo url('Form/add'); ?>";
        });


        //监听工具条
        table.on('tool(formTable)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            if(layEvent === 'del'){ //删除
                layer.confirm('真的要删除么',{icon: 3}, function(index){
                    JsGet("<?php echo url('form/delSubmit'); ?>?id=" + data.id, function(res){
                        if(res.status){
                            obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                            layer.close(index);//向服务端发送删除指令
                        }
                        layer.msg(res.msg);
                    })
                });
            } else if(layEvent === 'info'){ //明细
                JsGet("<?php echo url('Form/formSubmitDetail'); ?>?id="+data.id,function(e){
                    if(e.status){
                        window.box = layer.open({
                            type: 1,
                            content: e.data,
                            area: ['620px', '600px'],
                            title:'明细',
                            btn:['打印','关闭'],
                            btnAlign:'c',
                            yes: function(index, layero){
                                printTemplate();
                            },
                            cancel: function(){
                                layer.closeAll();
                            }
                        });
                    }else{
                        layer.msg(e.msg);
                    }
                });
            } else if(layEvent === 'edit'){ //反馈

                JsGet("<?php echo url('Form/editformSubmit'); ?>?id="+data.id,function(e){
                    if(e.status){
                        window.box = layer.open({
                            type: 1,
                            content: e.data,
                            area: ['500px', '300px'],
                            title:'编辑反馈',
                            btn: ['确定','取消'],
                            yes: function(){
                                var data = $("#formSubmitEdit").serializeArray();
                                JsPost('<?php echo url("Form/editformSubmit"); ?>',data,function(e){
                                    if(e.status){
                                        layer.close(window.box);
                                        layer.msg(e.msg, {time:1300},function(){
                                            layui.table.reload('formTable');
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
            }
        });
    })
</script>
<script type="text/html" id="formBar">
    <a class="layui-btn layui-btn-xs" lay-event="info">明细</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">反馈</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

</div>
</body>
</html>
