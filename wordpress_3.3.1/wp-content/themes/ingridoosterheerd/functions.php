<?php

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain('your-theme', TEMPLATEPATH . '/languages');

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";

if (is_readable($locale_file))
    require_once($locale_file);

// Get the page number
function get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __('Page ', 'Itopia') . get_query_var('paged');
    }
}

// end get_page_number

function theme_widgets_init() {
// Area 1    
    register_sidebar(array(
        'name' => 'Primary Widget Area',
        'id' => 'primary_widget_area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>", 'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',));
// Area 2    
    register_sidebar(array(
        'name' => 'Secondary Widget Area',
        'id' => 'secondary_widget_area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>", 'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',));
// Top Area
    register_sidebar(array(
        'name' => 'Top Widget Area',
        'id' => 'top_widget_area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>", 'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',));
}
// end theme_widgets_init 
add_action('init', 'theme_widgets_init');

$preset_widgets = array(
    'primary_widget_area' => array('search', 'pages', 'categories', 'archives'),
    'secondary_widget_area' => array('links', 'meta'),
    'top_widget_area' => array('search', 'language'));
if (isset($_GET['activated'])) {
    update_option('sidebars_widgets', $preset_widgets);
}

// update_option( 'sidebars_widgets', NULL );
// Check for static widgets in widget-ready areas
function is_sidebar_active($index) {
    global $wp_registered_sidebars;
    $widgetcolums = wp_get_sidebars_widgets();

    if ($widgetcolums[$index])
        return true;

    return false;
}

// end is_sidebar_active

// camera slideshow
if (function_exists('camera_main_ss_add')) {
    add_action('admin_init','camera_main_ss_add');
}
// end camera slideshow


// custom menu
function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}
add_action( 'init', 'register_my_menus' );
// eind custom menu

function get_top_widget(){
    $url = ABSPATH . "wp-content/themes/ingridoosterheerd/include/top-widget.php";
    return $url;
}

function get_menu_logo(){
    $url = ABSPATH . "wp-content/themes/ingridoosterheerd/include/menu-logo.php";
    return $url;
}

?>