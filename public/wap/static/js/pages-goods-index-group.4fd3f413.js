(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-goods-index-group"],{"0079":function(t,e,i){"use strict";i.r(e);var o=i("84cd"),s=i.n(o);for(var a in o)"default"!==a&&function(t){i.d(e,t,function(){return o[t]})}(a);e["default"]=s.a},"0819":function(t,e,i){"use strict";i.r(e);var o=i("aef9"),s=i("25a5");for(var a in s)"default"!==a&&function(t){i.d(e,t,function(){return s[t]})}(a);i("9605");var n=i("2877"),d=Object(n["a"])(s["default"],o["a"],o["b"],!1,null,"333bc57d",null);e["default"]=d.exports},"25a5":function(t,e,i){"use strict";i.r(e);var o=i("90be"),s=i.n(o);for(var a in o)"default"!==a&&function(t){i.d(e,t,function(){return o[t]})}(a);e["default"]=s.a},3035:function(t,e,i){var o=i("94b8");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var s=i("4f06").default;s("101d10b2",o,!0,{sourceMap:!1,shadowMode:!1})},"38d8":function(t,e,i){"use strict";var o=i("3035"),s=i.n(o);s.a},"84cd":function(t,e,i){"use strict";var o=i("288e");Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("7f7f"),i("28a5");var s=o(i("f499")),a=o(i("75fc"));i("ac6a");var n=o(i("a4bb")),d=o(i("1d0b")),r=o(i("1da9")),l=o(i("cb51")),c=o(i("a3b2")),u=o(i("7778")),v=o(i("8cdc")),f=i("6fd0"),m=i("0acc"),p=o(i("0819")),g=o(i("cfd7")),h=o(i("6575")),b=o(i("95da")),w={components:{uniSegmentedControl:d.default,lvvPopup:r.default,uniNumberBox:l.default,uniRate:c.default,uniLoadMore:u.default,uniFab:v.default,uniCountdown:p.default,spec:g.default,shareByH5:h.default},data:function(){return{myShareCode:"",swiper:{indicatorDots:!0,autoplay:!0,interval:3e3,duration:800},items:["图文详情","商品参数","买家评论"],current:0,goodsId:0,groupId:0,goodsInfo:{},cartNums:0,product:{},goodsParams:[],goodsComments:{loadStatus:"more",page:1,limit:5,list:[]},buyNum:1,minBuyNum:1,type:1,isfav:!1,favLogo:["../../../static/image/ic-me-collect.png","../../../static/image/ic-me-collect2.png"],horizontal:"right",vertical:"bottom",direction:"vertical",pattern:{color:"#7A7E83",backgroundColor:"#fff",selectedColor:"#007AFF",buttonColor:"#FF7159"},content:[{iconPath:"../../../static/image/tab-ic-hom-selected.png",selectedIconPath:"../../../static/image/tab-ic-hom-unselected.png",active:!1,url:"/pages/index/index"},{iconPath:"../../../static/image/tab-ic-me-selected.png",selectedIconPath:"../../../static/image/tab-ic-me-unselected.png",active:!1,url:"/pages/member/index/index"}],indicatorDots:!1,autoplay:!1,interval:2e3,duration:500,lasttime:{hour:!1,minute:0,second:0}}},onLoad:function(t){this.goodsId=t.id,this.groupId=t.group_id,this.goodsId&&this.groupId?(this.getGoodsInfo(),this.getGoodsParams(),this.getGoodsComments()):this.$common.errorToShow("获取失败",function(){uni.navigateBack({delta:1})}),this.getCartNums(),this.getMyShareCode()},computed:{minNums:function(){return this.product.stock>this.minBuyNum?this.minBuyNum:this.product.stock},isSpes:function(){return!(!this.product.hasOwnProperty("default_spes_desc")||!(0,n.default)(this.product.default_spes_desc).length)},promotion:function(){var t=[];if(this.product.promotion_list)for(var e in this.product.promotion_list)t.push(this.product.promotion_list[e]);return t},typeName:function(){return 3==this.goodsInfo.group_type?"团购":"秒杀"},shareHref:function(){var t=getCurrentPages(),e=t[t.length-1];return m.apiBaseUrl+"wap/#/"+e.route+"?id="+this.goodsId+"&group_id="+this.groupId}},onReachBottom:function(){2===this.current&&"more"===this.goodsComments.loadStatus&&this.getGoodsComments()},methods:{backBtn:function(){uni.navigateBack({delta:1})},getGoodsInfo:function(){var t=this,e={id:this.goodsId,group_id:this.groupId},i=(0,f.get)("userToken");i&&(e["token"]=i);var o=this;this.$api.groupInfo(e,function(e){if(e.status)if(e.data.length<1)t.$common.errorToShow("该商品不存在，请返回重新选择商品。",function(){uni.navigateBack({delta:1})});else if(1!=e.data.marketable)t.$common.errorToShow("该商品已下架，请返回重新选择商品。",function(){uni.navigateBack({delta:1})});else{var s=e.data,a=s.intro;s.intro=(0,b.default)(a);var n=e.data.product;t.goodsInfo=s,t.isfav="true"===t.goodsInfo.isfav,t.product=t.spesClassHandle(n);var d=e.data.lasttime;o.lasttime=d,i&&t.goodsBrowsing()}})},getCartNums:function(){var t=this,e=this.$db.get("userToken");e&&""!=e&&this.$api.getCartNum({},function(e){e.status&&(t.cartNums=e.data)})},toshow:function(t){this.type=t,this.$refs.lvvpopref.show()},toclose:function(){this.$refs.lvvpopref.close()},changeSpes:function(t){var e=this,i=t.v,o=t.k;if(this.product.default_spes_desc[i][o].hasOwnProperty("product_id")&&this.product.default_spes_desc[i][o].product_id){var s={id:this.product.default_spes_desc[i][o].product_id},a=this.$db.get("userToken");a&&(s["token"]=a),this.$api.getProductInfo(s,function(t){1==t.status&&(e.buyNum=t.data.stock>e.minBuyNum?e.minBuyNum:t.data.stock,e.product=e.spesClassHandle(t.data))}),uni.showLoading({title:"加载中"}),setTimeout(function(){uni.hideLoading()},1e3)}},spesClassHandle:function(t){if(t.hasOwnProperty("default_spes_desc")){var e=t.default_spes_desc;for(var i in e)for(var o in e[i])e[i][o].hasOwnProperty("is_default")&&!0===e[i][o].is_default?this.$set(e[i][o],"cla","pop-m-item selected"):e[i][o].hasOwnProperty("product_id")&&e[i][o].product_id?this.$set(e[i][o],"cla","pop-m-item not-selected"):this.$set(e[i][o],"cla","pop-m-item none");t.default_spes_desc=e}return t},bindChange:function(t){this.buyNum=t},collection:function(){var t=this,e={goods_id:this.goodsInfo.id};this.$api.goodsCollection(e,function(e){e.status?(t.isfav=!t.isfav,t.$common.successToShow(e.msg)):t.$common.errorToShow(e.msg)})},onClickItem:function(t){this.current!==t&&(this.current=t)},getGoodsParams:function(){var t=this;this.$api.goodsParams({id:this.goodsId},function(e){1==e.status&&(t.goodsParams=e.data)})},getGoodsComments:function(){var t=this,e={page:this.goodsComments.page,limit:this.goodsComments.limit,goods_id:this.goodsId};this.goodsComments.loadStatus="loading",this.$api.goodsComment(e,function(e){if(1==e.status){var i=e.data.list;i.forEach(function(e){e.ctime=t.$common.timeToDate(e.ctime),e.hasOwnProperty("images_url")||t.$set(e,"images_url",[])}),t.goodsComments.list=[].concat((0,a.default)(t.goodsComments.list),(0,a.default)(i)),e.data.count>t.goodsComments.list.length?(t.goodsComments.loadStatus="more",t.goodsComments.page++):t.goodsComments.loadStatus="noMore"}else t.$common.errorToShow(e.msg)})},goodsBrowsing:function(){var t={goods_id:this.goodsInfo.id};this.$api.addGoodsBrowsing(t,function(t){})},buyNow:function(){var t=this;if(this.buyNum>0){var e={product_id:this.product.id,nums:this.buyNum,order_type:1};this.$api.addCart(e,function(e){if(e.status){t.toclose();var i=e.data;t.$common.navigateTo("/pages/goods/place-order/index?cart_ids="+(0,s.default)(i))}else t.$common.errorToShow(e.msg)})}},Group:function(){var t=this;if(this.buyNum>0){var e={product_id:this.product.id,nums:this.buyNum,order_type:this.type};this.$api.addCart(e,function(e){if(e.status){t.toclose();var i=e.data;t.$common.navigateTo("/pages/goods/place-order/index?cart_ids="+(0,s.default)(i))}})}},redirectCart:function(){uni.switchTab({url:"/pages/cart/index/index"})},trigger:function(t){this.content[t.index].active=!t.item.active,uni.switchTab({url:t.item.url})},goShare:function(){this.$refs.share.show()},closeShare:function(){this.$refs.share.close()},clickImg:function(t){uni.previewImage({urls:t.split()})},getMyShareCode:function(){var t=this,e=this.$db.get("userToken");e&&""!=e&&this.$api.shareCode({},function(e){e.status&&(t.myShareCode=e.data?e.data:"")})}},onShareAppMessage:function(){var t=this.myShareCode?this.myShareCode:"",e=this.$common.shareParameterDecode("type=6&id="+this.goodsId+"&group_id="+this.groupId+"&invite="+t),i="/pages/share/jump?scene="+e;return{title:this.goodsInfo.name,imageUrl:this.goodsInfo.album[0],path:i}}};e.default=w},"90be":function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("c5f6");var o={name:"uni-countdown",props:{showDay:{type:Boolean,default:!0},showColon:{type:Boolean,default:!0},backgroundColor:{type:String,default:"#FFFFFF"},borderColor:{type:String,default:"#000000"},color:{type:String},textColor:{type:String,default:"#000000"},splitorColor:{type:String,default:"#000"},day:{type:Number,default:0},hour:{type:Number,default:0},minute:{type:Number,default:0},second:{type:Number,default:0}},data:function(){return{timer:null,d:"00",h:"00",i:"00",s:"00",leftTime:0,seconds:0}},created:function(t){var e=this;this.seconds=this.toSeconds(this.day,this.hour,this.minute,this.second),this.countDown(),this.timer=setInterval(function(){e.seconds--,e.seconds<0?e.timeUp():e.countDown()},1e3)},beforeDestroy:function(){clearInterval(this.timer)},methods:{toSeconds:function(t,e,i,o){return 60*t*60*24+60*e*60+60*i+o},timeUp:function(){clearInterval(this.timer),this.$emit("timeup")},countDown:function(){var t=this.seconds,e=0,i=0,o=0,s=0;t>0?(e=Math.floor(t/86400),i=Math.floor(t/3600)-24*e,o=Math.floor(t/60)-24*e*60-60*i,s=Math.floor(t)-24*e*60*60-60*i*60-60*o):this.timeUp(),e<10&&(e="0"+e),i<10&&(i="0"+i),o<10&&(o="0"+o),s<10&&(s="0"+s),this.d=e,this.h=i,this.i=o,this.s=s}}};e.default=o},"94b8":function(t,e,i){e=t.exports=i("2350")(!1),e.push([t.i,".swiper[data-v-d0fe6198]{height:%?750?%}.goods-top[data-v-d0fe6198]{border-bottom:0}.goods-top .goods-price[data-v-d0fe6198]{font-size:%?38?%}.cost-price[data-v-d0fe6198]{font-size:%?28?%!important;bottom:%?-10?%;color:#999;text-decoration:line-through}.goods-top .cell-item-ft[data-v-d0fe6198]{font-size:%?20?%;color:#666}.goods-details[data-v-d0fe6198]{padding-top:%?16?%}.goods-details .cell-hd-title[data-v-d0fe6198]{width:%?620?%}.goods-details .cell-hd-title .cell-hd-title-view[data-v-d0fe6198]{width:100%;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;overflow:hidden}.goods-details .cell-hd-title .cell-hd-title-view[data-v-d0fe6198]:last-child{margin-top:%?10?%}.goods-details .cell-item-ft[data-v-d0fe6198]{top:%?24?%}.goods-title-item .cell-item-hd[data-v-d0fe6198]{min-width:%?60?%;color:#666;font-size:%?24?%}.goods-title-item .cell-item-bd[data-v-d0fe6198]{color:#333;font-size:%?24?%}.goods-title-item .cell-bd-text[data-v-d0fe6198]{bottom:0}.cell-bd-view[data-v-d0fe6198]{position:relative;overflow:hidden}.cell-bd-view[data-v-d0fe6198]:first-child{margin-bottom:%?8?%}.goods-title-item-ic[data-v-d0fe6198]{width:%?22?%;height:%?22?%;position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);\n\t\t}.cell-bd-view .cell-bd-text[data-v-d0fe6198]{margin-left:%?30?%}.goods-content[data-v-d0fe6198]{margin-top:%?26?%;background-color:#fff;padding:%?26?% 0}.goods-parameter[data-v-d0fe6198]{padding:%?10?% %?26?%}.goods-bottom[data-v-d0fe6198],.pop-b[data-v-d0fe6198]{background-color:#fff;position:fixed;bottom:0;height:%?90?%;width:100%;overflow:hidden;-webkit-box-shadow:0 0 %?20?% #ccc;box-shadow:0 0 %?20?% #ccc}.goods-bottom uni-button[data-v-d0fe6198]{height:100%;width:35%}.goods-bottom-ic[data-v-d0fe6198]{display:inline-block;position:relative;text-align:center;height:100%;width:15%;float:left;font-size:%?22?%;color:#666}.goods-bottom-ic .icon[data-v-d0fe6198]{position:relative;top:%?6?%;\n\t\t/* left: -6upx; */\n\t\t}.goods-bottom .btn-g[data-v-d0fe6198]{color:#333;background-color:#d9d9d9}.goods-parameter .cell-item[data-v-d0fe6198]{border-bottom:none;margin-left:0}.goods-parameter .cell-item-hd[data-v-d0fe6198]{color:#333;font-size:%?24?%}.goods-parameter .cell-item-bd[data-v-d0fe6198]{color:#999}.goods-parameter .cell-item-bd .cell-bd-text[data-v-d0fe6198]{bottom:0}.goods-parameter .cell-bd-text[data-v-d0fe6198]{margin-left:0}.pop-t[data-v-d0fe6198]{position:relative;padding:%?30?% %?26?%;border-bottom:%?2?% solid #f3f3f3\n\t\t/* box-shadow: 0 0 20upx #ccc; */}.goods-img[data-v-d0fe6198]{width:%?160?%;height:%?160?%;position:absolute;top:%?-20?%;background-color:#fff;border-radius:%?6?%;border:%?2?% solid #fff}.goods-img uni-image[data-v-d0fe6198]{height:100%;width:100%}.goods-information[data-v-d0fe6198]{width:%?420?%;display:inline-block;margin-left:%?180?%}.pop-goods-name[data-v-d0fe6198]{width:100%;overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis;display:block;font-size:%?24?%;margin-bottom:%?20?%}.pop-goods-price[data-v-d0fe6198]{font-size:%?30?%}.close-btn[data-v-d0fe6198]{width:%?40?%;height:%?40?%;border-radius:50%;display:inline-block;position:absolute;right:%?30?%}.close-btn uni-image[data-v-d0fe6198]{width:100%;height:100%}.pop-m[data-v-d0fe6198]{font-size:%?28?%;margin-bottom:%?90?%}.goods-number[data-v-d0fe6198],.goods-specs[data-v-d0fe6198]{padding:%?26?%;border-top:1px solid #f3f3f3}.goods-specs[data-v-d0fe6198]:first-child{border:none}.pop-m-title[data-v-d0fe6198]{margin-right:%?10?%;color:#666}.pop-m-bd[data-v-d0fe6198]{overflow:hidden;margin-top:%?10?%}.pop-m-item[data-v-d0fe6198]{display:inline-block;float:left;padding:%?6?% %?16?%;background-color:#fff;color:#333;margin-right:%?16?%;margin-bottom:%?10?%}.selected[data-v-d0fe6198]{border:%?2?% solid #333;background-color:#333;color:#fff}.not-selected[data-v-d0fe6198]{border:%?2?% solid #ccc}.none[data-v-d0fe6198]{border:%?2?% dashed #ccc;color:#888}.pop-m-bd-in[data-v-d0fe6198]{display:inline-block}.badge[data-v-d0fe6198]{top:%?2?%;left:%?62?%}.goods-assess .user-head-img[data-v-d0fe6198]{width:%?80?%;height:%?80?%;border-radius:50%}.goods-assess .cell-item-bd[data-v-d0fe6198]{padding-right:0}.goods-assess .cell-bd-text[data-v-d0fe6198]{margin:0}.goods-assess .cell-bd-text.color-9[data-v-d0fe6198]{overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;white-space:nowrap;max-width:%?440?%}.gai-body-text[data-v-d0fe6198]{font-size:%?26?%;color:#333;padding:0 %?26?%}.gai-body-img[data-v-d0fe6198]{overflow:hidden;padding:%?20?% %?26?%}.gai-body-img uni-image[data-v-d0fe6198]{width:%?220?%;height:%?220?%;float:left;margin-right:%?19?%;margin-bottom:%?18?%}.gai-body-img uni-image[data-v-d0fe6198]:nth-child(3n){margin-right:0}.redstar[data-v-d0fe6198]{width:%?24?%;height:%?24?%;padding:%?2?%}.mask-share-wechat[data-v-d0fe6198]{display:inline-block;background-color:#fff;padding:0}.mask-share-wechat[data-v-d0fe6198]:after{border:none}.right-ball[data-v-d0fe6198]{position:fixed;right:%?30?%;bottom:%?300?%;z-index:999;text-align:center;padding:%?14?% 0;\n\t\t/* line-height: 80upx; */width:%?80?%;height:%?80?%;font-size:%?24?%;color:#fff;background-color:rgba(0,0,0,.5);border-radius:50%}.share-pop[data-v-d0fe6198]{height:%?300?%;width:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.share-item[data-v-d0fe6198]{-webkit-box-flex:1;-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;font-size:%?26?%;color:#333;padding:%?20?% 0}\n\n\t/* .share-item image{\n\twidth: 120upx;\n\theight: 120upx;\n} */.comment-none[data-v-d0fe6198]{text-align:center;padding:%?200?% 0}.comment-none-img[data-v-d0fe6198]{width:%?274?%;height:%?274?%}.price-salesvolume[data-v-d0fe6198]{width:100%;padding:0 0 0 %?26?%;overflow:hidden;color:#a5a5a5;background-color:#fce250;position:relative}.commodity-price[data-v-d0fe6198]{width:%?224?%;display:inline-block;float:left}.current-price[data-v-d0fe6198]{font-size:%?40?%;color:#ff7159;display:block;line-height:1.5}.cost-price[data-v-d0fe6198]{font-size:%?26?%;text-decoration:line-through;\n\t\t/* margin-left: 8rpx; */display:block}.commodity-salesvolume[data-v-d0fe6198]{width:%?240?%;display:inline-block;font-size:%?22?%;float:left;padding:%?16?% 0}.commodity-salesvolume>uni-text[data-v-d0fe6198]{display:block}.commodity-time-img[data-v-d0fe6198]{display:block;width:0;height:0;border-width:%?56?% %?28?% %?56?% 0;border-style:solid;border-color:rgba(0,0,0,0) #ff7159 rgba(0,0,0,0) rgba(0,0,0,0);\n\t\t/*透明 黄 透明 透明 */position:absolute;top:0;left:%?462?%}.commodity-time[data-v-d0fe6198]{display:inline-block;width:%?260?%;text-align:center;font-size:%?24?%;background-color:#ff7159;padding:%?16?% 0 %?18?%;color:#ff7159}.commodity-time>uni-text[data-v-d0fe6198]{color:#fce250}.nav-back[data-v-d0fe6198]{width:100%;height:44px;\n\t\tpadding:12px 12px 0;\n\t\t\n\t\tposition:fixed;top:0;background-color:hsla(0,0%,100%,0);z-index:98}.back-btn[data-v-d0fe6198]{height:32px;width:32px;border-radius:50%;background-color:hsla(0,0%,100%,.8)}.back-btn .icon[data-v-d0fe6198]{height:20px;width:20px;position:relative;top:50%;left:46%;-webkit-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.commodity-day>uni-text[data-v-d0fe6198]{display:inline-block;background-color:#ffd4b0;color:#ff7300;padding:0 %?6?%;border-radius:%?6?%}.tl[data-v-d0fe6198]{width:70%!important}.group-swiper[data-v-d0fe6198]{\n\t\t/* padding: 20upx 26upx; */}.group-swiper-c[data-v-d0fe6198]{height:%?242?%}.group-swiper-c .swiper-item .cell-item[data-v-d0fe6198]{height:50%}.group-swiper-c .swiper-item .cell-item .user-head-img[data-v-d0fe6198]{width:%?80?%;height:%?80?%;border-radius:50%}.group-swiper-c .swiper-item .cell-item .cell-hd-title[data-v-d0fe6198]{position:absolute;top:50%;left:%?100?%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);max-width:%?260?%;width:100%;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;white-space:nowrap}.group-swiper-c .swiper-item .cell-item .cell-item-bd[data-v-d0fe6198]{min-width:%?150?%;max-width:%?150?%}.group-swiper-c .swiper-item .cell-item .cell-item-ft .btn[data-v-d0fe6198]{font-size:%?26?%;color:#fff;background-color:#ff7159;\n\t\t/* padding: 0; */text-align:center}",""])},9605:function(t,e,i){"use strict";var o=i("d209"),s=i.n(o);s.a},aef9:function(t,e,i){"use strict";var o=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"uni-countdown"},[t.showDay&&0!=t.d?i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.d))]):t._e(),t.showDay&&0!=t.d?i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v("天")]):t._e(),i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.h))]),i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v(t._s(t.showColon?":":"时"))]),i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.i))]),i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v(t._s(t.showColon?":":"分"))]),i("v-uni-view",{staticClass:"uni-countdown__number",style:{borderColor:t.borderColor,color:t.color,background:t.backgroundColor}},[t._v(t._s(t.s))]),t.showColon?t._e():i("v-uni-view",{staticClass:"uni-countdown__splitor",style:{color:t.textColor}},[t._v("秒")])],1)},s=[];i.d(e,"a",function(){return o}),i.d(e,"b",function(){return s})},afbe:function(t,e,i){"use strict";i.r(e);var o=i("f6cf"),s=i("0079");for(var a in s)"default"!==a&&function(t){i.d(e,t,function(){return s[t]})}(a);i("38d8");var n=i("2877"),d=Object(n["a"])(s["default"],o["a"],o["b"],!1,null,"d0fe6198",null);e["default"]=d.exports},d209:function(t,e,i){var o=i("e448");"string"===typeof o&&(o=[[t.i,o,""]]),o.locals&&(t.exports=o.locals);var s=i("4f06").default;s("23a982f2",o,!0,{sourceMap:!1,shadowMode:!1})},e448:function(t,e,i){e=t.exports=i("2350")(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* 文字基本颜色 */\n/* 背景颜色 */\n/* 边框颜色 */\n/* 尺寸变量 */\n/* 文字尺寸 */\n/* 图片尺寸 */\n/* Border Radius */\n/* 水平间距 */\n/* 垂直间距 */\n/* 透明度 */\n/* 文章场景相关 */.uni-countdown[data-v-333bc57d]{padding:%?2?% 0;display:-webkit-inline-box;display:-webkit-inline-flex;display:-ms-inline-flexbox;display:inline-flex;-webkit-flex-wrap:nowrap;-ms-flex-wrap:nowrap;flex-wrap:nowrap;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.uni-countdown__splitor[data-v-333bc57d]{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;line-height:%?44?%;padding:0 %?5?%;font-size:%?24?%}.uni-countdown__number[data-v-333bc57d]{line-height:%?44?%;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:%?44?%;border-radius:%?6?%;font-size:%?24?%;font-size:%?24?%}',""])},f6cf:function(t,e,i){"use strict";var o=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"content"},[i("v-uni-view",{staticClass:"nav-back"},[i("v-uni-view",{staticClass:"back-btn",on:{click:function(e){e=t.$handleEvent(e),t.backBtn()}}},[i("v-uni-image",{staticClass:"icon",attrs:{src:"../../../static/image/back-black.png",mode:""}})],1)],1),i("v-uni-view",{staticClass:"content-top"},[i("v-uni-view",{staticClass:"swiper"},[i("v-uni-swiper",{staticClass:"swiper-c",attrs:{"indicator-dots":t.swiper.indicatorDots,autoplay:t.swiper.autoplay,interval:t.swiper.interval,duration:t.swiper.duration}},t._l(t.goodsInfo.album,function(e,o){return i("v-uni-swiper-item",{key:o,staticClass:"have-none",on:{click:function(i){i=t.$handleEvent(i),t.clickImg(e)}}},[i("v-uni-image",{attrs:{src:e,mode:"aspectFill"}})],1)}),1)],1),i("v-uni-view",{staticClass:"cell-group"},[!1!==t.lasttime.hour?i("v-uni-view",{staticClass:"price-salesvolume"},[i("v-uni-view",{staticClass:"commodity-price"},[i("v-uni-text",{staticClass:"current-price"},[t._v("￥"+t._s(t.product.price))]),parseFloat(t.product.mktprice)>0?i("v-uni-text",{staticClass:"cost-price"},[t._v("￥"+t._s(t.product.mktprice))]):t._e()],1),i("v-uni-view",{staticClass:"commodity-salesvolume"},[i("v-uni-text",[t._v("已售"+t._s(t.goodsInfo.buy_count)+"件/剩余"+t._s(t.product.stock)+"件")]),i("v-uni-text",[t._v("累计销售"+t._s(t.goodsInfo.buy_count)+"件")])],1),i("v-uni-view",{staticClass:"commodity-time-img"}),i("v-uni-view",{staticClass:"commodity-time"},[i("v-uni-text",[t._v("距结束仅剩")]),i("v-uni-view",{staticClass:"commodity-day"},[i("uni-countdown",{attrs:{"show-day":!1,hour:t.lasttime.hour,minute:t.lasttime.minute,second:t.lasttime.second}})],1)],1)],1):t._e(),i("v-uni-view",{staticClass:"cell-item goods-details"},[i("v-uni-view",{staticClass:"cell-item-hd"},[i("v-uni-view",{staticClass:"cell-hd-title"},[i("v-uni-view",{staticClass:"color-3 fsz28 cell-hd-title-view"},[t._v(t._s(t.product.name))]),t.goodsInfo.brief?i("v-uni-view",{staticClass:"color-9 fsz24 cell-hd-title-view"},[t._v(t._s(t.goodsInfo.brief))]):t._e()],1)],1),i("v-uni-view",{staticClass:"cell-item-ft"},[i("v-uni-image",{staticClass:"cell-ft-next icon",attrs:{src:"../../../static/image/share.png"},on:{click:function(e){e=t.$handleEvent(e),t.goShare()}}})],1)],1),t.promotion.length?i("v-uni-view",{staticClass:"cell-item goods-title-item"},[i("v-uni-view",{staticClass:"cell-item-hd"},[i("v-uni-view",{staticClass:"cell-hd-title"},[t._v("促销")])],1),i("v-uni-view",{staticClass:"cell-item-bd"},[i("v-uni-view",{staticClass:"romotion-tip"},t._l(t.promotion,function(e,o){return i("v-uni-view",{key:o,staticClass:"romotion-tip-item",class:2!==e.type?"bg-gray":""},[t._v(t._s(e.name))])}),1)],1)],1):t._e(),t.isSpes?i("v-uni-view",{staticClass:"cell-item goods-title-item"},[i("v-uni-view",{staticClass:"cell-item-hd"},[i("v-uni-view",{staticClass:"cell-hd-title"},[t._v("规格")])],1),i("v-uni-view",{staticClass:"cell-item-bd",on:{click:function(e){e=t.$handleEvent(e),t.toshow()}}},[i("v-uni-text",{staticClass:"cell-bd-text"},[t._v(t._s(t.product.spes_desc))])],1)],1):t._e(),i("v-uni-view",{staticClass:"cell-item goods-title-item"},[i("v-uni-view",{staticClass:"cell-item-hd"},[i("v-uni-view",{staticClass:"cell-hd-title"},[t._v("说明")])],1),i("v-uni-view",{staticClass:"cell-item-bd"},[i("v-uni-view",{staticClass:"cell-bd-view"},[i("v-uni-image",{staticClass:"goods-title-item-ic",attrs:{src:"../../../static/image/ic-dui.png",mode:""}}),i("v-uni-text",{staticClass:"cell-bd-text"},[t._v("24小时内发货")])],1),i("v-uni-view",{staticClass:"cell-bd-view"},[i("v-uni-image",{staticClass:"goods-title-item-ic",attrs:{src:"../../../static/image/ic-dui.png",mode:""}}),i("v-uni-text",{staticClass:"cell-bd-text"},[t._v("7天拆封无条件退货")])],1)],1)],1)],1),i("v-uni-view",{staticClass:"goods-content"},[i("uni-segmented-control",{attrs:{current:t.current,values:t.items,"style-type":"text","active-color":"#333"},on:{clickItem:function(e){e=t.$handleEvent(e),t.onClickItem(e)}}}),i("v-uni-view",{staticClass:"goods-content-c"},[0===t.current?i("v-uni-view",{staticClass:"goods-detail"},[i("v-uni-rich-text",{attrs:{nodes:t.goodsInfo.intro}})],1):1===t.current?i("v-uni-view",{staticClass:"goods-parameter"},[t.goodsParams.length?i("v-uni-view",{staticClass:"cell-group"},t._l(t.goodsParams,function(e,o){return i("v-uni-view",{key:o,staticClass:"cell-item"},[i("v-uni-view",{staticClass:"cell-item-hd"},[i("v-uni-view",{staticClass:"cell-hd-title"},[t._v(t._s(e.name))])],1),i("v-uni-view",{staticClass:"cell-item-bd"},[i("v-uni-text",{staticClass:"cell-bd-text"},[t._v(t._s(e.value))])],1)],1)}),1):t._e()],1):2===t.current?i("v-uni-view",{staticClass:"goods-assess"},[t.goodsComments.list.length?i("v-uni-view",[t._l(t.goodsComments.list,function(e,o){return i("v-uni-view",{key:o,staticClass:"goods-assess-item"},[i("v-uni-view",{staticClass:"cell-group"},[i("v-uni-view",{staticClass:"cell-item goods-title-item"},[i("v-uni-view",{staticClass:"cell-item-hd"},[i("v-uni-image",{staticClass:"user-head-img",attrs:{src:e.user.avatar,mode:"aspectFill"}})],1),i("v-uni-view",{staticClass:"cell-item-bd"},[i("v-uni-view",{staticClass:"cell-bd-view"},[i("v-uni-text",{staticClass:"cell-bd-text"},[t._v(t._s(e.user.nickname))]),i("v-uni-view",{staticClass:"cell-bd-text-right"},[i("uni-rate",{attrs:{size:"16",disabled:"true",value:e.score}})],1)],1),i("v-uni-view",{staticClass:"cell-bd-view"},[i("v-uni-text",{staticClass:"cell-bd-text color-9",staticStyle:{"margin-right":"16upx"}},[t._v(t._s(e.ctime))]),i("v-uni-text",{staticClass:"cell-bd-text color-9"},[t._v(t._s(e.addon))])],1)],1)],1)],1),i("v-uni-view",{staticClass:"gai-body"},[i("v-uni-view",{staticClass:"gai-body-text"},[t._v(t._s(e.content))]),e.images_url.length?i("v-uni-view",{staticClass:"gai-body-img"},t._l(e.images_url,function(e,o){return i("v-uni-image",{key:o,attrs:{src:e,mode:"aspectFill"},on:{click:function(i){i=t.$handleEvent(i),t.clickImg(e)}}})}),1):t._e()],1)],1)}),i("uni-load-more",{attrs:{status:t.goodsComments.loadStatus}})],2):i("v-uni-view",{staticClass:"comment-none"},[i("v-uni-image",{staticClass:"comment-none-img",attrs:{src:"../../../static/image/order.png",mode:""}})],1)],1):t._e()],1)],1)],1),i("lvv-popup",{ref:"share",attrs:{position:"bottom"}},[i("shareByH5",{attrs:{goodsId:t.goodsInfo.id,shareImg:t.goodsInfo.image_url,shareTitle:t.goodsInfo.name,shareContent:t.goodsInfo.brief,shareHref:t.shareHref},on:{close:function(e){e=t.$handleEvent(e),t.closeShare()}}})],1),i("lvv-popup",{ref:"lvvpopref",attrs:{position:"bottom"}},[i("v-uni-view",{staticStyle:{width:"100%","max-height":"804upx",background:"#FFFFFF",position:"absolute",left:"0",bottom:"0"}},[i("v-uni-view",{staticClass:"pop-c"},[i("v-uni-view",{staticClass:"pop-t"},[i("v-uni-view",{staticClass:"goods-img"},[i("v-uni-image",{attrs:{src:t.product.image_path,mode:"aspectFill"}})],1),i("v-uni-view",{staticClass:"goods-information"},[i("v-uni-view",{staticClass:"pop-goods-name"},[t._v(t._s(t.product.name))]),i("v-uni-view",{staticClass:"pop-goods-price red-price"},[t._v("￥ "+t._s(t.product.price))])],1),i("v-uni-view",{staticClass:"close-btn",on:{click:function(e){e=t.$handleEvent(e),t.toclose()}}},[i("v-uni-image",{attrs:{src:"../../../static/image/close.png"}})],1)],1),i("v-uni-scroll-view",{staticClass:"pop-m",staticStyle:{"max-height":"560upx"},attrs:{"scroll-y":"true"}},[i("spec",{ref:"spec",attrs:{spesData:t.product.default_spes_desc},on:{changeSpes:function(e){e=t.$handleEvent(e),t.changeSpes(e)}}}),i("v-uni-view",{staticClass:"goods-number"},[i("v-uni-text",{staticClass:"pop-m-title"},[t._v("数量")]),i("v-uni-view",{staticClass:"pop-m-bd-in"},[i("uni-number-box",{attrs:{min:t.minNums,max:t.product.stock,value:t.buyNum},on:{change:function(e){e=t.$handleEvent(e),t.bindChange(e)}}})],1)],1)],1),i("v-uni-view",{staticClass:"pop-b"},[t.product.stock?i("v-uni-button",{staticClass:"btn btn-square btn-b btn-all",attrs:{"hover-class":"btn-hover2"},on:{click:function(e){e=t.$handleEvent(e),t.buyNow()}}},[t._v("确定")]):i("v-uni-button",{staticClass:"btn btn-square btn-g btn-all"},[t._v("已售罄")])],1)],1)],1)],1),i("div",{ref:"qrCodeDiv",attrs:{id:"qrCode"}}),i("v-uni-view",{staticClass:"goods-bottom"},[i("v-uni-view",{staticClass:"goods-bottom-ic",on:{click:function(e){e=t.$handleEvent(e),t.collection(e)}}},[i("v-uni-image",{staticClass:"icon",attrs:{src:t.isfav?t.favLogo[1]:t.favLogo[0],mode:""}}),t.isfav?t._e():i("v-uni-view",[t._v("收藏")]),t.isfav?i("v-uni-view",[t._v("已收藏")]):t._e()],1),i("v-uni-view",{staticClass:"goods-bottom-ic",on:{click:function(e){e=t.$handleEvent(e),t.redirectCart(e)}}},[t.cartNums?i("v-uni-view",{staticClass:"badge color-f"},[t._v(t._s(t.cartNums))]):t._e(),i("v-uni-image",{staticClass:"icon",attrs:{src:"../../../static/image/ic-me-car.png",mode:""}}),i("v-uni-view",[t._v("购物车")])],1),i("v-uni-button",{staticClass:"btn btn-square btn-b tl",attrs:{"hover-class":"btn-hover2"},on:{click:function(e){e=t.$handleEvent(e),t.toshow(2)}}},[t._v("立即"+t._s(t.typeName))])],1),i("uni-fab",{attrs:{pattern:t.pattern,content:t.content,horizontal:t.horizontal,vertical:t.vertical,direction:t.direction},on:{trigger:function(e){e=t.$handleEvent(e),t.trigger(e)}}})],1)},s=[];i.d(e,"a",function(){return o}),i.d(e,"b",function(){return s})}}]);