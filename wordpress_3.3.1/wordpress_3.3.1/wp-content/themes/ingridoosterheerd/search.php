<?php get_header(); ?>
  <div id="bd" class="yui-navset">
 	<ul class="yui-nav" style="text-align:left"><?php wp_list_pages('title_li=&depth=1'); ?></ul>              
    <div id="yui-main">
        <div class="yui-b" >
			<div class="yui-g">
                        
 
        <?php if (have_posts()) : ?>
								<div class="item entry">
									<h2 class="pagetitle">Search results for &#8216;<?php the_search_query(); ?>&#8217;</h2>
								</div> 
                <?php while (have_posts()) : the_post(); ?>
<!-- item -->
                                <div class="item entry" id="post-<?php the_ID(); ?>">
                                          <div class="itemhead">
                                            <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                            <div class="chronodata"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></div>
                                          </div>
                                                  <div class="storycontent">
                                                                <?php the_excerpt(); ?>
                                                  </div>
                                          <small class="metadata">
                                                         <span class="category">Filed under: <?php the_category(', ') ?> </span> | <?php edit_post_link('Edit', '', ' | '); ?> <?php comments_popup_link('Comment (0)', ' Comment (1)', 'Comments (%)'); ?>
                                                  </small>
                                 </div>
<!-- end item -->
 
<?php comments_template(); // Get wp-comments.php template ?>
 
                <?php endwhile; ?>
 
                <div class="navigation">
                        <div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                        <div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
                        <p> </p>
                </div>
 
        <?php else : ?>
 			<div class="item entry">
                <h2 class="pagetitle">No search results</h2>
                <p class="center">We did not find any posts containing the string &#8216;<?php the_search_query(); ?>&#8217;.</p>
			</div>
 
        <?php endif; ?>
<!-- end content -->
<!-- 2nd sidebar -->
 
<!-- end 2nd sidebar -->
                        </div>
                </div>
        </div>
        <div class="yui-b" id="secondary">
 
<?php get_sidebar(); ?>
 
        </div>
  </div>
<?php get_footer(); ?>