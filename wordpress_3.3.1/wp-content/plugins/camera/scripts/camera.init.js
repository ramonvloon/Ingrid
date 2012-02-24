jQuery.noConflict();

jQuery(function(){
	if(jQuery('.camera_wrap').length){
		jQuery('.camera_wrap').each(function(){
			var t = jQuery(this);
			t.camera({
				alignment: t.attr('data-alignment'),
				autoAdvance: (t.attr('data-autoadvance') == 'true') ? true : false,
				mobileAutoAdvance: (t.attr('data-autoadvance') == 'true') ? true : false,
				barDirection: t.attr('data-bardirection'),
				barPosition: t.attr('data-barposition'),
				cols: parseFloat(t.attr('data-cols')),
				easing: t.attr('data-easing'),
				mobileEasing: t.attr('data-mobileeasing'),
				fx: t.attr('data-fx'),
				mobileFx: t.attr('data-mobilefx'),
				height: t.attr('data-height')+t.attr('data-heightsign'),
				imagePath: plugindir+'/css/images/',
				hover: (t.attr('data-hover') == 'true') ? true : false,
				loader: t.attr('data-loader'),
				loaderColor: t.attr('data-loadercolor'),
				loaderBgColor: t.attr('data-loaderbgcolor'), 
				loaderOpacity: t.attr('data-loaderopacity'),
				loaderPadding: parseFloat(t.attr('data-loaderpadding')),
				loaderStroke: parseFloat(t.attr('data-loaderstroke')),
				minHeight: t.attr('data-minheight'),
				navigation: (t.attr('data-navigation') == 'true') ? true : false,
				navigationHover: (t.attr('data-navOnHover') == 'true') ? true : false,
				mobileNavHover: (t.attr('data-navOnHover') == 'true') ? true : false,
				opacityOnGrid: (t.attr('data-opacityoneffect') == 'true') ? true : false,
				overlayer: (t.attr('data-pattern') == 'pattern_none') ? false : true,
				pagination: (t.attr('data-pagination') == 'true') ? true : false,
				pauseOnClick: (t.attr('data-click') == 'true') ? true : false,
				pieDiameter: parseFloat(t.attr('data-piediameter')),
				piePosition: t.attr('data-pieposition'),
				playPause: (t.attr('data-playpause') == 'true') ? true : false,
				portrait: (t.attr('data-portrait') == 'true') ? true : false,
				rows: parseFloat(t.attr('data-rows')),
				slicedCols: parseFloat(t.attr('data-slicedcols')),
				slicedRows: parseFloat(t.attr('data-slicedrows')),
				thumbnails: (t.attr('data-thumbs') == 'true') ? true : false,
				time: parseFloat(t.attr('data-time')),
				transPeriod: parseFloat(t.attr('data-transperiod'))
			});
			
			jQuery('.camera_overlayer',t).animate({opacity:t.attr('data-patternopacity')},0);
			
			if(jQuery.isFunction(jQuery.fn.colorbox)) {
				jQuery("a[data-box=true]",t).not('.noColorBox').each(function(){
					var par = t;
					var dataRel = jQuery(this).attr('data-box');
					jQuery(this).colorbox({maxWidth:"98%", maxHeight:"98%", scrolling:false, rel:dataRel, current:"{current} / {total}", onComplete: function(){ jQuery('#cboxLoadedContent').prepend('<div class="cboxPrevent" />'); t.cameraStop(); }, onClosed: function(){ jQuery('.cboxPrevent').remove(); t.cameraPlay(); } });
				});
			}

		});
	}
});

jQuery(document).bind("mobileinit", function(){
  jQuery.mobile.ajaxEnabled = false;
});
