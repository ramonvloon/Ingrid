<div class="camera_meta_control">
 
    <label>Select a slideshow:</label>
        <input type="hidden" value="" />
        <select>
            <?php 
				$camera_added_slideshows = camera_get_option( 'camera_added_slideshows' );
				foreach($camera_added_slideshows as $option => $value) {
					echo '<option value="'.sanitize_title($value).'">'.$value.'</option>';
				}
            ?>

    </select>
    
    <input type="button" class="button alignright" value="Insert shortcode" />
 
</div>