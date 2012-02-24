jQuery.noConflict();

/***************************************
*
*	Smoothscroll
*
***************************************/
jQuery(function(){
    jQuery('a[href*=#]').live('click',function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname) {
            var target = jQuery(this.hash);
            target = target.length && target
            || jQuery('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                var targetOffset = target.offset().top;
                jQuery('body')
                .animate({scrollTop: targetOffset}, 500);
                jQuery('html')
                .animate({scrollTop: targetOffset}, 500);
                return false;
            }
        }
    });
});

/***************************************
*
*	Fading icon menu
*
***************************************/
jQuery(function(){
	jQuery('#camera_admin_mainnav a').hover(function(){
		jQuery('span span',this).stop(true,false).fadeTo(200,1);
	},function(){
		if(!jQuery(this).hasClass('current')){
			jQuery('span span',this).stop(true,false).fadeTo(200,0);
		}
	});
});

/***************************************
*
*	qTip
*
***************************************/
jQuery(function(){
	jQuery('#camera_admin_mainnav_inner a').each(function(){
		var t = jQuery(this),
			cont = t.attr('data-tip');
		t.qtip({
			content: cont,
			style: {
				classes: 'ui-tooltip-dark ui-tooltip-rounded'
			},
			position: {
			my: 'bottom center',
			at: 'top center',
			target: t,
			adjust: {
				x: -7,
				y: 15
			}
   		   }
		});
	});
});

jQuery(function(){
	jQuery('.camera_qtip').live('mouseover',function(event){
		var t = jQuery(this),
			cont = t.attr('data-tip');
		t.qtip({
			overwrite: false,
			content: cont,
			show: {
			  event: event.type, // Use the same show event as the one that triggered the event handler
			  ready: true // Show the tooltip as soon as it's bound, vital so it shows up the first time you hover!
		   },
			style: {
				classes: 'ui-tooltip-dark ui-tooltip-rounded'
			},
			position: {
			my: 'bottom center',
			at: 'top center',
			target: t
   		   }
		}, event);
	});
});

/***************************************
*
*	AJAX wpdb
*
***************************************/
jQuery(function() {
	jQuery('#camera_tab_content form').live('submit',function() {
		var data = jQuery(this).serialize(),
			t = jQuery(this);
		var stopSubmit = false;
		jQuery('input.required',t).each(function(){
			if(jQuery(this).val()==''){
				stopSubmit = true;
			}
		});
		
		if(stopSubmit==false){
			show_loading(t);
			if(pixtest != 'pix_test'){
				var updateurl = ajaxurl;
			} else {
				var updateurl = plugindir+'lib/camera_session.php';
			}
			jQuery.post(updateurl, data)
			.success(function() { show_success(t); })
			.error(function() { show_error(t); });
		} else {
			jQuery('#camera_dialog_inputempty').dialog({
				height: 80,
				width: 250,
				modal: true,
				dialogClass: 'wp-dialog',
				zIndex: 50
			});
		}
		
		return false;
	});
	
	jQuery('#camera_tab_content .camera_delete_icon').live('click',function() {
		if(pixtest != 'pix_test'){
			var t = jQuery(this);
			jQuery('#camera_dialog_deleteslideshow').dialog({
				height: 150,
				width: 250,
				modal: true,
				dialogClass: 'wp-dialog',
				zIndex: 50,
				buttons: {
					"Delete": function() {
						jQuery( this ).dialog( "close" );
						var div = t.parents('.camera_row');
						var f = t.parents('form');
						div.remove();
						jQuery('.camera_row').removeClass('even');
						jQuery('.camera_row:even').addClass('even');
						jQuery('.camera_row').each(function(){
							var index = jQuery(this).index();
							jQuery('.counter',this).text((index+1)+'.');
						});
						var l = jQuery('.camera_row').length;
						if(l<2){
							jQuery('.camera_delete_icon').addClass('camera_delete_fake').removeClass('camera_delete_icon').removeClass('camera_qtip').attr('data-tip','');
						}
						f.submit();
					},
					Cancel: function() {
						jQuery( this ).dialog( "close" );
					}
				}
			});
		} else {
			jQuery('#camera_dialog_cant').dialog({
				height: 100,
				width: 250,
				modal: true,
				dialogClass: 'wp-dialog',
				zIndex: 50
			});
		}
		return false;
	});

	jQuery('.camera_disable_pixtest').live('click',function() {
		if(pixtest == 'pix_test'){
			jQuery('#camera_dialog_cant').dialog({
				height: 100,
				width: 250,
				modal: true,
				dialogClass: 'wp-dialog',
				zIndex: 50
			});
			return false;
		}
	});


	jQuery('.submit_fake').die('click');
	jQuery('.submit_fake').live('click',function(){
		jQuery(this).parents('form').submit();
		return false;
	});

	jQuery('.submitting_button').die('click');
	jQuery('.submitting_button').live('click',function(){
		//jQuery(this).parents('#camera_tab_content').find('form').submit();
		jQuery(this).parents('#camera_tab_content').find('form input[type=submit]').click();
		return false;
	});
});

