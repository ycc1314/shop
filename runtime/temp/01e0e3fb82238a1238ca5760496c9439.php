<?php /*a:2:{s:88:"/Users/seven/feisujie-master/shop/application/manage/view/administrator/information.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <div class="layui-card" style="padding:10px;">
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">账号信息</li>
            <li>修改密码</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form" action="" style="padding-top: 20px;">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名：</label>
                        <div class="layui-form-mid">
                            <?php echo htmlentities($manage_info['username']); ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">手机号：</label>
                        <div class="layui-form-mid"><?php echo htmlentities($manage_info['mobile']); ?></div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">账号状态：</label>
                        <div class="layui-form-mid"><?php echo htmlentities($params['manage']['status'][$manage_info['status']]); ?></div>
                    </div>
                </form>
            </div>
            <div class="layui-tab-item">
                <form class="layui-form" action="" style="padding-top: 20px;" id="editForm">
                    <div class="layui-form-item">
                        <label class="layui-form-label">原密码：</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" required lay-verify="required" placeholder="请输入当前密码" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">新密码：</label>
                        <div class="layui-input-inline">
                            <input type="password" name="newPwd" required lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">确认密码：</label>
                        <div class="layui-input-inline">
                            <input type="password" name="rePwd" required lay-verify="required" placeholder="确认新密码" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button type="button" class="layui-btn" lay-submit lay-filter="editPwd">保存</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    layui.use(['form','layer','element'],function(){
        var $ = layui.$, form = layui.form,element = layui.element, layer = layui.layer;
        form.render();
        //修改密码
        form.on('submit(editPwd)',function(data){
            JsPost("<?php echo url('administrator/editPwd'); ?>", data.field, function(res){
                if(res.status){
                    $("#editForm")[0].reset();
                }
                layer.msg(res.msg);
            })
        });
    });
</script>
</div>
</body>
</html>
