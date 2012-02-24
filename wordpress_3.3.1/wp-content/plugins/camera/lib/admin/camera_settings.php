<?php

function camera_settings(){
	if ($_GET['page']=='camera_settings') { 

global $plugindir;	
	
	
?>


<div class="inner_tabs_parent">
    <h3>Common settings</h3>
</div><!-- .inner_tabs_parent -->

<div id="camera_tab_source">
    	<div class="camera_floating_fake"></div><!-- .camera_floating_fake -->
    	<div class="camera_floating_bg"></div><!-- .camera_floating_bg -->
        <h4 class="camera_floating">Edit the <strong>&ldquo;Common settings&rdquo;</strong><span class="camera_save_arrow"></span><a href="#" class="glossy_button alert submitting_button" style="text-indent:0; margin:-4px 0 0 10px; vertical-align:middle">Save the changes</a></h4>

                <div class="clear"></div>

    <form action="/" id="form_to_submit">
                
                <div class="hr"></div>

                <label for="camera_support_work">Display/hide the &quot;Support my work&quot; button:</label>
                <input type="hidden" value="false" name="camera_support_work">                        
                <input type="checkbox" value="true" name="camera_support_work"<?php if(camera_get_option('camera_support_work')=="true") { ?> checked="checked"<?php } ?>>
                <small>
                    The changes, in this case, will be visible after refreshing the page
                </small>
                <div class="clear"></div><!-- .clear -->

                
                <div class="hr"></div>

            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Scripts</span></a>
                <div class="toggle_div">
                    <label for="camera_timthumb">Use TimThumb to resize your thumbnails on the fly:</label>
                    <input type="hidden" value="false" name="camera_timthumb">                        
                    <input type="checkbox" value="true" name="camera_timthumb"<?php if(camera_get_option('camera_timthumb')=="true") { ?> checked="checked"<?php } ?>>
                    <small>Here is the site of Ben Gillbanks, the developer of TimThumb: <a href="http://www.binarymoon.co.uk/projects/timthumb/" target="_blank">http://www.binarymoon.co.uk/projects/timthumb/</a>. Consider a donation please</small>
                    <div class="clear"></div><!-- .clear -->
        
                    <label for="camera_timthumb_cache">Use cache directory to resize the images with TimThumb:</label>
                    <input type="hidden" value="false" name="camera_timthumb_cache">                        
                    <input type="checkbox" value="true" name="camera_timthumb_cache"<?php if(camera_get_option('camera_timthumb_cache')=="true") { ?> checked="checked"<?php } ?>>
                    <small>
                        If you enable this field, you must set the file permissions of this folder to 777 (if you have some problems try also 755 and 644, it depends on the server): <strong>wp-content/plugins/camera/scripts/cache</strong>
                    </small>
                    <div class="clear"></div><!-- .clear -->
                    
                    <label for="camera_colorbox">Disable ColorBox plugin (if you need it):</label>
                    <input type="hidden" value="false" name="camera_colorbox">                        
                    <input type="checkbox" value="true" name="camera_colorbox"<?php if(camera_get_option('camera_colorbox')=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div><!-- .clear -->
                    
                    <label for="camera_colorbox_skin">Select a skin from the ColorBox plugin:</label>
                    <select name="camera_colorbox_skin">
                        <option value="3"<?php if (camera_get_option('camera_colorbox_skin') == 'black') { echo ' selected="selected"'; } ?>>Black</option>
                        <option value="4"<?php if (camera_get_option('camera_colorbox_skin') == 'white') { echo ' selected="selected"'; } ?>>White</option>
                        <option value="1"<?php if (camera_get_option('camera_colorbox_skin') == 'whiteonblack') { echo ' selected="selected"'; } ?>>White on black</option>
                        <option value="2"<?php if (camera_get_option('camera_colorbox_skin') == 'blackonwhite') { echo ' selected="selected"'; } ?>>Black on white</option>
                        <option value="5"<?php if (camera_get_option('camera_colorbox_skin') == 'gray') { echo ' selected="selected"'; } ?>>Gray on black</option>
                    </select>
                    <small>Here is the site of Jack L. Moore, the developer of ColorBox: <a href="http://jacklmoore.com/colorbox/" target="_blank">http://jacklmoore.com/colorbox/</a>. Consider a donation please</small>
                    <div class="clear"></div><!-- .clear -->
                    
                    <label for="camera_jquerymobile">Disable jQuery mobile plugin (if you need it):</label>
                    <input type="hidden" value="false" name="camera_jquerymobile">                        
                    <input type="checkbox" value="true" name="camera_jquerymobile"<?php if(camera_get_option('camera_jquerymobile')=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div><!-- .clear -->
            
                    <p>
                        <strong>If Camera doesn't work on your theme, maybe the theme you're using icluded jQuery in the wrong way.</strong><br>
                        You can try to move all the scripts of Camera to the footer.
                    </p>
                    
                    <label for="camera_scripts_footer">Move the scripts to the footer:</label>
                    <input type="hidden" value="false" name="camera_scripts_footer">                        
                    <input type="checkbox" value="true" name="camera_scripts_footer"<?php if(camera_get_option('camera_scripts_footer')=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div><!-- .clear -->
            
                </div><!-- .toggle_div -->
                
                <div class="hr"></div>

            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>PHP functions and database</span></a>
                <div class="toggle_div">
                    <label for="camera_metabox">Add a metabox to any...:</label>
                    <?php $post_types = get_post_types(array( 'public' => true )); ?>
                    <select name="camera_metabox[]" multiple>
                        <option value="no"<?php if (is_array(camera_get_option('camera_metabox')) && in_array("no",camera_get_option('camera_metabox'))) { echo ' selected="selected"'; } ?>>nothing</option>
                        <?php foreach ( $post_types as $post_type ) { ?>
                            <option value="<?php echo $post_type; ?>"<?php if (is_array(camera_get_option('camera_metabox')) && in_array($post_type,camera_get_option('camera_metabox'))) { echo ' selected="selected"'; } ?>><?php echo $post_type; ?></option>
                        <?php } ?>
                    </select>
                    <small>To display a meta box on the front end of your pages, posts etc., select the post types, then paste the lines of code below into your theme.<br>
                    Paste into functions.php:
                    <pre>
        if (function_exists('camera_main_ss_add')) {
          add_action('admin_init','camera_main_ss_add');
        }
                    </pre>
                    Paste into page.php, single.php etc.:
                    <pre>
        if (function_exists('camera_meta_slideshow')) {
          $meta_camera = get_post_custom( $post->ID );
          if(isset($meta_camera['camera_meta_slideshow'])){
            echo camera_meta_slideshow($meta_camera['camera_meta_slideshow'][0]);
          }
        }
                    </pre>
                    </small>
                    <div class="clear"></div><!-- .clear -->
        
                    <label for="camera_delete_table">Delete all the data from the database:</label>
                    <input type="hidden" value="false" name="camera_delete_table">                        
                    <input type="checkbox" value="true" name="camera_delete_table"<?php if(camera_get_option('camera_delete_table')=="true") { ?> checked="checked"<?php } ?>>
                    <small>
                        Even if you delete Camera from the plugin page, all the data stored in the database will be still available, so you won't lose your settings.<br>
                        But if you want to permanently delete Camera and all the data stored in your database, before deactivating and deleting the plugin switch on this field
                    </small>
                    <div class="clear"></div><!-- .clear -->

                </div><!-- .toggle_div -->
                
                <div class="hr"></div>

            	<a href="#" class="toggle_button open"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Styles</span></a>
                <div class="toggle_div">

                    <div class="camera_color">
                        <label for="camera_caption_bg">Caption background color:</label>
                        <input name="camera_caption_bg" type="text" value="<?php echo camera_get_option('camera_caption_bg'); ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                        <div class="colorpicker"></div>
                        <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <small>Type "transparent" if you don't want any bg color</small>
                    <div class="clear"></div><!-- .clear -->
                    
                    <div class="camera_color">
                        <label for="camera_caption_text">Caption text color:</label>
                        <input name="camera_caption_text" type="text" value="<?php echo camera_get_option('camera_caption_text'); ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                        <div class="colorpicker"></div>
                        <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <div class="clear"></div><!-- .clear -->
                    
                    <div class="camera_ui_slider opacity">
                        <label for="camera_caption_alpha">Caption background opacity:</label>
                        <input name="camera_caption_alpha" type="text" value="<?php echo camera_get_option('camera_caption_alpha'); ?>" />
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>

                    <hr>
                    
                    <div class="camera_color">
                        <label for="camera_commands_bg">Commands background color:</label>
                        <input name="camera_commands_bg" type="text" value="<?php echo camera_get_option('camera_commands_bg'); ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                        <div class="colorpicker"></div>
                        <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <div class="clear"></div><!-- .clear -->
                    
                    <div class="camera_ui_slider opacity">
                        <label for="camera_commands_alpha">Commands background opacity:</label>
                        <input name="camera_commands_alpha" type="text" value="<?php echo camera_get_option('camera_commands_alpha'); ?>" />
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>

                    <div class="camera_color">
                        <label for="camera_commands_active">Commands active color:</label>
                        <input name="camera_commands_active" type="text" value="<?php echo camera_get_option('camera_commands_active'); ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                        <div class="colorpicker"></div>
                        <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <div class="clear"></div><!-- .clear -->
                    
                    
                    <label for="camera_commands_icon">Select a color for the icons:</label>
                    <select name="camera_commands_icon">
                        <option value="camera_amber_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_amber_skin') { echo ' selected="selected"'; } ?>>Amber</option>
                        <option value="camera_ash_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_ash_skin') { echo ' selected="selected"'; } ?>>Ash</option>
                        <option value="camera_azure_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_azure_skin') { echo ' selected="selected"'; } ?>>Azure</option>
                        <option value="camera_beige_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_beige_skin') { echo ' selected="selected"'; } ?>>Beige</option>
                        <option value="camera_black_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_black_skin') { echo ' selected="selected"'; } ?>>Black</option>
                        <option value="camera_blue_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_blue_skin') { echo ' selected="selected"'; } ?>>Blue</option>
                        <option value="camera_brown_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_brown_skin') { echo ' selected="selected"'; } ?>>Brown</option>
                        <option value="camera_burgundy_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_burgundy_skin') { echo ' selected="selected"'; } ?>>Burgundy</option>
                        <option value="camera_charcoal_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_charcoal_skin') { echo ' selected="selected"'; } ?>>Charcoal</option>
                        <option value="camera_chocolate_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_chocolate_skin') { echo ' selected="selected"'; } ?>>Chocolate</option>
                        <option value="camera_coffee_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_coffee_skin') { echo ' selected="selected"'; } ?>>Coffee</option>
                        <option value="camera_cyan_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_cyan_skin') { echo ' selected="selected"'; } ?>>Cyan</option>
                        <option value="camera_fuchsia_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_fuchsia_skin') { echo ' selected="selected"'; } ?>>Fuchsia</option>
                        <option value="camera_gold_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_gold_skin') { echo ' selected="selected"'; } ?>>Gold</option>
                        <option value="camera_green_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_green_skin') { echo ' selected="selected"'; } ?>>Green</option>
                        <option value="camera_grey_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_grey_skin') { echo ' selected="selected"'; } ?>>Grey</option>
                        <option value="camera_indigo_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_indigo_skin') { echo ' selected="selected"'; } ?>>Indigo</option>
                        <option value="camera_khaki_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_khaki_skin') { echo ' selected="selected"'; } ?>>Khaki</option>
                        <option value="camera_lime_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_lime_skin') { echo ' selected="selected"'; } ?>>Lime</option>
                        <option value="camera_magenta_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_magenta_skin') { echo ' selected="selected"'; } ?>>Magenta</option>
                        <option value="camera_maroon_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_maroon_skin') { echo ' selected="selected"'; } ?>>Maroon</option>
                        <option value="camera_petroleum_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_petroleum_skin') { echo ' selected="selected"'; } ?>>Petroleum</option>
                        <option value="camera_olive_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_olive_skin') { echo ' selected="selected"'; } ?>>Olive</option>
                        <option value="camera_orange_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_orange_skin') { echo ' selected="selected"'; } ?>>Orange</option>
                        <option value="camera_pink_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_pink_skin') { echo ' selected="selected"'; } ?>>Pink</option>
                        <option value="camera_pistachio_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_pistachio_skin') { echo ' selected="selected"'; } ?>>Pistachio</option>
                        <option value="camera_red_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_red_skin') { echo ' selected="selected"'; } ?>>Red</option>
                        <option value="camera_tangerine_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_tangerine_skin') { echo ' selected="selected"'; } ?>>Tangerine</option>
                        <option value="camera_turquoise_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_turquoise_skin') { echo ' selected="selected"'; } ?>>Turquoise</option>
                        <option value="camera_violet_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_violet_skin') { echo ' selected="selected"'; } ?>>Violet</option>
                        <option value="camera_white_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_white_skin') { echo ' selected="selected"'; } ?>>White</option>
                        <option value="camera_yellow_skin"<?php if (camera_get_option('camera_commands_icon') == 'camera_yellow_skin') { echo ' selected="selected"'; } ?>>Yellow</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->

                    <label for="camera_commands_emboss">Emboss effect:</label>
                    <input type="hidden" value="false" name="camera_commands_emboss">                        
                    <input type="checkbox" value="camera_commands_emboss" name="camera_commands_emboss"<?php if(camera_get_option('camera_commands_emboss')=="camera_commands_emboss") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div><!-- .clear -->
        
                    <div class="camera_color">
                        <label for="camera_thumb_border">Border color of the thumbnails (hover state on pagination):</label>
                        <input name="camera_thumb_border" type="text" value="<?php echo camera_get_option('camera_thumb_border'); ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                        <div class="colorpicker"></div>
                        <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <div class="clear"></div><!-- .clear -->
                    
                    <hr>
                    
                    <label for="camera_styles">Additional CSS styles:</label>
                    <textarea name="camera_styles" id="custom_style_textarea" style="height:600px; width: 95%"><?php echo stripslashes(htmlentities(camera_get_option('camera_styles'))); ?></textarea>
                    <small>To create this code editor a use a plugin called CodeMirror, here is the official site: <a href="http://codemirror.net/" target="_blank">http://codemirror.net/</a>. Consider a donation</small>
                    <div class="clear"></div><!-- .clear -->
            

                </div><!-- .toggle_div -->
                
                <input name="save" type="submit" value="&nbsp;" style="display:none">
                <input type="hidden" name="action" value="save">
        </form>
        

    
</div><!-- #camera_tab_source -->
	
<?php 
	}
}

?>