function show_loading(t) {
	t.parents('#camera_tab_content').fadeTo(150,.2);
	jQuery('#camera_tab_loading').fadeIn(100);
}

function show_success(t) {
	jQuery('#camera_tab_loading').fadeOut(100);
	jQuery('#camera_tab_success').fadeIn(150);
	function hide_success(t) {
		jQuery('#camera_tab_success').fadeOut(150,function(){
		if(jQuery(t).hasClass('camera_refresh')){
			jQuery('#camera_admin_mainnav_inner a.current').click();
		} else {
			t.parents('#camera_tab_content').fadeTo(150,1);
		}
		});
	}
	var s = setTimeout(function() { hide_success(t);},1000);
}

function show_error(t) {
	jQuery('#camera_tab_loading').fadeOut(100);
	jQuery('#camera_tab_error').fadeIn(150);
	function hide_error(t) {
		jQuery('#camera_tab_error').fadeOut(150,function(){
			t.parents('#camera_tab_content').fadeTo(150,1);
		});
	}
	var s = setTimeout(function() { hide_error(t);},1000);
}

/***************************************
*
*	Simple tabs
*
***************************************/
function simple_tabs(){
	var active_parent = jQuery('#camera_admin_mainnav_inner a.current').parent().index();
	var active_tab = localStorage.getItem("active_tab_"+active_parent);
	var l = jQuery('.camera_inner_tabs a').length;
	if(typeof active_tab == 'undefined' || active_tab == false || active_tab == null || active_tab >= l) {
		active_tab = 0;
	}

	if(!jQuery('.camera_inner_tabs').hasClass('dyna_tabs')){
		var tab = jQuery('.camera_inner_tabs a').eq(active_tab).addClass('current').attr('href');
		jQuery(tab).show();
	}

 	if(jQuery('.camera_inner_tabs a').eq(active_tab).hasClass('twitter_alert')){
		jQuery('a.twitter_alert').removeClass('twitter_alert');
	}

	
	
	if(jQuery('.camera_inner_tabs a').eq(active_tab).attr('id')=='camera_tweet_submit'){
		var data = jQuery('form#camera_tweet_form').serialize();
		if(pixtest != 'pix_test'){
			var updateurl = ajaxurl;
		} else {
			var updateurl = plugindir+'lib/camera_session.php';
		}
		jQuery.post(updateurl, data)
	}
	

	jQuery('.camera_inner_tabs.static_tabs a').live('click',function(){
		var t = jQuery(this),
			c = jQuery('.camera_inner_tabs.static_tabs a.current');
		tab = t.attr('href');
		if (Modernizr.localstorage) {
			var ind = t.index();
			localStorage.setItem("active_tab_"+active_parent, ind)
		}
		if(t.hasClass('twitter_alert')){
			jQuery('a.twitter_alert').removeClass('twitter_alert');
		}
		
		if(t.attr('id')=='camera_tweet_submit'){
			var data = jQuery('form#camera_tweet_form').serialize();
			jQuery.post(ajaxurl, data);
		}
	
		jQuery('#camera_tab_content > div:visible').fadeOut(200,function(){
			jQuery(tab).fadeIn(200);
			c.removeClass('current');
			t.addClass('current');
			camera_sort();
			toggle_panels();
		});
		return false;
	});
	

	if(jQuery('.camera_inner_tabs').hasClass('dyna_tabs') && !jQuery('.camera_inner_tabs.dyna_tabs a.current').length){
		var t = jQuery('.camera_inner_tabs.dyna_tabs a').eq(active_tab),
			c = jQuery('.camera_inner_tabs.dyna_tabs a.current');
		page = t.attr('href');
		if (Modernizr.localstorage) {
			var ind = t.index();
			localStorage.setItem("active_tab_"+active_parent, ind)
		}
		
		jQuery('#camera_tab_target').fadeTo(400,0);
	
		jQuery('#camera_tab_target > div:visible').fadeTo(200,.2);
		jQuery('#camera_tab_loading').fadeIn(100);
		jQuery.ajax({
			url: page,
			success: function(loadeddata){
				c.removeClass('current');
				t.addClass('current');
				var html = jQuery("<div/>").append(loadeddata.replace(/<script(.|\s)*?\/script>/g, "")).find('#camera_dynamic_tab').html();
				jQuery('#camera_tab_loading').fadeOut(100,function(){
					jQuery('#camera_tab_target').html(html);
					camera_sort();
					camera_fakeready();
					camera_farbtastic();
					toggle_panels();
					t.addClass('current');
					jQuery('#camera_tab_target').fadeTo(400,1);
				});
				if (Modernizr.localstorage) {
					var ind = t.index();
					localStorage.setItem("active_tab_"+active_parent, ind)
				}
			},
			error: function(){
				active_tab = 0;
			},
		});
	}

	jQuery('.camera_inner_tabs.dyna_tabs a').live('click',function(){
		var t = jQuery(this),
			c = jQuery('.camera_inner_tabs.dyna_tabs a.current');
		page = t.attr('href');
		if (Modernizr.localstorage) {
			var ind = t.index();
			localStorage.setItem("active_tab_"+active_parent, ind)
		}
		
		jQuery('#camera_tab_target').fadeTo(400,0,function(){
			jQuery('#camera_tab_target *').remove();
		});
	
		jQuery('#camera_tab_target > div:visible').fadeTo(200,.2);
		jQuery('#camera_tab_loading').fadeIn(100);
		jQuery.ajax({
			url: page,
			success: function(loadeddata){
				c.removeClass('current');
				t.addClass('current');
				var html = jQuery("<div/>").append(loadeddata.replace(/<script(.|\s)*?\/script>/g, "")).find('#camera_dynamic_tab').html();
				jQuery('#camera_tab_loading').fadeOut(100,function(){
					jQuery('#camera_tab_target').html(html);
					camera_sort();
					camera_fakeready();
					camera_farbtastic();
					toggle_panels();
					t.addClass('current');
					jQuery('#camera_tab_target').fadeTo(400,1);
				});
				if (Modernizr.localstorage) {
					var ind = t.index();
					localStorage.setItem("active_tab_"+active_parent, ind)
				}
			},
			error: function(){
				active_tab = 0;
			},
		});
		return false;
	});
}

