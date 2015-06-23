<?php

/*-----------------------------------------------------------------------------------*/
/*	Removes ugly codes in shortcodes
/*-----------------------------------------------------------------------------------*/
function parse_shortcode_content( $content ) {

    /* Parse nested shortcodes and add formatting. */
    $content = trim( wpautop( do_shortcode( $content ) ) );

    /* Remove '</p>' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '</p>' )
        $content = substr( $content, 4 );

    /* Remove '<p>' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '<p>' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of '<p></p>'. */
    $content = str_replace( array( '<p></p>' ), '', $content );

    return $content;
}


/*-----------------------------------------------------------------------------------*/
/*	Grid Shortcodes
/*-----------------------------------------------------------------------------------*/

add_shortcode('one_half', 'bnk_one_half');
add_shortcode('one_half_omega', 'bnk_one_half_omega');
add_shortcode('one_third', 'bnk_one_third');
add_shortcode('one_third_omega', 'bnk_one_third_omega');
add_shortcode('one_fourth', 'bnk_one_fourth');
add_shortcode('one_fourth_omega', 'bnk_one_fourth_omega');
add_shortcode('clear', 'bnk_clearfix');
add_shortcode('line', 'bnk_line');


/* Columns with Sidebar */
function bnk_one_half( $atts, $content = null ) {
   return '<div class="col_two">' . parse_shortcode_content($content) . '</div>';
}
function bnk_one_half_omega( $atts, $content = null ) {
   return '<div class="col_two omega">' . parse_shortcode_content($content) . '</div><div class="clear"></div>';
}
function bnk_one_third( $atts, $content = null ) {
   return '<div class="col_three">' . parse_shortcode_content($content) . '</div>';
}
function bnk_one_third_omega( $atts, $content = null ) {
   return '<div class="col_three omega">' . parse_shortcode_content($content) . '</div><div class="clear"></div>';
}
function bnk_one_fourth( $atts, $content = null ) {
   return '<div class="col_four">' . parse_shortcode_content($content) . '</div>';
}
function bnk_one_fourth_omega( $atts, $content = null ) {
   return '<div class="col_four omega">' . parse_shortcode_content($content) . '</div><div class="clear"></div>';
}
function bnk_clearfix( ) {
   return '<div class="clearfix">&nbsp;</div>' ;
}
function bnk_line( ) {
   return '<div class="clear"></div><hr/>' ;
}


