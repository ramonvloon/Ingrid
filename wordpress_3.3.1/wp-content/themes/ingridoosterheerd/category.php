<?php get_header(); ?>
<?php @include get_top_widget(); ?>
<?php @include get_menu_logo(); ?>

<div class="ito-main-content-sidebar">
    <div class="ito-content div-shadow">
        <?php
        if (!is_post_type_archive()) {
            global $wp_query;
            $args = array_merge($wp_query->query, array('orderby' => 'ID', 'order' => 'ASC', 'posts_per_page' => 4));
            query_posts($args);
        }
        ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="itempage">
                    <div class="item entry" id="post-<?php the_ID(); ?>">
                        <div class="itemhead">

                            <h3><?php the_title(); ?></h3>
                        </div>
                        <div class="storycontent">                        
                            <?php the_content(); ?>
                            <div style="text-align:left">
                            <a href="<?php the_permalink(); ?>">lees meer</a> 
                            </div>
                        </div>
                    </div>                  
                </div>

                <!-- <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?> -->
                <!-- end item -->

            <?php endwhile; ?>
        <?php endif; ?>
                <div class="itemhead"></div>
        <?php wp_reset_query(); ?>
        <!-- end content -->
        <!-- 2nd sidebar -->

        <!-- end 2nd sidebar -->        
    </div>
    <div class="ito-sidebar">

        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer(); ?>