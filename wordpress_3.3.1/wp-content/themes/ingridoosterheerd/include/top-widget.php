<?php if (is_sidebar_active('top_widget_area')) : ?>           
    <div class="top-widget">
        <div class="ito-search-language">
            <div class="ito-search">
                <?php if (is_widget_active('top_widget_area', 'search')) : ?>
                    <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
                        <input type="text" name="s" id="s" value="" size="13" />
                    </form>
                <?php endif; ?>

                <?php
                if (is_widget_active('top_widget_area', 'polylang')) {
                    the_language_menu(array('display_names_as' => 'slug'));
                }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>