/***************************************
*
*	AJAX tabs
*
***************************************/
jQuery(function(){
	var active_tab = localStorage.getItem("active_tab");
	var l = jQuery('#camera_admin_mainnav_inner a').not('.not_tabbed').length;
	if(typeof active_tab == 'undefined' || active_tab == false || active_tab == null || active_tab<0 || active_tab>=l) {
		active_tab = 0;
	}
	jQuery('#camera_admin_mainnav_inner a, .camera_edit_icon').live('click',function(){
		var t = jQuery(this);
		var page = t.attr('href');
		if(t.hasClass('camera_edit_icon')){
			var active_parent = 3;
			var ind = t.parents('.camera_row').index();
			localStorage.setItem("active_tab_"+active_parent, ind)
		}
		if (t.hasClass('not_tabbed')){
			return true;
		} else {
			jQuery('#camera_tab_content, #camera_admin_tabnav div').fadeTo(200,.2);
			jQuery('#camera_tab_loading').fadeIn(100);
			jQuery.ajax({
				url: page,
				success: function(loadeddata){
					jQuery('#camera_admin_mainnav_inner a').removeClass('current');
					if(t.hasClass('camera_edit_icon')){
						var th = jQuery('#camera_manage_slideshows_tab');
					} else {
						var th = t;
					}
					th.addClass('current');
					jQuery('#camera_admin_mainnav_inner a').not('.current').find('span span').fadeTo(200,.2);
					jQuery('span span',th).fadeTo(200,1);
					var html = jQuery("<div/>").append(loadeddata.replace(/<script(.|\s)*?\/script>/g, "")).find('#camera_tab_source').html();
					var html2 = jQuery("<div/>").append(loadeddata.replace(/<script(.|\s)*?\/script>/g, "")).find('.inner_tabs_parent').html();
					jQuery('#camera_tab_loading').fadeOut(100,function(){
						jQuery('#camera_tab_content').html(html);
						jQuery('#camera_admin_tabnav div').html(html2);
						jQuery('#camera_tab_content').fadeTo(400,1);
						jQuery('#camera_admin_tabnav > div').fadeTo(400,1,function(){
							simple_tabs();
							camera_sort();
							camera_fakeready();
							camera_farbtastic();
							toggle_panels();
							if(jQuery('#custom_style_textarea').length){
								var editor = CodeMirror.fromTextArea(document.getElementById("custom_style_textarea"), {theme:'default'});
							}
						});
					});
					if (Modernizr.localstorage) {
						if(t.hasClass('camera_edit_icon')){
							var ind = 3;
						} else {
							var ind = th.parent().index();
						}
						localStorage.setItem("active_tab", ind)
					}
				},
				error: function(){
					active_tab = 0;
					jQuery('#camera_admin_mainnav_inner a').eq(active_tab).click();
				},
			});
			return false;
		}
	});
	
	jQuery('#camera_admin_mainnav_inner a').eq(active_tab).click();
	
});

