<?php /*a:1:{s:83:"/Users/seven/feisujie-master/shop/application/manage/view/goods_params/getlist.html";i:1567760372;}*/ ?>
<table id="paramsTable" lay-filter="paramsTable"></table>

<script>
    layui.use(['form', 'laydate','table'], function(){
        var layer = layui.layer, table = layui.table,form = layui.form,date = layui.laydate;
        table.render({
            elem: '#paramsTable',
            height: '330',
            cellMinWidth: '80',
            page: 'true',
            limit:'20',
            url: "<?php echo url('GoodsParams/index'); ?>?_ajax=1",
            id:'paramsTable',
            cols: [[
                {type:'numbers'},
                {field:'name', width:100,title:'名称'},
                {field:'type', width:100,title:'类型',templet:function (data) {
                    if(data.type=='text'){
                        return '文本框';
                    }else if(data.type=='radio'){
                        return '单选框';
                    }else if(data.type=='checkbox'){
                        return '复选框';
                    }
                }},
                {field:'value',title:'参数'},
                {title:'操作',align:'center', toolbar:'#paramsBar'}
            ]]
        });
        form.on('submit(goods-search)', function(data){
            layui.table.reload('paramsTable', {
                where: data.field
                ,page: {
                    curr: 1 //重新从第 1 页开始
                }
            });
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
</script>

<script type="text/html" id="paramsBar">
    <a class="layui-btn layui-btn-xs" lay-event="selectParams">选择</a>
</script>
