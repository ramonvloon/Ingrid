<?php if(!session_id()) session_start();

function camera_general(){ 
	if ($_GET['page']=='camera_general') { 


?>
<div id="camera_admin_wrap" class="wrap">
	<h2>
        Camera slideshow ver. <span style="color:#d54e21; font-weight:bold"><?php echo plugin_get_version(); ?></span><br>
    </h2>
    
    
    <div id="camera_admin_mainnav">
    	<div id="camera_admin_mainnav_inner">
            <ul>
                <li>
                    <a href="<?php echo get_admin_url(); ?>admin.php?page=camera_documentation" id="camera_documentation_tab" data-tip="Documentation"><span><span>&nbsp;</span></span></a>
                </li>
                <li>
                    <a href="<?php echo get_admin_url(); ?>admin.php?page=camera_settings" id="camera_general_settings_tab" data-tip="Common settings"><span><span>&nbsp;</span></span></a>
                </li>
                <li>
                    <a href="<?php echo get_admin_url(); ?>admin.php?page=camera_addremove" id="camera_addremove_slideshows_tab" data-tip="Add/remove slideshows"><span><span>&nbsp;</span></span></a>
                </li>
                <li>
                    <a href="<?php echo get_admin_url(); ?>admin.php?page=camera_manage" id="camera_manage_slideshows_tab" data-tip="Manage your slideshows"><span><span>&nbsp;</span></span></a>
                </li>
                <?php if(camera_get_option('camera_support_work')=='true'){ ?>
                <li id="support_my_work">
                    <a href="http://www.pixedelic.com/plugins/camera/donate.php" class="not_tabbed" target="_blank" data-tip="Donate, buy or follow me"><span><span>&nbsp;</span></span></a>
                </li>
                <?php } ?>
            </ul>
        </div><!-- #camera_admin_mainnav_inner -->
    </div><!-- #camera_admin_mainnav -->
    
    <div id="camera_admin_tabnav">
    	<div>
        </div>
    </div><!-- #camera_admin_tabnav -->
    
    <div id="camera_tabcontent_wrap">
    	<div id="camera_tab_loading">
        </div><!-- #camera_tab_loading -->
        <div id="camera_tab_success">
        </div><!-- #camera_tab_success -->
        <div id="camera_tab_error">
        </div><!-- #camera_tab_error -->
        <div id="camera_wrap_content">
            <div id="camera_tab_content">
            </div><!-- #camera_tab_content -->
        </div><!-- #camera_tab_content -->
    </div><!-- #camera_tabcontent_wrap -->
	
</div><!-- #camera_admin_wrap -->

<div id="camera_dialog_inputempty" style="display:none; padding:20px; text-align:center">
Sorry, the fields can't be empty
</div><!-- #camera_dialog_inputempty -->

<div id="camera_dialog_cant" style="display:none; padding:20px; text-align:center">
Sorry, this operation is disabled in preview mode
</div><!-- #camera_dialog_inputempty -->

<div id="camera_dialog_deleteslideshow" style="display:none; padding:20px; text-align:center">
Are you sure? You can't restore this slideshow once deleted
</div><!-- #pixwall_dialog_inputempty -->

<div id="camera_dialog_deletetable" style="display:none; padding:20px; text-align:center">
<strong>Pay attention:</strong> if you switch on this field, the next time you delete Camera plugin from the plugin page, you will delete also the data stored in the database, not only the files on your server
</div><!-- #camera_dialog_inputempty -->
<?php
	}
}	 

if (isset($_GET['page']) && $_GET['page']=='camera_general' && $current_user->display_name == 'pix_test') {
		
	foreach ($_POST as $key => $value) {
		$_SESSION[$key] = $value;
	}
		

} else {
	if ( isset($_REQUEST['action']) && $_REQUEST['action']=='save' ) {
		
		if(isset($_REQUEST['camera_added_slideshow'])) {
			$camera_added_slideshows = camera_get_option( 'camera_added_slideshows' );
			
			$size = sizeof($camera_added_slideshows);
		
			$added_slideshows = array(
				$size => $_REQUEST['camera_added_slideshow']
			);
			
			$result = array_merge($camera_added_slideshows, $added_slideshows);
			
			camera_update_option('camera_added_slideshows', $result);
	
		} elseif(isset($_REQUEST['camera_added_slideshows'])) {
			$camera_added_slideshows = camera_get_option( 'camera_added_slideshows' );
			$camera_added_slideshows_new = $_REQUEST['camera_added_slideshows'];
			
			$camera_added_slideshows_diff = array_diff($camera_added_slideshows,$camera_added_slideshows_new);
			
			foreach ($camera_added_slideshows_diff as $option => $value) {
				camera_delete_option ('cameraarray_'.sanitize_title($value));
			}
			
			foreach ($options as $value) {
				if(isset($_REQUEST[$value['id']])) {
					camera_update_option($value['id'], $_REQUEST[$value['id']]);
				}
			}
	
		} else {
			
			foreach ($_POST as $key => $value) {
				if ( preg_match("/cameraarray/", $key) ) {
					camera_delete_option($key);
					if(!camera_get_option($key)) {
						camera_add_option($key, $value);
					} else {
						camera_update_option($key, $value);
					}
				}
			}
			
			foreach ($options as $value) {
				if(isset($_REQUEST[$value['id']])) {
					camera_update_option($value['id'], $_REQUEST[$value['id']]);
				}
			}
		}
		
	}
}

?>