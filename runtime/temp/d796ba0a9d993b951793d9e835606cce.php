<?php /*a:1:{s:78:"/Users/seven/feisujie-master/shop/application/manage/view/categories/edit.html";i:1567760372;}*/ ?>
<form style="padding:30px;" class="layui-form layui-form-pane goodsCatForm">
    <input type="hidden" id="id" name="id" value="<?php echo htmlentities($data['id']); ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">所属分类：</label>
        <div class="layui-input-block">
            <select name="parent_id" id="parent_id" lay-verify="required" lay-search>
                <option value="0" <?php if($data['parent_id'] == '0'): ?>selected<?php endif; ?>>顶级分类</option>
                <?php foreach($tree as $key=>$vo): ?>
                    <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($data['parent_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属类型：</label>
        <div class="layui-input-block">
            <select name="type_id" id="type_id" lay-verify="required" lay-search>
                <option value="0" <?php if($data['type_id'] == '0'): ?>selected<?php endif; ?>>通用类型</option>
                <?php foreach($type as $key=>$vo): ?>
                    <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($data['type_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo htmlentities($vo['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">分类名称：</label>
        <div class="layui-input-block">
            <input type="text" name="name" id="name" required lay-verify="required" placeholder="请输入分类名称" autocomplete="off" class="layui-input" value="<?php echo htmlentities($data['name']); ?>">
        </div>
    </div>
    <div class="layui-form-item" style="margin-bottom:0;">
        <label class="layui-form-label">
            分类图标：
        </label>

        <div class="layui-input-block">
            
            <button type="button" class="layui-btn" id="upload_img_image_id" onclick="upImagimage_ide()">上传图片</button>
            <div class="layui-upload-list">
                <img class="layui-upload-img"  src='<?php echo _sImage($data['image_id'])?>' id="image_src_image_id" style="width:90px;height:90px;" >
                <p id="upload_text_image_id"></p>
            </div>
            <input class="layui-upload-file" type="hidden" name="image_id"  id="image_value_image_id" value="<?php echo $data['image_id']?>">
            <textarea id="edit_image_id" style="display: none;"></textarea>
            <script>
            var _editoimage_idr = UE.getEditor("edit_image_id",{
                initialFrameWidth:800,
                initialFrameHeight:300,
                zIndex:19891026,
                 single:false
            });
            _editoimage_idr.ready(function (){
                //_editoimage_idr.setDisabled();
                _editoimage_idr.hide();
                //侦听图片上传
                _editoimage_idr.addListener('beforeInsertImage',function(t,arg){
                        $("#image_value_image_id").attr("value",arg[0].image_id);
                        $("#image_src_image_id").attr("src",arg[0].src);
                });
            });
            //上传dialog
            function upImagimage_ide(){
                var myImagimage_ide = _editoimage_idr.getDialog("insertimage");
                myImagimage_ide.open();
            }
</script>
            
            <div class="layui-word-aux list-tag">
                图标尺寸建议：60px*60px
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">排序：</label>
        <div class="layui-input-block">
            <?php 
            if($data){
            $sort = $data['sort'];
            }else{
            $sort = 100;
            }
             ?>
            <input type="number" name="sort" id="sort" style="width:60px;" required lay-verify="required" placeholder="排序" autocomplete="off" class="layui-input" value="<?php echo htmlentities($sort); ?>">
        </div>
    </div>
    <?php echo jshopToken(); ?>
</form>

<script>
    //渲染表单
    layui.use('form', function(){
        var form = layui.form;
        form.render();
    });
</script>