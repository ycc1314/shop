<?php /*a:1:{s:61:"/Users/seven/feisujie-master/shop/addons/MPAlipay/config.html";i:1562722234;}*/ ?>
<form class="layui-form" action="#" method="post">
    <div style="padding: 30px;" class="layui-form layui-form-pane">
        <div class="layui-tab-content">
            <div class="layui-form-item">
                <label class="layui-form-label">APPID：</label>
                <div class="layui-input-block">
                    <input type="text" name="setting[mp_alipay_appid]" value="<?php echo htmlentities($config['mp_alipay_appid']); ?>" required
                           lay-verify="required" placeholder="请填写支付宝小程序appid" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-tab-content" style="text-align: center">
            支付宝小程序申请地址：<a style="color:#FF7159" href="https://mini.open.alipay.com/channel/miniIndex.htm" target="_blank">点击这里</a>
        </div>
    </div>
    <script>
        layui.use('element', function () {
            //监听提交
            var $ = layui.jquery
                    , element = layui.element;
        });
    </script>
</form>