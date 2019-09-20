<?php /*a:1:{s:76:"/Users/seven/feisujie-master/shop/application/manage/view/goods/getSpec.html";i:1567760372;}*/ ?>
<form id="spec_form">

<div id="spec_select" style="display: none">
    <?php if($customSpec): if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): $i = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-form-item" pane>
                <label class="layui-form-label"><?php echo htmlentities($vo['name']); ?></label>
                <div class="layui-input-block">
                    <?php if(is_array($vo['specValue']) || $vo['specValue'] instanceof \think\Collection || $vo['specValue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['specValue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <div class="spec-item layui-input-inline">
                        <input type="checkbox" name="spec[<?php echo htmlentities($vo['name']); ?>][<?php echo htmlentities($v['id']); ?>]" value="<?php echo htmlentities($v['value']); ?>" lay-skin="primary"  lay-filter="spec_select" class="spec-select">
                        <input type="text" value="<?php echo htmlentities($v['value']); ?>" name="goods[new_spec][<?php echo htmlentities($v['id']); ?>][]" class="layui-input new-spec ">
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): $i = 0; $__LIST__ = $spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="layui-form-item" pane>
                <label class="layui-form-label"><?php echo htmlentities($vo['name']); ?></label>
                <div class="layui-input-block">
                    <?php if(is_array($vo['specValue']) || $vo['specValue'] instanceof \think\Collection || $vo['specValue'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['specValue'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <input type="checkbox" name="spec[<?php echo htmlentities($vo['name']); ?>][]" value="<?php echo htmlentities($v['value']); ?>" lay-skin="primary" title="<?php echo htmlentities($v['value']); ?>" lay-filter="spec_select">
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    <?php endif; ?>

    <div class="layui-form-item">
        <div class="layui-input-inline">
            <input type="hidden" value="<?php echo htmlentities($typeInfo['id']); ?>" name="type_id">
            <button class="layui-btn layui-btn-sm generate-spec">生成规格</button>

        </div>

    </div>

    <div id="more_spec">

    </div>

</div>
<div id="no_spec">
<div class="layui-form-item">
    <label class="layui-form-label"><i class="required-color">*</i>销售价：</label>
    <div class="layui-input-inline">
        <input type="text" name="goods[price]" placeholder="￥" autocomplete="off" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">成本价：</label>
    <div class="layui-input-inline">
        <input type="text" name="goods[costprice]" placeholder="￥" autocomplete="off" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label class="layui-form-label">市场价：</label>
    <div class="layui-input-inline">
        <input type="text" name="goods[mktprice]" placeholder="￥" autocomplete="off" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label class="layui-form-label">货号：</label>
    <div class="layui-input-inline">
        <input type="text" name="goods[sn]" lay-verify="title" autocomplete="off" placeholder="请输入货号" class="layui-input">
    </div>
</div>
    <?php if(!$erp_syn_on): ?>
<div class="layui-form-item">
    <label class="layui-form-label">库存：</label>
    <div class="layui-input-inline">
        <input type="text" name="goods[stock]" placeholder="数量" lay-verify="title" autocomplete="off"  class="layui-input goods-stock">
    </div>
</div>
    <?php endif; ?>
</div>
</form>

<?php if($canOpenSpec == 'true'): ?>
<div class="layui-form-item">
    <label class="layui-form-label" >开启规格：</label>
    <div class="layui-input-inline">
        <button type="button" class="layui-btn layui-btn-sm" id="open_spec" is_open="false" lay-filter="open_spec" data-id="<?php echo htmlentities($typeInfo['id']); ?>" style="margin-top:5px;">开启</button>
    </div>
    <div class="layui-form-mid layui-word-aux">
        规格值中不可以含有, 和:
    </div>
</div>
<?php endif; if(!(empty($typeParams) || (($typeParams instanceof \think\Collection || $typeParams instanceof \think\Paginator ) && $typeParams->isEmpty()))): ?>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;"><legend>商品参数</legend></fieldset>
<?php if(is_array($typeParams) || $typeParams instanceof \think\Collection || $typeParams instanceof \think\Paginator): $i = 0; $__LIST__ = $typeParams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="layui-form-item">
    <label class="layui-form-label"><?php echo htmlentities($vo['params']['name']); ?>：</label>
    <div class="layui-input-inline">
        <?php if($vo['params']['type'] == 'text'): ?>
        <input type="text" name="goods[params][<?php echo htmlentities($vo['params']['name']); ?>]"  class="layui-input">
        <?php elseif($vo['params']['type'] == 'checkbox'): if(is_array($vo['params']['value']) || $vo['params']['value'] instanceof \think\Collection || $vo['params']['value'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['params']['value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$params): $mod = ($i % 2 );++$i;?>
            <input type="checkbox" name="goods[params][<?php echo htmlentities($vo['params']['name']); ?>][<?php echo htmlentities($params); ?>]" lay-skin="primary" title="<?php echo htmlentities($params); ?>">
            <?php endforeach; endif; else: echo "" ;endif; elseif($vo['params']['type'] == 'radio'): if(is_array($vo['params']['value']) || $vo['params']['value'] instanceof \think\Collection || $vo['params']['value'] instanceof \think\Paginator): $p = 0; $__LIST__ = $vo['params']['value'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$params): $mod = ($p % 2 );++$p;?>
            <input type="radio" name="goods[params][<?php echo htmlentities($vo['params']['name']); ?>]" value="<?php echo htmlentities($params); ?>" title="<?php echo htmlentities($params); ?>" <?php if($p == 1): ?>checked<?php endif; ?>>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<?php endif; ?>
<script>
    layui.use('form', function(){
        layui.form.render();
        $("body").on("input propertychange",'.new-spec',function(){
            var value = $(this).val();
            var specCheckbox = $(this).parent('.spec-item').find(".spec-select");
            specCheckbox.val(value);
        });
    });
</script>
