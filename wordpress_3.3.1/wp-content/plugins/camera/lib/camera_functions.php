<?php
if(!session_id()) session_start();

function camera_add_option($name, $value) {
	global $wpdb;
	$wpdb->camera = $wpdb->prefix . 'camera';
	$value = maybe_serialize( $value );
	$wpdb->insert( $wpdb->camera, array('name'=>$name,'value'=>$value) );
}

function camera_get_option($name) {
	global $wpdb;
	$wpdb->camera = $wpdb->prefix . 'camera';
	$row = $wpdb->get_row("SELECT * FROM $wpdb->camera WHERE name = '$name'", ARRAY_A);
       
	require (ABSPATH . WPINC . '/pluggable.php');
	global $current_user, $display_name;
	get_currentuserinfo();
		
	if($row['name']=='') {
		return false;
	} else {
		$results = $wpdb->get_results("SELECT value FROM $wpdb->camera WHERE name = '$name'");
		foreach ( $results as $result ) 
		{
			$return = maybe_unserialize($result->value);
		}


		if(is_user_logged_in()){
			if ($current_user->display_name == 'pix_test') {
				if(isset($_SESSION[$name])){
					if($_SESSION[$name]=='') {
						return $return;
					} else {
						return $_SESSION[$name];
					}
				} else {
					return $return;
				}
			} else {
				return $return;
			}
		} else {
			return $return;
		}

	}
	
}

function camera_update_option($name, $value) {
	global $wpdb;
	$wpdb->camera = $wpdb->prefix . 'camera';
	$value = maybe_serialize( $value );
	if ($current_user->display_name == 'pix_test') {
	} else {
		$wpdb->update( $wpdb->camera, array( 'value' => $value ), array( 'name' => $name ) );
	}
}

function camera_delete_option($name) {
	global $wpdb;
	$wpdb->camera = $wpdb->prefix . 'camera';
	$wpdb->query( "DELETE FROM $wpdb->camera WHERE name = '$name'" );
}

/*=========================================================================================*/

function camera_detectMobile(){
	$mobile_browser = '0';
	 
	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|pad)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
		$mobile_browser++;
	}
	 
	if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
		$mobile_browser++;
	}    
	 
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
	$mobile_agents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda ','xda-');
	 
	if (in_array($mobile_ua,$mobile_agents)) {
		$mobile_browser++;
	}
	 
	/*if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0) {
		$mobile_browser++;
	}*/
	 
	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows') > 0) {
		$mobile_browser = 0;
	}
	 
	if ($mobile_browser > 0) {
	   return true;
	}
}

/*=========================================================================================*/

function camera_admin_styles() {
	global $plugindir;
	if(isset($_GET['page']) && strpos($_GET['page'], 'camera')!==false){
		wp_enqueue_style('thickbox');
		wp_enqueue_style('farbtastic');
		wp_enqueue_style("camera-css", $plugindir."css/jquery.qtip.css", false, "1.0", "all");
		wp_enqueue_style("qtip-css", $plugindir."css/camera.css", false, "1.0", "all");
		wp_enqueue_style ('wp-jquery-ui-dialog');
		wp_enqueue_style("codemirror-main", $plugindir."css/codemirror.css", false, "1.0", "all");
		wp_enqueue_style("codemirror-skin", $plugindir."css/default.css", false, "1.0", "all");
	}
}
add_action('admin_print_styles', 'camera_admin_styles');

/*=========================================================================================*/

