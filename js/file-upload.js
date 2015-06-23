jQuery(document).ready(function() {
 
	jQuery('#bnk_upload_image_button').click(function() {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#bnk_upload_image').val(imgurl);
			tb_remove();
		}
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		return false;
	});
	 
	jQuery('#bnk_upload_image_button2').click(function() {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#bnk_upload_image2').val(imgurl);
			tb_remove();
		}
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		return false;
	});
	
	jQuery('#bnk_upload_image_button3').click(function() {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#bnk_upload_image3').val(imgurl);
			tb_remove();
		}
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		return false;
	});
	
	jQuery('#bnk_upload_image_button4').click(function() {
		window.send_to_editor = function(html)	{
			imgurl = jQuery('img',html).attr('src');
			jQuery('#bnk_upload_image4').val(imgurl);
			tb_remove();
		}
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		return false;
	});
	
	jQuery('#bnk_upload_image_button5').click(function() {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#bnk_upload_image5').val(imgurl);
			tb_remove();
		}
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		return false;
	});
	
	jQuery('#bnk_upload_image_button6').click(function() {
		
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery('#bnk_upload_image5').val(imgurl);
			tb_remove();
		}
		tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
		return false;
	});

});