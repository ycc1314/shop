<?php /*a:1:{s:72:"/Users/seven/feisujie-master/shop/application/manage/view/pages/add.html";i:1567760372;}*/ ?>
<div style="padding: 30px;" class="layui-form seller-alone-form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->

    <div class="layui-form-item">
        <label class="layui-form-label"><i class="required-color">*</i> 名称：</label>
        <div class="layui-input-inline seller-inline-4">
            <input type="text" name="name" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">编码：</label>
        <div class="layui-input-inline seller-inline-4">
            <input type="text" name="code" required lay-verify="required" value=""  class="layui-input">
        </div>
    </div>


    <div class="layui-form-item layui-form-text" style="margin-bottom: 20px">
        <label class="layui-form-label"><i class="required-color">*</i>描述：</label>
        <div class="layui-input-inline seller-inline-4">
            <textarea name="desc" placeholder="内容描述信息" class="layui-textarea"></textarea>
        </div>
    </div>

    <?php echo jshopToken(); ?>
    <button class="layui-btn layui-btn-fluid add-save-btn" lay-submit lay-filter="add_submit">保存</button>

</div>

<script>
    layui.use('form', function(){
        layui.form.render();
    });
</script>