=== Camera slideshow ===
Contributors: manuelmasia
Donate link: http://www.pixedelic.com/plugins/camera/donate.php
Tags: slideshow, jQuery, adaptive, mobile, drag and drop, admin panel, shortcode
Requires at least: 3.0.0
Tested up to: 3.3.1
Stable tag: 1.0.05

A jQuery slideshow with an adaptive layout, easy to use with an extended admin panel

== Description ==

A jQuery slideshow with an adaptive layout, easy to use with an extended admin panel. It already provides ColorBox, TimThumb, many effects. You can included it in your theme by using the shortcode (through a useful TinyMCE custom button) or through a meta-box by adding some lines of code to your theme.

Here is the demo page: [Camera slideshow](http://www.pixedelic.com/plugins/camera/wp.php "Camera slideshow")

== Installation ==

1. Upload `camera` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You can include Camera slideshow into your projects by using the TinyMCE custom button, by using the shortcode [camera slideshow='my-first-slideshow'] or by enabling the meta-box. In this case add these lines to your function.php file:
if (function_exists('camera_main_ss_add')) {
    add_action('admin_init','camera_main_ss_add');
}
A meta box will be available on your page/posts backend to select the slideshow you prefer. Just put this code into your loop to display the slideshow:
if (function_exists('camera_meta_slideshow')) {
    $meta_camera = get_post_custom( $post->ID );
    if(isset($meta_camera['camera_meta_slideshow'])){
        echo camera_meta_slideshow($meta_camera['camera_meta_slideshow'][0]);
    }
}

== Frequently Asked Questions ==

= No questions available =

...

== Screenshots ==

1. Camera admin panel
2. Camera admin panel (2)

== Changelog ==

= 1.0.05 =
* 2012.02.22 - First adjustments, sorry
= 1.0.0 =
* 2012.02.22 - First release

== Upgrade Notice ==