/***************************************
*
*	Add/remove slides
*
***************************************/
jQuery(function(){
	jQuery('.camera_add_slide').live('click',function(){
		if(pixtest != 'pix_test'){
			var t = jQuery(this),
				p = t.next('.camera_slide_sortable_wrap'),
				form = t.parents('.camera_slides_wrap'),
				cloned = jQuery('.camera_slide_clone', form).clone(),
				l = jQuery('.camera_slide_sortable',p).length;
			cloned.removeClass('camera_slide_clone');
			jQuery('.slide_no',cloned).text(l+1);
			jQuery(p).append(cloned);
			cloned.fadeIn(200);
			camera_sort_update();
			toggle_panels();
			camera_farbtastic();
			return false;
		}
	});
});

jQuery(function(){
	jQuery('.camera_remove_slide').live('click',function(){
		if(pixtest != 'pix_test'){
			var t = jQuery(this);
			t.parents('.camera_slide_sortable').fadeOut(200,function(){
				jQuery(this).remove();
				camera_sort_update();
			});
			return false;
		}
	});
});

function camera_sort(){
	jQuery( ".camera_slide_sortable_wrap" ).each(function(){ 
		jQuery( this ).sortable({ 
			opacity: 0.6,
			items: 'div.camera_slide_sortable',
			placeholder: "camera-state-highlight",
			handle: '.handle',
			revert: 150,
			tolerance: 'pointer',
			sort: function(event, ui) { 
				var w = jQuery( ".camera_slide_sortable:first",this ).width();
				var h = jQuery( ".camera_slide_sortable:first", this ).height();
				jQuery( ".camera-state-highlight" ).css({'width':w+'px','height':h+'px'});
			},
			update: function(event, ui) {
				camera_sort_update();
			}
		});
	});
	
	jQuery('.handle').live('mousedown',function(){
		var t = jQuery('.camera_slide_sortable .toggle_button.open'),
			n = t.next('.toggle_div');
		n.slideUp(0,function(){
			t.removeClass('open');
		});
		t.find('.toggle_icon_open').fadeOut(0);
		t.find('.toggle_icon_closed').fadeIn(0);
	});
}

function camera_sort_update(){
	jQuery( ".camera_slide_sortable *[name]" ).each(function(){
		var name = jQuery(this).attr('name');
		var p = jQuery(this).parents('.camera_slide_sortable');
		var i = p.index();
		name = name.replace(/camera_slide_no_(.*?)\]/g,'camera_slide_no_'+i+']');
		jQuery(this).attr('name',name);
		jQuery('.slide_no',p).text(i+1);
	});	
}