function camera_admin_enqueue_scripts() {
	global $plugindir;
	if(isset($_GET['page']) && strpos($_GET['page'], 'camera')!==false){
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('farbtastic');
		wp_register_script('pix-tb', $plugindir."scripts/pix_thickbox.js", array('thickbox'));
		wp_enqueue_script('pix-tb');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget', $plugindir."scripts/jquery.ui.widget.js", array('jquery-ui-core'));
		wp_enqueue_script('jquery-ui-mouse', $plugindir."scripts/jquery.ui.mouse.js", array('jquery-ui-core'));
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-position', $plugindir."scripts/jquery.ui.position.js", array('jquery-ui-core'));
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('jquery-ui-slider', $plugindir."scripts/jquery.ui.slider.js", array('jquery-ui-mouse'));
		wp_enqueue_script('modernizer', $plugindir."scripts/modernizr.pix.js", array('jquery'));
		wp_enqueue_script('codemirror', $plugindir."scripts/codemirror.js", array('jquery'));
		wp_enqueue_script('codemirror-css', $plugindir."scripts/css.js", array('jquery'));
		wp_enqueue_script('jquery-qtip', $plugindir."scripts/jquery.qtip.min.js", array('jquery'));
		wp_enqueue_script('camera-admin', $plugindir."scripts/camera.admin.js", array('jquery'));
	}
}
add_action('admin_enqueue_scripts', 'camera_admin_enqueue_scripts');

/*=========================================================================================*/

function camera_url() {
	global $plugindir;

	if(isset($_GET['page']) && strpos($_GET['page'], 'camera')!==false){
		echo '<link id="site_url" data-url="'.site_url().'" />';
		echo '<link id="admin_url" data-url="'.get_admin_url().'" />';
	}

}
add_action( 'admin_head', 'camera_url' );
			
/*=========================================================================================*/

function camera_attachment_id_from_src($image_src) {
	global $wpdb;
	$query = "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value='$image_src'";
	$id = $wpdb->get_var($query);
	return $id;
}

function get_camera_thumb($image_src, $thumb_size) {
	$upload_dir = wp_upload_dir();
	$image_id = camera_attachment_id_from_src(str_replace($upload_dir['baseurl'].'/','',$image_src));  
	if($image_id=='') {
		if(strpos(substr( $image_src, -10 ), 'x')&&strpos(substr( $image_src, -15 ), '-')) {
			$pos = strrpos($image_src, '-');
			$image_src = substr($image_src, 0, $pos) . substr($image_src, -4);
		}
		$image_id = camera_attachment_id_from_src(str_replace($upload_dir['baseurl'].'/','',$image_src));  
	}
	$url_thumb = wp_get_attachment_image_src($image_id,$thumb_size);  
	$url_thumb2 = $url_thumb[0];
	if($url_thumb2==''){
		$url_thumb2=$url_thumb;
	}
	return $url_thumb2;
}
			
/*=========================================================================================*/

function camera_get_content($url)
{
    $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_HEADER, 0);

    ob_start();

    curl_exec ($ch);
    curl_close ($ch);
    $string = ob_get_contents();

    ob_end_clean();
   
    return $string;    
}
			
/*=========================================================================================*/

function camera_compare_dates($date) { 
	$date = new DateTime($date);
	$date = $date->format('U');
	$date2 = time();
    $blocks = array( 
        array('name'=>'year','amount'    =>    60*60*24*365    ), 
        array('name'=>'month','amount'    =>    60*60*24*31    ), 
        array('name'=>'week','amount'    =>    60*60*24*7    ), 
        array('name'=>'day','amount'    =>    60*60*24    ), 
        array('name'=>'hour','amount'    =>    60*60        ), 
        array('name'=>'minute','amount'    =>    60        ), 
        array('name'=>'second','amount'    =>    1        ) 
        ); 
    
    $diff = abs($date-$date2); 
    
    $levels = 1; 
    $current_level = 1; 
    $result = array(); 
    foreach($blocks as $block) 
        { 
        if ($current_level > $levels) {break;} 
        if ($diff/$block['amount'] >= 1) 
            { 
            $amount = floor($diff/$block['amount']); 
            if ($amount>1) {$plural='s';} else {$plural='';} 
            $result[] = $amount.' '.$block['name'].$plural; 
            $diff -= $amount*$block['amount']; 
            $current_level++; 
            } 
        } 
	return implode(' ',$result).' ago'; 
} 
			
/*=========================================================================================*/

function camera_url_2_link($text) { 
	$text = ereg_replace('[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]', '<a href="\\0" target="_blank" rel="nofollow">\\0</a>', $text);
	return $text;
}
			
/*=========================================================================================*/

