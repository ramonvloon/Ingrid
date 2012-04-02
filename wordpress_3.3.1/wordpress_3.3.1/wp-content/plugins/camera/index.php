<?php 
/*
Plugin Name: Camera slideshow
Plugin URI: http://www.pixedelic.com/plugins/camera/wp.php
Description: An adpative jQuery slideshow, mobile ready
Version: 1.0.05
Author: Manuel Masia | Pixedelic.com
Author URI: http://www.pixedelic.com
License: GPL2
*/

		$pluginname = "Camera";
		$plugindir = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
		$pluginpath = dirname( __FILE__ );
		
function camera_Install() {
	global $wpdb;
	$table_name = $wpdb->prefix . "camera";
	$charset_collate = '';
	if ( version_compare(mysql_get_server_info(), '4.1.0', '>=') ) {
		if ( ! empty($wpdb->charset) )
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
		if ( ! empty($wpdb->collate) )
			$charset_collate .= " COLLATE $wpdb->collate";
	}
	
	if( !$wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) ) {
	  
		$sql = "CREATE TABLE " . $table_name . " (
		name VARCHAR(255) NOT NULL ,
		value LONGTEXT
		) $charset_collate;";
	
	   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	   dbDelta($sql);
	}
}
register_activation_hook( __FILE__, 'camera_Install' );



		require_once $pluginpath . '/lib/camera_functions.php';
		require_once $pluginpath . '/lib/camera_admin.php';
		require_once $pluginpath . '/lib/camera_menu.php';
		require_once $pluginpath . '/lib/admin/camera_general.php';
		require_once $pluginpath . '/lib/admin/camera_documentation.php';
		require_once $pluginpath . '/lib/admin/camera_settings.php';
		require_once $pluginpath . '/lib/admin/camera_addremove.php';
		require_once $pluginpath . '/lib/admin/camera_manageslideshow.php';
		require_once $pluginpath . '/lib/admin/camera_dynamicslideshows.php';
	

		
		

function cameraUninstall() {

        global $wpdb;
        $table_name = $wpdb->prefix . "camera";

	if (camera_get_option('camera_delete_table')=='true'){
		$wpdb->query("DROP TABLE IF EXISTS $table_name");
	}
}

register_uninstall_hook( __FILE__, 'cameraUninstall' );
