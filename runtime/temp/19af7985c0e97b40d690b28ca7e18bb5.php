<?php /*a:1:{s:77:"/Users/seven/feisujie-master/shop/application/manage/view/goods_type/add.html";i:1567760372;}*/ ?>
<style>
    #addTypeForm .layui-btn-xs {
        margin-left: 0px !important;
    }

    @media screen and (max-width: 500px) {

        .layui-layer.layui-layer-page {
            width: 100% !important;
            overflow-x: scroll !important;
            left: 0 !important;
        }

        .layui-layer-title {
            width: 600px !important;
            box-sizing: border-box;
        }

        .layui-layer-content {
            width: 600px !important;
        }

    }
    .layui-form{
        position: absolute !important;
    }
</style>
<form id="addTypeForm">
    <div style="padding:30px" class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">类型名称：</label>
            <div class="layui-input-block">
                <input type="text" name="name" id="name" required lay-verify="required" placeholder="请输入类型名称"
                    autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-tab layui-tab-brief">

            <ul class="layui-tab-title">
                <li class="layui-this">商品参数</li>
                <li>商品属性</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-size="sm">
                        <thead>
                            <tr>
                                <th>参数名称</th>
                                <th>参数类型</th>
                                <th>参数选项</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody id="params_view">
                            <tr data-id="0">
                                <td>
                                    <input type="hidden" name="params_id[0]" value="">
                                    <input type="text" name="params_name[0]" value="" placeholder="" autocomplete="off"
                                        class="layui-input seller-inline-1">
                                </td>
                                <td>
                                    <select name="params_type[0]" id="type">
                                        <option value="text">文本框</option>
                                        <option value="radio">单选框</option>
                                        <option value="checkbox">复选框</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="params_value[0]" value="" placeholder="空格分隔"
                                        autocomplete="off" class="layui-input seller-inline-1">
                                </td>
                                <td style="width: 110px;">
                                    <a class="layui-btn layui-btn-xs select-params-class">
                                        选择
                                    </a>
                                    <a class="layui-btn layui-btn-xs add-params-class">
                                        添加
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="layui-tab-item">

                    <div class="layui-tab-item layui-show">
                        <table class="layui-table" lay-size="sm">
                            <thead>
                                <tr>
                                    <th>属性名称</th>
                                    <th>排序</th>
                                    <th>属性值</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody id="type_view">
                                <tr data-id="0">
                                    <td>
                                        <input type="hidden" name="type_id[0]" value="">
                                        <input type="text" name="type_name[0]" value="" placeholder=""
                                            autocomplete="off" class="layui-input seller-inline-1">
                                    </td>
                                    <td>
                                        <input type="text" name="type_sort[0]" value="100" placeholder=""
                                            autocomplete="off" class="layui-input seller-inline-1">
                                    </td>
                                    <td>
                                        <input type="text" name="type_value[0]" value="" placeholder="空格分隔"
                                            autocomplete="off" class="layui-input seller-inline-1">
                                    </td>
                                    <td>
                                        <a class="layui-btn layui-btn-xs select-type-class">
                                            选择
                                        </a>
                                        <a class="layui-btn layui-btn-xs add-type-class">
                                            添加
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    <?php echo jshopToken(); ?>
    </div>
</form>


<script id="params_tpl" type="text/html">
    <tr data-id="{{ d.id }}">
        <td>
            <input type="hidden" name="params_id[{{ d.id }}]" value="">

            <input type="text" name="params_name[{{ d.id }}]" required value="" lay-verify="required"
                   placeholder="" autocomplete="off" class="layui-input seller-inline-1">
        </td>
        <td>
            <select name="params_type[{{ d.id }}]">
                <option value="text">文本框</option>
                <option value="radio">单选框</option>
                <option value="checkbox">复选框</option>
            </select>
        </td>
        <td>
            <input type="text" name="params_value[{{ d.id }}]" value=""
                    placeholder="空格分隔" autocomplete="off"
                   class="layui-input seller-inline-1">
        </td>
        <td>
            <a class="layui-btn layui-btn-xs select-params-class">
                选择
            </a>
            <a class="layui-btn layui-btn-danger layui-btn-xs del-params-class">
                删除
            </a>
        </td>
    </tr>
</script>


