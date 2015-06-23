<?php require_once('config.php');
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) wp_die(__("You do not have permission to access this page","bhinneka")); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shortcodes</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/functions/tinymce/tinymce.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<base target="_self" />
</head>
<body onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none" id="link">
<form name="bnk_shortcode_form" action="#">

	<div class="sc_wrapper" style="height:120px;width:300px;margin:0 auto;padding-top:40px;text-align:center;" >
		<div id="shortcode_panel" class="current" style="height:50px;">
			<fieldset style="border:0;width:100%;text-align:center;">
				<select id="style_shortcode" name="style_shortcode" style="width:300px">

					<option value="0">Select shortcode</option>

					<option value="0" style="font-weight:bold;">Columns Layout</option>
					<option value="two_columns">2 Columns</option>
					<option value="three_columns">3 Columns</option>
					<option value="four_columns">4 Columns</option>
					<option value="line">Divider Line</option>
					<option value="clear">Clearfix</option>
					<option value="0">&nbsp;</option>

					<option value="0" style="font-weight:bold;">Notification Box</option>
					<option value="alert_ok">Confirm Box</option>
					<option value="alert_secure">Secure Box</option>
					<option value="alert_info">Info Box</option>
					<option value="alert_error">Error Box</option>
					<option value="alert_note">Note Box</option>
					<option value="0">&nbsp;</option>

					<option value="0" style="font-weight:bold;">UI</option>
					<option value="features">Features</option>
					<option value="tabs">Tabs</option>
					<option value="toggle">Toggle</option>
					<option value="acc">Accordion</option>
					<option value="0">&nbsp;</option>

					<option value="0" style="font-weight:bold;">Buttons</option>
					<option value="btn_primary">Primary Button</option>
					<option value="btn_basic">Basic Button</option>
					<option value="btn_action">Action Button</option>
					<option value="btn_danger">Danger Button</option>
					<option value="btn_success">Success Button</option>
					<option value="btn_info">Info Button</option>
					<option value="0">&nbsp;</option>

					<option value="btn_arrow_primary">Primary Button with Arrow</option>
					<option value="btn_arrow_basic">Basic Button with Arrow</option>
					<option value="btn_arrow_action">Action Button with Arrow</option>
					<option value="btn_arrow_danger">Danger Button with Arrow</option>
					<option value="btn_arrow_success">Success Button with Arrow</option>
					<option value="btn_arrow_info">Info Button with Arrow</option>
					<option value="0">&nbsp;</option>

					<option value="btn_small_primary">Primary Small Button</option>
					<option value="btn_small_basic">Basic Small Button</option>
					<option value="btn_small_action">Action Small Button</option>
					<option value="btn_small_danger">Danger Small Button</option>
					<option value="btn_small_success">Success Small Button</option>
					<option value="btn_small_info">Info Small Button</option>
					<option value="0">&nbsp;</option>

					<option value="0" style="font-weight:bold;">Miscellaneous</option>
					<option value="tooltip">Tool Tip</option>
					<option value="pullquote_left">Left Pull Quotes</option>
					<option value="pullquote_right">Right Pull Quotes</option>
					<option value="quote">Blockquote</option>
					<option value="checklist">Check List</option>
					<option value="table">Table</option>
					<option value="stripped_table">Stripped Table</option>
				</select>
			</fieldset>
		</div>
		<div style="float:left">
			<input type="button" id="cancel" name="cancel" value="<?php echo "Close"; ?>" onClick="tinyMCEPopup.close();" />
		</div>
		<div style="float:right">
			<input type="submit" id="insert" name="insert" value="<?php echo "Insert"; ?>" onClick="embedshortcode();" />
		</div>
	</div>
</form>
</body>
</html>