/*-----------------------------------------------------------------------------------*/
/*	Notification Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode('ok', 'bnk_alert_ok');
add_shortcode('secure', 'bnk_alert_secure');
add_shortcode('info', 'bnk_alert_info');
add_shortcode('error', 'bnk_alert_error');
add_shortcode('note', 'bnk_alert_note');

function bnk_alert_ok($atts, $content = null) {
	return '<div class="alert-ok">' . do_shortcode($content) . '</div>';
}
function bnk_alert_secure($atts, $content = null) {
	return '<div class="alert-secure">' . do_shortcode($content) . '</div>';
}
function bnk_alert_info($atts, $content = null) {
	return '<div class="alert-info">' . do_shortcode($content) . '</div>';
}
function bnk_alert_error($atts, $content = null) {
	return '<div class="alert-error">' . do_shortcode($content) . '</div>';
}
function bnk_alert_note($atts, $content = null) {
	return '<div class="alert-note">' . do_shortcode($content) . '</div>';
}


/*-----------------------------------------------------------------------------------*/
/*	Features Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode('features', 'bnk_feature');

function bnk_feature( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	global $features_counter_1;
	global $features_counter_2;
	$features_counter_1++;
	$features_counter_2++;
   $out = '';
   $content = parse_shortcode_content( $content );
	$out .= '<div class="clear"></div><div class="features"><nav class="feat_nav mobile-hide" role="navigation"><div class="feat_nav_inner">';
	$out .= '<ul class="nav">';
	foreach ($atts as $tab) {
		$out .= '<li><a href="#features-' . $features_counter_1 . '">' .$tab. '<span></span></a></li>';
		$features_counter_1++;
	}
	$out .= '</ul>';
	$out .= '</div></nav>' . $content .'<div class="clear"></div></div>';
	return $out;
}

function featurespanes( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	global $features_counter_2;
   $out = '';
   $content = parse_shortcode_content( $content );
	$out .= '<div class="tab" id="features-' . $features_counter_2 . '"><div class="features-inner">' . $content .'</div></div>';
	$features_counter_2++;
	return $out;
}
add_shortcode('featurestab', 'featurespanes');

/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode('tabs', 'bnk_tabs');
add_shortcode('tab', 'tabpanes');

function bnk_tabs( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	global $tab_counter_1;
	global $tab_counter_2;
	$tab_counter_1++;
	$tab_counter_2++;
   $out = '';
   $content = parse_shortcode_content( $content );
	$out .= '<div class="clear">&nbsp;</div><div class="tabs mobile-hide"><div class="tab_container">';
	$out .= '<nav role="navigation"><ul class="tab_nav">';
	$count = 1;
	foreach ($atts as $tab) {
		if($count == 1){$first = 'first';}else{$first = '';}
		$out .= '<li class="'.$first.'"><a title="' .$tab. '" href="#tab-' . $tab_counter_1 . '">' .$tab. '</a></li>';
		$tab_counter_1++;
		$count++;
	}
	$out .= '</ul></nav>';
	$out .= $content .'</div></div>';
	return $out;
}

function tabpanes( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	global $tab_counter_2;
   $out = '';
   $content = parse_shortcode_content( $content );
	$out .= '<div class="tab" id="tab-' . $tab_counter_2 . '"><div class="tab_content">' . $content .'</div></div>';
	$tab_counter_2++;
	return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode('toggle', 'bnk_toggle');

function bnk_toggle( $atts, $content = null ) {
   $out = '';
   extract(shortcode_atts(array(
		'title'    	 => 'Title here'
    ), $atts));
	$out .= "<h4 class=\"toggler\"><span>&nbsp;</span><a href=\"#\">".$title."</a></h4>
	<div class=\"toggle_inner\"><div class=\"block\">".parse_shortcode_content( $content )."</div></div>";
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Accordion Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode('acc', 'bnk_accordion');

function bnk_accordion( $atts, $content = null ) {
    $out = '';
    extract(shortcode_atts(array(
		'title'    	 => 'Title here'
    ), $atts));
	$out .= "<h4 class=\"acc_toggler\"><span>&nbsp;</span><a href=\"#\">".$title."</a></h4>
	<div class=\"acc_inner\"><div class=\"block\">".parse_shortcode_content( $content )."</div></div>";
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Action Button Shortcodes
/*-----------------------------------------------------------------------------------*/

add_shortcode('btn_primary', 'bnk_button_primary');
add_shortcode('btn_basic', 'bnk_button_basic');
add_shortcode('btn_action', 'bnk_button_action');
add_shortcode('btn_danger', 'bnk_button_danger');
add_shortcode('btn_success', 'bnk_button_success');
add_shortcode('btn_info', 'bnk_button_info');

add_shortcode('btn_arrow_primary', 'bnk_button_arrow_primary');
add_shortcode('btn_arrow_basic', 'bnk_button_arrow_basic');
add_shortcode('btn_arrow_action', 'bnk_button_arrow_action');
add_shortcode('btn_arrow_danger', 'bnk_button_arrow_danger');
add_shortcode('btn_arrow_success', 'bnk_button_arrow_success');
add_shortcode('btn_arrow_info', 'bnk_button_arrow_info');

add_shortcode('btn_small_primary', 'bnk_button_small_primary');
add_shortcode('btn_small_basic', 'bnk_button_small_basic');
add_shortcode('btn_small_action', 'bnk_button_small_action');
add_shortcode('btn_small_danger', 'bnk_button_small_danger');
add_shortcode('btn_small_success', 'bnk_button_small_success');
add_shortcode('btn_small_info', 'bnk_button_small_info');

