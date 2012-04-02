<?php
function camera_add_general() {

	global $options, $wpdb;
	camera_init();
	foreach ($options as $value) :
		if(!camera_get_option($value['id'])){
			camera_add_option($value['id'], $value['std']);
		}
	endforeach;
}

camera_add_general();

function camera_init()
{
    global $options;
	$post_types = get_post_types(array( 'public' => true ));
	$post_string = array();
    foreach ( $post_types as $post_type ) {
		array_push($post_string,$post_type);
	}

	$options = array (
		array( "id" => "camera_added_slideshows",
		"std" => array(0=>"My first slideshow")),
		array( "id" => "camera_timthumb",
		"std" => 'false'),
		array( "id" => "camera_timthumb_cache",
		"std" => 'false'),
		array( "id" => "camera_colorbox",
		"std" => 'true'),
		array( "id" => "camera_colorbox_skin",
		"std" => '3'),
		array( "id" => "camera_jquerymobile",
		"std" => 'true'),
		array( "id" => "camera_metabox",
		"std" => $post_string),
		array( "id" => "camera_scripts_footer",
		"std" => 'false'),
		array( "id" => "camera_caption_bg",
		"std" => '#000000'),
		array( "id" => "camera_caption_text",
		"std" => '#ffffff'),
		array( "id" => "camera_caption_alpha",
		"std" => '0.8'),
		array( "id" => "camera_commands_bg",
		"std" => '#d8d8d8'),
		array( "id" => "camera_commands_alpha",
		"std" => '0.85'),
		array( "id" => "camera_commands_active",
		"std" => '#434648'),
		array( "id" => "camera_commands_icon",
		"std" => 'camera_petroleum_skin'),
		array( "id" => "camera_commands_emboss",
		"std" => 'camera_commands_emboss'),
		array( "id" => "camera_thumb_border",
		"std" => '#e6e6e6'),
		array( "id" => "camera_styles",
		"std" => '/*Camera additional styles*/'),
		array( "id" => "camera_delete_table",
		"std" => 'false'),
		array( "id" => "camera_support_work",
		"std" => 'true')
	);
	
	if (function_exists('camera_general')){
			camera_general('camera_init');
	}
	if (function_exists('camera_documentation')){
			camera_documentation('camera_init');
	}
	if (function_exists('camera_settings')){
			camera_settings('camera_init');
	}
	if (function_exists('camera_addremove')){
			camera_addremove('camera_init');
	}
	if (function_exists('camera_manage')){
			camera_manage('camera_init');
	}
	if (function_exists('camera_dynamic')){
			camera_dynamic('camera_init');
	}
	if (function_exists('camera_tweets')){
			camera_tweets('camera_init');
	}
	return $options;
}

?>