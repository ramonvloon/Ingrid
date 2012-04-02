<?php

function camera_manage(){
	if ($_GET['page']=='camera_manage') { 
	
global $content_width, $plugindir;	
if ( ! isset( $content_width ) )
	$content_width = 920;
?>


<div class="inner_tabs_parent">
    <h3>Manage your slideshows:</h3>
    <div class="camera_inner_tabs dyna_tabs">
		<?php 
        $camera_added_slideshows = camera_get_option( 'camera_added_slideshows' );
        foreach($camera_added_slideshows as $option => $value) {
			echo '<a href="'.get_admin_url().'admin.php?page=camera_dynamic&slideshow='.sanitize_title($value).'" class="simple_button">'.$value.'</a>';
        }
        ?>
    </div>
</div><!-- .inner_tabs_parent -->

<div id="camera_tab_source">
	<div id="camera_tab_target">
    </div><!-- #camera_tab_target -->
</div><!-- #camera_tab_source -->
	
<?php 
	}
}

?>