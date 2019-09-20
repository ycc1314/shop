<?php /*a:1:{s:72:"/Users/seven/feisujie-master/shop/application/manage/view/role/edit.html";i:1567760372;}*/ ?>
<form style="padding:30px;" class="layui-form seller-alone-form" id="edit_form">
    <div class="layui-form-item">
        <label class="layui-form-label">角色名称：</label>
        <div class="layui-input-block">
            <input name="name" id="edit_name" value="<?php echo htmlentities($data['name']); ?>" placeholder="请输入角色名称" class="layui-input" type="text">
            <?php echo jshopToken(); ?>
        </div>
    </div>
</form>
<script>
    layui.use('form', function(){
        layui.form.render();
    });
</script>