<script id="type_l_tpl" type="text/html">
    <tr data-id="{{ d.id }}">
        <td>
            <input type="hidden" name="type_id[{{ d.id }}]" value="">

            <input type="text" name="type_name[{{ d.id }}]" required value="" lay-verify="required"
                   placeholder="" autocomplete="off" class="layui-input seller-inline-1">
        </td>
        <td>
            <input type="text" name="type_sort[{{ d.id }}]" required value="100" lay-verify="required"
                   placeholder="" autocomplete="off" class="layui-input seller-inline-1">
        </td>
        <td>
            <input type="text" name="type_value[{{ d.id }}]" required value=""
                   lay-verify="required" placeholder="空格分隔" autocomplete="off"
                   class="layui-input seller-inline-1">
        </td>
        <td>
            <a class="layui-btn layui-btn-xs select-type-class">
                选择
            </a>
            <a class="layui-btn layui-btn-danger layui-btn-xs del-type-class">
                删除
            </a>
        </td>
    </tr>
</script>

<script>
    //渲染表单
    layui.use(['form', 'table', 'element'], function () {
        var form = layui.form;
        var table = layui.table;
        var laytpl = layui.laytpl;
        var element = layui.element;
        form.render();

        $(".layui-tab").on('click', '.add-type-class', function (e) {
            var getTpl = type_l_tpl.innerHTML;
            var lastId = $(this).parent().parent().parent().find('tr').last().attr('data-id');
            var tmpData = {};
            tmpData.id = parseInt(lastId) + 1;
            laytpl(getTpl).render(tmpData, function (html) {
                $("#type_view").append(html);
            });
            form.render();
        });

        $(".layui-tab").on('click', '.add-params-class', function (e) {
            var getTpl = params_tpl.innerHTML;
            var lastId = $(this).parent().parent().parent().find('tr').last().attr('data-id');
            var tmpData = {};
            tmpData.id = parseInt(lastId) + 1;
            laytpl(getTpl).render(tmpData, function (html) {
                $("#params_view").append(html);
            });
            form.render();

        });

        $(".layui-tab").on('click', '.del-type-class,.del-params-class', function (e) {
            $(this).parent().parent().remove();
        })
        //选择已有参数
        var selectParamsId = 0;
        $(".layui-tab").on('click', '.select-params-class', function (e) {

            selectParamsId = $(this).parent().parent().attr('data-id');

            JsGet("<?php echo url('GoodsParams/getlist'); ?>", function (e) {
                if(e.status){
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: ['700px', '450px'],
                        title: '参数列表'
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
        });
        //监听商品列表页工具条
        table.on('tool(paramsTable)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            if (layEvent === 'selectParams') { //选择
                $("input[name='params_id[" + selectParamsId + "]']").val(data.id);
                $("input[name='params_name[" + selectParamsId + "]']").val(data.name);
                $("input[name='params_value[" + selectParamsId + "]']").val(data.value);
                $("select[name='params_type[" + selectParamsId + "]']").val(data.type);
                form.render('select');
                layer.close(window.box);
            }
        });

        //选择已有属性
        var selectTypeId = 0;
        $(".layui-tab").on('click', '.select-type-class', function (e) {
            selectTypeId = $(this).parent().parent().attr('data-id');
            JsGet("<?php echo url('GoodsTypeSpec/getlist'); ?>", function (e) {
                if(e.status){
                    window.box = layer.open({
                        type: 1,
                        content: e.data,
                        area: ['700px', '450px'],
                        title: '属性列表'
                    });
                }else{
                    layer.msg(e.msg);
                }
            });
        });
        //监听商品列表页工具条
        table.on('tool(typeTable)', function (obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            if (layEvent === 'selectType') { //选择
                var value = '';
                if (data.spec_value.length > 0) {
                    $.each(data.spec_value, function (i, j) {
                        value += j.value + " ";
                    });
                    value = value.substr(0, value.length - 1);
                }
                $("input[name='type_id[" + selectTypeId + "]']").val(data.id);
                $("input[name='type_name[" + selectTypeId + "]']").val(data.name);
                $("input[name='type_value[" + selectTypeId + "]']").val(value);
                $("select[name='type_sort[" + selectTypeId + "]']").val(data.sort);
                form.render('select');
                layer.close(window.box);
            }
        });

    });


</script>