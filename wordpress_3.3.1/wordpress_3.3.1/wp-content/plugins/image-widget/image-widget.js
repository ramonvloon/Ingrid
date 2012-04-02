(function($){

	window.set_active_widget = function(instance_id) {
		self.IW_instance = instance_id;
	}

	function image_widget_send_to_editor(h) {
		// ignore content returned from media uploader and use variables passed to window instead

		// store attachment id in hidden field
		$( '#widget-'+self.IW_instance+'-image' ).val( self.IW_img_id );

		// display attachment preview
		$( '#display-widget-'+self.IW_instance+'-image' ).html( self.IW_html );

		// change width & height fields in widget to match image
		$( '#widget-'+self.IW_instance+'-width' ).val($( '#display-widget-'+self.IW_instance+'-image img').attr('width'));
		$( '#widget-'+self.IW_instance+'-height' ).val($( '#display-widget-'+self.IW_instance+'-image img').attr('height'));

		// set alignment in widget
		$( '#widget-'+self.IW_instance+'-align' ).val(self.IW_align);

		// set title in widget
		$( '#widget-'+self.IW_instance+'-title' ).val(self.IW_title);

		// set caption in widget
		$( '#widget-'+self.IW_instance+'-description' ).val(self.IW_caption);

		// set alt text in widget
		$( '#widget-'+self.IW_instance+'-alt' ).val(self.IW_alt);

		// set link in widget
		$( '#widget-'+self.IW_instance+'-link' ).val(self.IW_url);

		// close thickbox
		tb_remove();

		// change button text
		$('#add_image-widget-'+self.IW_instance+'-image').html($('#add_image-widget-'+self.IW_instance+'-image').html().replace(/Add Image/g, 'Change Image'));
	}

	function changeImgWidth(instance) {
		var width = $( '#widget-'+instance+'-width' ).val();
		var height = Math.round(width / imgRatio(instance));
		changeImgSize(instance,width,height);
	}

	function changeImgHeight(instance) {
		var height = $( '#widget-'+instance+'-height' ).val();
		var width = Math.round(height * imgRatio(instance));
		changeImgSize(instance,width,height);
	}

	function imgRatio(instance) {
		var width_old = $( '#display-widget-'+instance+'-image img').attr('width');
		var height_old = $( '#display-widget-'+instance+'-image img').attr('height');
		var ratio =  width_old / height_old;
		return ratio;
	}

	function changeImgSize(instance,width,height) {
		if (isNaN(width) || width < 1) {
			$( '#widget-'+instance+'-width' ).val('');
			width = 'none';
		} else {
			$( '#widget-'+instance+'-width' ).val(width);
			width = width + 'px';
		}
		$( '#display-widget-'+instance+'-image img' ).css({
			'width':width
		});

		if (isNaN(height) || height < 1) {
			$( '#widget-'+instance+'-height' ).val('');
			height = 'none';
		} else {
			$( '#widget-'+instance+'-height' ).val(height);
			height = height + 'px';
		}
		$( '#display-widget-'+instance+'-image img' ).css({
			'height':height
		});
	}

	function changeImgAlign(instance) {
		var align = $( '#widget-'+instance+'-align' ).val();
		$( '#display-widget-'+instance+'-image img' ).attr(
			'class', (align == 'none' ? '' : 'align'+align)
		);
	}
	
	function imgHandler(event) {
		event.preventDefault();
		window.send_to_editor = image_widget_send_to_editor;
		tb_show("Add an Image", event.target.href, false);
	}

	$(document).ready(function() {
		// Use new style event handling since $.fn.live() will be deprecated
		if ( typeof $.fn.on !== 'undefined' ) {
			$("#wpbody").on("click", ".thickbox-image-widget", imgHandler);
		}
		else {
			$("a.thickbox-image-widget").live('click', imgHandler);
		}
		
		// Modify thickbox link to fit window. Adapted from wp-admin\js\media-upload.dev.js.
		$('a.thickbox-image-widget').each( function() {
			var href = $(this).attr('href'), width = $(window).width(), H = $(window).height(), W = ( 720 < width ) ? 720 : width;
			if ( ! href ) return;
			href = href.replace(/&width=[0-9]+/g, '');
			href = href.replace(/&height=[0-9]+/g, '');
			$(this).attr( 'href', href + '&width=' + ( W - 80 ) + '&height=' + ( H - 85 ) );
		});
	});

})(jQuery);