function camera_meta_style(){
	global $plugindir;
  
	if (!is_admin()) {
		
		wp_enqueue_style('camera-css-front', $plugindir.'css/camera_front.css', false, '1.0', 'all');
		wp_enqueue_style('camera-css-colorbox', $plugindir.'css/colorBox'.camera_get_option('camera_colorbox_skin').'/colorbox.css', false, '1.0', 'all');
		
	}
  
}


function camera_meta_footer(){
	if(camera_get_option('camera_scripts_footer')=='true'){
		wp_print_scripts('jquery-pix');
		wp_print_scripts('swfobject');
		wp_print_scripts('jquery-hoverIntent');
		wp_print_scripts('jquery-easing');
		wp_print_scripts('camera-colorbox');
		if(camera_detectMobile()) {
			wp_print_scripts('camera-jquery-mobile');
		}
		wp_print_scripts('camera-slide');
		wp_print_scripts('camera-init');
	}
}


function camera_meta_head(){
	if(camera_get_option('camera_scripts_footer')!='true'){
		wp_enqueue_script('jquery');
		wp_print_scripts('swfobject');
		wp_print_scripts('jquery-hoverIntent');
		wp_print_scripts('jquery-easing');
		wp_print_scripts('camera-colorbox');
		if(camera_detectMobile()) {
			wp_print_scripts('camera-jquery-mobile');
		}
		wp_print_scripts('camera-slide');
		wp_print_scripts('camera-init');
	}
}


