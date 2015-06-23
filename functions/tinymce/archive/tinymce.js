function embedshortcode() {

	var shortcodetext;
	var style = document.getElementById('shortcode_panel');

	if (style.className.indexOf('current') != -1) {
		var selected_shortcode = document.getElementById('style_shortcode').value;

/*===================================================================================*/
/*	Columns
/*===================================================================================*/

if (selected_shortcode == 'two_columns'){
	shortcodetext = "[one_half] Insert content here [/one_half] [one_half_omega] Insert content here[/one_half_omega]";
}
if (selected_shortcode == 'three_columns'){
	shortcodetext = "[one_third] Insert content here [/one_third] [one_third] Insert content here[/one_third] [one_third_omega] Insert content here[/one_third_omega]";
}
if (selected_shortcode == 'four_columns'){
	shortcodetext = "[one_fourth] Insert content here [/one_fourth] [one_fourth] Insert content here[/one_fourth] [one_fourth] Insert content here[/one_fourth] [one_fourth_omega] Insert content here[/one_fourth_omega]";
}

/*===================================================================================*/
/*	Misc
/*===================================================================================*/

if (selected_shortcode == 'line'){
	shortcodetext = "[line]";
}
if (selected_shortcode == 'clear'){
	shortcodetext = "[clear]";
}


/*===================================================================================*/
/*	Notifications
/*===================================================================================*/

if (selected_shortcode == 'alert_ok'){
	shortcodetext = "[ok] Insert content here [/ok]";
}
if (selected_shortcode == 'alert_secure'){
	shortcodetext = "[secure] Insert content here [/secure]";
}
if (selected_shortcode == 'alert_info'){
	shortcodetext = "[info] Insert content here [/info]";
}
if (selected_shortcode == 'alert_error'){
	shortcodetext = "[error] Insert content here [/error]";
}
if (selected_shortcode == 'alert_note'){
	shortcodetext = "[note] Insert content here [/note]";
}


/*===================================================================================*/
/*	Features
/*===================================================================================*/
if (selected_shortcode == 'features'){
	shortcodetext = "[features tab1=\"Tab 1 Title\" tab2=\"Tab 2 Title\" tab3=\"Tab 3 Title\"] [featurestab] Insert content here. [/featurestab] [featurestab] Insert content here. [/featurestab]  [featurestab] Insert content here. [/featurestab] [/features]";
}


/*===================================================================================*/
/*	Tabs
/*===================================================================================*/

if (selected_shortcode == 'tabs'){
	shortcodetext = "[tabs tab1=\"Tab 1 Title\" tab2=\"Tab 2 Title\" tab3=\"Tab 3 Title\"] [tab] Insert Tab 1 content here [/tab] [tab] Insert Tab 2 content here [/tab] [tab] Insert Tab 3 content here [/tab] [/tabs]";
}


/*===================================================================================*/
/*	Toggle
/*===================================================================================*/
if (selected_shortcode == 'toggle'){
	shortcodetext = "[toggle title=\"Toggle Title here\"] Insert content here. [/toggle]";
}


/*===================================================================================*/
/*	Accordion
/*===================================================================================*/
if (selected_shortcode == 'acc'){
	shortcodetext = "[acc title=\"Accordion 1 Title here\"] Insert content here. [/acc] [acc title=\"Accordion 2 Title here\"] Insert content here. [/acc] [acc title=\"Accordion 3 Title here\"] Insert content here. [/acc]";
}


// -----------------------------
// 	BUTTONS
// -----------------------------
if (selected_shortcode == 'btn_primary'){
	shortcodetext = "[btn_primary url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_primary]";
}
if (selected_shortcode == 'btn_basic'){
	shortcodetext = "[btn_basic url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_basic]";
}
if (selected_shortcode == 'btn_action'){
	shortcodetext = "[btn_action url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_action]";
}
if (selected_shortcode == 'btn_danger'){
	shortcodetext = "[btn_danger url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_danger]";
}
if (selected_shortcode == 'btn_success'){
	shortcodetext = "[btn_success url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_success]";
}
if (selected_shortcode == 'btn_info'){
	shortcodetext = "[btn_info url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_info]";
}



if (selected_shortcode == 'btn_arrow_primary'){
	shortcodetext = "[btn_arrow_primary url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_arrow_primary]";
}
if (selected_shortcode == 'btn_arrow_basic'){
	shortcodetext = "[btn_arrow_basic url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_arrow_basic]";
}
if (selected_shortcode == 'btn_arrow_action'){
	shortcodetext = "[btn_arrow_action url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_arrow_action]";
}
if (selected_shortcode == 'btn_arrow_danger'){
	shortcodetext = "[btn_arrow_danger url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_arrow_danger]";
}
if (selected_shortcode == 'btn_arrow_success'){
	shortcodetext = "[btn_arrow_success url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_arrow_success]";
}
if (selected_shortcode == 'btn_arrow_info'){
	shortcodetext = "[btn_arrow_info url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_arrow_info]";
}

if (selected_shortcode == 'btn_small_primary'){
	shortcodetext = "[btn_small_primary url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_small_primary]";
}
if (selected_shortcode == 'btn_small_basic'){
	shortcodetext = "[btn_small_basic url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_small_basic]";
}
if (selected_shortcode == 'btn_small_action'){
	shortcodetext = "[btn_small_action url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_small_action]";
}
if (selected_shortcode == 'btn_small_danger'){
	shortcodetext = "[btn_small_danger url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_small_danger]";
}
if (selected_shortcode == 'btn_small_success'){
	shortcodetext = "[btn_small_success url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_small_success]";
}
if (selected_shortcode == 'btn_small_info'){
	shortcodetext = "[btn_small_info url=\"#\" target=\"_self\" position=\"left\"] Button text here [/btn_small_info]";
}


/*===================================================================================*/
/*	Misc
/*===================================================================================*/
if (selected_shortcode == 'tooltip'){
	shortcodetext = "[tip title=\"Insert Tooltip content here\" url=\"Insert Page URL here\"]Insert text here[/tip]";
}
if (selected_shortcode == 'pullquote_left'){
	shortcodetext = "[pullquote_left] Insert content here [/pullquote_left]";
}
if (selected_shortcode == 'pullquote_right'){
	shortcodetext = "[pullquote_right] Insert content here [/pullquote_right]";
}
if (selected_shortcode == 'quote'){
	shortcodetext = "[quote] Insert content here [/quote]";
}
if (selected_shortcode == 'checklist'){
	shortcodetext = "[checklist]<li>List item 1</li><li>List item 2</li><li>List item 3</li>[/checklist]";
}
if (selected_shortcode == 'table'){
	shortcodetext = "[table] Insert table here [/table]";
}
if (selected_shortcode == 'stripped_table'){
	shortcodetext = "[stripped_table] Insert table here [/stripped_table]";
}


if ( selected_shortcode == 0 ){tinyMCEPopup.close();}}
if(window.tinyMCE) {
window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodetext);
tinyMCEPopup.editor.execCommand('mceRepaint');
tinyMCEPopup.close();
}return;
}