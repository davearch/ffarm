<?php

/*-----------------------------------------------------------------------------------*/
/*	Define Metabox Fields
/*-----------------------------------------------------------------------------------*/

$prefix = 'bnk_';
 
$slide_meta = array(
	'id' => 'bnk-meta-box',
	'title' => 'Slides',
	'page' => 'slide',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
	
	array(
			'name' => __('URL', 'bhinneka'),
			'desc' => __('Link to the image', 'bhinneka'),
			'id' => $prefix . 'image_url',
			'type' => 'text',
			'std' => ''
		),
	array(
			'name' => __('Caption', 'bhinneka'),
			'desc' => __('Image caption', 'bhinneka'),
			'id' => $prefix . 'image_caption',
			'type' => 'text',
			'std' => ''
		),
	),	
);


/*-----------------------------------------------------------------------------------*/
/*	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function bnk_build_slide_metabox() {
	global $slide_meta, $post;

	// Use nonce for verification
	echo '<input type="hidden" name="bnk_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($slide_meta['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		switch ($field['type']) {
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:38%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#666; line-height: 1.6; margin:4px 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:95%; margin-right: 20px; float:left;" />';
			break;
 
		}

	}
 
	echo '</table>';
}


/*-----------------------------------------------------------------------------------*/
/*	Create metabox
/*-----------------------------------------------------------------------------------*/
 
function bnk_create_slide_metabox() {
	global $slide_meta;
 
	add_meta_box($slide_meta['id'], $slide_meta['title'], 'bnk_build_slide_metabox', $slide_meta['page'], $slide_meta['context'], $slide_meta['priority']);
}

add_action('admin_menu', 'bnk_create_slide_metabox');


/*-----------------------------------------------------------------------------------*/
/*	Save data
/*-----------------------------------------------------------------------------------*/
 
function bnk_save_slide_data($post_id) {
	global $slide_meta;
 
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
 
	foreach ($slide_meta['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}

add_action('save_post', 'bnk_save_slide_data');