function bnk_button_primary( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"btn primary " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}
function bnk_button_basic( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"btn " .$position. "\"><span>".do_shortcode($content)."</span></a>";
    return $out;
}
function bnk_button_action( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"btn action " .$position. "\"><span>".do_shortcode($content)."</span></a>";
    return $out;
}
function bnk_button_danger( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"btn danger " .$position. "\"><span>".do_shortcode($content)."</span></a>";
    return $out;
}
function bnk_button_success( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"btn success " .$position. "\"><span>".do_shortcode($content)."</span></a>";
    return $out;
}
function bnk_button_info( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"btn info " .$position. "\"><span>".do_shortcode($content)."</span></a>";
    return $out;
}


function bnk_button_arrow_primary( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"arrow-btn primary " .$position. "\">".do_shortcode($content)."<span></span></a>";
    return $out;
}
function bnk_button_arrow_basic( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"arrow-btn " .$position. "\">".do_shortcode($content)."<span></span></a>";
    return $out;
}
function bnk_button_arrow_action( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"arrow-btn action " .$position. "\">".do_shortcode($content)."<span></span></a>";
    return $out;
}
function bnk_button_arrow_danger( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"arrow-btn danger " .$position. "\">".do_shortcode($content)."<span></span></a>";
    return $out;
}
function bnk_button_arrow_success( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"arrow-btn success " .$position. "\">".do_shortcode($content)."<span></span></a>";
    return $out;
}
function bnk_button_arrow_info( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"arrow-btn info " .$position. "\">".do_shortcode($content)."<span></span></a>";
    return $out;
}


function bnk_button_small_primary( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"small-btn primary " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}
function bnk_button_small_basic( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"small-btn " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}
function bnk_button_small_action( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"small-btn action " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}
function bnk_button_small_danger( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"small-btn danger " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}
function bnk_button_small_success( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"small-btn success " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}
function bnk_button_small_info( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'target'     => '_self',
		'position'   => 'left'
    ), $atts));
	$out = "<a href=\"" .$url. "\" target=\"" .$target. "\" class=\"small-btn info " .$position. "\">".do_shortcode($content)."</a>";
    return $out;
}

/*-----------------------------------------------------------------------------------*/
/*	Misc Shortcodes
/*-----------------------------------------------------------------------------------*/
add_shortcode('tip', 'bnk_tooltip');
add_shortcode('pullquote_left', 'bnk_pullquote_left');
add_shortcode('pullquote_right', 'bnk_pullquote_right');
add_shortcode('quote', 'bnk_blockquote');
add_shortcode('checklist', 'bnk_checklist');
add_shortcode('table', 'bnk_table');
add_shortcode('stripped_table', 'bnk_stripped_table');

function bnk_tooltip( $atts, $content = null ) {
    extract(shortcode_atts(array(
		'url'     	 => '#',
		'title' => ""
    ), $atts));
	$out = "<a href=\"" .$url. "\" class=\"tooltip\" title=\"" .$title. "\">".$content."</a>";
    return $out;
}
function bnk_pullquote_left($atts, $content = null ) {
	return '<blockquote class="pull alignleft">'. $content .'</blockquote>' ;
}
function bnk_pullquote_right($atts, $content = null ) {
	return '<blockquote class="pull alignright">'. $content .'</blockquote>' ;
}
function bnk_blockquote($atts, $content = null) {
	return '<blockquote>' . $content . '</blockquote>';
}
function bnk_checklist($atts, $content = null ) {
	return '<ul class="checklist">'.parse_shortcode_content($content).'</ul>' ;
}
function bnk_table($atts, $content = null ) {
    return '<div class="table table-bordered">'.parse_shortcode_content($content).'</div>' ;
}
function bnk_stripped_table($atts, $content = null ) {
    return '<div class="table table-striped table-bordered">'.parse_shortcode_content($content).'</div>' ;
}

?>