function camera_meta_slideshow( $slideshow ) {
	
	global $plugindir;        
	$shortcode_found = true;
	$os = strtolower($_SERVER['HTTP_USER_AGENT']);        
        
	$camera_slideshow = camera_get_option('cameraarray_'.$slideshow);         
	
	if(is_array($camera_slideshow['fx'])){
            
		$camera_fx = implode(',',$camera_slideshow['fx']);
	} else {            
		$camera_fx = $camera_slideshow['fx'];
	}
	if(is_array($camera_slideshow['mobilefx'])){                
		$camera_mobilefx = implode(',',$camera_slideshow['mobilefx']);
	} else {            
		$camera_mobilefx = $camera_slideshow['mobilefx'];
	}	
	
	$out = 	
	'<div id="camera_'.$slideshow.'" class="camera_wrap '.camera_get_option('camera_commands_icon').' '.camera_get_option('camera_commands_emboss').' '.$camera_slideshow['pattern'].'" data-height="'.$camera_slideshow['height'].' " data-heightsign="'.$camera_slideshow['heightSign'].' " data-minheight="'.$camera_slideshow['minheight'].' " data-portrait="'.$camera_slideshow['portrait'].'" data-alignment="'.$camera_slideshow['alignment'].'" data-fx="'.$camera_fx.'" data-easing="'.$camera_slideshow['easing'].'" data-time="'.$camera_slideshow['time'].'" data-transperiod="'.$camera_slideshow['transperiod'].'" data-autoadvance="'.$camera_slideshow['autoadvance'].'" data-hover="'.$camera_slideshow['hover'].'" data-click="'.$camera_slideshow['click'].'" data-rows="'.$camera_slideshow['rows'].'" data-cols="'.$camera_slideshow['cols'].'" data-slicedrows="'.$camera_slideshow['slicedrows'].'" data-slicedcols="'.$camera_slideshow['slicedcols'].'" data-opacityoneffect="'.$camera_slideshow['opacityoneffect'].'" data-loader="'.$camera_slideshow['loader'].'" data-loaderbgcolor="'.$camera_slideshow['loaderbgcolor'].'" data-loadercolor="'.$camera_slideshow['loadercolor'].'" data-loaderopacity="'.$camera_slideshow['loaderopacity'].'" data-pieposition="'.$camera_slideshow['pieposition'].'" data-piediameter="'.$camera_slideshow['piediameter'].'" data-loaderstroke="'.$camera_slideshow['loaderstroke'].'" data-loaderpadding="'.$camera_slideshow['loaderpadding'].'" data-bardirection="'.$camera_slideshow['bardirection'].'" data-barposition="'.$camera_slideshow['barposition'].'" data-navigation="'.$camera_slideshow['nextprev'].'" data-navonhover="'.$camera_slideshow['navOnHover'].'" data-playpause="'.$camera_slideshow['playpause'].'" data-pagination="'.$camera_slideshow['pagination'].'" data-thumbs="'.$camera_slideshow['thumbs'].'" data-pattern="'.$camera_slideshow['pattern'].'" data-patternopacity="'.$camera_slideshow['patternopacity'].'" data-mobilefx="'.$camera_mobilefx.'" data-mobileeasing="'.$camera_slideshow['mobileeasing'].'">';

        
	foreach($camera_slideshow['camera_slide'] as $slide){

		if($slide['aligndefault']=='0') {
			$slideshow_alignment = $camera_slideshow['alignment'];
		} else {
			$slideshow_alignment = $slide['alignment'];
		}
		
		if($slide['portrait']=='default') {
			$slideshow_portrait = $camera_slideshow['portrait'];
		} else {
			$slideshow_portrait = $slide['portrait'];
		}
		
		
		if($slide['aligndefault']=='0') {
			$slide_alignment = '';
		} else {
			$slide_alignment = $slide['alignment'];
		}
		
		if($slide['portrait']=='default') {
			$slide_portrait = '';
		} else {
			$slide_portrait = $slide['portrait'];
		}

		switch ($slide['target']) {
			case '_blank':
				$targetLink = 'data-target="_blank"';
				break;
			case '_self':
				$targetLink = 'data-target="_self"';
				break;
			case 'box':
				$targetLink = 'data-box="true"';
				break;
		}
		
		if(camera_get_option('camera_timthumb')!='false'){
			$thumbwidth = '&amp;w='.$camera_slideshow['thumbwidth'];
		} else {
			$thumbwidth = '';
		}
		if(camera_get_option('camera_timthumb')!='false'){
			$thumbheight = '&amp;h='.$camera_slideshow['thumbheight'];
		} else {
			$thumbheight = '';
		}
		if(camera_get_option('camera_timthumb')!='false'){
			if(camera_get_option('camera_timthumb_cache')!='false'){
				$thumbtimthumb = $plugindir.'scripts/timthumb.php?src=';
			} else {
				$thumbtimthumb = $plugindir.'scripts/timthumb_no_cache.php?src=';
			}
		} else {
			$thumbtimthumb = '';
		}
		if($slide['thumb']==''){
			$slidethumb = $slide['url'];
		} else {
			$slidethumb = $slide['thumb'];
		}

		$out .= '<div data-thumb="'.$thumbtimthumb.$slidethumb.$thumbwidth.$thumbheight.'" data-src="'.$slide['url'].'" data-alignment="'.$slide_alignment.'" data-portrait="'.$slide_portrait.'" data-fx="'.implode(',',$slide['fx']).'" data-easing="'.$slide['easing'].'" data-time="'.$slide['time'].'" data-transPeriod="'.$slide['transperiod'].'" data-video="'.$slide['embeddisplay'].'" data-link="'.$slide['link'].'" '.$targetLink.'>';
		
		if( $slide['embed']!='') {
			$out .= stripslashes(html_entity_decode($slide['embed']));
		}
		
		if($slide['htmlinclude']=='true') {
			$stayHere = 'camera_effected';
		} else {
			$stayHere = '';
		}

		if( $slide['html']!='') {
			$out .= '<div class="elemHover '.$slide['htmleffect'].' '.$stayHere.'">'.stripslashes(html_entity_decode($slide['html'])).'</div>';
		}
		
		if( $slide['caption']!='') {
			$out .= '<div class="camera_caption '.$slide['captioneffect'].'">'.nl2br(stripslashes(html_entity_decode($slide['caption']))).'</div>';
		}
		
		
		$out .= '</div>';

	}
			
$out .= '</div><!-- .camera_wrap -->
<div class="camera_clear"></div><!-- .camera_clear -->';

	
   return $out;
}

/*=========================================================================================*/

