<?php /*a:1:{s:75:"/Users/seven/feisujie-master/shop/application/manage/view/common/login.html";i:1567760372;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities((isset($shop_name) && ($shop_name !== '')?$shop_name:'Jshop小程序商城')); ?>管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/lib/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/lib/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/static/lib/layuiadmin/style/login.css" media="all">


</head>

<body>

    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">

        <div class="layadmin-user-login-main">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>Jshop小程序商城</h2>
                <p>吉海科技 -- 致力于为客户创造有价值的产品</p>
            </div>
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                <form class="layui-form">

                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                        <input type="text" name="mobile" id="LAY-user-login-username" lay-verify="required" placeholder="账号" class="layui-input">
                    </div>
                    <div class="layui-form-item">
                        <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                        <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
                    </div>

                    <div class="layui-form-item" style="display:none;" id="captcha_div">
                        <div class="layui-row">
                            <div class="layui-col-xs7">
                                <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                                <input type="text" name="captcha" id="captcha_ipt" placeholder="验证码" class="layui-input">
                            </div>
                            <div class="layui-col-xs5">
                                <div style="margin-left: 10px;">
                                    <img src="<?php echo captcha_src(); ?>" id="captcha_img" onclick="setCaptcha()" title="点击更换验证码" alt="captcha" style="max-width:120px;cursor:pointer;" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <?php echo jshopToken(); ?>
                        <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="password_login">登 录</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="layui-trans layadmin-user-login-footer">

            <p>© 2019 <a href="https://www.jihainet.com/" target="_blank">河南吉海网络科技有限公司 jihainet.com</a></p>
            <p>
                <span><a href="https://www.jihainet.com/" target="_blank">获取授权</a></span>
                <span><a href="https://b2c.jihainet.com/manage" target="_blank">在线演示</a></span>
                <span><a href="https://www.jihainet.com/" target="_blank">前往官网</a></span>
            </p>
        </div>
    </div>
	<canvas id="canvas"></canvas>
	<script src="/static/js/login-bg.js"></script>
    <script src="/static/lib/layuiadmin/layui/layui.js"></script>
    <script src="/static/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/static/js/jshop.js"></script>
    <script>
        layui.config({
            base: '/static/lib/layuiadmin/' //静态资源所在路径
        }).extend({
            index: 'lib/index' //主入口模块
        }).use(['index', 'form'], function() {
            var $ = layui.$,
                setter = layui.setter,
                admin = layui.admin;

            var form = layui.form;
            form.render();

            //提交
            form.on('submit(password_login)', function(data) {
                JsPost("<?php echo url('manage/common/login'); ?>", data.field, function(data){
                    if (data.status) {
                        layer.msg('登陆成功，跳转中...');
                        setTimeout("window.location.href='" + data.data + "'; ", 1500);
                    } else {
                        if (data.data == '10013' || data.data == '10012') {
                            $('#captcha_div').show();
                        }
                        setCaptcha();
                        layer.msg(data.msg);
                    }
                });
                return false;
            });

            //更改验证码图片
            setCaptcha = function() {
                $('#captcha_ipt').val("");
                var timestamp = new Date().getTime();
                $('#captcha_img').attr('src', '<?php echo captcha_src(); ?>?' + timestamp);
            }
        });
    </script>
</body>
<style>
body {
  background-color: #eee;
  overflow: hidden;
}
canvas {
  background-color: #eee;
  display: block;
  margin: 0 auto;
  position: absolute;
  top: 0;
}
.layadmin-user-login{
	z-index: 99;
}
</style>
</html>