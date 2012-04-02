<?php
/*
Plugin Name: Top Widget
Description: Top Widget
Author: Team 81
Version: 1
*/
 
function widget_topWidget($args) {
  extract($args);
  echo $before_widget;
  echo $before_title;?>TopWidget<?php echo $after_title;
  topWidget();
  echo $after_widget;
}
 
function topWidget_init()
{
  register_sidebar_widget(__('Top Widget'), 'widget_topWidget');
}
add_action("plugins_loaded", "topWidget_init");

function topWidget() {
    ?>

    <div class="top-widget">
    <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() 
        
        
        ) : ?>
        <div class="ito-search-laguage">
            <div class="ito-search">
                <?php if (!dynamic_sidebar('search')) { ?>             
                    <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
                        <input type="text" name="s" id="s" value="" size="13" />
                    </form>
                <?php } ?>
            </div>
            <div class="ito-language">
                <?php pll_the_languages(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php
}
?>