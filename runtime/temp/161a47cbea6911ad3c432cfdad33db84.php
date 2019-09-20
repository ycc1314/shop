<?php /*a:2:{s:75:"/Users/seven/feisujie-master/shop/application/manage/view/report/order.html";i:1567760372;s:69:"/Users/seven/feisujie-master/shop/application/manage/view/layout.html";i:1567760372;}*/ ?>
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
    <script src="/static/lib/echarts.min.js"></script>
<form class="layui-form seller-form" action="">
    <div class="layui-form-item">

        <div class="layui-inline">
            <label class="layui-form-label">时间范围：</label>
            <div class="layui-input-inline seller-inline-4">
                <input  type="text" name="date" value="" id="date" placeholder="请输入起止时间" autocomplete="off" class="layui-input">
            </div>
            <label class="layui-form-label">粒度：</label>
            <div class="layui-input-inline seller-inline-2">
                <select name="section" id="section">
                    <option value="1">小时</option>
                    <option value="2">天</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <div class="">
                <button class="layui-btn layui-btn-sm" val="" lay-submit lay-filter="*"><i class="iconfont icon-chaxun"></i>确定</button>

                <button class="layui-btn layui-btn-primary layui-btn-sm" val="1" lay-submit lay-filter="*">今日</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="2" lay-submit lay-filter="*">昨日</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="3" lay-submit lay-filter="*">本周</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="4" lay-submit lay-filter="*">上周</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="5" lay-submit lay-filter="*">本月</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="6" lay-submit lay-filter="*">上月</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="7" lay-submit lay-filter="*">7日内</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="8" lay-submit lay-filter="*">一月内</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="9" lay-submit lay-filter="*">三月内</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="10" lay-submit lay-filter="*">半年内</button>
                <button class="layui-btn layui-btn-primary layui-btn-sm" val="11" lay-submit lay-filter="*">一年内</button>
            </div>
        </div>
    </div>

</form>

<div class="table-body">
    <div id="main" style="height:400px;padding:10px;"></div>
    <div class="report_table_bar"><span id="tableExport"><i class="layui-icon">&#xe601;</i>下载明细</span></div>
    <table id="table" lay-filter="table"></table>
</div>
<script type="text/javascript">
    layui.use(['element','laydate','form','table'], function(){
        var element = layui.element;
        var tableData = {};
        //时间插件
        layui.laydate.render({
            elem: '#date',
            range: '到',
            type: 'date',
            value: "<?php echo date('Y-m-d'); ?> 到 <?php echo date('Y-m-d'); ?>"
        });

        layui.form.on('submit(*)', function(data){
            type = data.elem.getAttribute('val');
            if(type != ""){
                getTime(type,function(){
                    order_report();
                });
            }else{
                order_report();
            }
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });

        layui.table.render({
                id: 'table'
                ,elem: '#table'
                ,page: false //开启分页
                ,limit:'1000'
                ,totalRow:true
                ,cols: [[ //表头
                    {field: 'x', title: '日期', width:150}
                    ,{field: 'order_all_val', title: '全部金额',totalRow:true}
                    ,{field: 'order_all_num', title: '全部数量',totalRow:true}
                    ,{field: 'order_nopay_val', title: '待支付金额',totalRow:true}
                    ,{field: 'order_nopay_num', title: '待支付数量',totalRow:true}
                    ,{field: 'order_payed_val', title: '已付款金额',totalRow:true}
                    ,{field: 'order_payed_num', title: '已付款数量',totalRow:true}
                ]]
            });

            $('#tableExport').on('click', function(){
                layui.table.exportFile('table',tableData);
            });


        //取值
        function order_report(){
            var data = {
                date: $('#date').val(),
                section:$('#section').val()
            };
            JsPost("", data, function(res){
                if(res.status){
                    //刷新折线图
                    var myChart = echarts.init(document.getElementById('main'));
                    option = res.data.option;
                    // 使用刚指定的配置项和数据显示图表。
                    myChart.setOption(option);
                    //刷新table
                    layui.table.reload('table',{
                        data: res.data.table
                    });
                    tableData = res.data.table;
                }else{
                    layer.msg(res.msg);
                }
            });
        }
        //解析时间按钮
        function getTime(type,calback){
            var data = {
                date_type:type
            };
            JsPost('<?php echo url("getDateType"); ?>', data, function(res){
                if(res.status){
                    //设置时间，回调
                    $('#date').val(res.data.start  + " 到 " + res.data.end);
                    calback();
                }else{
                    layer.msg(res.msg);
                }
            })
        }
        function table_export(){
            layui.table.exportFile('table',tableData);
        }

        order_report();
    });



</script>
</div>
</body>
</html>
