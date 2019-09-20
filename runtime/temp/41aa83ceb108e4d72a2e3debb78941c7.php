<?php /*a:4:{s:76:"/Users/seven/feisujie-master/shop/application/manage/view/payments/edit.html";i:1567760372;s:85:"/Users/seven/feisujie-master/shop/application/manage/view/payments/tpl/wechatpay.html";i:1567760372;s:82:"/Users/seven/feisujie-master/shop/application/manage/view/payments/tpl/alipay.html";i:1567760372;s:83:"/Users/seven/feisujie-master/shop/application/manage/view/payments/tpl/offline.html";i:1567760372;}*/ ?>
<form class="layui-form payment_form" id="payment_form" action="" style="margin:10px;">
    <input type="hidden" name="code" value="<?php echo htmlentities($code); ?>" />

    <div class="layui-form-item">
        <label class="layui-form-label">支付方式：</label>
        <div class="layui-input-block">
            <div class="layui-form-mid"><?php echo htmlentities($paymentInfo['name']); ?>(<?php echo htmlentities($code); ?>)</div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">类型：</label>
        <div class="layui-input-block">
            <div class="layui-form-mid"><?php echo htmlentities($params['payments']['is_online'][$paymentInfo['is_online']]); ?></div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">描述：</label>
        <div class="layui-input-block">
            <div class="layui-form-mid"><?php echo htmlentities($paymentInfo['memo']); ?></div>
        </div>
    </div>
        <?php switch($code): case "wechatpay": ?>
                <div class="layui-form-item">
    <label class="layui-form-label">appid：</label>
    <div class="layui-input-block">
        appid的取值是取的在后台》微信管理》小程序配置里和后台》微信管理》公众号配置里的appid，当是微信公众号内支付的话，使用的就是微信公众号的appid，当是小程序支付的话，使用的是小程序的appid，当只有h5端微信支付的时候，不开启微信公众号和微信小程序的时候，这两个appid随便写一个，就可以了。
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">mch_id：</label>
    <div class="layui-input-inline seller-inline-6">
        <input type="text" name="params[mch_id]" value="<?php echo htmlentities($paymentInfo['params']['mch_id']); ?>" required  lay-verify="required" placeholder="请输入商户号" autocomplete="off" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">key：</label>
    <div class="layui-input-inline seller-inline-6">
        <input type="text" name="params[key]" value="<?php echo htmlentities($paymentInfo['params']['key']); ?>" required  lay-verify="required" placeholder="请输入key" autocomplete="off" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label class="layui-form-label">证书</label>
    <div class="layui-input-block">
        如果在线退款的话，需要手动上传cert证书和key证书，不在线退款的话，可以不传cert证书和key证书<br />
        cert证书请手动上传到/config/payment_cert/wechatpay/apiclient_cert.pem，
        key证书请手动上传到/config/payment_cert/wechatpay/apiclient_key.pem。

    </div>
</div>

<script>
    layui.use('upload', function() {
        var $ = layui.jquery;
    });


</script>
            <?php break; case "alipay": ?>
                <div class="layui-form-item">
    <label class="layui-form-label">appid：</label>
    <div class="layui-input-inline seller-inline-6">
        <input type="text" name="params[appid]" value="<?php echo htmlentities($paymentInfo['params']['appid']); ?>" required lay-verify="required" placeholder="请输入appid" autocomplete="off" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">RSA私钥：</label>
    <div class="layui-input-block">
        <textarea placeholder="请输入私钥" class="layui-textarea" lay-verify="required" name="params[rsa_private_key]"><?php echo htmlentities($paymentInfo['params']['rsa_private_key']); ?></textarea>
        <div class="layui-form-mid">请输入私钥内容，并确定应用的公钥已经上传到支付宝里了</div>
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">支付宝公钥：</label>
    <div class="layui-input-block">
        <textarea placeholder="请输入支付宝公钥" class="layui-textarea" lay-verify="required" name="params[alipay_public_key]"><?php echo htmlentities($paymentInfo['params']['alipay_public_key']); ?></textarea>
        <div class="layui-form-mid">请输入支付宝公钥，<a style="color:red;" href="https://docs.open.alipay.com/291/105972" target="_blank">上传应用公钥并获取支付宝公钥</a> </div>
    </div>
</div>
            <?php break; case "offline": break; ?>
        <?php endswitch; ?>

    <div class="layui-form-item">
        <label class="layui-form-label">排序：</label>
        <div class="layui-input-block">
            <input type="text" name="sort" required style="width:60px;"  lay-verify="required" value="<?php echo htmlentities($paymentInfo['sort']); ?>" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态：</label>
        <div class="layui-input-block">
            <input type="checkbox" name="status" lay-skin="switch" <?php if($paymentInfo['status'] == 1): ?>checked<?php endif; ?>  value="1" lay-text="启用|禁用">
        </div>
    </div>
    <?php echo jshopToken(); ?>
</form>


<script>
    layui.use('form', function(){
        layui.form.render();
        //各种基于事件的操作，下面会有进一步介绍
    });
</script>