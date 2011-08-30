<?php
/*
Plugin Name: Flickr + Highslide
Plugin URI: http://flickrhighslide.com
Description: This plugin displays flickr photos using highslide.
Version: 1.4
Author: Pim Linders
Author URI: http://www.pimlinders.com
 ____                       
/\  _`\   __                
\ \ \L\ \/\_\    ___ ___    
 \ \ ,__/\/\ \ /' __` __`\  
  \ \ \/  \ \ \/\ \/\ \/\ \ 
   \ \_\   \ \_\ \_\ \_\ \_\
    \/_/    \/_/\/_/\/_/\/_/                                                       
 __                       __                         
/\ \       __            /\ \                        
\ \ \     /\_\    ___    \_\ \     __   _ __   ____  
 \ \ \  __\/\ \ /' _ `\  /'_` \  /'__`\/\`'__\/',__\ 
  \ \ \L\ \\ \ \/\ \/\ \/\ \L\ \/\  __/\ \ \//\__, `\
   \ \____/ \ \_\ \_\ \_\ \___,_\ \____\\ \_\\/\____/
    \/___/   \/_/\/_/\/_/\/__,_ /\/____/ \/_/ \/___/ 
                                                                                                                                                                                                      
Copyright 2009  Pim Linders

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

** Please note **

Highslide JS is licensed under a Creative Commons Attribution-NonCommercial
2.5 License. This means you need the author's permission to use highslide 
http://www.highslide.com/ on commercial websites. 
*/
function flickr_highslide_menu() {
  add_options_page('Flickr + Highslide Options', 'Flickr + Highslide', 8, __FILE__, 'flickr_highslide_options');
}
function flickr_highslide_head() {	
	$plugindir = get_bloginfo('wpurl').'/wp-content/plugins/'.dirname(plugin_basename(__FILE__));
	echo "<script type='text/javascript' src='$plugindir/highslide/highslide-with-gallery.packed.js'></script>\n";
	echo "<script type='text/javascript'>hs.graphicsDir = '$plugindir/highslide/graphics/'; hs.showCredits = false;</script>\n";
	echo "<script type='text/javascript'>";
	$options = get_option('options');
	if ($options == '1'){
		echo "hs.wrapperClassName = 'wide-border';";
	}
	else if ($options == '2'){
		echo "
			hs.registerOverlay({
				html: '<div class=\"closebutton\" onclick=\"return hs.close(this)\" title=\"Close\"></div>',
				position: 'top right',
				fade: 2
			});
			hs.wrapperClassName = 'borderless';
		";
	}
	else if ($options == '3'){
		echo "hs.outlineType = 'rounded-white';";
	}
	else if ($options == '4'){
		echo "
			hs.outlineType = 'outer-glow';
			hs.wrapperClassName = 'outer-glow';
		";
	}
	else if ($options == '5'){
		echo "
			hs.outlineType = null;
			hs.wrapperClassName = 'colored-border'
		;";
	}
	else if ($options == '6'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.outlineType = 'rounded-white';
			hs.fadeInOut = true;
			hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				fixedControls: 'fit',
				overlayOptions: {
					opacity: .75,
					position: 'bottom center',
					hideOnMouseOut: true
				}
			});
		";
	}
	else if ($options == '7'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.outlineType = 'glossy-dark';
			hs.wrapperClassName = 'dark';
			hs.fadeInOut = true;
			if (hs.addSlideshow) hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				fixedControls: 'fit',
				overlayOptions: {
					opacity: .6,
					position: 'bottom center',
					hideOnMouseOut: true
				}
			});
		";
	}
	else if ($options == '8'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.outlineType = 'rounded-white';
			hs.wrapperClassName = 'controls-in-heading';
			hs.fadeInOut = true;
			if (hs.addSlideshow) hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				fixedControls: false,
				overlayOptions: {
					opacity: 1,
					position: 'top right',
					hideOnMouseOut: false
				}
			});
		";
	}
	else if ($options == '9'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.wrapperClassName = 'dark borderless floating-caption';
			hs.fadeInOut = true;
			hs.dimmingOpacity = .75;
			if (hs.addSlideshow) hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				fixedControls: 'fit',
				overlayOptions: {
					opacity: .6,
					position: 'bottom center',
					hideOnMouseOut: true
				}
			});
		";
	}
	else if ($options == '10'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.outlineType = 'rounded-white';
			hs.fadeInOut = true;
			hs.dimmingOpacity = 0.75;
			hs.useBox = true;
			hs.width = 640;
			hs.height = 480;
			hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				fixedControls: 'fit',
				overlayOptions: {
					opacity: 1,
					position: 'bottom center',
					hideOnMouseOut: true
				}
			});
		";
	}
	else if ($options == '11'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.fadeInOut = true;
			hs.dimmingOpacity = 0.8;
			hs.wrapperClassName = 'borderless floating-caption';
			hs.captionEval = 'this.thumb.alt';
			hs.marginLeft = 100; 
			hs.marginBottom = 80
			hs.numberPosition = 'caption';
			hs.lang.number = '%1/%2';
			hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				overlayOptions: {
					className: 'text-controls',
					position: 'bottom center',
					relativeTo: 'viewport',
					offsetX: 50,
					offsetY: -5
				},
				thumbstrip: {
					position: 'middle left',
					mode: 'vertical',
					relativeTo: 'viewport'
				}
			});
			hs.registerOverlay({
				html: '<div class=\"closebutton\" onclick=\"return hs.close(this\)\" title=\"Close\"></div>',
				position: 'top right',
				fade: 2
			});
		";
	}
	else if ($options == '12'){
		echo "
			hs.align = 'center';
			hs.transitions = ['expand', 'crossfade'];
			hs.fadeInOut = true;
			hs.dimmingOpacity = 0.8;
			hs.outlineType = 'rounded-white';
			hs.captionEval = 'this.thumb.alt';
			hs.marginBottom = 105;
			hs.numberPosition = 'caption';
			hs.addSlideshow({
				interval: 5000,
				repeat: false,
				useControls: true,
				overlayOptions: {
					className: 'text-controls',
					position: 'bottom center',
					relativeTo: 'viewport',
					offsetY: -60
				},
				thumbstrip: {
					position: 'bottom center',
					mode: 'horizontal',
					relativeTo: 'viewport'
				}
			});
		";
	}
	else if ($options == '13'){
		echo "
			hs.transitions = ['expand', 'crossfade'];
			hs.restoreCursor = null;
			hs.lang.restoreTitle = 'Click for next image';
			hs.addSlideshow({
				interval: 5000,
				repeat: true,
				useControls: true,
				overlayOptions: {
					position: 'bottom right',
					offsetY: 50
				},
				thumbstrip: {
					position: 'above',
					mode: 'horizontal',
					relativeTo: 'expander'
				}
			});
			var inPageOptions = {
				outlineType: null,
				allowSizeReduction: false,
				wrapperClassName: 'in-page controls-in-heading',
				useBox: true,
				width: 600,
				height: 400,
				targetX: 'gallery-area 10px',
				targetY: 'gallery-area',
				captionEval: 'this.thumb.alt',
				numberPosition: 'caption'
			}
			hs.addEventListener(window, 'load', function() {
				document.getElementById('thumb1').onclick();
			});
			hs.Expander.prototype.onImageClick = function() {
				if (/in-page/.test(this.wrapper.className))	return hs.next();
			}
			hs.Expander.prototype.onBeforeClose = function() {
				if (/in-page/.test(this.wrapper.className))	return false;
			}
			hs.Expander.prototype.onDrag = function() {
				if (/in-page/.test(this.wrapper.className))	return false;
			}
			hs.addEventListener(window, 'resize', function() {
				var i, exp;
				hs.page = hs.getPageSize();
		
				for (i = 0; i < hs.expanders.length; i++) {
					exp = hs.expanders[i];
					if (exp) {
						var x = exp.x,
							y = exp.y;
						exp.tpos = hs.getPosition(exp.el);
						x.calcThumb();
						y.calcThumb();
						x.pos = x.tpos - x.cb + x.tb;
						x.scroll = hs.page.scrollLeft;
						x.clientSize = hs.page.width;
						y.pos = y.tpos - y.cb + y.tb;
						y.scroll = hs.page.scrollTop;
						y.clientSize = hs.page.height;
						exp.justify(x, true);
						exp.justify(y, true);
						exp.moveTo(x.pos, y.pos);
					}
				}
			});
		";
	}
	else{
		echo "hs.wrapperClassName = 'wide-border';";
	}
	echo "</script>\n";
	echo "<link rel='stylesheet' href='$plugindir/highslide/highslide.css' type='text/css' />\n";
	if ($options == '11'){
		echo "
			<style type=\"text/css\">
				.highslide-caption {
					width: 100%;
					text-align: center;
				}
				.highslide-close {
					display: none !important;
				}
				.highslide-number {
					display: inline;
					padding-right: 1em;
					color: white;
				}
			</style>
		";
	}	
	if ($options == '13'){
		echo "
		<style type=\"text/css\">
			.highslide-image {
				border: 1px solid black;
			}
			.highslide-controls {
				width: 90px !important;
			}
			.highslide-controls .highslide-close {
				display: none;
			}
			.highslide-caption {
				padding: .5em 0;
			}
		</style>
		";
	}
}
function flickr_highslide_activate() {
	update_option("key");
	update_option("id");
	update_option("imageNum");
	update_option("title");
	update_option("options");
	update_option("order");
	update_option("imageSize");
	update_option("thumb");
	update_option("photoset");
	update_option("pagination");
	update_option("pageSize");
}
function flickr_highslide_init(){
	register_setting('flickr_highslide_options', 'key');
	register_setting('flickr_highslide_options', 'id');
	register_setting('flickr_highslide_options', 'imageNum');
	register_setting('flickr_highslide_options', 'title');
	register_setting('flickr_highslide_options', 'options');
	register_setting('flickr_highslide_options', 'order');
	register_setting('flickr_highslide_options', 'imageSize');
	register_setting('flickr_highslide_options', 'thumb');	
	register_setting('flickr_highslide_options', 'photoset');
	register_setting('flickr_highslide_options', 'pagination');
	register_setting('flickr_highslide_options', 'pageSize');
}
function flickr_highslide_options() {
	register_setting('flickr_highslide_options', 'key');
	register_setting('flickr_highslide_options', 'id');
	register_setting('flickr_highslide_options', 'imageNum');
	register_setting('flickr_highslide_options', 'title');
	register_setting('flickr_highslide_options', 'options');
	register_setting('flickr_highslide_options', 'order');
	register_setting('flickr_highslide_options', 'imageSize');
	register_setting('flickr_highslide_options', 'thumb');
	register_setting('flickr_highslide_options', 'photoset');
	register_setting('flickr_highslide_options', 'pagination');
	register_setting('flickr_highslide_options', 'pageSize');
?>
<div class="wrap">
	<h2>Flickr + Highslide by: <a href="http://www.pimlinders.com/">Pim Linders</a></h2>
	<div style="padding-left:10px;">
		<p>If you find this plugin helpful, please consider donating a few dollars to support this plugin. Thanks!</p>
		<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
			<input type="hidden" value="_donations" name="cmd"/>
			<input type="hidden" value="pimlinders@gmail.com" name="business"/>
			<input type="hidden" value="Flickr + Highslide Donation" name="item_name"/>
			<input type="hidden" value="Flickr + Highslide" name="item_number"/>
			<input type="hidden" value="Primary" name="page_style"/>
			<input type="hidden" value="1" name="no_shipping"/>
			<input type="hidden" value="http://flickrhighslide.com/thank-you/" name="return"/>
			<input type="hidden" value="http://flickrhighslide.com/" name="cancel_return"/>
			<input type="hidden" value="USD" name="currency_code"/>
			<input type="hidden" value="0" name="tax"/>
			<input type="hidden" value="Message / Note" name="cn"/>
			<input type="hidden" value="US" name="lc"/>
			<input type="hidden" value="PP-DonationsBF" name="bn"/>
			<p style="float:left;">Amount: $ <input type="text" style="width: 50px;" value="" name="amount"/> USD</p>
			<input type="image" style="float:left; margin-left:10px; border:0px;" border="0" alt="Make payments with PayPal - it's fast, free and secure!" name="submit" src="https://www.paypal.com/en_US/i/btn/x-click-butcc-donate.gif"/>
			<img width="1" height="1" style="border:0px; float:left;" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" alt=""/>
		</form>
	</div>
	<table class="form-table" style="clear:both">
    <form method="post" action="options.php">
        <?php settings_fields('flickr_highslide_options'); ?>
		<tr valign="top">
            <th scope="row">Flickr API key: <span style="color:red">*</span></th>
            <td><input type="text" name="key" value="<?php echo get_option('key'); ?>" /><span style="margin-left:5px;"><a href="http://www.flickr.com/services/apps/create/apply/">Apply for an API key</a></span></td>
        </tr>
        <tr valign="top">
            <th scope="row">Flickr user ID: <span style="color:red">*</span></th>
            <td><input type="text" name="id" value="<?php echo get_option('id'); ?>" /><span style="margin-left:5px;"><a href="http://idgettr.com/">Find your flickr user ID</a></span></td>
        </tr>
        <tr valign="top">
            <th scope="row">Number of images: <span style="color:red">*</span></th>
            <td><input type="text" name="imageNum" value="<?php echo get_option('imageNum'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Photoset name:</th>
            <td><input type="text" name="photoset" value="<?php echo get_option('photoset'); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Highslide:</th>
            <td><select name="options">							
                <option <?php if (get_option('options') == '1') { ?> selected="selected" <?php } ?> value="1">White border and drop shadow</option>
                <option <?php if (get_option('options') == '2') { ?> selected="selected" <?php } ?> value="2">Drop shadow and no border</option>
                <option <?php if (get_option('options') == '3') { ?> selected="selected" <?php } ?> value="3">White outline with rounded corners</option>
                <option <?php if (get_option('options') == '4') { ?> selected="selected" <?php } ?> value="4">Dark border with outer glow</option>
                <option <?php if (get_option('options') == '5') { ?> selected="selected" <?php } ?> value="5">No graphic outline</option>
                <option <?php if (get_option('options') == '6') { ?> selected="selected" <?php } ?> value="6">Gallery - White design</option>
                <option <?php if (get_option('options') == '7') { ?> selected="selected" <?php } ?> value="7">Gallery - Dark design</option>
                <option <?php if (get_option('options') == '8') { ?> selected="selected" <?php } ?> value="8">Gallery - Controls in the heading</option>
                <option <?php if (get_option('options') == '9') { ?> selected="selected" <?php } ?> value="9">Gallery - No border and a floating caption</option>
                <option <?php if (get_option('options') == '10') { ?> selected="selected" <?php } ?> value="10">Gallery - Images within a fixed box</option>
                <option <?php if (get_option('options') == '11') { ?> selected="selected" <?php } ?> value="11">Gallery - Vertical thumbstrip to the left</option>
                <option <?php if (get_option('options') == '12') { ?> selected="selected" <?php } ?> value="12">Gallery - Horizontal thumbstrip at the bottom</option>
                <option <?php if (get_option('options') == '13') { ?> selected="selected" <?php } ?> value="13">Gallery - Gallery in the parent page</option>
            </select></td>
        </tr>
        <tr valign="top">
            <th scope="row">Image size:</th>
            <td><select name="imageSize">							
                <option <?php if (get_option('imageSize') == 'large') { ?> selected="selected" <?php } ?> value="large">Large</option>
                <option <?php if (get_option('imageSize') == 'medium') { ?> selected="selected" <?php } ?> value="medium">Medium</option>
                <option <?php if (get_option('imageSize') == 'small') { ?> selected="selected" <?php } ?> value="small">Small</option>
            </select></td>
        </tr>
        <tr valign="top">
            <th scope="row">Thumbnail:</th>
            <td><select name="thumb">							
                <option <?php if (get_option('thumb') == 'square') { ?> selected="selected" <?php } ?> value="square">Square</option>
                <option <?php if (get_option('thumb') == 'thumbnail') { ?> selected="selected" <?php } ?> value="thumbnail">Thumbnail</option>
            </select></td>
        </tr>
        <tr valign="top">
            <th scope="row">Order:</th>
            <td><select name="order">							
                <option <?php if (get_option('order') == 'latest') { ?> selected="selected" <?php } ?> value="latest">Latest</option>
                <option <?php if (get_option('order') == 'random') { ?> selected="selected" <?php } ?> value="random">Random</option>
            </select></td>
        </tr>
        <tr valign="top">
            <th scope="row">Display titles:</th>
            <td><input type="checkbox" name="title" value="true" <?php if(get_option('title') == "true"){echo "checked" ;}?>/></td>
        </tr>
		<tr valign="top">
            <th scope="row">Use pages:</th>
            <td><input type="checkbox" name="pagination" value="true" <?php if(get_option('pagination')  == "true"){echo "checked" ;}?>/></td>
        </tr>
		<tr valign="top">
            <th scope="row">Number of images per page:</th>
            <td><input type="text" name="pageSize" value="<?php echo get_option('pageSize'); ?>" /></td>
        </tr>
        <tr valign="top">
        	<td><p class="submit"><input type="submit" name="Submit" value="Save changes"/></p></td>
        </tr>
    </form>
</table>
</div>
<?php
}
add_action( "wp_head", 'flickr_highslide_head' );
add_action('admin_menu', 'flickr_highslide_menu');
add_action( 'admin_init', 'flickr_highslide_init' );
add_shortcode('flickr_highslide', 'flickr_highslide');
register_activation_hook( __FILE__, 'flickr_highslide_activate' );
function flickr_highslide($atts=false){
    extract(shortcode_atts(array(
        'set' => get_option('photoset')
    ), $atts));
	//get values from the backend
	$apikey = get_option('key');
	$id = get_option('id');
	$imageNum = get_option('imageNum');
	$order = get_option('order');
	$imageSize = get_option('imageSize');
	$thumbnail = get_option('thumb');
	$options = get_option('options');
    $photoSet = $set;
	$displayTitle = get_option('title');
	$pagination = get_option('pagination');
	$pageSize = get_option('pageSize');
	$flickrPhotos = $imageNum;
	//limit page size to 500, this is done because a page corresponds with an xml request, an xml page from flickr is limited to 500 children
	$requestSize = 500;
	if($pageSize>$requestSize)
		$pageSize = $requestSize;
	if($imageNum<$requestSize)
		$perPage = $imageNum;
	else
		$perPage = $requestSize;
	//ensure the that the plugin is configured correctly, if not, display an error message
	if($id == '' || $imageNum == '' || ($pagination == true && $pageSize == ''))
		echo '<p>Flickr + highlside is not configured properly, to configure Flickr + Highslide go to Admin -> Setting -> Flickr + Highslide.</p><p>Note: when using pagination you must specify the number of images per page.</p>';
	else{
		//get page number, if there is no page number set page to 1
		$page = $_GET["page"];
		if($page == NULL) 
			$page = 1;
		if($pagination){
			//when the total number of images exceeds that of the number of images per page, set the loop to the number of images per page
			if($imageNum > $pageSize){
				$flickrPhotos = $pageSize;
				//limit the number of images to display when a page request exceed the number of images
				//i.e. if number of images is 101 and the number of image per page is 50, limit the 3rd page to 1 photo
				$limit = ($pageSize * $page) - $imageNum;
				if($limit > 0)
					$flickrPhotos = ($pageSize - $limit); 
			}
			$perPage = $pageSize;
		}
		//use flickr.people.getPublicPhotos flickr api method
		if($photoSet==''){
			$url = "http://www.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&user_id=$id&api_key=$apikey&per_page=$perPage&page=$page";
			$xml = flickr_highslide_get_xml($url);
			//set the photoXml to use photos
			$photoXml = $xml->photos;
			//this is used to later call the proper flickr api method when requesting a new page
			$photos = true;
		}
		//use flickr.photosets.getPhotos flickr api method
		else{    
			//get photoSet ID
			$url = "http://api.flickr.com/services/rest/?method=flickr.photosets.getList&user_id=$id&api_key=$apikey";
			$photoList = flickr_highslide_get_xml($url);
			for ($j=0; $j<count($photoList->photosets->photoset); $j++) {
				if($photoList->photosets->photoset[$j]->title==$photoSet){
					$photoSetId = $photoList->photosets->photoset[$j]['id'];
					break;
				}		
			}
			$url = "http://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=$apikey&photoset_id=$photoSetId&per_page=$perPage&page=$page";
			$xml = flickr_highslide_get_xml($url);
			//set the photoXml to use photoset
			$photoXml = $xml->photoset;
		}
		//if there's an error requesting the xml file, display error
		if ($xml->err['msg']){
			echo '<p>Flickr + Highslide encountered an error</p><p>Error: ' . $xml->err['msg'] . '</p>';	
		}
		else{
			//get total photos count
			$total = $photoXml['total'];
			//get the total pages count
			$totalPages = $photoXml['pages'];
			//if its the last page with photos, count the children
			if($page == $totalPages){
				$childCnt = count($photoXml->photo);
				$flickrPhotos = $childCnt;
			}
			//if it's not the last page, set number of children to equal the Number of images per page option
			else{
				$childCnt = $perPage;
			}
			//if the option order is random, call the random function to randomize the photos
			if($order == 'random')
				$random = flickr_highslide_random($childCnt);
			//add flickr image extension
			if($imageSize == 'medium')
				$size = '';
			else if($imageSize == 'small')
				$size = '_m';
			else
				$size = '_b';
			//Gallery 9 - No border and a floating caption || Gallery 13 - Gallery in the parent page	
			if($options == '9' || $options == '13')
				$size = '';
			if($thumbnail == 'thumbnail')
				$thumbnail = '_t';
			else
				$thumbnail = '_s';		
			echo "<!-- Flickr + Highslide by Pim Linders http://www.pimlinders.com/ -->\n";
			//Gallery 13 - Gallery in the parent page
			if($options == '13'){
				echo '<div class="flickr_highslide" style="overflow:auto; display:none;">';
			}
			else{
				echo '<div class="flickr_highslide" style="overflow:auto;">';
			}
			//Gallery 8 - Controls in the heading
			if($options == '8')
				$heading = true;
			//if user input is larger than total photos available, make imageNum the total images
			if($imageNum > $total)
				$imageNum = $total;
			//find the last page
			if($pagination)
				$lastPage = ceil($imageNum/$pageSize);
			//keep track of the current position in the xml page 
			$j = 0;
			//loop through all the photos
			for($k=0; $k<$flickrPhotos; $k++){
				//get the next page of images from flickr
				if($j==$perPage){
					//increase the page count
					$page++;
					//reset the the position in the xml page
					$j = 0;
					//use flickr.people.getPublicPhotos flickr api method
					if($photos){
						//get request from flickr
						$url = "http://www.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&user_id=$id&api_key=$apikey&per_page=$perPage&page=$page";
						$xml = flickr_highslide_get_xml($url);
						//set the photoXml to use photos
						$photoXml = $xml->photos;
					}
					//use flickr.photosets.getPhotos flickr api method
					else{
						//get request from flickr
						$url = "http://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=$apikey&photoset_id=$photoSetId&per_page=$perPage&page=$page";
						$xml = flickr_highslide_get_xml($url);
						//set the photoXml to use photoset
						$photoXml = $xml->photoset;
					}
					//if its the last page with photos, count the children
					if($page == $totalPages)
						$childCnt = count($photoXml->photo);
					else
						$childCnt = $perPage;
					//if the option order is random, call the random function to randomize the photos
					if($order == 'random')
						$random = flickr_highslide_random($childCnt);
				}
				//indicate which photo to display
				if($order == 'random' && $childCnt != 1)
					$i = $random[$j];
				else
					$i = $j;
				//checks to make sure there are phtos on the page, if not break
				if($photoXml->photo[$i]['server'] == NULL)
					break;
				//html for Gallery 8 - Controls in the heading
				if($displayTitle == true && $heading == true){
					echo "<div class='highslide-heading'>";
					echo $photoXml->photo[$i]['title'];
					echo "</div>";
				}
				if($displayTitle == false && $heading == true){
					echo "<div class='highslide-heading'></div>";
				}
				//generate html
				$imgLink = '<a ';
				if($options == '13' && $k==0)
					$imgLink .=	'id="thumb1" ';
				$imgLink .= 'href="';
				$imgLink .= "http://static.flickr.com/";
				$imgLink .= $photoXml->photo[$i]['server'];
				$imgLink .= "/";
				$imgLink .= $photoXml->photo[$i]['id'];
				$imgLink .= "_";
				$imgLink .= $photoXml->photo[$i]['secret'];
				$imgLink .= $size . '.jpg" '; 
				if($options == '13')
					$imgLink .= 'class="highslide" onclick="return hs.expand(this, inPageOptions)">';
				else
					$imgLink .= 'class="highslide" onclick="return hs.expand(this)">';
				$imgLink .= '<img src="';
				$imgLink .= "http://static.flickr.com/";
				$imgLink .= $photoXml->photo[$i]['server'];
				$imgLink .= "/";
				$imgLink .= $photoXml->photo[$i]['id'];
				$imgLink .= "_";
				$imgLink .= $photoXml->photo[$i]['secret'];
				$imgLink .= "$thumbnail.jpg"; 
				$imgLink .= '" alt="'.$photoXml->photo[$i]['title'].'" /></a>';
				echo $imgLink . "\n";
				//set title for all gallery except for Gallery 8 - Controls in the heading
				if($displayTitle && $heading == false){
					echo '<div class="highslide-caption">';
					echo $photoXml->photo[$i]['title'];
					echo '</div>';
				}
				//move to the next child
				$j++;
			}
			echo '</div>';
			//Gallery 13 - Gallery in the parent page
			if($options == '13')
				echo '<div id="gallery-area" style="width: 620px; height: 605px; margin: 0 auto;"></div>';
			//add pagination to the gallery
			if($pagination){
				echo '<div class="flickr_highslide_pagination">';
				//print back
				if($page > 1) {
					$back = $page-1;
					echo '<span class="fhPagination fhBack"><a href="?page='. $back .'">&laquo; Back</a></span>';
				}	
				//print page numbers
				for($pages = 1; $pages<=$lastPage; $pages++) {
					//print hyperlinks to individual pages
					//limit the total number of page links to, -2 current page + 2, unless the current page is the first, second, second to last, or last page
					if($pages == $page){
						$rightString = '';
						$middleString = '';
						$leftString = '';
						if(($pages-2) >= 1)
							$middleString .= '<span class="fhPagination fhPage"><a href="?page='.($pages-2).'">'.($pages-2).'</a></span>';	
						else if(($pages+3) <= $lastPage)
							$rightString .= '<span class="fhPagination fhPage"><a href="?page='.($pages+3).'">'.($pages+3).'</a></span>';
						if(($pages-1) >= 1)
							$middleString .= '<span class="fhPagination fhPage"><a href="?page='.($pages-1).'">'.($pages-1).'</a></span>';	
						else if(($pages+4) <= $lastPage)
							$rightString .= '<span class="fhPagination fhPage"><a href="?page='.($pages+4).'">'.($pages+4).'</a></span>';
						$middleString .= '<span class="fhPagination fhCurPage">'.$pages.'</span>';
						if(($pages+1) <= $lastPage)
							$middleString .= '<span class="fhPagination fhPage"><a href="?page='.($pages+1).'">'.($pages+1).'</a></span>';
						else if(($pages-4) >= 1)
							$leftString .= '<span class="fhPagination fhPage"><a href="?page='.($pages-4).'">'.($pages-4).'</a></span>';
						if(($pages+2) <= $lastPage)
							$middleString .= '<span class="fhPagination fhPage"><a href="?page='.($pages+2).'">'.($pages+2).'</a></span>';
						else if(($pages-3) >= 1)
							$leftString .= '<span class="fhPagination fhPage"><a href="?page='.($pages-3).'">'.($pages-3).'</a></span>';
						echo $leftString;
						echo $middleString;
						echo $rightString;
					}
				}
				//print next
				if($page <= $totalPages && $page != $lastPage) {
					$next = $page+1;
					echo '<span class="fhPagination fhNext"><a href="?page='. $next .'">Next &raquo;</a></span>';
				}
				echo '</div';
			}
		}
	}
} //end flickr_highslide

//use curl to get the xml file from flickr
function flickr_highslide_get_xml($url){
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$response = curl_exec($ch);
	$xml = simplexml_load_string($response);
	curl_close($ch);
	return $xml;
} //end flickr_highslide_get_xml

function flickr_highslide_random($childCnt){
	$rand = range(0, $childCnt-1);
	shuffle($rand);
	return $rand;
} //end flickr_highslide_random
?>