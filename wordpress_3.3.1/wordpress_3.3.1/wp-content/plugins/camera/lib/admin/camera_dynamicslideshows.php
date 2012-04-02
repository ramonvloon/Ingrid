<?php

function camera_dynamic(){
	if ($_GET['page']=='camera_dynamic') { 
	
global $content_width, $plugindir;	
if ( ! isset( $content_width ) )
	$content_width = 920;
?>

<?php 
$cameraarray_added_slideshows = camera_get_option( 'cameraarray_'.$_GET['slideshow']); 
?>
<div id="camera_dynamic_tab">
    <div class="camera_slides_wrap">
    	<div class="camera_floating_fake"></div><!-- .camera_floating_fake -->
    	<div class="camera_floating_bg"></div><!-- .camera_floating_bg -->
        <h4 class="camera_floating"><?php echo 'Edit <strong>&ldquo;'.$_GET['slideshow'].'&rdquo;</strong> slideshow'; ?><span class="camera_save_arrow"></span><a href="#" class="glossy_button alert submitting_button" style="text-indent:0; margin:-4px 0 0 10px; vertical-align:middle">Save the changes</a></h4>

        <div class="camera_slide_sortable camera_slide_clone" style="display:none">
            <div>
                <div class="handle">
                    <div class="slide_no"></div><!-- .slide_no -->
                </div><!-- .handle -->
                <div>
                    <div class="camera_imagethumb"><img src="<?php echo $plugindir."css/images/blank.gif"; ?>" width="40"></div>
                    <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][url]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['url'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slides']['camera_slide_no_n']['url'], ENT_QUOTES)); } ?>">
                    <a href="#" class="camera_upload_image wpbutton">Add an image</a>
                </div>
                
                <div class="clear"></div>
                <a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Basic options</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][thumb]">Custom thumb:</label>
                    <div>
                        <div class="camera_imagethumb"><img src="<?php echo $plugindir."css/images/blank.gif"; ?>" width="40"></div>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][thumb]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['thumb'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_n']['thumb'], ENT_QUOTES)); } ?>">
                        <a href="#" class="camera_upload_image wpbutton">Add a thumbnail</a>
                        <small><strong>Pay attention:</strong> it's better if all the thumbnails in the slideshow have the same size<br>
                        If you select TimThumb option in &quot;Common settings&quot; you can leave this field empty, the original image will be resize, just set a the thumbnail width and height in the General settings toggle panel</small>
                    </div>
                    <br>
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][link]">Link to:</label>
                    <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][link]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['link'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_n']['link'], ENT_QUOTES)); } ?>">
                    <br><br>
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][target]">Open the link:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][target]">
                        <option value="_self"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['target']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['target']=="_self") { echo ' selected="selected"'; } ?>>in the same window</option>
                        <option value="_blank"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['target']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['target']=="_blank") { echo ' selected="selected"'; } ?>>in a new window</option>
                        <option value="box"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['target']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['target']=="box") { echo ' selected="selected"'; } ?>>in a box</option>
                    </select>
                </div><!-- .toggle_div -->
                <div class="clear"></div>
                
                <a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>More options</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][embed]">Embedded video:</label>
                    <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][embed]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['embed'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_n']['embed'], ENT_QUOTES)); } ?>">
                    <small>Paste here above an iFrame, set the width and the height to 100% to make the video fit the slideshow</small>
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][embeddisplay]">Display embedded video:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][embeddisplay]">
                        <option value="show"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['embeddisplay']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['embeddisplay']=="show") { echo ' selected="selected"'; } ?>>After the transition effect</option>
                        <option value="hide"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['embeddisplay']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['embeddisplay']=="hide") { echo ' selected="selected"'; } ?>>After clicking the slide</option>
                    </select>
                    <div class="hr"></div>
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][caption]">Caption:</label>
                    <textarea name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][caption]"><?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['html'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_n']['caption'], ENT_QUOTES)); } ?></textarea>
                    <small>You can also use HTML tags</small>
                    <br><br>  
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][captioneffect]">Caption effect:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][captioneffect]">
                        <option value="showIt"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="showIt") { echo ' selected="selected"'; } ?>>None</option>
                        <option value="fadeIn"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="fadeIn") { echo ' selected="selected"'; } ?>>Fade in</option>
                        <option value="moveFromLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="moveFromLeft") { echo ' selected="selected"'; } ?>>Move from left</option>
                        <option value="moveFromRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="moveFromRight") { echo ' selected="selected"'; } ?>>Move from right</option>
                        <option value="moveFromTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="moveFromTop") { echo ' selected="selected"'; } ?>>Move from top</option>
                        <option value="moveFromBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="moveFromBottom") { echo ' selected="selected"'; } ?>>Move from bottom</option>
                        <option value="fadeFromLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="fadeFromLeft") { echo ' selected="selected"'; } ?>>Fade from left</option>
                        <option value="fadeFromRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="fadeFromRight") { echo ' selected="selected"'; } ?>>Fade from right</option>
                        <option value="fadeFromTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="fadeFromTop") { echo ' selected="selected"'; } ?>>Fade from top</option>
                        <option value="fadeFromBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['captioneffect']=="fadeFromBottom") { echo ' selected="selected"'; } ?>>Fade from bottom</option>
                    </select>
                    <div class="hr"></div>
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][html]">Html:</label>
                    <textarea name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][html]"><?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['html'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_n']['html'], ENT_QUOTES)); } ?></textarea>
                    <br><br>  
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][htmleffect]">Html effect:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][htmleffect]">
                        <option value="none"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['htmleffect']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['htmleffect']=="none") { echo ' selected="selected"'; } ?>>None</option>
                        <option value="fadeIn"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['htmleffect']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['htmleffect']=="fadeIn") { echo ' selected="selected"'; } ?>>Fade in</option>
                    </select>
                    <br><br>  
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][htmlinclude]">Include the HTML in the transition effect:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][htmlinclude]">
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][htmlinclude]"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['htmlinclude']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['htmlinclude']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div>
                </div><!-- .toggle_div -->

                <div class="clear"></div>
                
                <a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Advanced settings</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][alignment]">Slide alignment:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][aligndefault]">
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][aligndefault]"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['aligndefault']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['aligndefault']=="true") { ?> checked="checked"<?php } ?>>
                    <small>Switch on the button above if you want to select an option here below, switch it off if you want to use the slideshow default settings</small> 
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][alignment]" class="select_alignment">
                        <option value="center"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="center") { echo ' selected="selected"'; } ?>>center</option>
                        <option value="topCenter"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="topCenter") { echo ' selected="selected"'; } ?>>topCenter</option>
                        <option value="topRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="topRight") { echo ' selected="selected"'; } ?>>topRight</option>
                        <option value="centerLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="centerLeft") { echo ' selected="selected"'; } ?>>centerLeft</option>
                        <option value="topLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="topLeft") { echo ' selected="selected"'; } ?>>topLeft</option>
                        <option value="centerRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="centerRight") { echo ' selected="selected"'; } ?>>centerRight</option>
                        <option value="bottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="bottomLeft") { echo ' selected="selected"'; } ?>>bottomLeft</option>
                        <option value="bottomCenter"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="bottomCenter") { echo ' selected="selected"'; } ?>>bottomCenter</option>
                        <option value="bottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['alignment']=="bottomRight") { echo ' selected="selected"'; } ?>>bottomRight</option>
                    </select>
                    <br><br>  
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][portrait]">Slide portrait:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][portrait]">
                        <option value="default"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['portrait']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['portrait']=="center") { echo ' selected="selected"'; } ?>>default</option>
                        <option value="true"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['portrait']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['portrait']=="yes") { echo ' selected="selected"'; } ?>>yes</option>
                        <option value="false"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['portrait']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['portrait']=="no") { echo ' selected="selected"'; } ?>>no</option>
                    </select>
                    <br><br>  
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][fx]">Slide effects:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][fx][]" multiple>
                        <option value="default"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) || (is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("default",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx']))) { echo ' selected="selected"'; } ?>>default</option>
                        <option value="random"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("random",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>random</option>
                        <option value="simpleFade"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("simpleFade",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>simpleFade</option>
                        <option value="curtainTopLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("curtainTopLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>curtainTopLeft</option>
                        <option value="curtainTopRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("curtainTopRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>curtainTopRight</option>
                        <option value="curtainBottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("curtainBottomLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>curtainBottomLeft</option>
                        <option value="curtainBottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("curtainBottomRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>curtainBottomRight</option>
                        <option value="curtainSliceLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("curtainSliceLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>curtainSliceLeft</option>
                        <option value="curtainSliceRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("curtainSliceRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>curtainSliceRight</option>
                        <option value="blindCurtainTopLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("blindCurtainTopLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopLeft</option>
                        <option value="blindCurtainTopRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("blindCurtainTopRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopRight</option>
                        <option value="blindCurtainBottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("blindCurtainBottomLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomLeft</option>
                        <option value="blindCurtainBottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("blindCurtainBottomRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomRight</option>
                        <option value="blindCurtainSliceBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("blindCurtainSliceBottom",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceBottom</option>
                        <option value="blindCurtainSliceTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("blindCurtainSliceTop",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceTop</option>
                        <option value="stampede"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("stampede",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>stampede</option>
                        <option value="mosaic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("mosaic",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>mosaic</option>
                        <option value="mosaicReverse"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("mosaicReverse",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>mosaicReverse</option>
                        <option value="mosaicRandom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("mosaicRandom",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>mosaicRandom</option>
                        <option value="mosaicSpiral"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("mosaicSpiral",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>mosaicSpiral</option>
                        <option value="mosaicSpiralReverse"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("mosaicSpiralReverse",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>mosaicSpiralReverse</option>
                        <option value="topLeftBottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("topLeftBottomRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>topLeftBottomRight</option>
                        <option value="bottomRightTopLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("bottomRightTopLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>bottomRightTopLeft</option>
                        <option value="bottomLeftTopRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("bottomLeftTopRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>bottomLeftTopRight</option>
                        <option value="topRightBottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("topRightBottomLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>topRightBottomLeft</option>
                        <option value="scrollLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("scrollLeft",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>scrollLeft</option>
                        <option value="scrollRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("scrollRight",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>scrollRight</option>
                        <option value="scrollTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("scrollTop",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>scrollTop</option>
                        <option value="scrollBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("scrollBottom",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>scrollBottom</option>
                        <option value="scrollHorz"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_n']['fx']) && in_array("scrollHorz",$cameraarray_added_slideshows_array['camera_slide_no_n']['fx'])) { echo ' selected="selected"'; } ?>>scrollHorz</option>
                    </select>
                    <br><br>
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][easing]">Slide easing:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][easing]">
                        <option value="default"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) || $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='default') { echo ' selected="selected"'; } ?>>default</option>
                        <option value="linear"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='linear') { echo ' selected="selected"'; } ?>>linear</option>
                        <option value="swing"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='swing') { echo ' selected="selected"'; } ?>>swing</option>
                        <option value="easeInQuad"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInQuad') { echo ' selected="selected"'; } ?>>easeInQuad</option>
                        <option value="easeOutQuad"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutQuad') { echo ' selected="selected"'; } ?>>easeOutQuad</option>
                        <option value="easeInOutQuad"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutQuad') { echo ' selected="selected"'; } ?>>easeInOutQuad</option>
                        <option value="easeInCubic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInCubic') { echo ' selected="selected"'; } ?>>easeInCubic</option>
                        <option value="easeOutCubic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutCubic') { echo ' selected="selected"'; } ?>>easeOutCubic</option>
                        <option value="easeInOutCubic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutCubic') { echo ' selected="selected"'; } ?>>easeInOutCubic</option>
                        <option value="easeInQuart"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInQuart') { echo ' selected="selected"'; } ?>>easeInQuart</option>
                        <option value="easeOutQuart"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutQuart') { echo ' selected="selected"'; } ?>>easeOutQuart</option>
                        <option value="easeInOutQuart"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutQuart') { echo ' selected="selected"'; } ?>>easeInOutQuart</option>
                        <option value="easeInQuint"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInQuint') { echo ' selected="selected"'; } ?>>easeInQuint</option>
                        <option value="easeOutQuint"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutQuint') { echo ' selected="selected"'; } ?>>easeOutQuint</option>
                        <option value="easeInOutQuint"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutQuint') { echo ' selected="selected"'; } ?>>easeInOutQuint</option>
                        <option value="easeInSine"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInSine') { echo ' selected="selected"'; } ?>>easeInSine</option>
                        <option value="easeOutSine"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutSine') { echo ' selected="selected"'; } ?>>easeOutSine</option>
                        <option value="easeInOutSine"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutSine') { echo ' selected="selected"'; } ?>>easeInOutSine</option>
                        <option value="easeInExpo"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInExpo') { echo ' selected="selected"'; } ?>>easeInExpo</option>
                        <option value="easeOutExpo"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutExpo') { echo ' selected="selected"'; } ?>>easeOutExpo</option>
                        <option value="easeInOutExpo"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutExpo') { echo ' selected="selected"'; } ?>>easeInOutExpo</option>
                        <option value="easeInCirc"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInCirc') { echo ' selected="selected"'; } ?>>easeInCirc</option>
                        <option value="easeOutCirc"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutCirc') { echo ' selected="selected"'; } ?>>easeOutCirc</option>
                        <option value="easeInOutCirc"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutCirc') { echo ' selected="selected"'; } ?>>easeInOutCirc</option>
                        <option value="easeInElastic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInElastic') { echo ' selected="selected"'; } ?>>easeInElastic</option>
                        <option value="easeOutElastic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutElastic') { echo ' selected="selected"'; } ?>>easeOutElastic</option>
                        <option value="easeInOutElastic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutElastic') { echo ' selected="selected"'; } ?>>easeInOutElastic</option>
                        <option value="easeInBack"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInBack') { echo ' selected="selected"'; } ?>>easeInBack</option>
                        <option value="easeOutBack"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutBack') { echo ' selected="selected"'; } ?>>easeOutBack</option>
                        <option value="easeInOutBack"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutBack') { echo ' selected="selected"'; } ?>>easeInOutBack</option>
                        <option value="easeInBounce"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInBounce') { echo ' selected="selected"'; } ?>>easeInBounce</option>
                        <option value="easeOutBounce"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeOutBounce') { echo ' selected="selected"'; } ?>>easeOutBounce</option>
                        <option value="easeInOutBounce"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_n']['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['easing']=='easeInOutBounce') { echo ' selected="selected"'; } ?>>easeInOutBounce</option>
                    </select>
                    <br><br>
                    <div class="camera_ui_slider milliseconds">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][time]">Time:
                            <small>Leave blank to use the default settings</small>
                        </label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][time]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['time']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['time']!='') { echo $cameraarray_added_slideshows_array['camera_slide_no_n']['tile']; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <br>
                    <div class="camera_ui_slider milliseconds">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][transperiod]">Transition period:
                            <small>Leave blank to use the default settings</small>
                        </label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_n][transperiod]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_n']['transperiod']) && $cameraarray_added_slideshows_array['camera_slide_no_n']['transperiod']!='') { echo $cameraarray_added_slideshows_array['camera_slide_no_n']['transperiod']; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
    
            </div><!-- .toggle_div -->
            <div class="clear"></div>

            <a href="#" class="camera_remove_slide camera_disable_pixtest wpbutton alignright">Remove this slide</a>
            <div class="clear"></div>
            </div>
        </div><!-- .camera_slide_sortable -->
        <form action="/" id="form_to_submit">
        	<div class="alignleft" style="width:49%">
            	<a href="#" class="toggle_button open"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>General settings</span></a>
                <div class="toggle_div">
                    <div class="camera_ui_slider size">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[height]">Height:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[height]" value="<?php if(isset($cameraarray_added_slideshows['height'])) { echo $cameraarray_added_slideshows['height']; } else { echo '56'; } ?>" style="float:left">
                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[heightSign]" style="width:auto; text-indent:0; float:left">
                            <option value="%"<?php if (!isset($cameraarray_added_slideshows['heightSign']) || $cameraarray_added_slideshows['heightSign']=='%') { echo ' selected="selected"'; } ?>>%</option>
                            <option value="px"<?php if (isset($cameraarray_added_slideshows['heightSign']) && $cameraarray_added_slideshows['heightSign']=='px') { echo ' selected="selected"'; } ?>>px</option>
                        </select>
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <small>(if you select the percentage sign the height will be relative to the width; the width will be the 100% of the element wrapping the slideshow itself)</small>
                    <div class="clear"></div>
    
                    <div class="camera_ui_slider size">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[minheight]">Min-height:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[minheight]" value="<?php if(isset($cameraarray_added_slideshows['minheight'])) { echo $cameraarray_added_slideshows['minheight']; } else { echo '200'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <small>(you can leave it blank; this value is the pixels of the minimal height of your slideshow, useful for adaptive layouts)</small>
                    <div class="clear"></div>
    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[portrait]">Portrait:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[portrait]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[portrait]"<?php if(isset($cameraarray_added_slideshows['portrait'])){if($cameraarray_added_slideshows['portrait']=="true") { ?> checked="checked"<?php }} ?>>
                    <div class="clear"></div><!-- .clear -->
                    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[alignment]">Alignment:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[alignment]" class="select_alignment">
                        <option value="center"<?php if ($cameraarray_added_slideshows['alignment']=="center") { echo ' selected="selected"'; } ?>></option>
                        <option value="topLeft"<?php if ($cameraarray_added_slideshows['alignment']=="topLeft") { echo ' selected="selected"'; } ?>></option>
                        <option value="topCenter"<?php if ($cameraarray_added_slideshows['alignment']=="topCenter") { echo ' selected="selected"'; } ?>></option>
                        <option value="topRight"<?php if ($cameraarray_added_slideshows['alignment']=="topRight") { echo ' selected="selected"'; } ?>></option>
                        <option value="centerLeft"<?php if ($cameraarray_added_slideshows['alignment']=="centerLeft") { echo ' selected="selected"'; } ?>></option>
                        <option value="centerRight"<?php if ($cameraarray_added_slideshows['alignment']=="centerRight") { echo ' selected="selected"'; } ?>></option>
                        <option value="bottomLeft"<?php if ($cameraarray_added_slideshows['alignment']=="bottomLeft") { echo ' selected="selected"'; } ?>></option>
                        <option value="bottomCenter"<?php if ($cameraarray_added_slideshows['alignment']=="bottomCenter") { echo ' selected="selected"'; } ?>></option>
                        <option value="bottomRight"<?php if ($cameraarray_added_slideshows['alignment']=="bottomRight") { echo ' selected="selected"'; } ?>></option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
                    
                    <div class="camera_ui_slider">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbwidth]">Thumbnail width:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbwidth]" value="<?php if(isset($cameraarray_added_slideshows['thumbwidth'])) { echo $cameraarray_added_slideshows['thumbwidth']; } else { echo '50'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <small>(only if you selected Timthumb option in &quot;Common settings&quot;)</small>
                    <div class="clear"></div>
                    
                    <div class="camera_ui_slider">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbheight]">Thumbnail height:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbheight]" value="<?php if(isset($cameraarray_added_slideshows['thumbheight'])) { echo $cameraarray_added_slideshows['thumbheight']; } else { echo '50'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <small>(only if you selected Timthumb option in &quot;Common settings&quot;)</small>
                    <div class="clear"></div>
    
                </div><!-- .toggle_div -->
                
                <div class="hr"></div>
                
            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Effects</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[fx]">Effects:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[fx][]" multiple>
                        <option value="random"<?php if (!isset($cameraarray_added_slideshows['fx']) || (is_array($cameraarray_added_slideshows['fx']) && in_array("random",$cameraarray_added_slideshows['fx']))) { echo ' selected="selected"'; } ?>>random</option>
                        <option value="simpleFade"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("simpleFade",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>simpleFade</option>
                        <option value="curtainTopLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("curtainTopLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>curtainTopLeft</option>
                        <option value="curtainTopRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("curtainTopRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>curtainTopRight</option>
                        <option value="curtainBottomLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("curtainBottomLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>curtainBottomLeft</option>
                        <option value="curtainBottomRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("curtainBottomRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>curtainBottomRight</option>
                        <option value="curtainSliceLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("curtainSliceLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>curtainSliceLeft</option>
                        <option value="curtainSliceRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("curtainSliceRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>curtainSliceRight</option>
                        <option value="blindCurtainTopLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("blindCurtainTopLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopLeft</option>
                        <option value="blindCurtainTopRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("blindCurtainTopRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopRight</option>
                        <option value="blindCurtainBottomLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("blindCurtainBottomLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomLeft</option>
                        <option value="blindCurtainBottomRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("blindCurtainBottomRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomRight</option>
                        <option value="blindCurtainSliceBottom"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("blindCurtainSliceBottom",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceBottom</option>
                        <option value="blindCurtainSliceTop"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("blindCurtainSliceTop",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceTop</option>
                        <option value="stampede"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("stampede",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>stampede</option>
                        <option value="mosaic"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("mosaic",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>mosaic</option>
                        <option value="mosaicReverse"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("mosaicReverse",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>mosaicReverse</option>
                        <option value="mosaicRandom"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("mosaicRandom",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>mosaicRandom</option>
                        <option value="mosaicSpiral"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("mosaicSpiral",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>mosaicSpiral</option>
                        <option value="mosaicSpiralReverse"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("mosaicSpiralReverse",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>mosaicSpiralReverse</option>
                        <option value="topLeftBottomRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("topLeftBottomRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>topLeftBottomRight</option>
                        <option value="bottomRightTopLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("bottomRightTopLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>bottomRightTopLeft</option>
                        <option value="bottomLeftTopRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("bottomLeftTopRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>bottomLeftTopRight</option>
                        <option value="topRightBottomLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("topRightBottomLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>topRightBottomLeft</option>
                        <option value="scrollLeft"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("scrollLeft",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>scrollLeft</option>
                        <option value="scrollRight"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("scrollRight",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>scrollRight</option>
                        <option value="scrollTop"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("scrollTop",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>scrollTop</option>
                        <option value="scrollBottom"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("scrollBottom",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>scrollBottom</option>
                        <option value="scrollHorz"<?php if (is_array($cameraarray_added_slideshows['fx']) && in_array("scrollHorz",$cameraarray_added_slideshows['fx'])) { echo ' selected="selected"'; } ?>>scrollHorz</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[easing]">Easing:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[easing]">
                        <option value="linear"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='linear') { echo ' selected="selected"'; } ?>>linear</option>
                        <option value="swing"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='swing') { echo ' selected="selected"'; } ?>>swing</option>
                        <option value="easeInQuad"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInQuad') { echo ' selected="selected"'; } ?>>easeInQuad</option>
                        <option value="easeOutQuad"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutQuad') { echo ' selected="selected"'; } ?>>easeOutQuad</option>
                        <option value="easeInOutQuad"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutQuad') { echo ' selected="selected"'; } ?>>easeInOutQuad</option>
                        <option value="easeInCubic"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInCubic') { echo ' selected="selected"'; } ?>>easeInCubic</option>
                        <option value="easeOutCubic"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutCubic') { echo ' selected="selected"'; } ?>>easeOutCubic</option>
                        <option value="easeInOutCubic"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutCubic') { echo ' selected="selected"'; } ?>>easeInOutCubic</option>
                        <option value="easeInQuart"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInQuart') { echo ' selected="selected"'; } ?>>easeInQuart</option>
                        <option value="easeOutQuart"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutQuart') { echo ' selected="selected"'; } ?>>easeOutQuart</option>
                        <option value="easeInOutQuart"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutQuart') { echo ' selected="selected"'; } ?>>easeInOutQuart</option>
                        <option value="easeInQuint"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInQuint') { echo ' selected="selected"'; } ?>>easeInQuint</option>
                        <option value="easeOutQuint"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutQuint') { echo ' selected="selected"'; } ?>>easeOutQuint</option>
                        <option value="easeInOutQuint"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutQuint') { echo ' selected="selected"'; } ?>>easeInOutQuint</option>
                        <option value="easeInSine"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInSine') { echo ' selected="selected"'; } ?>>easeInSine</option>
                        <option value="easeOutSine"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutSine') { echo ' selected="selected"'; } ?>>easeOutSine</option>
                        <option value="easeInOutSine"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutSine') { echo ' selected="selected"'; } ?>>easeInOutSine</option>
                        <option value="easeInExpo"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInExpo') { echo ' selected="selected"'; } ?>>easeInExpo</option>
                        <option value="easeOutExpo"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutExpo') { echo ' selected="selected"'; } ?>>easeOutExpo</option>
                        <option value="easeInOutExpo"<?php if (!isset($cameraarray_added_slideshows['easing']) || $cameraarray_added_slideshows['easing']=='easeInOutExpo') { echo ' selected="selected"'; } ?>>easeInOutExpo</option>
                        <option value="easeInCirc"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInCirc') { echo ' selected="selected"'; } ?>>easeInCirc</option>
                        <option value="easeOutCirc"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutCirc') { echo ' selected="selected"'; } ?>>easeOutCirc</option>
                        <option value="easeInOutCirc"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutCirc') { echo ' selected="selected"'; } ?>>easeInOutCirc</option>
                        <option value="easeInElastic"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInElastic') { echo ' selected="selected"'; } ?>>easeInElastic</option>
                        <option value="easeOutElastic"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutElastic') { echo ' selected="selected"'; } ?>>easeOutElastic</option>
                        <option value="easeInOutElastic"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutElastic') { echo ' selected="selected"'; } ?>>easeInOutElastic</option>
                        <option value="easeInBack"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInBack') { echo ' selected="selected"'; } ?>>easeInBack</option>
                        <option value="easeOutBack"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutBack') { echo ' selected="selected"'; } ?>>easeOutBack</option>
                        <option value="easeInOutBack"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutBack') { echo ' selected="selected"'; } ?>>easeInOutBack</option>
                        <option value="easeInBounce"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInBounce') { echo ' selected="selected"'; } ?>>easeInBounce</option>
                        <option value="easeOutBounce"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeOutBounce') { echo ' selected="selected"'; } ?>>easeOutBounce</option>
                        <option value="easeInOutBounce"<?php if (isset($cameraarray_added_slideshows['easing']) && $cameraarray_added_slideshows['easing']=='easeInOutBounce') { echo ' selected="selected"'; } ?>>easeInOutBounce</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
    
                    <div class="camera_ui_slider milliseconds">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[time]">Time:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[time]" value="<?php if(isset($cameraarray_added_slideshows['time'])) { echo $cameraarray_added_slideshows['time']; } else { echo '7000'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
    
                    <div class="camera_ui_slider milliseconds">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[transperiod]">Transition period:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[transperiod]" value="<?php if(isset($cameraarray_added_slideshows['transperiod'])) { echo $cameraarray_added_slideshows['transperiod']; } else { echo '1500'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[autoadvance]">Auto-advance:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[autoadvance]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[autoadvance]"<?php if(!isset($cameraarray_added_slideshows['autoadvance']) || $cameraarray_added_slideshows['autoadvance']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div><!-- .clear -->
        
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[hover]">Pause on hover:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[hover]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[hover]"<?php if(isset($cameraarray_added_slideshows['hover'])){if($cameraarray_added_slideshows['hover']=="true") { ?> checked="checked"<?php }} ?>>
                    <div class="clear"></div><!-- .clear -->
        
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[click]">Pause on click:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[click]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[click]"<?php if(isset($cameraarray_added_slideshows['click']) || $cameraarray_added_slideshows['click']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div><!-- .clear -->
                </div><!-- .toggle_div -->
                
                <div class="hr"></div>
                
            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Grid</span></a>
                <div class="toggle_div">
                    <div class="camera_ui_slider border">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[rows]">Mosaic rows:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[rows]" value="<?php if(isset($cameraarray_added_slideshows['rows'])) { echo $cameraarray_added_slideshows['rows']; } else { echo '4'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <div class="camera_ui_slider border">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[cols]">Mosaic columns:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[cols]" value="<?php if(isset($cameraarray_added_slideshows['cols'])) { echo $cameraarray_added_slideshows['cols']; } else { echo '6'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <div class="camera_ui_slider border">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[slicedrows]">Blind rows:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[slicedrows]" value="<?php if(isset($cameraarray_added_slideshows['slicedrows'])) { echo $cameraarray_added_slideshows['slicedrows']; } else { echo '8'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <div class="camera_ui_slider border">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[slicedcols]">Curtain columns:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[slicedcols]" value="<?php if(isset($cameraarray_added_slideshows['slicedcols'])) { echo $cameraarray_added_slideshows['slicedcols']; } else { echo '12'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[opacityoneffect]">Fade effect for rows and columns</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[opacityoneffect]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[opacityoneffect]"<?php if(isset($cameraarray_added_slideshows['opacityoneffect'])){if($cameraarray_added_slideshows['opacityoneffect']=="true") { ?> checked="checked"<?php }} ?>>
                    <div class="clear"></div><!-- .clear -->
                </div><!-- .toggle_div -->

				<div class="hr"></div>
                
            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Loaders</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loader]">Loader:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loader]">
                        <option value="bar"<?php if (!isset($cameraarray_added_slideshows['loader']) || $cameraarray_added_slideshows['loader']=='bar') { echo ' selected="selected"'; } ?>>bar</option>
                        <option value="pie"<?php if (isset($cameraarray_added_slideshows['loader']) && $cameraarray_added_slideshows['loader']=='pie') { echo ' selected="selected"'; } ?>>pie</option>
                        <option value="none"<?php if (isset($cameraarray_added_slideshows['loader']) && $cameraarray_added_slideshows['loader']=='none') { echo ' selected="selected"'; } ?>>none</option>
                    </select>
                    <div class="clear"></div>
                       
                    <div class="camera_ui_slider opacity">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderopacity]">Loader opacity:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderopacity]" value="<?php if(isset($cameraarray_added_slideshows['loaderopacity'])) { echo $cameraarray_added_slideshows['loaderopacity']; } else { echo '0.8'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <div class="camera_color">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderbgcolor]">Loader background color</label>
                         <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderbgcolor]" type="text" value="<?php if(isset($cameraarray_added_slideshows['loaderbgcolor'])) { echo $cameraarray_added_slideshows['loaderbgcolor']; } else { echo '#222222'; } ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                       <div class="colorpicker"></div>
                       <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <div class="clear"></div><!-- .clear -->

                    <div class="camera_color">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loadercolor]">Loader color</label>
                         <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loadercolor]" type="text" value="<?php if(isset($cameraarray_added_slideshows['loadercolor'])) { echo $cameraarray_added_slideshows['loadercolor']; } else { echo '#33ccff'; } ?>" />
                        <img src="<?php echo $plugindir; ?>css/images/color_picker_icon.png" width="30" height="33">
                       <div class="colorpicker"></div>
                       <div class="camera_color_arrow"></div>
                    </div><!-- .camera_color -->
                    <div class="clear"></div><!-- .clear -->

                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pieposition]">Pie position:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pieposition]">
                        <option value="leftTop"<?php if (isset($cameraarray_added_slideshows['pieposition']) && $cameraarray_added_slideshows['pieposition']=='leftTop') { echo ' selected="selected"'; } ?>>Left top</option>
                        <option value="rightTop"<?php if (!isset($cameraarray_added_slideshows['pieposition']) || $cameraarray_added_slideshows['pieposition']=='rightTop') { echo ' selected="selected"'; } ?>>Right top</option>
                        <option value="leftBottom"<?php if (isset($cameraarray_added_slideshows['pieposition']) && $cameraarray_added_slideshows['pieposition']=='leftBottom') { echo ' selected="selected"'; } ?>>Left bottom</option>
                        <option value="rightBottom"<?php if (isset($cameraarray_added_slideshows['pieposition']) && $cameraarray_added_slideshows['pieposition']=='rightBottom') { echo ' selected="selected"'; } ?>>Right bottom</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
                    
                    <div class="camera_ui_slider">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[piediameter]">Pie diameter:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[piediameter]" value="<?php if(isset($cameraarray_added_slideshows['piediameter'])) { echo $cameraarray_added_slideshows['piediameter']; } else { echo '50'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <div class="camera_ui_slider border">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderstroke]">Loader thickness:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderstroke]" value="<?php if(isset($cameraarray_added_slideshows['loaderstroke'])) { echo $cameraarray_added_slideshows['loaderstroke']; } else { echo '8'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                        <small>for the pie, the loader thickness must be less than a half of the pie diameter</small>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <div class="camera_ui_slider border">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderpadding]">Loader padding:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[loaderpadding]" value="<?php if(isset($cameraarray_added_slideshows['loaderpadding'])) { echo $cameraarray_added_slideshows['loaderpadding']; } else { echo '2'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[bardirection]">Bar direction:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[bardirection]">
                        <option value="leftToRight"<?php if (!isset($cameraarray_added_slideshows['bardirection']) || $cameraarray_added_slideshows['bardirection']=='leftToRight') { echo ' selected="selected"'; } ?>>Left to right</option>
                        <option value="rightToLeft"<?php if (isset($cameraarray_added_slideshows['bardirection']) && $cameraarray_added_slideshows['bardirection']=='rightToLeft') { echo ' selected="selected"'; } ?>>Right to left</option>
                        <option value="topToBottom"<?php if (isset($cameraarray_added_slideshows['bardirection']) && $cameraarray_added_slideshows['bardirection']=='topToBottom') { echo ' selected="selected"'; } ?>>Top to bottom</option>
                        <option value="bottomToTop"<?php if (isset($cameraarray_added_slideshows['bardirection']) && $cameraarray_added_slideshows['bardirection']=='bottomToTop') { echo ' selected="selected"'; } ?>>Bottom to top</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
                    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[barposition]">Bar position:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[barposition]">
                        <option value="bottom"<?php if (!isset($cameraarray_added_slideshows['barposition']) || $cameraarray_added_slideshows['barposition']=='bottom') { echo ' selected="selected"'; } ?>>Bottom</option>
                        <option value="top"<?php if (isset($cameraarray_added_slideshows['barposition']) && $cameraarray_added_slideshows['barposition']=='top') { echo ' selected="selected"'; } ?>>Top</option>
                        <option value="left"<?php if (isset($cameraarray_added_slideshows['barposition']) && $cameraarray_added_slideshows['barposition']=='left') { echo ' selected="selected"'; } ?>>Left</option>
                        <option value="right"<?php if (isset($cameraarray_added_slideshows['barposition']) && $cameraarray_added_slideshows['barposition']=='right') { echo ' selected="selected"'; } ?>>Right</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
                </div><!-- .toggle_div -->
                
                <div class="hr"></div>
                   
            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Commands &amp; skins</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[nextprev]">Display previous/next buttons</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[nextprev]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[nextprev]"<?php if(!isset($cameraarray_added_slideshows['nextprev']) || $cameraarray_added_slideshows['nextprev']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div>
                   
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[navOnHover]">Display previous/next and play/pause buttons on hover state</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[navOnHover]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[navOnHover]"<?php if(!isset($cameraarray_added_slideshows['navOnHover']) || $cameraarray_added_slideshows['navOnHover']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div>
                   
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[playpause]">Display play/pause buttons</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[playpause]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[playpause]"<?php if(!isset($cameraarray_added_slideshows['playpause']) || $cameraarray_added_slideshows['playpause']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div>
                   
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pagination]">Pagination circles:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pagination]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pagination]"<?php if(!isset($cameraarray_added_slideshows['pagination']) || $cameraarray_added_slideshows['pagination']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div>
                                   
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbs]">Display thumbnails:</label>
                    <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbs]">                        
                    <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[thumbs]"<?php if(!isset($cameraarray_added_slideshows['thumbs']) || $cameraarray_added_slideshows['thumbs']=="true") { ?> checked="checked"<?php } ?>>
                    <div class="clear"></div>
                                   
                    <label>Patterns:</label>
                    <div class="radio_labels">
                        <label>Transparent
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_transparent" <?php if(!isset($cameraarray_added_slideshows['pattern']) || $cameraarray_added_slideshows['pattern']=='pattern_transparent'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_none"></span>
                        </label>
                        <label>None
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_none" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_none'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_none"></span>
                        </label>
                        <label>1
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_1" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_1'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_one"></span>
                        </label>
                        <label>2
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_2" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_2'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_two"></span>
                        </label>
                        <label>3
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_3" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_3'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_three"></span>
                        </label>
                        <label>4
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_4" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_4'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_four"></span>
                        </label>
                        <label>5
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_5" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_5'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_five"></span>
                        </label>
                        <label>6
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_6" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_6'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_six"></span>
                        </label>
                        <label>7
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_7" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_7'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_seven"></span>
                        </label>
                        <label>8
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_8" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_8'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_eight"></span>
                        </label>
                        <label>9
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_9" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_9'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_nine"></span>
                        </label>
                        <label>10
                            <input name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[pattern]" type="radio" value="pattern_10" <?php if(isset($cameraarray_added_slideshows['pattern']) && $cameraarray_added_slideshows['pattern'] == 'pattern_10'){ echo "checked=\"checked\""; } ?>>
                            <span class="preview_pattern pattern_ten"></span>
                        </label>
                    <div class="clear"></div>
                    </div><!-- .radio_labels -->
                    
                    <div class="camera_ui_slider opacity forPattern">
                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[patternopacity]">Pattern opacity:</label>
                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[patternopacity]" value="<?php if(isset($cameraarray_added_slideshows['patternopacity'])) { echo $cameraarray_added_slideshows['patternopacity']; } else { echo '0.5'; } ?>">
                        <div class="clear"></div>
                        <div class="camera_slider_cursor"></div>
                    </div><!-- .camera_ui_slider -->
                    <div class="clear"></div>
                    
                    <label><br>You can select other things on the &quot;Common settings&quot; tab</label>
                    <div class="clear"></div>
                   
                </div><!-- .div_toggle -->
                
                <div class="hr"></div>

            	<a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Mobile</span></a>
                <div class="toggle_div">
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[mobilefx]">Effect on mobile devices:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[mobilefx][]" multiple>
                        <option value="default"<?php if (!isset($cameraarray_added_slideshows['mobilefx']) || (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("default",$cameraarray_added_slideshows['mobilefx']))) { echo ' selected="selected"'; } ?>>default</option>
                        <option value="random"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("random",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>random</option>
                        <option value="simpleFade"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("simpleFade",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>simpleFade</option>
                        <option value="curtainTopLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("curtainTopLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>curtainTopLeft</option>
                        <option value="curtainTopRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("curtainTopRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>curtainTopRight</option>
                        <option value="curtainBottomLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("curtainBottomLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>curtainBottomLeft</option>
                        <option value="curtainBottomRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("curtainBottomRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>curtainBottomRight</option>
                        <option value="curtainSliceLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("curtainSliceLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>curtainSliceLeft</option>
                        <option value="curtainSliceRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("curtainSliceRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>curtainSliceRight</option>
                        <option value="blindCurtainTopLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("blindCurtainTopLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopLeft</option>
                        <option value="blindCurtainTopRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("blindCurtainTopRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopRight</option>
                        <option value="blindCurtainBottomLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("blindCurtainBottomLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomLeft</option>
                        <option value="blindCurtainBottomRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("blindCurtainBottomRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomRight</option>
                        <option value="blindCurtainSliceBottom"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("blindCurtainSliceBottom",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceBottom</option>
                        <option value="blindCurtainSliceTop"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("blindCurtainSliceTop",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceTop</option>
                        <option value="stampede"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("stampede",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>stampede</option>
                        <option value="mosaic"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("mosaic",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>mosaic</option>
                        <option value="mosaicReverse"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("mosaicReverse",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>mosaicReverse</option>
                        <option value="mosaicRandom"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("mosaicRandom",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>mosaicRandom</option>
                        <option value="mosaicSpiral"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("mosaicSpiral",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>mosaicSpiral</option>
                        <option value="mosaicSpiralReverse"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("mosaicSpiralReverse",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>mosaicSpiralReverse</option>
                        <option value="topLeftBottomRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("topLeftBottomRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>topLeftBottomRight</option>
                        <option value="bottomRightTopLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("bottomRightTopLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>bottomRightTopLeft</option>
                        <option value="bottomLeftTopRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("bottomLeftTopRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>bottomLeftTopRight</option>
                        <option value="topRightBottomLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("topRightBottomLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>topRightBottomLeft</option>
                        <option value="scrollLeft"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("scrollLeft",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>scrollLeft</option>
                        <option value="scrollRight"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("scrollRight",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>scrollRight</option>
                        <option value="scrollTop"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("scrollTop",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>scrollTop</option>
                        <option value="scrollBottom"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("scrollBottom",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>scrollBottom</option>
                        <option value="scrollHorz"<?php if (is_array($cameraarray_added_slideshows['mobilefx']) && in_array("scrollHorz",$cameraarray_added_slideshows['mobilefx'])) { echo ' selected="selected"'; } ?>>scrollHorz</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
    
                    <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[mobileeasing]">Easing on mobile devices:</label>
                    <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[mobileeasing]">
                        <option value="default"<?php if (!isset($cameraarray_added_slideshows['mobileeasing']) || $cameraarray_added_slideshows['mobileeasing']=='default') { echo ' selected="selected"'; } ?>>default</option>
                        <option value="linear"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='linear') { echo ' selected="selected"'; } ?>>linear</option>
                        <option value="swing"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='swing') { echo ' selected="selected"'; } ?>>swing</option>
                        <option value="easeInQuad"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInQuad') { echo ' selected="selected"'; } ?>>easeInQuad</option>
                        <option value="easeOutQuad"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutQuad') { echo ' selected="selected"'; } ?>>easeOutQuad</option>
                        <option value="easeInOutQuad"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutQuad') { echo ' selected="selected"'; } ?>>easeInOutQuad</option>
                        <option value="easeInCubic"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInCubic') { echo ' selected="selected"'; } ?>>easeInCubic</option>
                        <option value="easeOutCubic"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutCubic') { echo ' selected="selected"'; } ?>>easeOutCubic</option>
                        <option value="easeInOutCubic"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutCubic') { echo ' selected="selected"'; } ?>>easeInOutCubic</option>
                        <option value="easeInQuart"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInQuart') { echo ' selected="selected"'; } ?>>easeInQuart</option>
                        <option value="easeOutQuart"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutQuart') { echo ' selected="selected"'; } ?>>easeOutQuart</option>
                        <option value="easeInOutQuart"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutQuart') { echo ' selected="selected"'; } ?>>easeInOutQuart</option>
                        <option value="easeInQuint"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInQuint') { echo ' selected="selected"'; } ?>>easeInQuint</option>
                        <option value="easeOutQuint"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutQuint') { echo ' selected="selected"'; } ?>>easeOutQuint</option>
                        <option value="easeInOutQuint"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutQuint') { echo ' selected="selected"'; } ?>>easeInOutQuint</option>
                        <option value="easeInSine"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInSine') { echo ' selected="selected"'; } ?>>easeInSine</option>
                        <option value="easeOutSine"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutSine') { echo ' selected="selected"'; } ?>>easeOutSine</option>
                        <option value="easeInOutSine"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutSine') { echo ' selected="selected"'; } ?>>easeInOutSine</option>
                        <option value="easeInExpo"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInExpo') { echo ' selected="selected"'; } ?>>easeInExpo</option>
                        <option value="easeOutExpo"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutExpo') { echo ' selected="selected"'; } ?>>easeOutExpo</option>
                        <option value="easeInOutExpo"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutExpo') { echo ' selected="selected"'; } ?>>easeInOutExpo</option>
                        <option value="easeInCirc"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInCirc') { echo ' selected="selected"'; } ?>>easeInCirc</option>
                        <option value="easeOutCirc"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutCirc') { echo ' selected="selected"'; } ?>>easeOutCirc</option>
                        <option value="easeInOutCirc"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutCirc') { echo ' selected="selected"'; } ?>>easeInOutCirc</option>
                        <option value="easeInElastic"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInElastic') { echo ' selected="selected"'; } ?>>easeInElastic</option>
                        <option value="easeOutElastic"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutElastic') { echo ' selected="selected"'; } ?>>easeOutElastic</option>
                        <option value="easeInOutElastic"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutElastic') { echo ' selected="selected"'; } ?>>easeInOutElastic</option>
                        <option value="easeInBack"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInBack') { echo ' selected="selected"'; } ?>>easeInBack</option>
                        <option value="easeOutBack"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutBack') { echo ' selected="selected"'; } ?>>easeOutBack</option>
                        <option value="easeInOutBack"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutBack') { echo ' selected="selected"'; } ?>>easeInOutBack</option>
                        <option value="easeInBounce"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInBounce') { echo ' selected="selected"'; } ?>>easeInBounce</option>
                        <option value="easeOutBounce"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeOutBounce') { echo ' selected="selected"'; } ?>>easeOutBounce</option>
                        <option value="easeInOutBounce"<?php if (isset($cameraarray_added_slideshows['mobileeasing']) && $cameraarray_added_slideshows['mobileeasing']=='easeInOutBounce') { echo ' selected="selected"'; } ?>>easeInOutBounce</option>
                    </select>
                    <div class="clear"></div><!-- .clear -->
                </div><!-- .toggle_div -->
                
                <div class="hr"></div>
                               
                
                
            </div><!-- .alignleft -->
            
            <div class="alignright" style="width:49%">
                <a href="#" class="camera_add_slide camera_disable_pixtest glossy_button water"><span></span>Add a slide</a>
                
                <div class="camera_slide_sortable_wrap">
                    <?php 
                    $i = 0;
					if(isset($cameraarray_added_slideshows['camera_slide'])){
						$cameraarray_added_slideshows_array = $cameraarray_added_slideshows['camera_slide'];
						while($i<count($cameraarray_added_slideshows_array)){
						?>
                            <div class="camera_slide_sortable">
                                <div>
                                    <div class="handle">
                                    	<div class="slide_no"><?php echo $i+1; ?></div><!-- .slide_no -->
                                    </div><!-- .handle -->
                                    <div>
                                        <div class="camera_imagethumb"><img src="<?php echo get_camera_thumb($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['url'],'thumbnail'); ?>" width="40"></div>
                                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][url]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['url'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['url'], ENT_QUOTES)); } ?>">
                                        <a href="#" class="camera_upload_image wpbutton">Add an image</a>
                                    </div>
                                    
                                    <div class="clear"></div>
                                    <a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Basic options</span></a>
                                    <div class="toggle_div">
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][thumb]">Custom thumb:</label>
                                        <div>
                                            <div class="camera_imagethumb"><img src="<?php if(!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['thumb']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['thumb']=='') { echo $plugindir."css/images/blank.gif"; } else { echo get_camera_thumb($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['thumb'],'thumbnail'); } ?>" width="40"></div>
                                            <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][thumb]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['thumb'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['thumb'], ENT_QUOTES)); } ?>">
                                            <a href="#" class="camera_upload_image wpbutton">Add a thumbnail</a>
                                            <small><strong>Pay attention:</strong> it's better if all the thumbnails in the slideshow have the same size<br>
                                            If you select TimThumb option in &quot;Common settings&quot; you can leave this field empty, the original image will be resize, just set a the thumbnail width and height in the General settings toggle panel</small>
                                        </div>
                                        <br>
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][link]">Link to:</label>
                                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][link]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['link'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['link'], ENT_QUOTES)); } ?>">
                                        <br><br>
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][target]">Open the link:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][target]">
                                            <option value="_self"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['target']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['target']=="_self") { echo ' selected="selected"'; } ?>>in the same window</option>
                                            <option value="_blank"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['target']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['target']=="_blank") { echo ' selected="selected"'; } ?>>in a new window</option>
                                            <option value="box"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['target']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['target']=="box") { echo ' selected="selected"'; } ?>>in a box</option>
                                        </select>
                                    </div><!-- .toggle_div -->
                                    <div class="clear"></div>
                                    
                                    <a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>More options</span></a>
                                    <div class="toggle_div">
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][embed]">Embedded video:</label>
                                        <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][embed]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['embed'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['embed'], ENT_QUOTES)); } ?>">
                                        <small>Paste here above an iFrame, set the width and the height to 100% to make the video fit the slideshow</small>
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][embeddisplay]">Display embedded video:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][embeddisplay]">
                                            <option value="show"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['embeddisplay']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['embeddisplay']=="show") { echo ' selected="selected"'; } ?>>After the transition effect</option>
                                            <option value="hide"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['embeddisplay']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['embeddisplay']=="hide") { echo ' selected="selected"'; } ?>>After clicking the slide</option>
                                        </select>
                                        <div class="hr"></div>
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][caption]">Caption:</label>
                                        <textarea name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][caption]"><?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['caption'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['caption'], ENT_QUOTES)); } ?></textarea>
                                        <small>You can also use HTML tags</small>
                                        <br><br>  
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][captioneffect]">Caption effect:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][captioneffect]">
                                            <option value="showIt"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="showIt") { echo ' selected="selected"'; } ?>>None</option>
                                            <option value="fadeIn"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="fadeIn") { echo ' selected="selected"'; } ?>>Fade in</option>
                                            <option value="moveFromLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="moveFromLeft") { echo ' selected="selected"'; } ?>>Move from left</option>
                                            <option value="moveFromRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="moveFromRight") { echo ' selected="selected"'; } ?>>Move from right</option>
                                            <option value="moveFromTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="moveFromTop") { echo ' selected="selected"'; } ?>>Move from top</option>
                                            <option value="moveFromBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="moveFromBottom") { echo ' selected="selected"'; } ?>>Move from bottom</option>
                                            <option value="fadeFromLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="fadeFromLeft") { echo ' selected="selected"'; } ?>>Fade from left</option>
                                            <option value="fadeFromRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="fadeFromRight") { echo ' selected="selected"'; } ?>>Fade from right</option>
                                            <option value="fadeFromTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="fadeFromTop") { echo ' selected="selected"'; } ?>>Fade from top</option>
                                            <option value="fadeFromBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['captioneffect']=="fadeFromBottom") { echo ' selected="selected"'; } ?>>Fade from bottom</option>
                                        </select>
                                        <div class="hr"></div>
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][html]">Html:</label>
                                        <textarea name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][html]"><?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['html'])) { echo stripslashes(htmlentities($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['html'], ENT_QUOTES)); } ?></textarea>
                                        <br><br>  
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][htmleffect]">Html effect:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][htmleffect]">
                                            <option value="none"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['htmleffect']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['htmleffect']=="none") { echo ' selected="selected"'; } ?>>None</option>
                                            <option value="fadeIn"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['htmleffect']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['htmleffect']=="fadeIn") { echo ' selected="selected"'; } ?>>Fade in</option>
                                        </select>
                                        <br><br>  
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][htmlinclude]">Include the HTML in the transition effect:</label>
                                        <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][htmlinclude]">
                                        <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][htmlinclude]"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['htmlinclude']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['htmlinclude']=="true") { ?> checked="checked"<?php } ?>>
                                    <div class="clear"></div>
                                    </div><!-- .toggle_div -->

                                    <div class="clear"></div>
                                    
                                    <a href="#" class="toggle_button"><span><span class="toggle_icon_open"></span><span class="toggle_icon_closed"></span>Advanced settings</span></a>
                                    <div class="toggle_div">
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][alignment]">Slide alignment:</label>

                                        <input type="hidden" value="0" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][aligndefault]">
                                        <input type="checkbox" value="true" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][aligndefault]"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['aligndefault']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['aligndefault']=="true") { ?> checked="checked"<?php } ?>>
                                        <small>Switch on the button above if you want to select an option here below, switch it off if you want to use the slideshow default settings</small> 
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][alignment]" class="select_alignment">
                                            <option value="center"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="center") { echo ' selected="selected"'; } ?>>center</option>
                                            <option value="topLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="topLeft") { echo ' selected="selected"'; } ?>>topLeft</option>
                                            <option value="topCenter"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="topCenter") { echo ' selected="selected"'; } ?>>topCenter</option>
                                            <option value="topRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="topRight") { echo ' selected="selected"'; } ?>>topRight/option>
                                            <option value="centerLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="centerLeft") { echo ' selected="selected"'; } ?>>centerLeft</option>
                                            <option value="centerRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="centerRight") { echo ' selected="selected"'; } ?>>centerRight</option>
                                            <option value="bottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="bottomLeft") { echo ' selected="selected"'; } ?>>bottomLeft</option>
                                            <option value="bottomCenter"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="bottomCenter") { echo ' selected="selected"'; } ?>>bottomCenter</option>
                                            <option value="bottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['alignment']=="bottomRight") { echo ' selected="selected"'; } ?>>bottomRight</option>
                                        </select>
                                        <br>  
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][portrait]">Slide portrait:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][portrait]">
                                            <option value="default"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['portrait']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['portrait']=="center") { echo ' selected="selected"'; } ?>>default</option>
                                            <option value="true"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['portrait']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['portrait']=="yes") { echo ' selected="selected"'; } ?>>yes</option>
                                            <option value="false"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['portrait']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['portrait']=="no") { echo ' selected="selected"'; } ?>>no</option>
                                        </select>
                                        <br><br>  
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][fx]">Slide effects:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][fx][]" multiple>
                                            <option value="default"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) || (is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("default",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']))) { echo ' selected="selected"'; } ?>>default</option>
                                            <option value="random"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("random",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>random</option>
                                            <option value="simpleFade"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("simpleFade",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>simpleFade</option>
                                            <option value="curtainTopLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("curtainTopLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>curtainTopLeft</option>
                                            <option value="curtainTopRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("curtainTopRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>curtainTopRight</option>
                                            <option value="curtainBottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("curtainBottomLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>curtainBottomLeft</option>
                                            <option value="curtainBottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("curtainBottomRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>curtainBottomRight</option>
                                            <option value="curtainSliceLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("curtainSliceLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>curtainSliceLeft</option>
                                            <option value="curtainSliceRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("curtainSliceRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>curtainSliceRight</option>
                                            <option value="blindCurtainTopLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("blindCurtainTopLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopLeft</option>
                                            <option value="blindCurtainTopRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("blindCurtainTopRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainTopRight</option>
                                            <option value="blindCurtainBottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("blindCurtainBottomLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomLeft</option>
                                            <option value="blindCurtainBottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("blindCurtainBottomRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainBottomRight</option>
                                            <option value="blindCurtainSliceBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("blindCurtainSliceBottom",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceBottom</option>
                                            <option value="blindCurtainSliceTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("blindCurtainSliceTop",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>blindCurtainSliceTop</option>
                                            <option value="stampede"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("stampede",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>stampede</option>
                                            <option value="mosaic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("mosaic",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>mosaic</option>
                                            <option value="mosaicReverse"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("mosaicReverse",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>mosaicReverse</option>
                                            <option value="mosaicRandom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("mosaicRandom",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>mosaicRandom</option>
                                            <option value="mosaicSpiral"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("mosaicSpiral",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>mosaicSpiral</option>
                                            <option value="mosaicSpiralReverse"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("mosaicSpiralReverse",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>mosaicSpiralReverse</option>
                                            <option value="topLeftBottomRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("topLeftBottomRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>topLeftBottomRight</option>
                                            <option value="bottomRightTopLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("bottomRightTopLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>bottomRightTopLeft</option>
                                            <option value="bottomLeftTopRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("bottomLeftTopRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>bottomLeftTopRight</option>
                                            <option value="topRightBottomLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("topRightBottomLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>topRightBottomLeft</option>
                                            <option value="scrollLeft"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("scrollLeft",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>scrollLeft</option>
                                            <option value="scrollRight"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("scrollRight",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>scrollRight</option>
                                            <option value="scrollTop"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("scrollTop",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>scrollTop</option>
                                            <option value="scrollBottom"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("scrollBottom",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>scrollBottom</option>
                                            <option value="scrollHorz"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && is_array($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx']) && in_array("scrollHorz",$cameraarray_added_slideshows_array['camera_slide_no_'.$i]['fx'])) { echo ' selected="selected"'; } ?>>scrollHorz</option>
                                        </select>
                                        <br><br>
                                        <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][easing]">Slide easing:</label>
                                        <select name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][easing]">
                                            <option value="default"<?php if (!isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) || $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='default') { echo ' selected="selected"'; } ?>>default</option>
                                            <option value="linear"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='linear') { echo ' selected="selected"'; } ?>>linear</option>
                                            <option value="swing"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='swing') { echo ' selected="selected"'; } ?>>swing</option>
                                            <option value="easeInQuad"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInQuad') { echo ' selected="selected"'; } ?>>easeInQuad</option>
                                            <option value="easeOutQuad"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutQuad') { echo ' selected="selected"'; } ?>>easeOutQuad</option>
                                            <option value="easeInOutQuad"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutQuad') { echo ' selected="selected"'; } ?>>easeInOutQuad</option>
                                            <option value="easeInCubic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInCubic') { echo ' selected="selected"'; } ?>>easeInCubic</option>
                                            <option value="easeOutCubic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutCubic') { echo ' selected="selected"'; } ?>>easeOutCubic</option>
                                            <option value="easeInOutCubic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutCubic') { echo ' selected="selected"'; } ?>>easeInOutCubic</option>
                                            <option value="easeInQuart"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInQuart') { echo ' selected="selected"'; } ?>>easeInQuart</option>
                                            <option value="easeOutQuart"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutQuart') { echo ' selected="selected"'; } ?>>easeOutQuart</option>
                                            <option value="easeInOutQuart"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutQuart') { echo ' selected="selected"'; } ?>>easeInOutQuart</option>
                                            <option value="easeInQuint"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInQuint') { echo ' selected="selected"'; } ?>>easeInQuint</option>
                                            <option value="easeOutQuint"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutQuint') { echo ' selected="selected"'; } ?>>easeOutQuint</option>
                                            <option value="easeInOutQuint"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutQuint') { echo ' selected="selected"'; } ?>>easeInOutQuint</option>
                                            <option value="easeInSine"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInSine') { echo ' selected="selected"'; } ?>>easeInSine</option>
                                            <option value="easeOutSine"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutSine') { echo ' selected="selected"'; } ?>>easeOutSine</option>
                                            <option value="easeInOutSine"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutSine') { echo ' selected="selected"'; } ?>>easeInOutSine</option>
                                            <option value="easeInExpo"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInExpo') { echo ' selected="selected"'; } ?>>easeInExpo</option>
                                            <option value="easeOutExpo"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutExpo') { echo ' selected="selected"'; } ?>>easeOutExpo</option>
                                            <option value="easeInOutExpo"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutExpo') { echo ' selected="selected"'; } ?>>easeInOutExpo</option>
                                            <option value="easeInCirc"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInCirc') { echo ' selected="selected"'; } ?>>easeInCirc</option>
                                            <option value="easeOutCirc"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutCirc') { echo ' selected="selected"'; } ?>>easeOutCirc</option>
                                            <option value="easeInOutCirc"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutCirc') { echo ' selected="selected"'; } ?>>easeInOutCirc</option>
                                            <option value="easeInElastic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInElastic') { echo ' selected="selected"'; } ?>>easeInElastic</option>
                                            <option value="easeOutElastic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutElastic') { echo ' selected="selected"'; } ?>>easeOutElastic</option>
                                            <option value="easeInOutElastic"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutElastic') { echo ' selected="selected"'; } ?>>easeInOutElastic</option>
                                            <option value="easeInBack"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInBack') { echo ' selected="selected"'; } ?>>easeInBack</option>
                                            <option value="easeOutBack"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutBack') { echo ' selected="selected"'; } ?>>easeOutBack</option>
                                            <option value="easeInOutBack"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutBack') { echo ' selected="selected"'; } ?>>easeInOutBack</option>
                                            <option value="easeInBounce"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInBounce') { echo ' selected="selected"'; } ?>>easeInBounce</option>
                                            <option value="easeOutBounce"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeOutBounce') { echo ' selected="selected"'; } ?>>easeOutBounce</option>
                                            <option value="easeInOutBounce"<?php if (isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['easing']=='easeInOutBounce') { echo ' selected="selected"'; } ?>>easeInOutBounce</option>
                                        </select>
                                        <br><br>
                                        <div class="camera_ui_slider milliseconds">
                                            <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][time]">Time:
                                                <small>Leave blank to use the default settings</small>
                                            </label>
                                            <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][time]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['time']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['time']!='') { echo $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['time']; } ?>">
                                            <div class="clear"></div>
                                            <div class="camera_slider_cursor"></div>
                                        </div><!-- .camera_ui_slider -->
                                        <br>
                                        <div class="camera_ui_slider milliseconds">
                                            <label for="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][transperiod]">Transition period:
                                                <small>Leave blank to use the default settings</small>
                                            </label>
                                            <input type="text" name="cameraarray_<?php echo sanitize_title($_GET['slideshow']); ?>[camera_slide][camera_slide_no_<?php echo $i; ?>][transperiod]" value="<?php if(isset($cameraarray_added_slideshows_array['camera_slide_no_'.$i]['transperiod']) && $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['transperiod']!='') { echo $cameraarray_added_slideshows_array['camera_slide_no_'.$i]['transperiod']; } ?>">
                                            <div class="clear"></div>
                                            <div class="camera_slider_cursor"></div>
                                        </div><!-- .camera_ui_slider -->
                                        <div class="clear"></div>
                    
                                    </div><!-- .toggle_div -->
                                    <div class="clear"></div>

                                    <a href="#" class="camera_remove_slide camera_disable_pixtest wpbutton alignright">Remove this slide</a>
                                    <div class="clear"></div>
                                </div>
                            </div><!-- .camera_slide_sortable -->
                            <?php 
                            $i++;
						}
                    } 
                    ?>
                </div>
            </div><!-- .alignright -->
            
                <input name="save" type="submit" value="&nbsp;" style="display:none">
                <input type="hidden" name="action" value="save">
        </form>

    </div><!-- .camera_slides_wrap --> 
</div><!-- #<?php echo sanitize_title($_GET['slideshow']); ?> -->
<?php }
	}
?>
