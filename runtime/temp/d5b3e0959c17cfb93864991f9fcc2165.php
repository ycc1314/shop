<?php /*a:2:{s:72:"/Users/seven/feisujie-master/shop/application/manage/view/sms/index.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
            <label style="width:100px" class="layui-form-label">用户手机号码：</label>
            <div class="layui-input-inline">
                <input type="text" name="mobile" lay-verify="title" placeholder="请输入手机号码" autocomplete="off"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label style="width:100px" class="layui-form-label">IP：</label>
            <div class="layui-input-inline">
                <input type="text" name="ip" lay-verify="title" placeholder="请输入IP地址" autocomplete="off"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label style="width:100px" class="layui-form-label">类型：</label>
            <div class="layui-input-inline">
                <select name="code">
                    <option value="">请选择</option>
                    <optgroup label="短信消息">
                        <?php if(is_array($smsTpl) || $smsTpl instanceof \think\Collection || $smsTpl instanceof \think\Paginator): $i = 0; $__LIST__ = $smsTpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($vo['name']); ?>(<?php echo htmlentities($key); ?>)</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </optgroup>
                    <optgroup label="平台消息">
                        <?php if(is_array($platformTpl) || $platformTpl instanceof \think\Collection || $platformTpl instanceof \think\Paginator): $i = 0; $__LIST__ = $platformTpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($vo['name']); ?>(<?php echo htmlentities($key); ?>)</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </optgroup>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label style="width:100px" class="layui-form-label">状态：</label>
            <div class="layui-input-inline ">
                <select name="status" lay-verify="">
                    <option value=""></option>
                    <option value="1">未读</option>
                    <option value="2">已读</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label style="width:100px" class="layui-form-label">起止时间：</label>
            <div class="layui-input-inline">
                <input type="text" name="date" value="" id="date" placeholder="请输入起止时间" autocomplete="off"
                    class="layui-input">
            </div>
        </div>


        <div class="layui-inline">
            <button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="*"><i
                    class="iconfont icon-chaxun"></i>筛选</button>

        </div>
    </div>
</form>

<div class="table-body">
    <table id="message" lay-filter="test"></table>
</div>

<script>
    layui.use(['form', 'layedit', 'laydate', 'table'], function () {
        //时间插件
        layui.laydate.render({
            elem: '#date',
            range: '到',
            type: 'datetime'
        });
        //获取列表数据
        layui.table.render({
            elem: '#message',
            height: 'full-139',
            cellMinWidth: '80',
            page: 'true',
            limit: '20',
            url: "<?php echo url('Sms/index'); ?>?_ajax=1",
            id: 'message',
            method: 'post',
            cols: [[
                { type: 'numbers' },
                { field: 'mobile', width: 140, title: '手机号码' },
                { field: 'code', width: 150, title: '类型' },
                { field: 'content', title: '内容' },
                { field: 'ip', width: 140, title: 'IP' },
                { field: 'status', width: 80, title: '状态' },
                { field: 'ctime', width: 180, title: '时间', align: 'center' },
                {
                    field: 'operating', title: '操作', width: 90, align: 'center', templet: function (data) {
                        var html = '';
                        html += '<a  class="layui-btn layui-btn-xs layui-btn-danger option-del" data-id="' + data.id + '">删除</a>';
                        return html;
                    }
                }
            ]]
        });

        //搜索操作
        layui.form.on('submit(*)', function (data) {
            layui.table.reload('message', {
                where: data.field
                , page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        //删除操作
        $(document).on('click', '.option-del', function () {
            var id = $(this).attr('data-id');
            layer.confirm('确定要删除此消息吗？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                JsGet("<?php echo url('Sms/del'); ?>?id="+id, function(e){
                    layer.msg(e.msg);
                    if (e.status) {
                        layui.table.reload('message');
                    }
                });
            }, function () {

            });

        });
    });
</script>
</div>
</body>
</html>
