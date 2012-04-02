<?php get_header(); ?>
<?php @include get_top_widget(); ?>
<?php @include get_menu_logo(); ?>

<div class="ito-main-content-sidebar">
    <div class="ito-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <!-- item -->
                <div class="itempage">
                    <div class="item entry" id="post-<?php the_ID(); ?>">
                        <div class="itemhead">
                            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                            <!-- <div class="chronodata"><?php the_time('F jS, Y') ?> <?php the_author() ?></div>-->
                        </div>
                        <div class="storycontent">
                            <?php the_content('Read more &raquo;'); ?>
                        </div>
                        <small class="metadata">
                            <span class="category">Filed under: <?php the_category(', ') ?> <? if (!is_single())
                        echo "|"; ?> <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('Comment (0)', ' Comment (1)', 'Comments (%)'); ?></span>
                            <?php if (function_exists('wp_tag_cloud')) : ?>
                                <?php the_tags('<span class="tags">Article tags: ', ', ', '</span>'); ?>
                            <?php endif; ?>
                        </small>
                    </div>
                </div>
                <!-- end item -->

                <?php comments_template(); // Get wp-comments.php template  ?>

            <?php endwhile; ?>

            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                <p> </p>
            </div>
                <div class="itemhead"></div>
        <?php else : ?>

            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>

        <?php endif; ?>
        <!-- end content -->
          
    </div>        

    <div class="ito-sidebar">

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer(); ?>