<div class="top-widget">
    <div class="ito-search-laguage">
        <div class="ito-search">
            <?php if (!dynamic_sidebar('search')) { ?>             
                <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
                    <input type="text" name="s" id="s" value="" size="13" />
                </form>
            <?php } ?>
        </div>
        <div class="ito-language">
            <ul><?php pll_the_languages(); ?></ul>
        </div>
    </div>
</div>