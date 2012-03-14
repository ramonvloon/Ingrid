<?php if (is_sidebar_active('top_widget_area')) : ?>           
    <div class="top-widget">
        <div class="ito-search-language">
            <div class="ito-search">
                <?php
                if (dynamic_sidebar('top_widget_area')) {
                    if (is_active_widget('polylang')) {
                        echo "hoi";
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--    <div id="top" class="widget-area">            
        <ul class="xoxo">                
<?php dynamic_sidebar('top_widget_area'); ?>            
        </ul>
    </div> #secondary .widget-area -->