<?php /*a:1:{s:73:"/Users/seven/feisujie-master/shop/application/manage/view/notice/add.html";i:1567760372;}*/ ?>
<div style="padding:30px;" class="layui-form seller-alone-form"> <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->

    <div class="layui-form-item">
        <label class="layui-form-label"><i class="required-color">*</i>公告标题：</label>
        <div class="layui-input-inline seller-inline-4">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题信息" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label"><i class="required-color">*</i>内容描述：</label>
        <div class="layui-input-inline seller-inline-4">
            <textarea name="content" required lay-verify="required" placeholder="公告内容描述信息" class="layui-textarea"></textarea>
        </div>
    </div>

    <div class="layui-form-item" style="margin-top: 10px">
        <label class="layui-form-label">排序：</label>
        <div class="layui-input-inline seller-inline-4">
            <input type="text" name="sort" required lay-verify="required" value="100" placeholder="数值越小越靠前" autocomplete="off" class="layui-input">
        </div>
    </div>
    <?php echo jshopToken(); ?>
    <button class="layui-btn layui-btn-fluid add-save-btn" lay-submit lay-filter="add-notice">保存</button>
    <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
</div>
<script>
    layui.use('form', function(){
        var form = layui.form;
        form.render();
    });
</script>