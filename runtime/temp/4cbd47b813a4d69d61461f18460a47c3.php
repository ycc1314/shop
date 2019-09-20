<?php /*a:2:{s:74:"/Users/seven/feisujie-master/shop/application/manage/view/wechat/edit.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <form class="layui-form seller-alone-form" method="post" action="<?php echo url('Wechat/doEdit'); ?>">
    <div class="warning-msg">
        <div class="warning-msg-content">
            <p>请先登录公众平台<a href="javascript:;" lay-href="https://mp.weixin.qq.com">mp.weixin.qq.com</a>配置url，再根据页面要求填写信息并保存
                <a href="javascript:;"  lay-href="https://www.kancloud.cn/jihainet/jshop_operate/" >[帮助手册]</a></p>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2">request合法域名：</label>
        <div class="layui-form-mid "><?php echo htmlentities($weixin_host); ?></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2">socket合法域名：</label>
        <div class="layui-form-mid "><?php echo htmlentities($weixin_host); ?></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2">uploadFile合法域名：</label>
        <div class="layui-form-mid "><?php echo htmlentities($weixin_host); ?></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2">downloadFile合法域名：</label>
        <div class="layui-form-mid "><?php echo htmlentities($weixin_host); ?></div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2"><i class="required-color">*</i>小程序名称：</label>
        <div class="layui-input-inline seller-inline-5">
            <input type="text" required lay-verify="required" name="wx_nick_name" value="<?php echo htmlentities($data['wx_nick_name']['value']); ?>" class="layui-input" placeholder="请输入小程序名称" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2"><i class="required-color">*</i>AppId：</label>
        <div class="layui-input-inline seller-inline-5">
            <input type="text" name="wx_appid" required lay-verify="required" value="<?php echo htmlentities($data['wx_appid']['value']); ?>" autocomplete="off" placeholder="请输入小程序AppId" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            请至微信小程序平台 设置》开发设置 中复制粘贴过来
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2"><i class="required-color">*</i>AppSecret：</label>
        <div class="layui-input-inline seller-inline-5">
            <input type="text" name="wx_app_secret" required lay-verify="required" value="<?php echo htmlentities($data['wx_app_secret']['value']); ?>" autocomplete="off" placeholder="请输入小程序AppSecret" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            请至微信小程序平台 设置》开发设置 中复制粘贴过来
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2"><i class="required-color">*</i>原始Id：</label>
        <div class="layui-input-inline seller-inline-5">
            <input type="text" name="wx_user_name" required lay-verify="required" value="<?php echo htmlentities($data['wx_user_name']['value']); ?>" autocomplete="off" placeholder="请输入小程序原始Id" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            请至微信小程序平台 设置》开发设置 中复制粘贴过来
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2"><i class="required-color">*</i>主体信息：</label>
        <div class="layui-input-inline seller-inline-5">
            <input type="text" name="wx_principal_name" required lay-verify="required" value="<?php echo htmlentities($data['wx_principal_name']['value']); ?>" autocomplete="off" placeholder="请输入小程序主体信息" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">
            请至微信小程序平台 设置》基本设置 中复制粘贴过来
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label seller-inline-2">简介：</label>
        <div class="layui-input-inline seller-inline-5">
            <textarea placeholder="请输入小程序简介" name="wx_signature" class="layui-textarea"><?php echo htmlentities($data['wx_signature']['value']); ?></textarea>
        </div>
    </div>
    <br />
    <!--<div class="layui-form-item">
        <label class="layui-form-label seller-inline-2">Logo：</label>
        <div class="layui-input-inline seller-inline-5">
            
            <button type="button" class="layui-btn" id="upload_img_head_img" onclick="upImaghead_imge()">上传图片</button>
            <div class="layui-upload-list">
                <img class="layui-upload-img"  src='<?php echo _sImage($data['wx_head_img']['value'])?>' id="image_src_head_img" style="width:90px;height:90px;" >
                <p id="upload_text_head_img"></p>
            </div>
            <input class="layui-upload-file" type="hidden" name="wx_head_img"  id="image_value_head_img" value="<?php echo $data['wx_head_img']['value']?>">
            <textarea id="edit_head_img" style="display: none;"></textarea>
            <script>
            var _editohead_imgr = UE.getEditor("edit_head_img",{
                initialFrameWidth:800,
                initialFrameHeight:300,
                zIndex:19891026,
                 single:false
            });
            _editohead_imgr.ready(function (){
                //_editohead_imgr.setDisabled();
                _editohead_imgr.hide();
                //侦听图片上传
                _editohead_imgr.addListener('beforeInsertImage',function(t,arg){
                        $("#image_value_head_img").attr("value",arg[0].image_id);
                        $("#image_src_head_img").attr("src",arg[0].src);
                });
            });
            //上传dialog
            function upImaghead_imge(){
                var myImaghead_imge = _editohead_imgr.getDialog("insertimage");
                myImaghead_imge.open();
            }
</script>
            
        </div>
    </div>-->
    <div class="layui-form-item">
        <div class="layui-input-block">
            <?php echo jshopToken(); ?>
            <button class="layui-btn " lay-submit="" lay-filter="save">保存</button>
            <a href="javascript:history.back(-1);" class="layui-btn layui-btn-primary" lay-submit="" lay-filter="cancleAuthor">返回</a>
        </div>
    </div>
</form>
<script>
    layui.use(['form','laytpl','upload'], function() {
        var $ = layui.jquery;
        var form = layui.form;
        form.render();
        form.on('submit(save)', function(data){
            formData = data.field;
            if(!formData){
                layer.msg('请先完善数据', {time: 1300});
                return false;
            }
            JsPost('<?php echo url("Wechat/doEdit"); ?>',formData,function (e) {
                if(e.status === true){
                    layer.msg(e.msg, {time: 1300}, function(){
                        window.location.reload();
                    });
                }else{
                    layer.msg(e.msg, {time: 1300});
                }
            });
            return false;
        });
    });
</script>
<style>
    .seller-inline-2{
        width: 140px !important;
    }
</style>
</div>
</body>
</html>