function camera_shortcode( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'slideshow'      => ''
    ), $atts));
	
	global $plugindir;
	$shortcode_found = true;
	$os = strtolower($_SERVER['HTTP_USER_AGENT']);

	$camera_slideshow = camera_get_option('cameraarray_'.$slideshow);
	
	if(is_array($camera_slideshow['fx'])){
		$camera_fx = implode(',',$camera_slideshow['fx']);
	} else {
		$camera_fx = $camera_slideshow['fx'];
	}
	if(is_array($camera_slideshow['mobilefx'])){
		$camera_mobilefx = implode(',',$camera_slideshow['mobilefx']);
	} else {
		$camera_mobilefx = $camera_slideshow['mobilefx'];
	}
	
	
	$out = 	
	'<div id="camera_'.$slideshow.'" class="camera_wrap '.camera_get_option('camera_commands_icon').' '.camera_get_option('camera_commands_emboss').' '.$camera_slideshow['pattern'].'" data-height="'.$camera_slideshow['height'].' " data-heightsign="'.$camera_slideshow['heightSign'].' " data-minheight="'.$camera_slideshow['minheight'].' " data-portrait="'.$camera_slideshow['portrait'].'" data-alignment="'.$camera_slideshow['alignment'].'" data-fx="'.$camera_fx.'" data-easing="'.$camera_slideshow['easing'].'" data-time="'.$camera_slideshow['time'].'" data-transperiod="'.$camera_slideshow['transperiod'].'" data-autoadvance="'.$camera_slideshow['autoadvance'].'" data-hover="'.$camera_slideshow['hover'].'" data-click="'.$camera_slideshow['click'].'" data-rows="'.$camera_slideshow['rows'].'" data-cols="'.$camera_slideshow['cols'].'" data-slicedrows="'.$camera_slideshow['slicedrows'].'" data-slicedcols="'.$camera_slideshow['slicedcols'].'" data-opacityoneffect="'.$camera_slideshow['opacityoneffect'].'" data-loader="'.$camera_slideshow['loader'].'" data-loaderbgcolor="'.$camera_slideshow['loaderbgcolor'].'" data-loadercolor="'.$camera_slideshow['loadercolor'].'" data-loaderopacity="'.$camera_slideshow['loaderopacity'].'" data-pieposition="'.$camera_slideshow['pieposition'].'" data-piediameter="'.$camera_slideshow['piediameter'].'" data-loaderstroke="'.$camera_slideshow['loaderstroke'].'" data-loaderpadding="'.$camera_slideshow['loaderpadding'].'" data-bardirection="'.$camera_slideshow['bardirection'].'" data-barposition="'.$camera_slideshow['barposition'].'" data-navigation="'.$camera_slideshow['nextprev'].'" data-navonhover="'.$camera_slideshow['navOnHover'].'" data-playpause="'.$camera_slideshow['playpause'].'" data-pagination="'.$camera_slideshow['pagination'].'" data-thumbs="'.$camera_slideshow['thumbs'].'" data-pattern="'.$camera_slideshow['pattern'].'" data-patternopacity="'.$camera_slideshow['patternopacity'].'" data-mobilefx="'.$camera_mobilefx.'" data-mobileeasing="'.$camera_slideshow['mobileeasing'].'">';

	foreach($camera_slideshow['camera_slide'] as $slide){

		if($slide['aligndefault']=='0') {
			$slideshow_alignment = $camera_slideshow['alignment'];
		} else {
			$slideshow_alignment = $slide['alignment'];
		}
		
		if($slide['portrait']=='default') {
			$slideshow_portrait = $camera_slideshow['portrait'];
		} else {
			$slideshow_portrait = $slide['portrait'];
		}
		
		
		if($slide['aligndefault']=='0') {
			$slide_alignment = '';
		} else {
			$slide_alignment = $slide['alignment'];
		}
		
		if($slide['portrait']=='default') {
			$slide_portrait = '';
		} else {
			$slide_portrait = $slide['portrait'];
		}

		switch ($slide['target']) {
			case '_blank':
				$targetLink = 'data-target="_blank"';
				break;
			case '_self':
				$targetLink = 'data-target="_self"';
				break;
			case 'box':
				$targetLink = 'data-box="true"';
				break;
		}
		
		if(camera_get_option('camera_timthumb')!='false'){
			$thumbwidth = '&amp;w='.$camera_slideshow['thumbwidth'];
		} else {
			$thumbwidth = '';
		}
		if(camera_get_option('camera_timthumb')!='false'){
			$thumbheight = '&amp;h='.$camera_slideshow['thumbheight'];
		} else {
			$thumbheight = '';
		}
		if(camera_get_option('camera_timthumb')!='false'){
			if(camera_get_option('camera_timthumb_cache')!='false'){
				$thumbtimthumb = $plugindir.'scripts/timthumb.php?src=';
			} else {
				$thumbtimthumb = $plugindir.'scripts/timthumb_no_cache.php?src=';
			}
		} else {
			$thumbtimthumb = '';
		}
		if($slide['thumb']==''){
			$slidethumb = $slide['url'];
		} else {
			$slidethumb = $slide['thumb'];
		}

		$out .= '<div data-thumb="'.$thumbtimthumb.$slidethumb.$thumbwidth.$thumbheight.'" data-src="'.$slide['url'].'" data-alignment="'.$slide_alignment.'" data-portrait="'.$slide_portrait.'" data-fx="'.implode(',',$slide['fx']).'" data-easing="'.$slide['easing'].'" data-time="'.$slide['time'].'" data-transPeriod="'.$slide['transperiod'].'" data-video="'.$slide['embeddisplay'].'" data-link="'.$slide['link'].'" '.$targetLink.'>';
		
		if( $slide['embed']!='') {
			$out .= stripslashes(html_entity_decode($slide['embed']));
		}
		
		if($slide['htmlinclude']=='true') {
			$stayHere = 'camera_effected';
		} else {
			$stayHere = '';
		}

		if( $slide['html']!='') {
			$out .= '<div class="elemHover '.$slide['htmleffect'].' '.$stayHere.'">'.stripslashes(html_entity_decode($slide['html'])).'</div>';
		}
		
		if( $slide['caption']!='') {
			$out .= '<div class="camera_caption '.$slide['captioneffect'].'">'.nl2br(stripslashes(html_entity_decode($slide['caption']))).'</div>';
		}
		
		
		$out .= '</div>';

	}
			
