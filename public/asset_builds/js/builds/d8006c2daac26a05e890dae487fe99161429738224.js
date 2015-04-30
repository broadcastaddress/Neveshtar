var Metronic=function(){var isRTL=false;var isIE8=false;var isIE9=false;var isIE10=false;var resizeHandlers=[];var assetsPath='/themes/bootstrap/assets/';var globalImgPath='/global/img/';var globalPluginsPath='/global/plugins/';var globalCssPath='/global/css/';var brandColors={'blue':'#89C4F4','red':'#F3565D','green':'#1bbc9b','purple':'#9b59b6','grey':'#95a5a6','yellow':'#F8CB00'};var handleInit=function(){if($('body').css('direction')==='rtl'){isRTL=true;}
isIE8=!!navigator.userAgent.match(/MSIE 8.0/);isIE9=!!navigator.userAgent.match(/MSIE 9.0/);isIE10=!!navigator.userAgent.match(/MSIE 10.0/);if(isIE10){$('html').addClass('ie10');}
if(isIE10||isIE9||isIE8){$('html').addClass('ie');}};var _runResizeHandlers=function(){for(var i=0;i<resizeHandlers.length;i++){var each=resizeHandlers[i];each.call();}};var handleOnResize=function(){var resize;if(isIE8){var currheight;$(window).resize(function(){if(currheight==document.documentElement.clientHeight){return;}
if(resize){clearTimeout(resize);}
resize=setTimeout(function(){_runResizeHandlers();},50);currheight=document.documentElement.clientHeight;});}else{$(window).resize(function(){if(resize){clearTimeout(resize);}
resize=setTimeout(function(){_runResizeHandlers();},50);});}};var handlePortletTools=function(){$('body').on('click','.portlet > .portlet-title > .tools > a.remove',function(e){e.preventDefault();var portlet=$(this).closest(".portlet");if($('body').hasClass('page-portlet-fullscreen')){$('body').removeClass('page-portlet-fullscreen');}
portlet.find('.portlet-title .fullscreen').tooltip('destroy');portlet.find('.portlet-title > .tools > .reload').tooltip('destroy');portlet.find('.portlet-title > .tools > .remove').tooltip('destroy');portlet.find('.portlet-title > .tools > .config').tooltip('destroy');portlet.find('.portlet-title > .tools > .collapse, .portlet > .portlet-title > .tools > .expand').tooltip('destroy');portlet.remove();});$('body').on('click','.portlet > .portlet-title .fullscreen',function(e){e.preventDefault();var portlet=$(this).closest(".portlet");if(portlet.hasClass('portlet-fullscreen')){$(this).removeClass('on');portlet.removeClass('portlet-fullscreen');$('body').removeClass('page-portlet-fullscreen');portlet.children('.portlet-body').css('height','auto');}else{var height=Metronic.getViewPort().height-
portlet.children('.portlet-title').outerHeight()-
parseInt(portlet.children('.portlet-body').css('padding-top'))-
parseInt(portlet.children('.portlet-body').css('padding-bottom'));$(this).addClass('on');portlet.addClass('portlet-fullscreen');$('body').addClass('page-portlet-fullscreen');portlet.children('.portlet-body').css('height',height);}});$('body').on('click','.portlet > .portlet-title > .tools > a.reload',function(e){e.preventDefault();var el=$(this).closest(".portlet").children(".portlet-body");var url=$(this).attr("data-url");var error=$(this).attr("data-error-display");if(url){Metronic.blockUI({target:el,animate:true,overlayColor:'none'});$.ajax({type:"GET",cache:false,url:url,dataType:"html",success:function(res){Metronic.unblockUI(el);el.html(res);},error:function(xhr,ajaxOptions,thrownError){Metronic.unblockUI(el);var msg='Error on reloading the content. Please check your connection and try again.';if(error=="toastr"&&toastr){toastr.error(msg);}else if(error=="notific8"&&$.notific8){$.notific8('zindex',11500);$.notific8(msg,{theme:'ruby',life:3000});}else{alert(msg);}}});}else{Metronic.blockUI({target:el,animate:true,overlayColor:'none'});window.setTimeout(function(){Metronic.unblockUI(el);},1000);}});$('.portlet .portlet-title a.reload[data-load="true"]').click();$('body').on('click','.portlet > .portlet-title > .tools > .collapse, .portlet .portlet-title > .tools > .expand',function(e){e.preventDefault();var el=$(this).closest(".portlet").children(".portlet-body");if($(this).hasClass("collapse")){$(this).removeClass("collapse").addClass("expand");el.slideUp(200);}else{$(this).removeClass("expand").addClass("collapse");el.slideDown(200);}});};var handleUniform=function(){if(!$().uniform){return;}
var test=$("input[type=checkbox]:not(.toggle, .make-switch, .icheck), input[type=radio]:not(.toggle, .star, .make-switch, .icheck)");if(test.size()>0){test.each(function(){if($(this).parents(".checker").size()===0){$(this).show();$(this).uniform();}});}};var handleiCheck=function(){if(!$().iCheck){return;}
$('.icheck').each(function(){var checkboxClass=$(this).attr('data-checkbox')?$(this).attr('data-checkbox'):'icheckbox_minimal-grey';var radioClass=$(this).attr('data-radio')?$(this).attr('data-radio'):'iradio_minimal-grey';if(checkboxClass.indexOf('_line')>-1||radioClass.indexOf('_line')>-1){$(this).iCheck({checkboxClass:checkboxClass,radioClass:radioClass,insert:'<div class="icheck_line-icon"></div>'+$(this).attr("data-label")});}else{$(this).iCheck({checkboxClass:checkboxClass,radioClass:radioClass});}});};var handleBootstrapSwitch=function(){if(!$().bootstrapSwitch){return;}
$('.make-switch').bootstrapSwitch();};var handleBootstrapConfirmation=function(){if(!$().confirmation){return;}
$('[data-toggle=confirmation]').confirmation({container:'body',btnOkClass:'btn-xs btn-success',btnCancelClass:'btn-xs btn-danger'});}
var handleAccordions=function(){$('body').on('shown.bs.collapse','.accordion.scrollable',function(e){Metronic.scrollTo($(e.target));});};var handleTabs=function(){if(location.hash){var tabid=location.hash.substr(1);$('a[href="#'+tabid+'"]').parents('.tab-pane:hidden').each(function(){var tabid=$(this).attr("id");$('a[href="#'+tabid+'"]').click();});$('a[href="#'+tabid+'"]').click();}};var handleModals=function(){$('body').on('hide.bs.modal',function(){if($('.modal:visible').size()>1&&$('html').hasClass('modal-open')===false){$('html').addClass('modal-open');}else if($('.modal:visible').size()<=1){$('html').removeClass('modal-open');}});$('body').on('show.bs.modal','.modal',function(){if($(this).hasClass("modal-scroll")){$('body').addClass("modal-open-noscroll");}});$('body').on('hide.bs.modal','.modal',function(){$('body').removeClass("modal-open-noscroll");});$('body').on('hidden.bs.modal','.modal:not(.modal-cached)',function(){$(this).removeData('bs.modal');});};var handleTooltips=function(){$('.tooltips').tooltip();$('.portlet > .portlet-title .fullscreen').tooltip({container:'body',title:'Fullscreen'});$('.portlet > .portlet-title > .tools > .reload').tooltip({container:'body',title:'Reload'});$('.portlet > .portlet-title > .tools > .remove').tooltip({container:'body',title:'Remove'});$('.portlet > .portlet-title > .tools > .config').tooltip({container:'body',title:'Settings'});$('.portlet > .portlet-title > .tools > .collapse, .portlet > .portlet-title > .tools > .expand').tooltip({container:'body',title:'Collapse/Expand'});};var handleDropdowns=function(){$('body').on('click','.dropdown-menu.hold-on-click',function(e){e.stopPropagation();});};var handleAlerts=function(){$('body').on('click','[data-close="alert"]',function(e){$(this).parent('.alert').hide();$(this).closest('.note').hide();e.preventDefault();});$('body').on('click','[data-close="note"]',function(e){$(this).closest('.note').hide();e.preventDefault();});$('body').on('click','[data-remove="note"]',function(e){$(this).closest('.note').remove();e.preventDefault();});};var handleDropdownHover=function(){$('[data-hover="dropdown"]').not('.hover-initialized').each(function(){$(this).dropdownHover();$(this).addClass('hover-initialized');});};var lastPopedPopover;var handlePopovers=function(){$('.popovers').popover();$(document).on('click.bs.popover.data-api',function(e){if(lastPopedPopover){lastPopedPopover.popover('hide');}});};var handleScrollers=function(){Metronic.initSlimScroll('.scroller');};var handleFancybox=function(){if(!jQuery.fancybox){return;}
if($(".fancybox-button").size()>0){$(".fancybox-button").fancybox({groupAttr:'data-rel',prevEffect:'none',nextEffect:'none',closeBtn:true,helpers:{title:{type:'inside'}}});}};var handleFixInputPlaceholderForIE=function(){if(isIE8||isIE9){$('input[placeholder]:not(.placeholder-no-fix), textarea[placeholder]:not(.placeholder-no-fix)').each(function(){var input=$(this);if(input.val()===''&&input.attr("placeholder")!==''){input.addClass("placeholder").val(input.attr('placeholder'));}
input.focus(function(){if(input.val()==input.attr('placeholder')){input.val('');}});input.blur(function(){if(input.val()===''||input.val()==input.attr('placeholder')){input.val(input.attr('placeholder'));}});});}};var handleSelect2=function(){if($().select2){$('.select2me').select2({placeholder:"Select",allowClear:true});}};return{init:function(){handleInit();handleOnResize();handleUniform();handleiCheck();handleBootstrapSwitch();handleScrollers();handleFancybox();handleSelect2();handlePortletTools();handleAlerts();handleDropdowns();handleTabs();handleTooltips();handlePopovers();handleAccordions();handleModals();handleBootstrapConfirmation();handleFixInputPlaceholderForIE();},initAjax:function(){handleUniform();handleiCheck();handleBootstrapSwitch();handleDropdownHover();handleScrollers();handleSelect2();handleFancybox();handleDropdowns();handleTooltips();handlePopovers();handleAccordions();handleBootstrapConfirmation();},initComponents:function(){this.initAjax();},setLastPopedPopover:function(el){lastPopedPopover=el;},addResizeHandler:function(func){resizeHandlers.push(func);},runResizeHandlers:function(){_runResizeHandlers();},scrollTo:function(el,offeset){var pos=(el&&el.size()>0)?el.offset().top:0;if(el){if($('body').hasClass('page-header-fixed')){pos=pos-$('.page-header').height();}
pos=pos+(offeset?offeset:-1*el.height());}
$('html,body').animate({scrollTop:pos},'slow');},initSlimScroll:function(el){$(el).each(function(){if($(this).attr("data-initialized")){return;}
var height;if($(this).attr("data-height")){height=$(this).attr("data-height");}else{height=$(this).css('height');}
$(this).slimScroll({allowPageScroll:true,size:'7px',color:($(this).attr("data-handle-color")?$(this).attr("data-handle-color"):'#bbb'),wrapperClass:($(this).attr("data-wrapper-class")?$(this).attr("data-wrapper-class"):'slimScrollDiv'),railColor:($(this).attr("data-rail-color")?$(this).attr("data-rail-color"):'#eaeaea'),position:isRTL?'left':'right',height:height,alwaysVisible:($(this).attr("data-always-visible")=="1"?true:false),railVisible:($(this).attr("data-rail-visible")=="1"?true:false),disableFadeOut:true});$(this).attr("data-initialized","1");});},destroySlimScroll:function(el){$(el).each(function(){if($(this).attr("data-initialized")==="1"){$(this).removeAttr("data-initialized");$(this).removeAttr("style");var attrList={};if($(this).attr("data-handle-color")){attrList["data-handle-color"]=$(this).attr("data-handle-color");}
if($(this).attr("data-wrapper-class")){attrList["data-wrapper-class"]=$(this).attr("data-wrapper-class");}
if($(this).attr("data-rail-color")){attrList["data-rail-color"]=$(this).attr("data-rail-color");}
if($(this).attr("data-always-visible")){attrList["data-always-visible"]=$(this).attr("data-always-visible");}
if($(this).attr("data-rail-visible")){attrList["data-rail-visible"]=$(this).attr("data-rail-visible");}
$(this).slimScroll({wrapperClass:($(this).attr("data-wrapper-class")?$(this).attr("data-wrapper-class"):'slimScrollDiv'),destroy:true});var the=$(this);$.each(attrList,function(key,value){the.attr(key,value);});}});},scrollTop:function(){Metronic.scrollTo();},blockUI:function(options){options=$.extend(true,{},options);var html='';if(options.animate){html='<div class="loading-message '+(options.boxed?'loading-message-boxed':'')+'">'+'<div class="block-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>'+'</div>';}else if(options.iconOnly){html='<div class="loading-message '+(options.boxed?'loading-message-boxed':'')+'"><img src="'+this.getGlobalImgPath()+'loading-spinner-grey.gif" align=""></div>';}else if(options.textOnly){html='<div class="loading-message '+(options.boxed?'loading-message-boxed':'')+'"><span>&nbsp;&nbsp;'+(options.message?options.message:'LOADING...')+'</span></div>';}else{html='<div class="loading-message '+(options.boxed?'loading-message-boxed':'')+'"><img src="'+this.getGlobalImgPath()+'loading-spinner-grey.gif" align=""><span>&nbsp;&nbsp;'+(options.message?options.message:'LOADING...')+'</span></div>';}
if(options.target){var el=$(options.target);if(el.height()<=($(window).height())){options.cenrerY=true;}
el.block({message:html,baseZ:options.zIndex?options.zIndex:1000,centerY:options.cenrerY!==undefined?options.cenrerY:false,css:{top:'10%',border:'0',padding:'0',backgroundColor:'none'},overlayCSS:{backgroundColor:options.overlayColor?options.overlayColor:'#555',opacity:options.boxed?0.05:0.1,cursor:'wait'}});}else{$.blockUI({message:html,baseZ:options.zIndex?options.zIndex:1000,css:{border:'0',padding:'0',backgroundColor:'none'},overlayCSS:{backgroundColor:options.overlayColor?options.overlayColor:'#555',opacity:options.boxed?0.05:0.1,cursor:'wait'}});}},unblockUI:function(target){if(target){$(target).unblock({onUnblock:function(){$(target).css('position','');$(target).css('zoom','');}});}else{$.unblockUI();}},startPageLoading:function(options){if(options&&options.animate){$('.page-spinner-bar').remove();$('body').append('<div class="page-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');}else{$('.page-loading').remove();$('body').append('<div class="page-loading"><img src="'+this.getGlobalImgPath()+'loading-spinner-grey.gif"/>&nbsp;&nbsp;<span>'+(options&&options.message?options.message:'Loading...')+'</span></div>');}},stopPageLoading:function(){$('.page-loading, .page-spinner-bar').remove();},alert:function(options){options=$.extend(true,{container:"",place:"append",type:'success',message:"",close:true,reset:true,focus:true,closeInSeconds:0,icon:""},options);var id=Metronic.getUniqueID("Metronic_alert");var html='<div id="'+id+'" class="Metronic-alerts alert alert-'+options.type+' fade in">'+(options.close?'<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>':'')+(options.icon!==""?'<i class="fa-lg fa fa-'+options.icon+'"></i>  ':'')+options.message+'</div>';if(options.reset){$('.Metronic-alerts').remove();}
if(!options.container){if($('body').hasClass("page-container-bg-solid")){$('.page-title').after(html);}else{if($('.page-bar').size()>0){$('.page-bar').after(html);}else{$('.page-breadcrumb').after(html);}}}else{if(options.place=="append"){$(options.container).append(html);}else{$(options.container).prepend(html);}}
if(options.focus){Metronic.scrollTo($('#'+id));}
if(options.closeInSeconds>0){setTimeout(function(){$('#'+id).remove();},options.closeInSeconds*1000);}
return id;},initUniform:function(els){if(els){$(els).each(function(){if($(this).parents(".checker").size()===0){$(this).show();$(this).uniform();}});}else{handleUniform();}},updateUniform:function(els){$.uniform.update(els);},initFancybox:function(){handleFancybox();},getActualVal:function(el){el=$(el);if(el.val()===el.attr("placeholder")){return"";}
return el.val();},getURLParameter:function(paramName){var searchString=window.location.search.substring(1),i,val,params=searchString.split("&");for(i=0;i<params.length;i++){val=params[i].split("=");if(val[0]==paramName){return unescape(val[1]);}}
return null;},isTouchDevice:function(){try{document.createEvent("TouchEvent");return true;}catch(e){return false;}},getViewPort:function(){var e=window,a='inner';if(!('innerWidth'in window)){a='client';e=document.documentElement||document.body;}
return{width:e[a+'Width'],height:e[a+'Height']};},getUniqueID:function(prefix){return'prefix_'+Math.floor(Math.random()*(new Date()).getTime());},isIE8:function(){return isIE8;},isIE9:function(){return isIE9;},isRTL:function(){return isRTL;},isAngularJsApp:function(){return(typeof angular=='undefined')?false:true;},getAssetsPath:function(){return assetsPath;},setAssetsPath:function(path){assetsPath=path;},setGlobalImgPath:function(path){globalImgPath=path;},getGlobalImgPath:function(){return assetsPath+globalImgPath;},setGlobalPluginsPath:function(path){globalPluginsPath=path;},getGlobalPluginsPath:function(){return assetsPath+globalPluginsPath;},getGlobalCssPath:function(){return assetsPath+globalCssPath;},getBrandColor:function(name){if(brandColors[name]){return brandColors[name];}else{return'';}},getResponsiveBreakpoint:function(size){var sizes={'xs':480,'sm':768,'md':900,'lg':1200};return sizes[size]?sizes[size]:0;}};}();