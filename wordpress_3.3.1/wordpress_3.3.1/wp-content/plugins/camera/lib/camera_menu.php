<?php
function camera_add_menu()
{
	global	$pluginname,
			$plugindir;
		
	global $current_user;
	get_currentuserinfo();
	
	
	if($current_user->display_name == 'pix_test'){
		if (function_exists('add_options_page')) {
			add_menu_page($pluginname, $pluginname, 'subscriber', 'camera_general', 'camera_init', $plugindir . 'css/images/blank.gif');
			add_submenu_page('camera_general', 'Settings', 'Settings', 'subscriber', 'camera_settings','camera_init');
			add_submenu_page('camera_general', 'Documentation', 'Documentation', 'subscriber', 'camera_documentation','camera_init');
			add_submenu_page('camera_general', 'Add/remove slideshows', 'Add/remove slideshows', 'subscriber', 'camera_addremove','camera_init');
			add_submenu_page('camera_general', 'Manage your slideshows', 'Manage your slideshows', 'subscriber', 'camera_manage','camera_init');
			add_submenu_page('camera_general', 'Dynamic slideshows', 'Dynamic slideshows', 'subscriber', 'camera_dynamic','camera_init');
		}
	} else {
		if (current_user_can('manage_options')) {
			if (function_exists('add_options_page')) {
				add_menu_page($pluginname, $pluginname, 'administrator', 'camera_general', 'camera_init', $plugindir . 'css/images/blank.gif');
				add_submenu_page('camera_general', 'Settings', 'Settings', 'administrator', 'camera_settings','camera_init');
				add_submenu_page('camera_general', 'Documentation', 'Documentation', 'administrator', 'camera_documentation','camera_init');
				add_submenu_page('camera_general', 'Add/remove slideshows', 'Add/remove slideshows', 'administrator', 'camera_addremove','camera_init');
				add_submenu_page('camera_general', 'Manage your slideshows', 'Manage your slideshows', 'administrator', 'camera_manage','camera_init');
				add_submenu_page('camera_general', 'Dynamic slideshows', 'Dynamic slideshows', 'administrator', 'camera_dynamic','camera_init');
			}
		}
	}
}

add_action('admin_menu', 'camera_add_menu');



add_action( 'admin_head', 'camera_menu_style' );
function camera_menu_style() {
    ?>
    <style type="text/css" media="screen">
        #toplevel_page_camera_general ul, #toplevel_page_camera_general .wp-menu-toggle, #toplevel_page_camera_general .wp-submenu, #toplevel_page_camera_general.wp-not-current-submenu .wp-menu-arrow {
            display: none!important;
        }
        #toplevel_page_camera_general .wp-menu-image {
            background: url(<?php global $plugindir; echo $plugindir; ?>css/images/menu_icon.png) no-repeat 0 0 !important;
        }
		#toplevel_page_camera_general:hover .wp-menu-image, #toplevel_page_camera_general.current .wp-menu-image {
            background-position: 0 0!important;
        }
    </style>
<?php }
?>