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
                    <?php
                    the_content();
                    $files = glob("C:\wamp\www\wordpress_3.3.1\wp-content\uploads\*.*");
                    ?>
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
            <p>
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
            <ul>
                <?php query_posts('category_name=' . $title . '&orderby=ID&order=ASC'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>">
                            <?php
                            /*
                              the_title(); */
//                            $upload_dir = wp_upload_dir();
//                            echo $upload_dir['path'];
                            ?>
                            <img alt=""  src="http://localhost/wordpress_3.3.1/wp-content/uploads/<?php the_title(); ?>.JPG" style="float:left; margin-top: 10px; margin-left: 50px; width:100px; height: 100px;"border="0" />

                        </a>  </li>
                </ul>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
            </p>
        </div>

        <div class="itemhead"></div>
    </div>
</div>
<?php get_footer(); ?>