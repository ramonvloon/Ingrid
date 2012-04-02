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
}

// end theme_widgets_init 
add_action('init', 'theme_widgets_init');

$preset_widgets = array(
    'primary_widget_area' => array('search', 'pages', 'categories', 'archives'),
    'secondary_widget_area' => array('links', 'meta'));
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
    add_action('admin_init', 'camera_main_ss_add');
}

// end camera slideshow
// custom menu
function register_my_menus() {
    register_nav_menus(
            array('header-menu' => __('Header Menu'), 'extra-menu' => __('Extra Menu'))
    );
}

add_action('init', 'register_my_menus');

// eind custom menu

function get_top_widget() {
    $url = ABSPATH . "wp-content/themes/ingridoosterheerd/include/top-widget.php";
    return $url;
}

function get_menu_logo() {
    $url = ABSPATH . "wp-content/themes/ingridoosterheerd/include/menu-logo.php";
    return $url;
}

// custom language menu modification of Polylang_Core::the_languages
function the_language_menu($args='') {
    global $polylang;
    //check to be sure we have right object
    if (!($polylang instanceof Polylang_Core))
        return;
    $defaults = array(
        'dropdown' => 0, // display as list and not as dropdown
        'echo' => 1, // echoes the list
        'hide_if_empty' => 1, // hides languages with no posts (or pages)
        'menu' => '0', // not for nav menu
        'show_flags' => 0, // don't show flags
        'show_names' => 1, // show language names
        'force_home' => 0, // tries to find a translation (available only if display != dropdown)
        'hide_if_no_translation' => 0, // don't hide the link if there is no translation
        'hide_current' => 0, // don't hide current language
        'display_names_as' => 'name', // valid options are slug and name
        'before' => '', // add html or string before first list item
        'after' => '' // add html or string after last list item
    );

    extract(wp_parse_args($args, $defaults));

    // get $curlang because it is declared as private in Polylang_Core
    $curlang = $polylang->get_current_language();
    $output = $before;

    foreach ($polylang->get_languages_list($hide_if_empty) as $language) {
        // hide current language
        if ($curlang->term_id == $language->term_id && $hide_current)
            continue;
        $url = $force_home ? null : $polylang->get_translation_url($language);
        $url = apply_filters('pll_the_language_link', $url, $language->slug, $language->description);
        // hide if no translation exists
        if (!isset($url) && $hide_if_no_translation)
            continue;
        $url = isset($url) ? $url : $polylang->get_home_url($language); // if the page is not translated, link to the home page

        $class = 'lang-item lang-item-' . esc_attr($language->term_id);
        $class .= $language->term_id == $curlang->term_id ? ' current-lang' : '';
        $class .= $menu ? ' menu-item' : '';

        $flag = $show_flags ? $polylang->get_flag($language) : '';
        $name = $show_names || !$show_flags ? esc_html(($display_names_as == 'slug' ? $language->slug : $language->name)) : '';

        $output .= sprintf("<li class='%s'><a hreflang='%s' href='%s'>%s</a></li>\n", $class, esc_attr($language->slug), esc_url($url), $show_flags && $show_names ? $flag . '&nbsp;' . $name : $flag . $name);
    }
    echo $output . $after;
}

/**
 *  check if a widgit is active in a specific sidebar
 *  @param string $sidebar_id Sidebar ID
 *  @param string $widget_id Widget ID
 *  @return true if widget is in a sidebar active
 */
function is_widget_active($sidebar_id, $widget_id) {
    $s_id = $sidebar_id;
    $w_id = $widget_id;

    $sidebar_widgets = get_option('sidebars_widgets');
    foreach ($sidebar_widgets[$sidebar_id] as $widget) {
        if (strpos($widget, $widget_id) !== false) {
            $success = true;
        }
    }
    if ($success == true) {
        return true;
    } else {
        return false;
    }
}

/**
 * get covers of each slideshow 
 * @param string $product This value of <i>$product</i> can be one of this
 * <ul>
 * <li>publicatie</li>
 * <li>tijdschrift</li>
 * <li>tentoonstelling</li>
 * <li>overige</li>
 * </ul>
 * 
 * @return array of covers
 */
function get_slideshow_covers($product = '') {
    global $wpdb;
    $covers = array();
    $sql = "SELECT * FROM wp_camera WHERE name like 'cameraarray_" . $product . "%' ORDER BY name ASC";
    $result = $wpdb->get_results($sql, ARRAY_A);
    foreach ($result as $camera) {
        // define start positoin of the slide show - firts picture
        $pos_slide_0 = strpos($camera['value'], 'camera_slide_no_0');

        // make a temp string
        // thid string begins with 'camera_slide_no_0' and have lenght 300
        $temp_value = substr($camera['value'], $pos_slide_0, 300);        

        // define start position of 'http' - this will be img url
        $pos_http = strpos($temp_value, 'http');

        // make temp string
        // this string begins with 'http'
        $temp_url = substr($temp_value, $pos_http);

        // define position of semicolon
        // the http url end with semicolon
        $semicolon = strpos($temp_url, ';');

        // get cover pucture url
        $img_url = substr($temp_url, 0, ($semicolon - 1));
        
        // add image url to array
        $covers[] = $img_url;
    }
    return $covers;
}

?>