function camera_fakeready(){
/***************************************
*
*	Switches
*
***************************************/
	jQuery('input[type=checkbox]').each(function(){
		var t = jQuery(this),
			hOk,
			hKo;
		if(t.is(':checked')){
			hOk = 'block';
			hKo = 'none';
			marg = '27px';
		} else {
			hOk = 'none';
			hKo = 'block';
			marg = '0';
		}
		t.after(
			'<div class="switch_bg">'+
            	'<div class="switch_switcher" style="margin-left:'+marg+'">'+
                	'<div class="switch_ok" style="display:'+hOk+'">'+
                    '</div>'+
                	'<div class="switch_ko" style="display:'+hKo+'">'+
                    '</div>'+
                '</div>'+
            '</div>'
		).hide();
	});
	
	jQuery('.switch_ok').live('click',function(){
		var t = jQuery(this),
			p = t.parents('.switch_switcher');
			pp = t.parents('.switch_bg');
		p.animate({'margin-left':'0'},150);
		t.fadeOut(150);
		t.next('.switch_ko').fadeIn(150);
		pp.prev('input[type=checkbox]').removeAttr('checked');
	});
	
	jQuery('.switch_ko').live('click',function(){
		var t = jQuery(this),
			p = t.parents('.switch_switcher');
			pp = t.parents('.switch_bg');
		if(pp.prev('input[type=checkbox]').attr('name')=='camera_delete_table'){
			jQuery('#camera_dialog_deletetable').dialog({
				height: 230,
				width: 250,
				modal: true,
				dialogClass: 'wp-dialog',
				zIndex: 50,
				buttons: {
					"Delete": function() {
						jQuery( this ).dialog( "close" );
						p.animate({'margin-left':'27px'},150);
						t.fadeOut(150);
						t.prev('.switch_ok').fadeIn(150);
						pp.prev('input[type=checkbox]').attr('checked', 'checked');
					},
					Cancel: function() {
						jQuery( this ).dialog( "close" );
					}
				}
			});
		} else {
			p.animate({'margin-left':'27px'},150);
			t.fadeOut(150);
			t.prev('.switch_ok').fadeIn(150);
			pp.prev('input[type=checkbox]').attr('checked', 'checked');
		}
	});

/***************************************
*
*	Alignment grid
*
***************************************/
	jQuery('select.select_alignment').each(function(){
		var t = jQuery(this),
			v = jQuery('option:selected',t).val();
		t.after(
			'<div class="select_alignment_grid">'+
				'<div class="select_option" data-val="topLeft"></div>'+
				'<div class="select_option" data-val="topCenter"></div>'+
				'<div class="select_option" data-val="topRight"></div>'+
				'<div class="select_option" data-val="centerLeft"></div>'+
				'<div class="select_option" data-val="center"></div>'+
				'<div class="select_option" data-val="centerRight"></div>'+
				'<div class="select_option" data-val="bottomLeft"></div>'+
				'<div class="select_option" data-val="bottomCenter"></div>'+
				'<div class="select_option" data-val="bottomRight"></div>'+
            '</div>'
		).hide();
		var n = t.next('.select_alignment_grid');
		jQuery('.select_option[data-val="'+v+'"]',n).addClass('selected');
	});
	
	jQuery('.select_option').live('click',function(){
		var t = jQuery(this),
			v = t.attr('data-val'),
			p = t.parents('.select_alignment_grid');
		p.prev('select').find('option').removeAttr('selected');	
		p.prev('select').find('option[value='+v+']').attr('selected','selected');	
		jQuery('.select_option',p).removeClass('selected');	
		t.addClass('selected');	
	});

/***************************************
*
*	UI sliders
*
***************************************/
	jQuery('.camera_ui_slider').each(function(){
		var t = jQuery(this);
		var value = jQuery('input',t).val();
		t.prev().find('.preview_pattern').not('.pattern_none').animate({opacity:value},0);
		if(t.hasClass('milliseconds')){
			var mi = 0;
			var m = 20000;
			var s = 100;
		} else if(t.hasClass('opacity')){
			var mi = 0;
			var m = 1;
			var s = 0.05;
		} else if(t.hasClass('border')){
			var mi = 0;
			var m = 50;
			var s = 1;
		} else if(t.hasClass('size')){
			var mi = 0;
			var m = 2000;
			var s = 1;
		} else if(t.hasClass('difference')){
			var mi = 0;
			var m = 1000;
			var s = 1;
		} else {
			var mi = 0;
			var m = 200;
			var s = 1;
		}
		jQuery('.camera_slider_cursor',t).slider({
			range: 'min',
			value: value,
			min: mi,
			max: m,
			step: s,
			slide: function( event, ui ) {
				jQuery('input',t).val( ui.value );
				if(jQuery(t).hasClass('forPattern')){
					t.prev().find('.preview_pattern').not('.pattern_none').animate({opacity:ui.value},0);
				}
			}
		});
		jQuery('input',t).keyup(function(){
			var v = jQuery('input',t).val();
			jQuery('.camera_slider_cursor',t).slider({
				value: v,
				min: 0,
				max: m,
				step: s,
				slide: function( event, ui ) {
					jQuery('input',t).val( ui.value );
					// Pattern opacity preview
					if(jQuery(t).hasClass('forPattern')){
						t.prev().find('.preview_pattern').not('.pattern_none').animate({opacity:ui.value},0);
					}
				}
			});
		})
	});

/***************************************
*
*	Toggle panels
*
***************************************/
	jQuery('.toggle_button').die('click');
	jQuery('.toggle_button').live('click',function(){
		var t = jQuery(this),
			n = t.next('.toggle_div');
		if(t.hasClass('open')){
			n.slideUp(200,function(){
				t.removeClass('open');
			});
			t.find('.toggle_icon_open').fadeOut(200);
			t.find('.toggle_icon_closed').fadeIn(200);
		} else {
			jQuery('.camera_slide_sortable .toggle_button.open').click();
			n.slideDown(200);
			t.find('.toggle_icon_open').fadeIn(200);
			t.find('.toggle_icon_closed').fadeOut(200);
			t.addClass('open');
		}
		return false;
	});

/***************************************
*
*	Floating div
*
***************************************/

	jQuery(window).scroll(function(){
		if(jQuery('.camera_floating').length){
			var off = jQuery('#camera_tab_content').offset(),
				offW = jQuery('#camera_tab_content').outerWidth(),
				w = jQuery(window).width(),
				right = w-(off.left+offW),
				pF = jQuery('.camera_floating:visible'),
				pfBg = pF.prev('.camera_floating_bg'),
				pFake = pfBg.prev('.camera_floating_fake'),
				pW = pF.outerWidth(),
				pH = pF.outerHeight(),
				adminBar,
				sumScroll = jQuery('html').scrollTop()+jQuery('body').scrollTop();
			if(jQuery('body').hasClass('admin-bar')){
				adminBar = 28;
			} else {
				adminBar = 0;
			}
			pFake.height(pH).width(pW);
			if ((sumScroll+adminBar) < (off.top)){
				pF.css({'position':'relative','top':0,'left':0});
				pfBg.hide();
				pFake.hide();
			} else {
				if(pF.css('position')=='relative'){
					pF.css({'display':'none'}).fadeIn(200);
					pfBg.css({'height':pH+40,'left':off.left,'right':right});
					pfBg.fadeIn(200);
					pFake.show();
				}
				pF.css({'position':'fixed','left':off.left+20,'top':(20+adminBar),'z-index':10});
				pfBg.css({top:adminBar});
			}
		}
	});
	
/***************************************
*
*	Floating documentation menu
*
***************************************/

	if(jQuery('.documentation_floating_wrap').length) {
		var t = jQuery('.documentation_floating_wrap'),
			offT = t.offset().top,
			offL = t.offset().left,
			tW = t.width(),
			alLeftH = t.parents('.camera_documentation_panel').find('.alignleft').outerHeight(),
			alLeftBottom = (t.parents('.camera_documentation_panel').find('.alignleft').offset().top + alLeftH);
		jQuery(window).scroll(function(){
			var sumScroll = jQuery('html').scrollTop()+jQuery('body').scrollTop();
			jQuery('.documentation_back_top').css({'left':offL,'width':tW});
			if (sumScroll < (offT-20)){
				if(jQuery('.documentation_back_top').is(':visible')){
					jQuery('.documentation_back_top').fadeOut();
				}
			} else {
				if(!jQuery('.documentation_back_top').is(':visible')){
					jQuery('.documentation_back_top').fadeIn();
				}
			}
			if((sumScroll+jQuery(window).height()) > (alLeftBottom+20)){
				jQuery('.documentation_back_top').css({'bottom':0,'position':'absolute','left':'auto','right':0,'width':tW});
			} else  {
				jQuery('.documentation_back_top').css({'bottom':'40px','position':'fixed','left':offL,'right':'auto','width':tW});
			}
		});
	}
	
/***************************************
*
*	Tweets row
*
***************************************/

	jQuery('.camera_row.tweets').hover(function(){
		jQuery(this).addClass('hover');
	},function(){
		jQuery(this).removeClass('hover');
	});
	
	jQuery('.camera_row.tweets').click(function(event){
		var a = jQuery('small',this);
		a.trigger('click');
	});

}

