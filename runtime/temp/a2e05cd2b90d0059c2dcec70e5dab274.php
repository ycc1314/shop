<?php /*a:1:{s:72:"/Users/seven/feisujie-master/shop/application/manage/view/brand/add.html";i:1567760372;}*/ ?>
<div style="padding: 30px;" class="layui-form layui-form-pane"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->

    <div class="layui-form-item">
        <label class="layui-form-label"><i class="required-color">*</i> 品牌名称：</label>
        <div class="layui-input-inline seller-inline-4">
            <input type="text" name="name" required lay-verify="required" placeholder="请输入品牌名称" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-upload">
        <label class="layui-form-label">LOGO：</label>
        <div class="layui-input-inline seller-inline-4">
        	
            <button type="button" class="layui-btn" id="upload_img_logo" onclick="upImaglogoe()">上传图片</button>
            <div class="layui-upload-list">
                <img class="layui-upload-img"  src="https://b2c.jihainet.com/static/images/default.png" id="image_src_logo" style="width:90px;height:90px;" >
                <p id="upload_text_logo"></p>
            </div>
            <input class="layui-upload-file" type="hidden" name="logo"  id="image_value_logo" value="">
            <textarea id="edit_logo" style="display: none;"></textarea>
            <script>
            var _editologor = UE.getEditor("edit_logo",{
                initialFrameWidth:800,
                initialFrameHeight:300,
                zIndex:19891026,
                single:false
            });
            _editologor.ready(function (){
                //_editologor.setDisabled();
                _editologor.hide();
                //侦听图片上传
                _editologor.addListener('beforeInsertImage',function(t,arg){
                        $("#image_value_logo").attr("value",arg[0].image_id);
                        //将图片地址赋给img的src,实现预览
                        $("#image_src_logo").attr("src",arg[0].src);
                });
            });
            //上传dialog
            function upImaglogoe(){
                var myImaglogoe = _editologor.getDialog("insertimage");
                myImaglogoe.open();
            }
</script>
            
            <div class="layui-form-mid layui-word-aux list-tag">
                图标尺寸建议：120px*120px
            </div>
        </div>	
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">排序：</label>
        <div class="layui-input-inline seller-inline-4">
            <input type="text" name="sort" required lay-verify="required" value="100" placeholder="数值越小越靠前" autocomplete="off" class="layui-input">
        </div>
    </div>
    <?php echo jshopToken(); ?>
    <button class="layui-btn layui-btn-fluid save-brand" lay-submit lay-filter="add-brand">保存</button>

</div>

<script>
    layui.use('form', function(){
        layui.form.render();
    });
</script>