var $body=$("body"),$videos=$("video[autoplay]");!function(e){var o=[],t=(e("body"),0),n=function(e){},l=function(){},r=function(t){e(t).find("*:not(script)").each(function(){var t="";if(e(this).css("background-image").indexOf("none")==-1&&e(this).css("background-image").indexOf("-gradient")==-1){if(t=e(this).css("background-image"),t.indexOf("url")!=-1){var n=t.match(/url\((.*?)\)/);t=n[1].replace(/\"/g,"")}}else"img"==e(this).get(0).nodeName.toLowerCase()&&"undefined"!=typeof e(this).attr("src")&&(t=e(this).attr("src"));t.length>0&&o.push(t)})},a=function(){t++,n(Math.round(t/o.length*100)),t==o.length&&l()},i=function(o){e(new Image).load(a).error(a).attr("src",o)};e.fn.DEPreLoad=function(e){return this.each(function(){"undefined"!=typeof e.OnStep&&(n=e.OnStep),"undefined"!=typeof e.OnComplete&&(l=e.OnComplete),r(this);for(var t=0;t<o.length;t++)i(o[t])})}}(jQuery);var $indicator=radialIndicator("#canvas_round",{radius:125,barColor:"#f00",barBgColor:"#ddd",barWidth:3,fontWeight:"normal",fontSize:"50",fontColor:"#ddd"});$body.DEPreLoad({OnStep:function(e){$indicator.value(e)},OnComplete:function(){$body.removeClass("isLoading"),$videos.each(function(){this.play()})}}),function(e){e.fn.hiltiHoverTile=function(){var o=this,t=e('<a href="#" class="close_hover_info">&times;</a>');t.on("click",function(o){e(this).parent().parent().removeClass("active"),o.preventDefault(),o.stopPropagation()}),e(".content_cover").append(t);var n=function(){this.myClass=e(this).parent().parent().attr("class").split("_class")[0]+"_class",this.rel=e(this).attr("rel"),this.imgUrl=e("div."+this.myClass+"_"+this.rel+" img").first().attr("src"),e(this).parent().parent().css("backgroundImage","url("+this.imgUrl+")"),e("."+this.myClass+" img.mapped").addClass("opaced")},l=function(){e(".opaced").removeClass("opaced")},r=function(o){e("."+this.myClass+"_"+this.rel).addClass("active")},a=function(){var o=e(arguments[0].currentTarget);"undefined"!=typeof o.attr("data-href")&&""!=o.attr("data-href")&&(document.location.href=o.attr("data-href"))},i=function(o,t,i){e(o).find("area").on("mouseenter",n).on("mouseleave",l).on("click",r),e(o).find("button").on("click",a)};[].forEach.call(o,i)}}(jQuery),function(e){e.fn.hiltiHoverVideo=function(){var o=this,t=function(){var o=e(arguments[0].currentTarget);"undefined"!=typeof o.attr("href")&&""!=o.attr("href")&&(document.location.href=o.attr("href"))},n=function(o,n,l){e(o).attr("class");e(o).on("click tap",t)};[].forEach.call(o,n)}}(jQuery);var $body=$("body");$(document).ready(function(){if($body.hasClass("landing")){$('area[href="#"],a[href="#"]').on("click",function(e){e.preventDefault()});var e=$(".tile_element");$("map").imageMapResize(),$(".power_class, .compact_class, .subcompact_class").hiltiHoverTile(),$(".ultimate_class").hiltiHoverVideo(),$(".close_video").on("click",function(){$(".overlay video").get(0).pause(),$(".overlay").removeClass("opened"),$(".tile_element video").first().get(0).load(),$(".tile_element video").first().get(0).play()}),$(".videoPopup_open").on("click",function(){$(".overlay").addClass("opened"),$(".overlay video").get(0).load(),$(".tile_element video").first().get(0).pause()}),setTimeout(function(){$(".overlay").addClass("opened")},500),$("body").on("keyup",function(e){27==e.which&&$(".close_video").trigger("click")});var o=$(".scroll_btn_right"),t=$(".scroll_btn_left"),n=new IScroll(".wrapper-inner",{scrollX:!0,scrollY:!1,mouseWheel:!0,keyBindings:{pageUp:33,pageDown:34,end:35,home:36,left:37,up:38,right:39,down:40},probeType:3}),l=function(){var n=this.wrapper.getBoundingClientRect();e.each(function(){var e=$(this),o=e.offset();o.left+e.width()>n.left&&o.left<n.right?e.not("bubble")&&e.addClass("bubble"):e.removeClass("bubble")}),this.x<=this.maxScrollX?o.removeClass("hasScroll"):o.addClass("hasScroll"),this.x<0?t.addClass("hasScroll"):t.removeClass("hasScroll")};n.runScrollHandler=function(){l.apply(n,arguments)},n.on("scroll",n.runScrollHandler),$("body").on("keydown",n.runScrollHandler),$("body").on("keyup",n.runScrollHandler),n.runScrollHandler(),$(".scroll_btn_right").on("mouseup",function(){}),$(".scroll_btn_right").on("mousedown",function(){n.x>n.maxScrollX&&(n.x+n.maxScrollX/8>n.maxScrollX?n.scrollBy(n.maxScrollX/8,0,500,IScroll.utils.ease.circular):n.scrollTo(n.maxScrollX,0,500,IScroll.utils.ease.circular))}),$(".scroll_btn_left").on("mouseup",function(){}),$(".scroll_btn_left").on("mousedown",function(){n.x<=0&&(n.x-n.maxScrollX/8<=0?n.scrollBy(-n.maxScrollX/8,0,500,IScroll.utils.ease.circular):n.scrollTo(0,0,500,IScroll.utils.ease.circular))})}}),function(e){}(jQuery),function(e){if(e("body").not("landing")){var o=e(".top-menu").first(),t=e(o).height(),n=function(){this.oldScroll=this.oldScroll||0;var n=e(this).scrollTop();n>this.oldScroll?n>=t&&e(o).addClass("go-hide"):e(o).removeClass("go-hide"),this.oldScroll=n};e(window).scroll(n)}}(jQuery);