function toggle_panels(){
	jQuery('.toggle_button').each(function(){
		var t = jQuery(this),
			n = t.next('.toggle_div');
		if(t.hasClass('open')){
			t.find('.toggle_icon_open').show();
			t.find('.toggle_icon_closed').hide();
			n.slideDown(0);
		} else {
			t.find('.toggle_icon_open').hide();
			t.find('.toggle_icon_closed').show();
			n.slideUp(0);
		}
	});
}


	
/******************************************************
*
*	Farbtastic
*
******************************************************/
function camera_farbtastic(){
	if(jQuery.isFunction(jQuery.fn.farbtastic)) {
		jQuery('.camera_color').each(function() {
			var t = jQuery(this);
			jQuery('.colorpicker',t).after('<div class="picker_close">x</div>');
			jQuery('img',t).die('click');
			jQuery('img',t).live('click',function(){
				jQuery('.colorpicker, .picker_close, .camera_color_arrow').fadeOut(0);
				jQuery('.colorpicker, .picker_close, .camera_color_arrow',t).fadeIn(300);
				return false;
			});
			jQuery('.picker_close',t).die('click');
			jQuery('.picker_close', t).live('click',function(){
				jQuery('.colorpicker, .picker_close, .camera_color_arrow').fadeOut(300);
				return false;
			});
			jQuery('body',t).die('click');
			jQuery('body').live('click',function(){
				jQuery('.colorpicker, .picker_close, .camera_color_arrow').fadeOut(300);
			});
			var divPicker = jQuery(this).find('.colorpicker');
			var inputPicker = jQuery(this).find('input[type=text]');
			divPicker.farbtastic(inputPicker);
		});
	}
}
/******************************************************
*
*	Upload buttons
*
******************************************************/
jQuery(function(){
 	jQuery('.camera_upload_image').live('click',function() {
		var upDiv = jQuery(this).parent('div');
		var upField = upDiv.find('input[type="text"]');
		var upThumb = upDiv.find('.camera_imagethumb img');
		window.formfield_image = '';
		
		window.formfield_image = upField;
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		
		window.image_send_to_editor = window.send_to_editor;
		window.send_to_editor = function(html, f) {
			if (window.formfield_image != '') {
				imgurl = jQuery('img',html).attr('src');
				window.formfield_image.val(imgurl).keyup();
                var imgurlNoF = imgurl.substring(0,imgurl.lastIndexOf('.'));
                var onlyFormat = imgurl.substr(imgurl.lastIndexOf('.'));
				window.formfield_image = '';
				tb_remove();
				jQuery.ajax({
					url:imgurlNoF+'-150x150'+onlyFormat,
					type:'HEAD',
					error:
						function(){
							var imgurlNoF2 = imgurlNoF.substring(0,imgurlNoF.lastIndexOf('-'));
							var preview = imgurlNoF2+'-150x150'+onlyFormat;
							upThumb.attr('src',preview).show();
						},
					success:
						function(){
							var preview = imgurlNoF+'-150x150'+onlyFormat;
							upThumb.attr('src',preview).show();
						}
				});
			}
			else {
				window.image_send_to_editor(html);
			}
		}
		return false;
	});

 	jQuery('.camera_upload_video').live('click',function() {
		var upDiv = jQuery(this).parent('div');
		var upField = upDiv.find('input[type="text"]');
		window.formfield_video = '';
		
		window.formfield_video = upField;
		tb_show('', 'media-upload.php?post_id=0&amp;type=video&amp;TB_iframe=true');
		
		window.video_send_to_editor = window.send_to_editor;
		window.send_to_editor = function(html) {
			if (window.formfield_video != '') {
				imgurl = jQuery(html).attr('href');
				window.formfield_video.val(imgurl);
				window.formfield_video = '';
				tb_remove();
			}
			else {
				window.video_send_to_editor(html);
			}
		}
		return false;
	});

});
