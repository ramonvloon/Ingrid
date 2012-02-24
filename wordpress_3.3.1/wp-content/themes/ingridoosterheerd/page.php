<?php get_header(); ?>
<?php @include get_top_widget(); ?>
<?php @include get_menu_logo(); ?>

<div class="ito-main-content-sidebar">
    <div class="ito-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="itempage">
                    <div class="item entry" id="post-<?php the_ID(); ?>">
                        <div class="itemhead">

                            <h3><?php the_title(); ?></h3>
                        </div>
                        <div class="storycontent">                        
                            <?php the_content(); ?>                        
                            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                        </div>
                    </div>
                </div>            
                <!-- end item -->

            <?php endwhile; ?>
        <?php endif; ?>
        <div class="slideshow">
            <?php
            if (function_exists('camera_meta_slideshow')) {
                $meta_camera = get_post_custom($post->ID);
                if (isset($meta_camera['camera_meta_slideshow'])) {
                    echo camera_meta_slideshow($meta_camera['camera_meta_slideshow'][0]);
                }
            }
            ?>
        </div>        
    </div>
    <div class="ito-sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>