$out .= '</div><!-- .camera_wrap -->
<div class="camera_clear"></div><!-- .camera_clear -->';

	
   return $out;
}
add_shortcode("camera", "camera_shortcode");

/*=========================================================================================*/

function camera_slideshow_sc_button() {
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
   if ( get_user_option('rich_editing') == 'true') {
     add_filter('mce_external_plugins', 'add_camera_sc');
     add_filter('mce_buttons_3', 'register_camera_sc');
   }
}

add_action('init', 'camera_slideshow_sc_button');

function register_camera_sc($buttons) {
	array_push($buttons, "camera_slideshow_sc");
	return $buttons;
}


function add_camera_sc($plugin_array) {
	global $plugindir;
	$plugin_array['camera_slideshow_sc'] = $plugindir.'/scripts/camera.shortcodes.js';
	return $plugin_array;
}

function camera_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

add_filter( 'tiny_mce_version', 'camera_refresh_mce');

/*=========================================================================================*/

function print_camera_plugindir() {
	require (ABSPATH . WPINC . '/pluggable.php');
	global $plugindir, $current_user, $display_name;
	get_currentuserinfo();

	echo '<script type="text/javascript">var plugindir = "'.$plugindir.'";</script>';

	if(is_user_logged_in()){
			echo '<script type="text/javascript">var pixtest = "'.$current_user->display_name.'";</script>';
	}
}
add_action('admin_head', 'print_camera_plugindir');

/*=========================================================================================*/

function front_camera_plugindir() {
	global $plugindir;
	echo '<script type="text/javascript">var plugindir = "'.$plugindir.'";</script>';
}
add_action('wp_head', 'front_camera_plugindir');

/*=========================================================================================*/

define('CAMERA_PATH',ABSPATH.'/wp-content/plugins/camera/');
 
add_action('admin_init','camera_metabox');

function camera_metabox()
{
	global $plugindir;
	$post_types = camera_get_option( 'camera_metabox' );
	wp_enqueue_style('camera_meta_css', $plugindir . '/css/camera_meta.css');
 
	foreach ($post_types as $type) 
	{
		add_meta_box('camera_all_meta', 'Add a Camera slideshow', 'camera_meta_setup', $type, 'normal', 'high');
	}
}
 
