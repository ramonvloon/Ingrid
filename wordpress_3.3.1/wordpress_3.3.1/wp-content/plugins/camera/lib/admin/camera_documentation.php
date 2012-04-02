<?php

function camera_documentation(){
	if ($_GET['page']=='camera_documentation') { 
	
	
?>


<div class="inner_tabs_parent">
    <h3>Documentation</h3>
</div><!-- .inner_tabs_parent -->

<div id="camera_tab_source">

	<span class="camera_documentation_panel">
    
    	<div class="documentation_back_top">
        	<div>
                <a href="#wpwrap">Back to top</a>
            </div>
        </div>
    
        <div class="alignright documentation_floating_wrap" style="width:30%">
            <div class="documentation_floating_menu">
                <ul>
                    <li>
                        <a href="#doc_requirements">Requirements</a>
                        <ul>
                            <li><a href="#doc_recommendation">Recommendations</a></li>
                            <li><a href="#doc_validation">Validation code</a></li>
                            <li><a href="#doc_system_reqs">System requirements</a></li>
                            <li><a href="#doc_abouttimthumb">About TimThumb</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#doc_commonsettings">Common settings</a>
                        <ul>
                            <li><a href="#doc_timthumb">TimThumb</a></li>
                            <li><a href="#doc_otherscripts">The other scripts</a></li>
                            <li><a href="#doc_scriptsfooter">Scripts to the footer</a></li>
                            <li><a href="#doc_customstyles">Custom CSS styles</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#doc_addremoveslideshow">Add and remove slideshows</a>
                    </li>
                    <li>
                        <a href="#doc_manageslideshowsi">Manage your slideshows (part I)</a>
                        <ul>
                            <li><a href="#doc_generalsettings">General settings</a></li>
                            <li><a href="#doc_generaleffects">Effects</a></li>
                            <li><a href="#doc_grid">Grid</a></li>
                            <li><a href="#doc_loaders">Loaders</a></li>
                            <li><a href="#doc_commandskins">Commands and skins</a></li>
                            <li><a href="#doc_mobile">Mobile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#doc_manageslideshowsii">Manage your slideshows (part II)</a>
                        <ul>
                            <li><a href="#doc_slidebasicoptions">Basic options</a></li>
                            <li><a href="#doc_slidemoreoptions">More options</a></li>
                            <li><a href="#doc_slideadvancedsettings">Advanced settings</a></li>
                       </ul>
                    </li>
                    <li>
                        <a href="#doc_useit">How to use it</a>
                    </li>
                </ul>
            </div>
        </div><!-- .alignright -->
    
   
    	<div class="alignleft" style="width:69%">
        	<div>
                <p><em>Hi there, thank you for downloading Camera... and excuse me for my bad english :-)</em> <strong>__Manuel</strong></p>
                
                <div class="clear"></div>
                
                <h2 id="doc_requirements">Requirements</h2>
                
                <h4 id="doc_recommendation">Recommendations</h4>
                <p>Camera can be used for simple slideshows but also for powerful slideshows, with many effects, <a href="http://www.binarymoon.co.uk/projects/timthumb/" target="_blank">TimThumb</a>, large slideshows, videos... Many effects means many resources, for instance: using grid transitions with the fade effect on large slideshows can slow the performances dramatically.</p> 
                <p>So <strong>my recommendation</strong> is: try to use the right amount of effects to not compromise the user experience.</p>
                
                <h4 id="doc_validation">Validation code</h4>
                <p>Camera is written and validate in <strong>HTML5</strong>. I can't validate it by using something else because Camera needs the data custom attributes, available for HTML5 only.</p>
                
                <h4 id="doc_system_reqs">System requirements</h4>
                <p>Camera requires</p>
                <ul>
                    <li>Wordpress 3+</li>
                    <li>PHP 5.2+</li>
                    <li>jQuery 1.4+</li>
                </ul>
                
                <h4 id="doc_abouttimthumb">....about TimThumb</h4>
                <p>I'm not the developer of <a href="http://www.binarymoon.co.uk/projects/timthumb/" target="_blank">TimThumb</a>, I only tried to integrate it into this plugin. TimThumb is a PHP script to resize the images on the fly. By using it you can run all the risks deriving from the use of this kind of scripts. If your server allows that I recommend to use the &quot;no-cache&quot; version, more safe. Otherwise use the &quot;cache&quot; version and remember to set the file permissions of this folder:</p>
        <blockquote>
            <strong>wp-content / plugins / camera / scripts / cache</strong>
        </blockquote>
                <p>to 777. If nevertheless TimThumb gives you problems, try to set the file permissions to 755 or 644.</p>
                <p>Be sure that your WordPress address (URL) is the same URL you can read on the address bar of your browser. Maybe you typed in Settings -> General your site address including the <strong>&quot;www&quot;</strong>, but your server redirects the user to a link without &quot;www&quot;. In this case TimThumb returns an error because it thinks that you are trying to resize images from another site.</p>
                <p>If you can't fix the problem by yourself, contact your provider: maybe they set some blocks for this kind of scripts.</p>
                <p>TimThumb is not indispensable, you can upload images and thumbnails of the right size instead of resizing them on the fly. So, if you prefer, just disable it.</p>
                                                               
                <h4 id="doc_timthumb">Timbthumb</h4>
                <p>I already talked about TimThumb question <a href="#doc_abouttimthumb">here above</a>. In this case you can decide to use on not to use TimThumb, depending on your server settings, your cares about the safety, your preferences.</p>
                <p>Once decided you want to use TimThumb, the next step is to decide to use the <strong>&quot;cache&quot;</strong> directory or not. If you don't want to use the cache directory, then TimThumb will use the server temp directory. This is not always usable (based upon server configurations) so the cache directory may sometimes be required.<p>
                
                <h4 id="doc_otherscripts">The other scripts</h4>
                <p>You can also disable ColorBox by Jack L. Moore (<a href="http://jacklmoore.com/colorbox/">http://jacklmoore.com/colorbox/</a>) and the customized version of jQuery Mobile, if these plugins generate any conflict with somethict else.</p> 
                
                <h4 id="doc_scriptsfooter">Move the scripts to the footer</h4>
                <p>Maybe the theme you are using or some other plugins could include the jQuery library in a wrong way, or they use an old version. This could generate a conflict and Camera couldn't work.<br>
                You can try to fix this problem by loading all the scripts of Camera (including a recent version of jQuery) on the footer of your theme. Just switch on this field.<p>
                
                <h4 id="doc_customstyles">Custom CSS styles</h4>
                <p>Of course I can't foresee any particular case. I wrote some CSS code, but sometimes the settings of a Wordpress theme can overwrite these values. So in some cases you probably must adjust the styles.</p>
                <p>All the slideshows have got an ID. If you called your slideshow <strong>My Slideshow</strong>, for instance, its ID will be <strong>camera_my-slideshow</strong>. With the use of the inspector tool on any browser, you can easily know what element you must change. On Chrome, Safari and Opera: right click of the mouse and then "Inspect element". On Firefox: use FireBug. On IE: press F12.</p>
                
                <h2 id="doc_addremoveslideshow">Add and remove slideshows</h2>
                <p>It's the third tab. Here you can add your slideshow. The first slideshow is created once Camera is installed. You can delete it, but remember: you can't delete all your slideshows, there must be at least one slideshow.</p> 
                <p>When you decide the name of your slideshow remember: the name will be transformed in an ID, so I recommend to use latin characters only.</p>
                <p>To edit your slideshow click the &quot;pencil&quot; icon or go to the next tab: &quot;Manage your slideshows&quot;</p>
                               
                <h2 id="doc_manageslideshowsi">Manage your slideshows (part I)</h2>
                <p>This is the fourth tab, this panel contains other tabs, one for each slideshow you created.</p>
                <h4 id="doc_generalsettings">General settings</h4>
                
                <div style="padding-left:20px">
                    <h5>Height and min-height</h5>
                    <p>Here you can decide the height and the minimal height of your slideshow. The height could be relative (a percentage) or fixed (in pixels). The width will be the 100% of the element wrapping the slideshow itself.</p>
                    
                    <h5>Portrait</h5>
                    <p>If this switch is on, the images won't be cropped, but you'll see empty spaces around the image itself (vertical spaces if the image is vertically oriented, otherwise horizontal). I don't recommend to use grid transition effects in this case, 'cause they will generate weird effects. It's better to use the simply fade effect or the scrolling effects.</p>

                    <h5>Alignment</h5>
                    <p>Click on the grid to align the position of your images with the container.</p>

                    <h5>Thumbnails width and height</h5>
                    <p>If you decided to use TimThumb, here you can decide the size of the thumbnails of your slideshows. In this case the thumbnail will be the original image you used as main image, but resized by TimThumb.</p>
                    <p>The sizes you type here will be use to position the container of the thumbnails too.</p>
                    <p>But remember, if you set to display the thumbnails and the script doesn't find any thumbnail in the apposite field, it will use the main slide image, with its original sizes.</p>
               </div><!-- padding-left:20px -->
               
               <h4 id="doc_generaleffects">Effects</h4>
                <div style="padding-left:20px">
                    <h5>Effects</h5>
                    <p>Here you can decide the effect of your slideshow. You can also select many effects, just click the left button of your mouse by keeping pressed CMD on Macs and CTRL on PCs.</p>
                    <p><strong>N.B.:</strong> if you select &quot;random&quot; it will overwrite any other selection.</p>
                    
                    <h5>Easing</h5>
                    <p>Here you can see a demo of what the easing effects are: <a href="http://jqueryui.com/demos/effect/easing.html" target="_blank">http://jqueryui.com/demos/effect/easing.html</a>. They give a particular control on how an animation progresses over time by manipulating its acceleration.</p>
                    
                    <h5>Time</h5>
                    <p>The period, in milliseconds, between the end of a transition effect and the start of the next one.</p>
                    
                    <h5>Transition period</h5>
                    <p>The period, in milliseconds, of the transition effect.</p>
                    
                    <h5>Auto-advance</h5>
                    <p>By switching off this button, to start your animation the user must click the play button.</p>
                    
                    <h5>Pause on hover</h5>
                    <p>By switching this button on, any time the user passes with the mouse over the slideshow, it stops.</p>
                    
                    <h5>Pause on click</h5>
                    <p>By switching this button on, any time the user clicks something in the slideshow, it stops.</p>
                </div><!-- padding-left:20px -->
               
                <h4 id="doc_grid">Grid</h4>
                <div style="padding-left:20px">
                    <h5>Mosaic rows</h5>
                    <p>The number of horizontal rows the mosaic effects are devided in.<br>
                    <strong>N.B.:</strong> more rows means more calculations, and that could slow down performance.</p>
                    
                    <h5>Mosaic columns</h5>
                    <p>The number of vertical columns the mosaic effects are devided in.<br>
                    <strong>N.B.:</strong> more columns means more calculations, and that could slow down performance.</p>
                    
                    <h5>Blind rows</h5>
                    <p>The number of horizontal rows the blind effects are devided in.<br>
                    <strong>N.B.:</strong> more columns means more calculations, and that could slow down performance.</p>
                    
                    <h5>Curtain columns</h5>
                    <p>The number of vertical columns the curtain effects are devided in.<br>
                    <strong>N.B.:</strong> more columns means more calculations, and that could slow down performance.</p>
                    
                    <h5>Fade effect for rows and columns</h5>
                    <p>In addition to the mosaic, the blind and the curtain effects, you can have a fade effect. Just switch this button on. Of course this effect requires additional resources, and it is not recommended in case of a large number of rows and columns.</p>
                </div><!-- padding-left:20px -->
               
               <h4 id="doc_loaders">Loaders</h4>
                <div style="padding-left:20px">
                    <h5>Loader</h5>
                    <p>In this section you can decide if display a pie loader, a bar loader or nothing at all.</p>
                    
                    <h5>Loader opacity</h5>
                    <p>With a useful slider you can decide the opacity of your loader, both the pie and the bar.</p>
                    
                    <h5>Loader background color</h5>
                    <p>You can type in this field your loader background color or select it by a useful color picker. To open the color picker, click the palette icon.</p>
                    
                    <h5>Loader color</h5>
                    <p>You can type into this field your loader color or select it by a useful color picker. To open the color picker, click the palette icon.</p>
                    
                    <h5>Pie position</h5>
                    <p>If you display the pie loader, you can decide the corner where to position it.</p>
                    
                    <h5>Pie diameter</h5>
                    <p>I don't think you need more explanations :-)</p>
                    
                    <h5>Loader thickness</h5>
                    <p>Here you decide the thickness both of the pie loader and of the bar loader.<br>
                    Remember: for the pie, the loader thickness must be less than a half of the pie diameter.</p>
                    
                    <h5>Loader padding</h5>
                    <p>Decide how many empty pixels you want to display between the loader and its background.</p>
                    
                    <h5>Bar direction</h5>
                    <p>I don't think you need more explanations :-)</p>
                    
                    <h5>Bar position</h5>
                    <p>Once again, I don't think you need more explanations :-)</p>
                </div><!-- padding-left:20px -->
               
                <h4 id="doc_commandskins">Commands and skins</h4>
                <p>I don't think it is useful to repeat all the switches available in this section, the labels above them and the small descriptions below are enough explanatory.<br>
                But I think it's better to explain something about the patterns.</p>
                <div style="padding-left:20px">
                    <h5>Patterns</h5>
                    <p>The pattern is, in this case, an overlay that covers the main images of your slideshow. They can serve to make the slides less pixelated.<br>
                    But they also serve to prevent the user to easily grab the images by clicking the right button of the mouse. Of course, an expert user can grab the images of your site in other ways. This is the web. So this is the difference between the option &quot;Transparent&quot; and the option &quot;None&quot;: if you select the option <strong>&quot;Transparent&quot;</strong> as pattern, you will have a transparent overlay for your images, preventing the right click. If you select <strong>&quot;None&quot;</strong> you won't have any prevention.</p>
                </div><!-- padding-left:20px -->
               
                <h4 id="doc_mobile">Mobile</h4>
                <p>Camera also tries to be as more compatible as possible with mobile devices. In facts the "swipe" event is enabled and you can navigate the slides also by swiping them.</p>
                <p>But maybe you prefer to have simpler effects on mobile devices. So you can decide to use a simple transition effect or a simple easing in this case.</p>

                <h2 id="doc_manageslideshowsii">Manage your slideshows (part II)</h2>
                <p>On the right column, in this section, you can add your slides by clickig the "Add a slide" button.</p>
                <p>After adding a slide you can start customizing it.</p>
                
                <h4 id="doc_slidebasicoptions">Basic options</h4>
                <p>Even if not included in the basic option toggle button, the first field, that is "Add an image", is the very basic option. Here you can add the main image to your slide. You can upload it or select it from the media library by using the normal Wordpress media box.<br>
                <strong>N.B.: after selecting the image, click the &quot;File URL&quot; button <img src="<?php global $plugindir; echo $plugindir; ?>css/images/file_button.png" style="vertical-align:middle;">, otherwise the image won't be add.</strong></p>
                <div style="padding-left:20px">
                    <h5>Custom thumb</h5>
                    <p>It's better if all the thumbnails in the slideshow have the same size. If you leave this field blank and you selected to use TimThumb, the thumbnail will be the main image resized.<br>
                    <strong>N.B.: after selecting the image, click the &quot;File URL&quot; button <img src="<?php global $plugindir; echo $plugindir; ?>css/images/file_button.png" style="vertical-align:middle;">, otherwise the image won't be add.</strong></p>

                    <h5>Link to</h5>
                    <p>Paste here, if you want, the URL to reach by clicking the slide. It's could be, of course, the enlarged image itself.</p>

                    <h5>Open the link</h5>
                    <p>Decide if display the link in a box (only if you activated the ColorBox option), in a new page or in the same page.</p>
                </div><!-- padding-left:20px -->
                
                <h4 id="doc_slidemoreoptions">More options</h4>
                <div style="padding-left:20px">
                    <h5>Embedded video</h5>
                    <p>Here you must type the iframe you can get from YouTube, Vimeo, DailyMotion etc.</p>
                    
                    <h5>Display embedded video</h5>
                    <p>The iframe will be shown after the transition effect. The transition effect, in facts, can't be applied to an iframe (except for the the scroll effect). You can decide to display the iframe immediately after the transition, or by clicking the slide once.</p>
                    
                    <h5>Caption</h5>
                    <p>Camera supports captions too. You can edit it by using the custom CSS panel and the inspector tool on any browser (on Chrome, Safari and Opera: right click of the mouse and then "Inspect element"; on Firefox: use FireBug; on IE: press F12).</p>
                    
                    <h5>Caption effect</h5>
                    <p>You can also decide how the caption must appear.</p>
                    
                    <h5>HTML</h5>
                    <p>You can also add some html elements. Remember to position them absolutely (not for newbies).</p>
                    
                    <h5>HTML effect</h5>
                    <p>You can also decide how the html elements must appear.</p>
                    
                    <h5>Include the HTML in the transition effect</h5>
                    <p>If switched off, the html elements will be displayed beneath the overlay pattern. They will appear according to the &quot;HTML effect&quot; previously selected and they will disappear with the slide itself.</p>
                    <p>If switched on,  the html elements will be displayed beneath the overlay pattern. They will appear according to the &quot;HTML effect&quot; previously selected and they will disappear by fading out before the transition effect.</p>
                </div><!-- padding-left:20px -->
                
                <h4 id="doc_slideadvancedsettings">Advanced settings</h4>
                <p>Any slide could be customized. You can change its:</p>
                <ul>
                	<li>alignment (after switching it on)</li>
                    <li>if you want to display it in the portrait mode</li>
                    <li>its effect</li>
                    <li>the easing</li>
                    <li>the milliseconds before the next transition effect</li>
                    <li>the milliseconds of the transition effect (on entering)</li>
                </ul>

                <h2 id="doc_useit">How to use it</h2>
                <p>Just add it to your post/page by using the button in the tinymce editor. After clicking it select the slideshow you want to use. Enjoy it.</p>

            </div>
    	</div><!-- .alignleft -->
    </span><!-- .camera_documentation_panel -->    

    
</div><!-- #camera_tab_source -->
	
<?php 
	}
}

?>