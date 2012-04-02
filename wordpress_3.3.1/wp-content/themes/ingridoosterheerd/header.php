<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php
if(function_exists('language_attributes')) { 
	language_attributes(); 
}else{
	echo "<h1>Oops:</h1><font color=\"red\">This theme only works with WordPress 2.1.* or higher. You seem to have an <b>outdated version</b> of wordpress. Please download the latest <a href=\"http://www.wordpress.com\">WordPress</a> to use this theme and also get the latest security patches.</font>";
//	exit();
}
?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('template_directory');?>/SpryAssets/SprySlidingPanels.js" type="text/javascript"></script>
<link href="<?php bloginfo('template_directory');?>/SpryAssets/SprySlidingPanels.css" rel="stylesheet" type="text/css" />
<?php wp_head(); ?>
</head>
<body>
<div class="ito-main-container">
    
    <!--
<?php
        $stylesheet_dir_uri = get_stylesheet_directory_uri();
	$stylesheet_uri = $stylesheet_dir_uri . '/images/testlogo.png';
?>
<img src="<?php echo $stylesheet_uri; ?>" id="Logo" alt="logo" />
    
<div id="hd">
    <h1>SP_TITLE</h1>
</div>
    -->