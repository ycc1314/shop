(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-article-index"],{"0e4e":function(t,e,i){"use strict";i.r(e);var a=i("35ce"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,function(){return a[t]})}(r);e["default"]=n.a},1289:function(t,e,i){"use strict";i.r(e);var a=i("a036"),n=i("0e4e");for(var r in n)"default"!==r&&function(t){i.d(e,t,function(){return n[t]})}(r);i("509d");var s=i("2877"),o=Object(s["a"])(n["default"],a["a"],a["b"],!1,null,"0bab4dc8",null);e["default"]=o.exports},"2dea":function(t,e,i){var a=i("8525");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("077b7f24",a,!0,{sourceMap:!1,shadowMode:!1})},"35ce":function(t,e,i){"use strict";var a=i("288e");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n=a(i("95da")),r={data:function(){return{myShareCode:"",idType:1,id:0,info:{}}},onLoad:function(t){this.idType=t.id_type,this.id=t.id,this.idType||this.id?1==this.idType?this.articleDetail():2==this.idType?(uni.setNavigationBarTitle({title:"公告详情"}),this.noticeDetail()):3==this.idType&&(uni.setNavigationBarTitle({title:"图文消息"}),this.messageDetail()):this.$common.errorToShow("请求出错",function(t){uni.switchTab({url:"/pages/index/index"})}),this.getMyShareCode()},computed:{shopName:function(){return this.$store.state.config.shop_name},shopLogo:function(){return this.$store.state.config.shop_logo}},methods:{articleDetail:function(){var t=this,e={article_id:this.id};this.$api.articleInfo(e,function(e){if(e.status){var i=e.data,a=i.content;i.content=(0,n.default)(a),t.info=i,uni.setNavigationBarTitle({title:i.title})}else t.$common.errorToShow(e.msg,function(t){uni.navigateBack({delta:1})})})},noticeDetail:function(){var t=this,e={id:this.id};this.$api.noticeInfo(e,function(e){if(e.status){var i=e.data,a=i.content;i.content=(0,n.default)(a),t.info=i,uni.setNavigationBarTitle({title:i.title})}else t.$common.errorToShow(e.msg)})},messageDetail:function(){var t=this,e={id:this.id};this.$api.messageDetail(e,function(e){if(e.status){var i=e.data,a=i.content;i.content=(0,n.default)(a),t.info=i,uni.setNavigationBarTitle({title:i.title})}else t.$common.errorToShow(e.msg)})},getMyShareCode:function(){var t=this,e=this.$db.get("userToken");e&&""!=e&&this.$api.shareCode({},function(e){e.status&&(t.myShareCode=e.data?e.data:"")})}},onShareAppMessage:function(){var t=this.myShareCode?this.myShareCode:"",e=this.$common.shareParameterDecode("type=4&id="+this.id+"&id_type="+this.idType+"&invite="+t),i="/pages/share/jump?scene="+e;return{title:this.info.title,path:i}}};e.default=r},"509d":function(t,e,i){"use strict";var a=i("2dea"),n=i.n(a);n.a},8525:function(t,e,i){e=t.exports=i("2350")(!1),e.push([t.i,".content[data-v-0bab4dc8]{\n\theight:calc(100vh - %?90?%);\n\t\n\tbackground-color:#fff}.article[data-v-0bab4dc8]{padding:%?20?%}.article-title[data-v-0bab4dc8]{font-size:%?32?%;color:#333;margin-bottom:%?20?%;\n\t/* text-align: center; */position:relative;height:%?100?%}.article-time[data-v-0bab4dc8]{\n\t/* text-align: right; */margin-left:%?20?%}.article-content[data-v-0bab4dc8]{font-size:%?28?%!important;color:#666;line-height:1.6;margin-top:%?20?%}.article-content p img[data-v-0bab4dc8]{width:100%!important}.shop-logo[data-v-0bab4dc8]{width:%?60?%;height:%?60?%;border-radius:50%;position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.shop-name[data-v-0bab4dc8]{line-height:%?100?%;margin-left:%?80?%}",""])},"95da":function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("28a5"),i("7f7f"),i("3b2b"),i("a481"),i("4917");var a=/^<([-A-Za-z0-9_]+)((?:\s+[a-zA-Z_:][-a-zA-Z0-9_:.]*(?:\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|[^>\s]+))?)*)\s*(\/?)>/,n=/^<\/([-A-Za-z0-9_]+)[^>]*>/,r=/([a-zA-Z_:][-a-zA-Z0-9_:.]*)(?:\s*=\s*(?:(?:"((?:\\.|[^"])*)")|(?:'((?:\\.|[^'])*)')|([^>\s]+)))?/g,s=f("area,base,basefont,br,col,frame,hr,img,input,link,meta,param,embed,command,keygen,source,track,wbr"),o=f("a,address,article,applet,aside,audio,blockquote,button,canvas,center,dd,del,dir,div,dl,dt,fieldset,figcaption,figure,footer,form,frameset,h1,h2,h3,h4,h5,h6,header,hgroup,hr,iframe,isindex,li,map,menu,noframes,noscript,object,ol,output,p,pre,section,script,table,tbody,td,tfoot,th,thead,tr,ul,video"),c=f("abbr,acronym,applet,b,basefont,bdo,big,br,button,cite,code,del,dfn,em,font,i,iframe,img,input,ins,kbd,label,map,object,q,s,samp,script,select,small,span,strike,strong,sub,sup,textarea,tt,u,var"),l=f("colgroup,dd,dt,li,options,p,td,tfoot,th,thead,tr"),d=f("checked,compact,declare,defer,disabled,ismap,multiple,nohref,noresize,noshade,nowrap,readonly,selected"),u=f("script,style");function h(t,e){var i,h,f,p=[],m=t;p.last=function(){return this[this.length-1]};while(t){if(h=!0,p.last()&&u[p.last()])t=t.replace(new RegExp("([\\s\\S]*?)</"+p.last()+"[^>]*>"),function(t,i){return i=i.replace(/<!--([\s\S]*?)-->|<!\[CDATA\[([\s\S]*?)]]>/g,"$1$2"),e.chars&&e.chars(i),""}),b("",p.last());else if(0==t.indexOf("\x3c!--")?(i=t.indexOf("--\x3e"),i>=0&&(e.comment&&e.comment(t.substring(4,i)),t=t.substring(i+3),h=!1)):0==t.indexOf("</")?(f=t.match(n),f&&(t=t.substring(f[0].length),f[0].replace(n,b),h=!1)):0==t.indexOf("<")&&(f=t.match(a),f&&(t=t.substring(f[0].length),f[0].replace(a,g),h=!1)),h){i=t.indexOf("<");var v=i<0?t:t.substring(0,i);t=i<0?"":t.substring(i),e.chars&&e.chars(v)}if(t==m)throw"Parse Error: "+t;m=t}function g(t,i,a,n){if(i=i.toLowerCase(),o[i])while(p.last()&&c[p.last()])b("",p.last());if(l[i]&&p.last()==i&&b("",i),n=s[i]||!!n,n||p.push(i),e.start){var u=[];a.replace(r,function(t,e){var i=arguments[2]?arguments[2]:arguments[3]?arguments[3]:arguments[4]?arguments[4]:d[e]?e:"";u.push({name:e,value:i,escaped:i.replace(/(^|[^\\])"/g,'$1\\"')})}),e.start&&e.start(i,u,n)}}function b(t,i){if(i){for(a=p.length-1;a>=0;a--)if(p[a]==i)break}else var a=0;if(a>=0){for(var n=p.length-1;n>=a;n--)e.end&&e.end(p[n]);p.length=a}}b()}function f(t){for(var e={},i=t.split(","),a=0;a<i.length;a++)e[i[a]]=!0;return e}function p(t){return t.replace(/<\?xml.*\?>\n/,"").replace(/<!doctype.*>\n/,"").replace(/<!DOCTYPE.*>\n/,"")}function m(t){return t.reduce(function(t,e){var i=e.value,a=e.name;return t[a]?t[a]=t[a]+" "+i:t[a]=i,t},{})}function v(t){t=p(t);var e=[],i={node:"root",children:[]};return h(t,{start:function(t,a,n){var r={name:t};if(0!==a.length&&(r.attrs=m(a)),n){var s=e[0]||i;s.children||(s.children=[]),s.children.push(r)}else e.unshift(r)},end:function(t){var a=e.shift();if(a.name!==t&&console.error("invalid state: mismatch end tag"),0===e.length)i.children.push(a);else{var n=e[0];n.children||(n.children=[]),n.children.push(a)}},chars:function(t){var a={type:"text",text:t};if(0===e.length)i.children.push(a);else{var n=e[0];n.children||(n.children=[]),n.children.push(a)}},comment:function(t){var i={node:"comment",text:t},a=e[0];a.children||(a.children=[]),a.children.push(i)}}),i.children}var g=v;e.default=g},a036:function(t,e,i){"use strict";var a=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"content"},[i("v-uni-view",{staticClass:"article"},[t.shopLogo&&t.shopName?i("v-uni-view",{staticClass:"article-title"},[i("img",{staticClass:"shop-logo",attrs:{src:t.shopLogo,alt:""}}),i("v-uni-text",{staticClass:"shop-name"},[t._v(t._s(t.shopName))]),i("v-uni-text",{staticClass:"fsz24 color-9 article-time"},[t._v(t._s(t.info.ctime))])],1):t._e(),i("v-uni-view",{staticClass:"article-content"},[i("v-uni-rich-text",{attrs:{nodes:t.info.content}})],1)],1)],1)},n=[];i.d(e,"a",function(){return a}),i.d(e,"b",function(){return n})}}]);