function camera_meta_setup()
{
	global $post;
 
	$meta = get_post_meta($post->ID,'_camera_meta',TRUE);
 
	include(CAMERA_PATH . 'lib/meta/camera_meta.php');
 
	echo '<input type="hidden" name="camera_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

/*=========================================================================================*/

function camera_main_ss_add()
{
	$post_types = camera_get_option( 'camera_metabox' );
	foreach ($post_types as $type) 
	{
		add_meta_box( 'camera_main_ss_box', 'Camera slideshow', 'camera_main_ss_box', $type, 'normal', 'high' );
	}
}

function camera_main_ss_box( $post )
{
	$values = get_post_custom( $post->ID );
	$selected = isset( $values['camera_meta_slideshow'] ) ? esc_attr( $values['camera_meta_slideshow'][0] ) : '';
	wp_nonce_field( 'camera_nonce_action', 'camera_box_nonce' );
	?>
	<p>
        <label>Select a slideshow:</label>
        <input type="hidden" value="">
        <select id="camera_meta_slideshow" name="camera_meta_slideshow" >
            <option value="none" <?php selected( $selected, 'none' ); ?>>None</option>';
			<?php $camera_added_slideshows = camera_get_option( 'camera_added_slideshows' );
            foreach($camera_added_slideshows as $option => $value) { ?>
                <option value="<?php echo sanitize_title($value); ?>" <?php selected( $selected, sanitize_title($value) ) ?>><?php echo $value; ?></option>
            <?php } ?>
        </select>
	</p>
	<?php	
}


add_action( 'save_post', 'camera_main_ss_save' );
function camera_main_ss_save( $post_id )
{
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	if( !isset( $_POST['camera_box_nonce'] ) || !wp_verify_nonce( $_POST['camera_box_nonce'], 'camera_nonce_action' ) ) return;
	
	if( !current_user_can( 'edit_post' ) ) return;
	
	if( isset( $_POST['camera_meta_slideshow'] ) )
		update_post_meta( $post_id, 'camera_meta_slideshow', esc_attr( $_POST['camera_meta_slideshow'] ) );
		
}

/*=========================================================================================*/

add_filter('the_posts', 'camera_enqueue_cond');
function camera_enqueue_cond($posts){
	global $plugindir, $shortcode_found;
	if (empty($posts)) return $posts;
  
	$shortcode_found = false;
	
	
	foreach ($posts as $post) {
		
		$meta_camera = get_post_custom( $post->ID );
		
		if ( stripos($post->post_content, 'camera slideshow=') || (isset($meta_camera['camera_meta_slideshow']) && $meta_camera['camera_meta_slideshow']!='none') ) {
			$shortcode_found = true;
			break;
		}
	}
  
	if ($shortcode_found && !is_admin()) {
		
		wp_enqueue_style('camera-css-front', $plugindir.'css/camera_front.css', false, '1.0', 'all');
		wp_enqueue_style('camera-css-colorbox', $plugindir.'css/colorBox'.camera_get_option('camera_colorbox_skin').'/colorbox.css', false, '1.0', 'all');
		
	}
  
	return $posts;
}

add_action('init', 'camera_register_scripts');

function camera_register_scripts(){
global $plugindir;	

	if(camera_get_option('camera_scripts_footer')=='true'){
		$pix_jquery = 'jquery-pix';
	} else {
		$pix_jquery = 'jquery';
	}
	wp_register_script('jquery-pix', $plugindir.'scripts/jquery-1.7.min.js', false, '1.7.0', true);
	wp_register_script('jquery-hoverIntent', $plugindir.'scripts/jquery.hoverIntent.minified.js', array($pix_jquery));
	wp_register_script('jquery-easing', $plugindir.'scripts/jquery.easing.1.3.js', array($pix_jquery));
	wp_register_script('camera-colorbox', $plugindir.'scripts/jquery.colorbox-min.js', array($pix_jquery));
	wp_register_script('camera-jquery-mobile', $plugindir.'scripts/jquery.mobile.customized.min.js', array($pix_jquery));
	wp_register_script('camera-slide', $plugindir.'scripts/camera.min.js', array($pix_jquery,'jquery-hoverIntent','jquery-easing'));
	wp_register_script('camera-init', $plugindir.'scripts/camera.init.js', array($pix_jquery,'camera-slide'));
}

add_action('wp_footer', 'camera_enqueue_footer');

function camera_enqueue_footer(){
	global $shortcode_found;	
	if($shortcode_found==true && camera_get_option('camera_scripts_footer')=='true'){
		wp_print_scripts('jquery-pix');
		wp_print_scripts('swfobject');
		wp_print_scripts('jquery-hoverIntent');
		wp_print_scripts('jquery-easing');
		if(camera_get_option('camera_colorbox')=='true') {
			wp_print_scripts('camera-colorbox');
		}
		if(camera_detectMobile() && camera_get_option('camera_jquerymobile')=='true') {
			wp_print_scripts('camera-jquery-mobile');
		}
		wp_print_scripts('camera-slide');
		wp_print_scripts('camera-init');
	}
}

add_action('wp_head', 'camera_enqueue_head');

function camera_enqueue_head(){
	global $shortcode_found;	
	if($shortcode_found==true && camera_get_option('camera_scripts_footer')!='true'){
		wp_enqueue_script('jquery');
		wp_print_scripts('swfobject');
		wp_print_scripts('jquery-hoverIntent');
		wp_print_scripts('jquery-easing');
		wp_print_scripts('camera-colorbox');
		if(camera_get_option('camera_colorbox')=='true') {
			wp_print_scripts('camera-colorbox');
		}
		if(camera_detectMobile() && camera_get_option('camera_jquerymobile')=='true') {
			wp_print_scripts('camera-jquery-mobile');
		}
		wp_print_scripts('camera-slide');
		wp_print_scripts('camera-init');
	}
}

/*=========================================================================================*/

function camera_custom_styles() {
		$out = '<style>';
		$out .= '.camera_caption{color:'.camera_get_option('camera_caption_text').';}';
		$out .= '.camera_caption>div{background:'.camera_get_option('camera_caption_bg').';background:rgba('.camera_hex2RGB(camera_get_option('camera_caption_bg'), true).', '.camera_get_option('camera_caption_alpha').');}';
		$out .= '.camera_prevThumbs,.camera_nextThumbs,.camera_prev,.camera_next,.camera_commands,.camera_thumbs_cont,.camera_pag_ul li{background: '.camera_get_option('camera_commands_bg').';background: rgba('.camera_hex2RGB(camera_get_option('camera_commands_bg'), true).', '.camera_get_option('camera_commands_alpha').');}';
		$out .= '.camera_wrap .camera_pag .camera_pag_ul li.cameracurrent>span{background:'.camera_get_option('camera_commands_active').';}';
		$out .= '.camera_pag_ul li img{border-color:'.camera_get_option('camera_thumb_border').';}';
		$out .= '.camera_pag_ul .thumb_arrow{border-top-color:'.camera_get_option('camera_thumb_border').';}';

		if(camera_get_option('camera_styles')!=''){
			$out .= stripslashes(html_entity_decode(camera_get_option('camera_styles')));
		}
		$out .= '</style>' ;
		
		echo  $out;
}
add_action('wp_head', 'camera_custom_styles');

/*=========================================================================================*/

function camera_image_size($url,$size=''){
	
	$start = microtime(true);
	
	$raw = ranger($url);
	$im = @imagecreatefromstring($raw);
	
	$width = imagesx($im);
	$height = imagesy($im);
	
	$stop = round(microtime(true) - $start, 5);
	
	if($size=='width'){
		return $width;
	} elseif($size=='height') {
		return $height;
	} else {
		echo 'width='.$width.'px; height='.$height.'px';
	}
}

function ranger($url){
    $headers = array(
    "Range: bytes=0-32768"
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
    curl_close($curl);
}

/*=========================================================================================*/

function plugin_get_version() {
	global $pluginpath;
	$plugin_data = get_plugin_data($pluginpath.'/index.php');
	$plugin_version = $plugin_data['Version'];
	return $plugin_version;
}

/*=========================================================================================*/

function camera_hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

/*=========================================================================================*/

