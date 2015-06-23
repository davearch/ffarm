<?php

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'bnk_';

$gallery_meta = array(
	'id' => 'bnk-meta-box',
	'title' => 'Images',
	'page' => 'gallery',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

	array(
			'name' => __('Image 1', 'bhinneka'),
			'desc' => __('640px x 426px', 'bhinneka'),
			'id' => $prefix . 'upload_image',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'upload_image_button',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => __('Image 2', 'bhinneka'),
			'desc' => __('640px x 426px', 'bhinneka'),
			'id' => $prefix . 'upload_image2',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'upload_image_button2',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => __('Image 3', 'bhinneka'),
			'desc' => __('640px x 426px', 'bhinneka'),
			'id' => $prefix . 'upload_image3',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'upload_image_button3',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => __('Image 4', 'bhinneka'),
			'desc' => __('640px x 426px', 'bhinneka'),
			'id' => $prefix . 'upload_image4',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'upload_image_button4',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => __('Image 5', 'bhinneka'),
			'desc' => __('640px x 426px', 'bhinneka'),
			'id' => $prefix . 'upload_image5',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'upload_image_button5',
			'type' => 'button',
			'std' => 'Browse'
		),
	array(
			'name' => __('Image 6', 'bhinneka'),
			'desc' => __('640px x 426px', 'bhinneka'),
			'id' => $prefix . 'upload_image6',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'upload_image_button6',
			'type' => 'button',
			'std' => 'Browse'
		),
	),

);

$gallery_meta_video = array(
	'id' => 'bnk-meta-box-video',
	'title' => __('Video', 'bhinneka'),
	'page' => 'gallery',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	array(
			'name' => __('Video URL', 'bhinneka'),
			'desc' => __('Add the video URL here, not the embed code. For anything other than Youtube and Vimeo, add the embed code.', 'bhinneka'),
			'id' => $prefix . 'video_url',
			'type' => 'textarea',
			'std' => ''
		),

	),

);


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function bnk_build_gallery_metabox() {
	global $gallery_meta, $post;

	echo '<p style="padding:10px 0 0 0;">'.__('Choose image to upload and insert into post. All images have to be at the same size.', 'bhinneka').'</p>';
	// Use nonce for verification
	echo '<input type="hidden" name="bnk_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';

	foreach ($gallery_meta['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {


			//If Text
			case 'text':

			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:38%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; line-height: 20px; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';

			break;

			//If Button
			case 'button':
				echo '<input style="float: left;" type="button" class="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
				echo 	'</td>',
			'</tr>';

			break;

		}

	}

	echo '</table>';
}

function bnk_build_gallery_video_metabox() {
	global $gallery_meta_video, $post;


	// Use nonce for verification
	echo '<input type="hidden" name="bnk_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table">';

	foreach ($gallery_meta_video['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {

			//If textarea
			case 'textarea':

			echo '<tr>',
				'<th style="width:38%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style="line-height:18px; display:block; color:#999; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<textarea name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" rows="8" cols="5" style="width:100%; margin-right: 20px; float:left;">', $meta ? $meta : $field['std'], '</textarea>';

			break;
		}

	}

	echo '</table>';
}


/*-----------------------------------------------------------------------------------*/
/*	Create metabox
/*-----------------------------------------------------------------------------------*/

function bnk_create_gallery_metabox() {
	global $gallery_meta, $gallery_meta_video;

	add_meta_box($gallery_meta['id'], $gallery_meta['title'], 'bnk_build_gallery_metabox', $gallery_meta['page'], $gallery_meta['context'], $gallery_meta['priority']);
	add_meta_box($gallery_meta_video['id'], $gallery_meta_video['title'], 'bnk_build_gallery_video_metabox', $gallery_meta_video['page'], $gallery_meta_video['context'], $gallery_meta_video['priority']);
}

add_action('admin_menu', 'bnk_create_gallery_metabox');


/*-----------------------------------------------------------------------------------*/
/*	Save data
/*-----------------------------------------------------------------------------------*/

function bnk_save_gallery_data($post_id) {
	global $gallery_meta, $gallery_meta_video;

	// verify nonce
	if (!wp_verify_nonce($_POST['bnk_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	foreach ($gallery_meta['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

	foreach ($gallery_meta_video['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];

		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}

add_action('save_post', 'bnk_save_gallery_data');


/*-----------------------------------------------------------------------------------*/
/*	Queue Scripts
/*-----------------------------------------------------------------------------------*/

function bnk_admin_scripts() {
	wp_register_script('bnk-upload', get_template_directory_uri() . '/js/file-upload.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('bnk-upload');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}
function bnk_admin_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'bnk_admin_scripts');
add_action('admin_print_styles', 'bnk_admin_styles');