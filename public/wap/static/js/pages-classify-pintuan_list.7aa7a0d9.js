(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-classify-pintuan_list"],{"06f5":function(t,n,e){"use strict";var o=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("v-uni-view",{staticClass:"content"},[e("v-uni-view",{staticClass:"img-list"},[t.goodsList.length>0?e("v-uni-view",t._l(t.goodsList,function(n,o){return e("v-uni-view",{key:o,staticClass:"img-list-item",on:{click:function(e){e=t.$handleEvent(e),t.goodsDetail(n.id)}}},[e("v-uni-image",{staticClass:"img-list-item-l",attrs:{src:n.image_url,mode:"aspectFill"}}),e("v-uni-view",{staticClass:"img-list-item-r"},[e("v-uni-view",{staticClass:"goods-name list-goods-name"},[t._v(t._s(n.name))]),e("v-uni-view",{staticClass:"goods-item-c"},[e("v-uni-view",{staticClass:"pintuan_time"},[e("v-uni-text",{staticClass:"fsz24 color-9"},[t._v("剩余：")]),e("uni-countdown",{attrs:{textColor:"#999",color:"#999",day:n.lasttime.day,hour:n.lasttime.hour,minute:n.lasttime.minute,second:n.lasttime.second}})],1),e("v-uni-view",{staticClass:"goods-price red-price"},[t._v("￥"+t._s(n.pintuanPrice)),e("v-uni-text",{staticClass:"people-num color-9 fsz24"},[t._v(t._s(n.pintuan_rule.people_number)+"人成团")])],1),e("v-uni-view",{staticClass:"goods-buy"},[n.comments_count>0?e("v-uni-view",{staticClass:"goods-salesvolume"},[t._v(t._s(n.comments_count)+"条评论")]):n.comments_count<=0?e("v-uni-view",{staticClass:"goods-salesvolume"},[t._v("暂无评论")]):t._e(),e("v-uni-image",{staticClass:"goods-cart",attrs:{src:"../../static/image/more.png"}})],1)],1)],1)],1)}),1):e("v-uni-view",{staticClass:"order-none"},[e("v-uni-image",{staticClass:"order-none-img",attrs:{src:"../../static/image/order.png",mode:""}})],1)],1)],1)},i=[];e.d(n,"a",function(){return o}),e.d(n,"b",function(){return i})},"0819":function(t,n,e){"use strict";e.r(n);var o=e("aef9"),i=e("25a5");for(var s in i)"default"!==s&&function(t){e.d(n,t,function(){return i[t]})}(s);e("9605");var a=e("2877"),r=Object(a["a"])(i["default"],o["a"],o["b"],!1,null,"333bc57d",null);n["default"]=r.exports},"25a5":function(t,n,e){"use strict";e.r(n);var o=e("90be"),i=e.n(o);for(var s in o)"default"!==s&&function(t){e.d(n,t,function(){return o[t]})}(s);n["default"]=i.a},"32c7":function(t,n,e){var o=e("b89c");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var i=e("4f06").default;i("5ffcf33b",o,!0,{sourceMap:!1,shadowMode:!1})},"40c1":function(t,n,e){"use strict";var o=e("288e");Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0,e("ac6a");var i=o(e("0819")),s={components:{uniCountdown:i.default},data:function(){return{goodsList:{},pintuanPrice:0,lasttime:{day:0,hour:!1,minute:0,second:0}}},onLoad:function(){this.getGoods()},methods:{goodsDetail:function(t){var n="/pages/goods/index/pintuan?id="+t;this.$common.navigateTo(n)},getGoods:function(){var t=this,n=this,e={};n.$api.pintuanList(e,function(e){e.status&&(n.goodsList=e.data,n.goodsList.forEach(function(e){e.pintuan_price<=0?e.pintuan_price="0.00":e.pintuanPrice=t.$common.moneySub(e.price,e.pintuan_rule.discount_amount);var o=Date.parse(new Date)/1e3,i=e.pintuan_rule.etime-o;e.lasttime=n.$common.timeToDateObj(i)}))})}}};n.default=s},8964:function(t,n,e){"use strict";e.r(n);var o=e("06f5"),i=e("cd3d");for(var s in i)"default"!==s&&function(t){e.d(n,t,function(){return i[t]})}(s);e("c9e8");var a=e("2877"),r=Object(a["a"])(i["default"],o["a"],o["b"],!1,null,"18af760d",null);n["default"]=r.exports},"90be":function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0,e("c5f6");var o={name:"uni-countdown",props:{showDay:{type:Boolean,default:!0},showColon:{type:Boolean,default:!0},backgroundColor:{type:String,default:"#FFFFFF"},borderColor:{type:String,default:"#000000"},color:{type:String},textColor:{type:String,default:"#000000"},splitorColor:{type:String,default:"#000"},day:{type:Number,default:0},hour:{type:Number,default:0},minute:{type:Number,default:0},second:{type:Number,default:0}},data:function(){return{timer:null,d:"00",h:"00",i:"00",s:"00",leftTime:0,seconds:0}},created:function(t){var n=this;this.seconds=this.toSeconds(this.day,this.hour,this.minute,this.second),this.countDown(),this.timer=setInterval(function(){n.seconds--,n.seconds<0?n.timeUp():n.countDown()},1e3)},beforeDestroy:function(){clearInterval(this.timer)},methods:{toSeconds:function(t,n,e,o){return 60*t*60*24+60*n*60+60*e+o},timeUp:function(){clearInterval(this.timer),this.$emit("timeup")},countDown:function(){var t=this.seconds,n=0,e=0,o=0,i=0;t>0?(n=Math.floor(t/86400),e=Math.floor(t/3600)-24*n,o=Math.floor(t/60)-24*n*60-60*e,i=Math.floor(t)-24*n*60*60-60*e*60-60*o):this.timeUp(),n<10&&(n="0"+n),e<10&&(e="0"+e),o<10&&(o="0"+o),i<10&&(i="0"+i),this.d=n,this.h=e,this.i=o,this.s=i}}};n.default=o},9605:function(t,n,e){"use strict";var o=e("d209"),i=e.n(o);i.a},aef9:function(t,n,e){"use strict";var o=function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("v-uni-view",{staticClass:"uni-countdown"},[t.showDay&&0!=t.d?e("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.d))]):t._e(),t.showDay&&0!=t.d?e("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v("天")]):t._e(),e("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.h))]),e("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v(t._s(t.showColon?":":"时"))]),e("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.i))]),e("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v(t._s(t.showColon?":":"分"))]),e("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.s))]),t.showColon?t._e():e("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v("秒")])],1)},i=[];e.d(n,"a",function(){return o}),e.d(n,"b",function(){return i})},b89c:function(t,n,e){n=t.exports=e("2350")(!1),n.push([t.i,".list-grid[data-v-18af760d]{width:%?44?%;height:%?44?%;float:left}.img-grids[data-v-18af760d]{padding-bottom:%?26?%}.img-grids-item[data-v-18af760d]{margin-bottom:0}.img-grids>uni-view[data-v-18af760d],.img-list>uni-view[data-v-18af760d]{overflow:hidden}.order-none[data-v-18af760d]{text-align:center;padding:%?200?% 0}.order-none-img[data-v-18af760d]{width:%?274?%;height:%?274?%}.goods-price[data-v-18af760d]{margin-bottom:%?10?%;width:100%;overflow:hidden}.people-num[data-v-18af760d]{margin-left:%?16?%}.img-list-item .goods-item-c[data-v-18af760d]{bottom:0}",""])},c9e8:function(t,n,e){"use strict";var o=e("32c7"),i=e.n(o);i.a},cd3d:function(t,n,e){"use strict";e.r(n);var o=e("40c1"),i=e.n(o);for(var s in o)"default"!==s&&function(t){e.d(n,t,function(){return o[t]})}(s);n["default"]=i.a},d209:function(t,n,e){var o=e("e448");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var i=e("4f06").default;i("23a982f2",o,!0,{sourceMap:!1,shadowMode:!1})},e448:function(t,n,e){n=t.exports=e("2350")(!1),n.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* 文字基本颜色 */\n/* 背景颜色 */\n/* 边框颜色 */\n/* 尺寸变量 */\n/* 文字尺寸 */\n/* 图片尺寸 */\n/* Border Radius */\n/* 水平间距 */\n/* 垂直间距 */\n/* 透明度 */\n/* 文章场景相关 */.uni-countdown[data-v-333bc57d]{padding:%?2?% 0;display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;-webkit-flex-wrap:nowrap;-ms-flex-wrap:nowrap;flex-wrap:nowrap;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.uni-countdown__splitor[data-v-333bc57d]{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;line-height:%?44?%;padding:0 %?5?%;font-size:%?24?%}.uni-countdown__number[data-v-333bc57d]{line-height:%?44?%;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:%?44?%;border-radius:%?6?%;font-size:%?24?%;font-size:%?24?%}',""])}}]);