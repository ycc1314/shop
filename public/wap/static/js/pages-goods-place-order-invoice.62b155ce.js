(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-goods-place-order-invoice"],{"03d1":function(n,t,e){"use strict";var i=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("v-uni-view",{staticClass:"content"},[e("v-uni-view",{staticClass:"content-top"},[e("v-uni-view",{staticClass:"cell-group margin-cell-group"},[e("v-uni-view",{staticClass:"cell-item"},[e("v-uni-view",{staticClass:"cell-item-hd"},[e("v-uni-view",{staticClass:"cell-hd-title"},[n._v("发票类型")])],1),e("v-uni-view",{staticClass:"cell-item-ft"},[e("v-uni-view",{staticClass:"uni-form-item uni-column invoice-type"},[e("v-uni-radio-group",{staticClass:"uni-list",on:{change:function(t){t=n.$handleEvent(t),n.radioChange(t)}}},n._l(n.radioItems,function(t,i){return e("v-uni-label",{key:i,staticClass:"uni-list-cell uni-list-cell-pd"},[e("v-uni-view",{staticClass:"invoice-type-icon"},[e("v-uni-radio",{attrs:{id:t.name,value:t.value,checked:t.value==n.type}})],1),e("v-uni-view",{staticClass:"invoice-type-c"},[e("v-uni-label",{staticClass:"label-2-text",attrs:{for:t.name}},[e("v-uni-text",[n._v(n._s(t.name))])],1)],1)],1)}),1)],1)],1)],1),e("v-uni-view",{staticClass:"cell-item"},[e("v-uni-view",{staticClass:"cell-item-hd"},[e("v-uni-view",{staticClass:"cell-hd-title"},[n._v("发票抬头")])],1),e("v-uni-view",{staticClass:"cell-item-ft"},[e("v-uni-input",{staticClass:"cell-bd-input",attrs:{placeholder:"抬头名称"},model:{value:n.name,callback:function(t){n.name=t},expression:"name"}})],1)],1),e("v-uni-view",{directives:[{name:"show",rawName:"v-show",value:"3"===n.type,expression:"type === '3'"}],staticClass:"cell-item"},[e("v-uni-view",{staticClass:"cell-item-hd"},[e("v-uni-view",{staticClass:"cell-hd-title"},[n._v("税号")])],1),e("v-uni-view",{staticClass:"cell-item-ft"},[e("v-uni-input",{staticClass:"cell-bd-input",attrs:{placeholder:"纳税人识别号"},model:{value:n.code,callback:function(t){n.code=t},expression:"code"}})],1)],1)],1),e("v-uni-view",{staticClass:"cell-group margin-cell-group"},[e("v-uni-view",{staticClass:"cell-item"},[e("v-uni-view",{staticClass:"cell-item-hd"},[e("v-uni-view",{staticClass:"cell-hd-title"},[n._v("发票内容")])],1),e("v-uni-view",{staticClass:"cell-item-ft"},[e("v-uni-view",{staticClass:"cell-ft-view"},[n._v("明细")])],1)],1)],1),e("v-uni-view",{staticClass:"cell-group margin-cell-group"},[e("v-uni-view",{staticClass:"cell-item right-img",on:{click:function(t){t=n.$handleEvent(t),n.notNeedInvoice(t)}}},[e("v-uni-view",{staticClass:"cell-item-hd"},[e("v-uni-view",{staticClass:"cell-hd-title"},[n._v("本次不开具发票")])],1),e("v-uni-view",{staticClass:"cell-item-ft"},[e("v-uni-image",{staticClass:"cell-ft-next icon",attrs:{src:"../../../static/image/right.png"}})],1)],1)],1)],1),e("v-uni-view",{staticClass:"button-bottom"},[e("v-uni-button",{staticClass:"btn btn-square btn-b",attrs:{"hover-class":"btn-hover2"},on:{click:function(t){t=n.$handleEvent(t),n.saveInvoice(t)}}},[n._v("保存")])],1)],1)},a=[];e.d(t,"a",function(){return i}),e.d(t,"b",function(){return a})},"21f0":function(n,t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0,e("ac6a"),e("7f7f");var i={data:function(){return{radioItems:[{name:"个人或事业单位",value:"2"},{name:"企业",value:"3"}],type:"3",name:"",code:""}},onLoad:function(){var n,t=getCurrentPages(),e=t[t.length-2];n=e.invoice,n&&n.hasOwnProperty("type")&&"1"!==n.type&&(this.name=n.name,this.code=n.code,this.type=n.type)},methods:{radioChange:function(n){var t=this;this.radioItems.forEach(function(e){e.value===n.target.value&&(t.type=e.value)})},notNeedInvoice:function(){var n={type:"1",name:"不开发票",code:""};this.setPageData(n)},saveInvoice:function(){if(!this.name)return this.$common.errorToShow("请输入发票抬头"),!1;if("3"===this.type&&!this.code)return this.$common.errorToShow("请输入发票税号信息"),!1;var n={type:this.type,name:this.name};n["code"]="3"===this.type?this.code:"",this.setPageData(n)},setPageData:function(n){var t=getCurrentPages(),e=t[t.length-2];e.invoice=n,uni.navigateBack({delta:1})}}};t.default=i},6752:function(n,t,e){var i=e("7771");"string"===typeof i&&(i=[[n.i,i,""]]),i.locals&&(n.exports=i.locals);var a=e("4f06").default;a("26671ce6",i,!0,{sourceMap:!1,shadowMode:!1})},7771:function(n,t,e){t=n.exports=e("2350")(!1),t.push([n.i,"\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* .margin-cell-group{\n\tmargin-bottom: 20upx;\n} */.invoice-type .uni-list-cell[data-v-e8112dec]{display:inline-block;font-size:%?26?%;color:#333;position:relative;margin-left:%?50?%}.invoice-type .uni-list-cell>uni-view[data-v-e8112dec]{display:inline-block}.invoice-type-icon[data-v-e8112dec]{position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.invoice-type-c[data-v-e8112dec]{margin-left:%?50?%;line-height:2}.cell-item-ft .cell-bd-input[data-v-e8112dec]{text-align:right;width:%?500?%}.button-bottom .btn[data-v-e8112dec]{width:100%}",""])},"94de":function(n,t,e){"use strict";var i=e("6752"),a=e.n(i);a.a},a1d3:function(n,t,e){"use strict";e.r(t);var i=e("03d1"),a=e("e8ec");for(var s in a)"default"!==s&&function(n){e.d(t,n,function(){return a[n]})}(s);e("94de");var l=e("2877"),c=Object(l["a"])(a["default"],i["a"],i["b"],!1,null,"e8112dec",null);t["default"]=c.exports},e8ec:function(n,t,e){"use strict";e.r(t);var i=e("21f0"),a=e.n(i);for(var s in i)"default"!==s&&function(n){e.d(t,n,function(){return i[n]})}(s);t["default"]=a.a}}]);