/* Fix browser upload */

jQuery(document).ready(function() {

  jQuery('form#image-form').submit(function(){
    var wp_ref = jQuery("input[name='_wp_http_referer']").val();
    // _wp_http_referer only contains the widget_sp_image if the 
    // previous action was pressing the add image link in an Image Widget 
    // https://developer.mozilla.org/en/Core_JavaScript_1.5_Reference/Objects/String/indexOf
    if( wp_ref.indexOf('widget_sp_image') != -1 ) {
      var parsed_url = parse_url(wp_ref);
      var nw_action_url = jQuery('form#image-form').attr('action');
      
      // make sure the widget_sp_image is not part of the form action url
      // so we will add it to fix the context
      if( nw_action_url.indexOf('widget_sp_image') == -1 ) {
        nw_action_url = nw_action_url + '&' + parsed_url.query;
        jQuery('form#image-form').attr('action', nw_action_url);
      }
    }
    return true;
  }); 
});


/* 
 * Thanks to http://github.com/kvz/phpjs/raw/master/functions/url/parse_url.js
 */
function parse_url (str, component) {
    // http://kevin.vanzonneveld.net
    // +      original by: Steven Levithan (http://blog.stevenlevithan.com)
    // + reimplemented by: Brett Zamir (http://brett-zamir.me)
    // + input by: Lorenzo Pisani
    // + input by: Tony
    // + improved by: Brett Zamir (http://brett-zamir.me)
    // %          note: Based on http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
    // %          note: blog post at http://blog.stevenlevithan.com/archives/parseuri
    // %          note: demo at http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
    // %          note: Does not replace invalid characters with '_' as in PHP, nor does it return false with
    // %          note: a seriously malformed URL.
    // %          note: Besides function name, is essentially the same as parseUri as well as our allowing
    // %          note: an extra slash after the scheme/protocol (to allow file:/// as in PHP)
    // *     example 1: parse_url('http://username:password@hostname/path?arg=value#anchor');
    // *     returns 1: {scheme: 'http', host: 'hostname', user: 'username', pass: 'password', path: '/path', query: 'arg=value', fragment: 'anchor'}
    var key = ['source', 'scheme', 'authority', 'userInfo', 'user', 'pass', 'host', 'port', 
                        'relative', 'path', 'directory', 'file', 'query', 'fragment'],
        ini = (this.php_js && this.php_js.ini) || {},
        mode = (ini['phpjs.parse_url.mode'] && 
            ini['phpjs.parse_url.mode'].local_value) || 'php',
        parser = {
            php: /^(?:([^:\/?#]+):)?(?:\/\/()(?:(?:()(?:([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?()(?:(()(?:(?:[^?#\/]*\/)*)()(?:[^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
            strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
            loose: /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/\/?)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/ // Added one optional slash to post-scheme to catch file:/// (should restrict this)
        };

    var m = parser[mode].exec(str),
        uri = {},
        i = 14;
    while (i--) {
        if (m[i]) {
          uri[key[i]] = m[i];  
        }
    }

    if (component) {
        return uri[component.replace('PHP_URL_', '').toLowerCase()];
    }
    if (mode !== 'php') {
        var name = (ini['phpjs.parse_url.queryKey'] && 
                ini['phpjs.parse_url.queryKey'].local_value) || 'queryKey';
        parser = /(?:^|&)([^&=]*)=?([^&]*)/g;
        uri[name] = {};
        uri[key[12]].replace(parser, function ($0, $1, $2) {
            if ($1) {uri[name][$1] = $2;}
        });
    }
    delete uri.source;
    return uri;
}
/* /wp-admin/media-upload.php?type=image&widget_id=widget_sp_image-11& */