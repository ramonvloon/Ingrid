<?php
/*
  Template Name: priview work pages
 */
?>
<?php get_header(); ?>
<?php @include get_top_widget(); ?>
<?php @include get_menu_logo(); ?>

<div class="work-preview-content-slide div-shadow">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="itemhead">
                <h3><?php the_title(); ?></h3>
            </div>

            <div class="work-content-slideshow">

                <div class="work-content">                        
                    <?php the_content(); ?>
                </div>

                <div class="work-slideshow">
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
        <?php endwhile; ?>
    <?php endif; ?>


    <div class="slide-nav">
        <div class="itemhead"></div>

        <div class="slide-nav-content">
           <?php
            $page_data = get_page($_GET['page_id']);
            $page_id = $_GET['page_id'];
            $title = $page_data->post_title;
            $cat_to_check = get_term_by('cat_name', $title, 'category');

            if (!is_term($title, 'category')) {
                $category = get_the_category($page_id);
                $title = $category[0]->cat_name;
            }
            ?>

            <?php
            query_posts('category_name=' . $title . '&orderby=ID&order=ASC');
            $covers = get_slideshow_covers($title);
            $count = 0;
            ?>
            <!-- begin SlidingPanel -->
            <div id="newsTicker">
                <div id="ticker" class="SlidingPanels">
                    <?php while (have_posts()) : the_post(); ?>
                        <div id="item-<?php echo $count; ?>" class="SlidingPanelsContent">
                            <div class="content">
                                <a href="<?php the_permalink(); ?>">
                                    <img alt=""  src="<?php echo $covers[$count]; $count++ ?>" />
                                </a>  
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <a href="#" onclick="sp.showPanel('item-2'); return false;">Next</a>
            <script type="text/javascript">
                var sp = new Spry.Widget.SlidingPanels("ticker");
            </script>
            <!-- eind SlidingPanel -->
            <?php wp_reset_query(); ?>            
        </div>
        
        <div class="itemhead"></div>
    </div>
</div>
<?php get_footer(); ?>