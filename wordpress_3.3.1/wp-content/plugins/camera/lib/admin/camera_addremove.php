<?php

function camera_addremove(){
	if ($_GET['page']=='camera_addremove') { 
	
	
	require (ABSPATH . WPINC . '/pluggable.php');
	global $current_user, $display_name;
	get_currentuserinfo();

?>


<div class="inner_tabs_parent">
    <h3>Add/remove slideshows</h3>
</div><!-- .inner_tabs_parent -->

<div id="camera_tab_source">
        <h4>Add a slideshow</h4>

        <form action="/" class="camera_refresh">
            <input name="camera_added_slideshow" id="camera_added_slideshow" type="text" value="" class="required">
            <input name="save" type="submit" value="&nbsp;" class="camera_add_submit camera_disable_pixtest camera_qtip" data-tip="Add the slideshow">
            <small>Type here above the name of your slideshow: remember, the name will be transformed in an ID, so I recommend to use latin characters only</small> 
            <?php if (is_admin() && $current_user->display_name == 'pix_test') { ?><span style="color:#d54e21; font-weight:bold">You can't add any slideshow in preview mode, sorry :-(</span><?php } ?>
            <input type="hidden" name="action" value="save">
        </form>
        
        <hr>

        <h4>Your slideshows</h4>
        <form action="/">
			<?php 
            $camera_added_slideshows = camera_get_option( 'camera_added_slideshows' );
			$i = 0;
            foreach($camera_added_slideshows as $option => $value) {
				if($i%2 == 0) {
					$eve = ' even';
				} else {
					$eve = '';
				}
				if(count($camera_added_slideshows)>1) {
					$delete = '<a href="#" class="camera_delete_icon camera_qtip" data-tip="Delete this slideshow">&nbsp;</a>';
				} else {
					$delete = '<a href="#" class="camera_delete_fake">&nbsp;</a>';
				}
				echo '<div class="camera_row'.$eve.'"><span class="counter">'.($i+1).'.</span>';
					echo '<span class="camera_slideshow_buttons"><a href="'.get_admin_url().'admin.php?page=camera_manage" class="camera_edit_icon camera_qtip" data-tip="Edit this slideshow">&nbsp;</a>'.$delete;
				if(count($camera_added_slideshows)==1) {
					echo '<div class="icon_cover"></div>';
				}
				echo '</span>';
                echo '<input type="hidden" name="camera_added_slideshows['.$i.']" value="'.$value.'">';
                echo '<input type="text" value="'.$value.'" disabled>';
				echo '</div><!-- .camera_row -->';
				$i++;
            }
            ?>
            <input type="hidden" name="action" value="save">
        </form>
</div><!-- #camera_tab_source -->
	
<?php 
	}
}

?>