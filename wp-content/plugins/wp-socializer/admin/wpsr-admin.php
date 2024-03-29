<?php
/*
 * Main Admin Page for WP Socializer Plugin
 * Author : Aakash Chakravarthy
*/

$wpsr_donate_link = 'http://bit.ly/wpsrDonate';
function wpsr_admin_menu() {

	$icon = WPSR_ADMIN_URL .'images/wp-socializer-20.png';
	
	add_menu_page('WP Socializer - Admin page', 'WP Socializer', 'manage_options', 'wp_socializer', 'wpsr_admin_page', $icon);
	add_submenu_page('wp_socializer', 'WP Socializer - Admin page', 'WP Socializer', 'manage_options', 'wp_socializer', 'wpsr_admin_page');
	add_submenu_page('wp_socializer', 'WP Socializer - Floating Share bar', 'Floating Share bar', 'manage_options', 'wp_socializer_floating_bar', 'wpsr_admin_page_floating_bar');
	add_submenu_page('wp_socializer', 'WP Socializer - In widgets and posts', 'In widgets & posts', 'manage_options', 'wp_socializer_other', 'wpsr_admin_page_other');
}
add_action('admin_menu', 'wpsr_admin_menu');

## Load the Javascripts
function wpsr_admin_js() {
	wp_register_script('wpsr-admin-js', WPSR_ADMIN_URL . 'wpsr-admin-js.js');
	$pages = array('wp_socializer', 'wp_socializer_other', 'wp_socializer_floating_bar');
	
	if (isset($_GET['page']) && (in_array($_GET['page'], $pages))){
		wp_enqueue_script(array(
			'jquery',
			'jquery-ui-core',
			'jquery-ui-sortable',
			'jquery-ui-tabs',
			'wpsr-admin-js'
		));
	}
}
add_action('admin_print_scripts', 'wpsr_admin_js');

## Load the CSS
function wpsr_admin_css() {
	$pages = array('wp_socializer', 'wp_socializer_other', 'wp_socializer_floating_bar');
	
	if (isset($_GET['page']) && (in_array($_GET['page'], $pages))){
		wp_enqueue_style('wp-socializer-admin-css', WPSR_ADMIN_URL . 'wpsr-admin-css.css'); 
	}
}
add_action('admin_print_styles', 'wpsr_admin_css');

## The toolbar
function wpsr_addtoolbar(){
echo 
'<div class="toolbar">
	<ul class="tbButtons">
		<li class="parentLi btn">
			<span class="admSprites socialButtons"></span>Social buttons
			<ul class="childMenu">
				<li openTag="{social-bts-16px}">Social buttons 16px</li>
				<li openTag="{social-bts-32px}">Social buttons 32px</li>
			</ul>	
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites addthisIcon"></span>Addthis
			<ul class="childMenu">
				<li class="showTooltip" openTag="{addthis-tb-16px}" data-image="addthis-tb-16px">Toolbox 16px</li>
				<li class="showTooltip" openTag="{addthis-tb-32px}" data-image="addthis-tb-32px">Toolbox 32px</li>
				<li class="showTooltip" openTag="{addthis-sc}" data-image="adthis-sharecount">Sharecount</li>
				<li class="showTooltip" openTag="{addthis-bt}" data-image="addthis-buttons">Buttons</li>
			</ul>	
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites sharethisIcon"></span>Sharethis
			<ul class="childMenu">
				<li class="showTooltip" openTag="{sharethis-vcount}" data-image="sharethis-vcount">Vertical Count</li>
				<li class="showTooltip" openTag="{sharethis-hcount}" data-image="sharethis-hcount">Horizontal Count</li>
				<li class="showTooltip" openTag="{sharethis-large}" data-image="sharethis-large">Large Buttons</li>
				<li class="showTooltip" openTag="{sharethis-regular}" data-image="sharethis-regular">Regular Buttons</li>
				<li class="showTooltip" openTag="{sharethis-regular2}" data-image="sharethis-regular-notext">Regular Buttons (no-text)</li>
				<li class="showTooltip" openTag="{sharethis-bt}" data-image="sharethis-buttons">Buttons</li>
				<li class="showTooltip" openTag="{sharethis-classic}" data-image="sharethis-classic">Classic</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites facebookIcon"></span>Facebook
			<ul class="childMenu">
				<li openTag="{facebook-like}">Like button</li>
				<li style="opacity:0.2" title="Not available">Like button + Send button</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites googleplusIcon"></span>Google
			<ul class="childMenu">
				<li openTag="{plusone-small}">+1 - Small</li>
				<li openTag="{plusone-medium}">+1 - Medium</li>
				<li openTag="{plusone-standard}">+1 - Standard</li>
				<li openTag="{plusone-tall}">+1 - Tall</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites retweetIcon"></span>Retweet & Digg
			<ul class="childMenu">
				<li openTag="{retweet-bt}">Retweet button</li>
				<li openTag="{digg-bt}">Digg button</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites stumbleuponIcon"></span>StumbleUpon
			<ul class="childMenu">
				<li class="showTooltip" openTag="{stumbleupon-1}" data-image="stumbleupon-bts">Type 1</li>
				<li class="showTooltip" openTag="{stumbleupon-2}" data-image="stumbleupon-bts">Type 2</li>
				<li class="showTooltip" openTag="{stumbleupon-3}" data-image="stumbleupon-bts">Type 3</li>
				<li class="showTooltip" openTag="{stumbleupon-5}" data-image="stumbleupon-bts">Type 5</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites redditIcon"></span>Reddit
			<ul class="childMenu">
				<li class="showTooltip" openTag="{reddit-1}" data-image="reddit-bts">Type 1</li>
				<li class="showTooltip" openTag="{reddit-2}" data-image="reddit-bts">Type 2</li>
				<li class="showTooltip" openTag="{reddit-3}" data-image="reddit-bts">Type 3</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites linkedinIcon"></span>LinkedIn
			<ul class="childMenu">
				<li class="showTooltip" openTag="{linkedin-standard}" data-image="linkedin-bts">Type 1</li>
				<li class="showTooltip" openTag="{linkedin-right}" data-image="linkedin-bts">Type 2</li>
				<li class="showTooltip" openTag="{linkedin-top}" data-image="linkedin-bts">Type 3</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites pinterestIcon"></span>Pinterest
			<ul class="childMenu">
				<li class="showTooltip" openTag="{pinterest-nocount}" data-image="pinterest-bts">Type 1</li>
				<li class="showTooltip" openTag="{pinterest-horizontal}" data-image="pinterest-bts">Type 2</li>
				<li class="showTooltip" openTag="{pinterest-vertical}" data-image="pinterest-bts">Type 3</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites customIcon"></span>Other buttons
			<ul class="childMenu">
				<li openTag="{custom-1}">Custom 1</li>
				<li openTag="{custom-2}">Custom 2</li>
			</ul>
		</li>
			
		<li class="parentLi btn">Headings
			<ul class="childMenu">
				<li openTag="&lt;h1&gt;" closeTag="&lt;/h1&gt;">Heading 1</li>
				<li openTag="&lt;h2&gt;" closeTag="&lt;/h2&gt;">Heading 2</li>
				<li openTag="&lt;h3&gt;" closeTag="&lt;/h3&gt;">Heading 3</li>
				<li openTag="&lt;h4&gt;" closeTag="&lt;/h4&gt;">Heading 4</li>
				<li openTag="&lt;h5&gt;" closeTag="&lt;/h5&gt;">Heading 5</li>
				<li openTag="&lt;h6&gt;" closeTag="&lt;/h6&gt;">Heading 6</li>
			</ul>
		</li>
		
		<li class="parentLi btn">Float
			<ul class="childMenu">
				<li openTag=\' style="float:left"\'>Float Left</li>
				<li openTag=\' style="float:right"\'>Float Right</li>
			</ul>
		</li>
		
	</ul>
	
	<ul class="tbButtons">
		<li class="btn" openTag="&lt;p&gt;" closeTag="&lt;/p&gt;">p</li>
		<li class="btn" openTag="&lt;/br&gt;">br</li>
		<li class="btn" openTag="&lt;span&gt;" closeTag="&lt;/span&gt;">span</li>
		<li class="btn" openTag="&lt;div&gt;" closeTag="&lt;/div&gt;">div</li>
		<li class="btn" openTag="&lt;/hr&gt;">hr</li>
		<li class="btn" openTag="&lt;ul&gt;" closeTag="&lt;/ul&gt;">ul</li>
		<li class="btn" openTag="&lt;li&gt;" closeTag="&lt;/li&gt;">li</li>
		<li class="btn" openTag="&lt;div style=&quot;clear: both&quot;&gt;&lt;/div&gt;">clearer</li>
		<li class="btn"><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" title="Help" target="_blank">?</a></li>
	</ul>	
</div>';
}

## Default values
function wpsr_reset_values(){
	$wpsr_temp1_def = '<div class="wp-socializer-buttons clearfix">
	<span class="wpsr-btn">{facebook-like}</span>
	<span class="wpsr-btn">{retweet-bt}</span>
	<span class="wpsr-btn">{plusone-medium}</span>
	<span class="wpsr-btn">{linkedin-right}</span>
	<span class="wpsr-btn">{stumbleupon-1}</span>
</div>';
	
	$wpsr_temp2_def = '<h3>' . __('Share and Enjoy' ,'wpsr') . '</h3>
{social-bts-32px}';
	
	## Addthis defaults
	$wpsr_addthis['username'] = '';
	$wpsr_addthis['language'] = 'en';
	$wpsr_addthis['button'] = 'lg-share-'; 
	
	$wpsr_addthis['tb_16pxservices'] = $wpsr_addthis['tb_32pxservices'] = 'facebook,twitter,digg,delicious,email,compact';
	$wpsr_addthis['sharecount'] = 'normal';
	
	$wpsr_addthis['btbrand'] = '';
	$wpsr_addthis['clickback'] = 1;
	
	update_option("wpsr_addthis_data", $wpsr_addthis);
	
	## Sharethis defaults
	$wpsr_sharethis['vcount_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['hcount_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['buttons_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['large_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['regular_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['regular2_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['pubkey'] = '';
	$wpsr_sharethis['addp'] = 1;
	
	update_option("wpsr_sharethis_data", $wpsr_sharethis);
	
	## Retweet Defaults
	$wpsr_retweet['username'] = '';
	$wpsr_retweet['type'] = 'compact';
	$wpsr_retweet['service'] = 'twitter';
	$wpsr_retweet['topsytheme'] = 'blue';
	$wpsr_retweet['twitter_recacc'] = '';
	$wpsr_retweet['twitter_lang'] = 'en';
	
	update_option("wpsr_retweet_data", $wpsr_retweet);
	
	## Digg Defaults
	$wpsr_digg['type'] = 'DiggCompact';
	
	update_option("wpsr_digg_data", $wpsr_digg);
	
	## Facebook Defaults
	$wpsr_facebook['btstyle'] = 'button_count';
	$wpsr_facebook['showfaces'] = 0;
	$wpsr_facebook['width'] = 80;
	$wpsr_facebook['verb'] = 'like';
	$wpsr_facebook['font'] = 'arial';
	$wpsr_facebook['color'] = 'light';
	$wpsr_facebook['appid'] = '';
	
	update_option("wpsr_facebook_data", $wpsr_facebook);
	
	## Social Button Defaults
	$wpsr_socialbt['selected16px'] = 'facebook,twitter,delicious,linkedin,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['selected32px'] = 'facebook,twitter,delicious,linkedin,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['target'] = 0;
	$wpsr_socialbt['target'] = 1;
	$wpsr_socialbt['loadcss'] = 1;
	$wpsr_socialbt['effect'] = 'opacity';
	$wpsr_socialbt['label'] = 0;
	$wpsr_socialbt['columns'] = 'no';
	$wpsr_socialbt['imgpath16px'] = WPSR_SOCIALBT_IMGPATH . '16/';
	$wpsr_socialbt['imgpath32px'] = WPSR_SOCIALBT_IMGPATH . '32/';
	$wpsr_socialbt['usesprites'] = 1;
	
	update_option('wpsr_socialbt_data', $wpsr_socialbt);
	
	## Custom Defaults
	$wpsr_custom['custom1'] = '';
	$wpsr_custom['custom2'] = '';
	
	update_option("wpsr_custom_data", $wpsr_custom);
	
	## Placement Defaults | Template 1
	$wpsr_template1['content'] = $wpsr_temp1_def;
	$wpsr_template1['inhome'] = 0;
	$wpsr_template1['insingle'] = 1;
	$wpsr_template1['inpage'] = 1;
	$wpsr_template1['incategory'] = 0;
	$wpsr_template1['intag'] = 0;
	$wpsr_template1['indate'] = 0;
	$wpsr_template1['inauthor'] = 0;
	$wpsr_template1['insearch'] = 0;
	$wpsr_template1['inexcerpt'] = 0;
	$wpsr_template1['infeed'] = 0;
	$wpsr_template1['abvcontent'] = 1;
	$wpsr_template1['blwcontent'] = 0;
	
	update_option("wpsr_template1_data", $wpsr_template1);
	
	## Placement Defaults | Template 2
	$wpsr_template2['content'] = $wpsr_temp2_def;
	$wpsr_template2['inhome'] = 1;
	$wpsr_template2['insingle'] = 1;
	$wpsr_template2['inpage'] = 1;
	$wpsr_template2['incategory'] = 1;
	$wpsr_template2['intag'] = 1;
	$wpsr_template2['indate'] = 1;
	$wpsr_template2['inauthor'] = 1;
	$wpsr_template2['insearch'] = 1;
	$wpsr_template2['inexcerpt'] = 1;
	$wpsr_template2['infeed'] = 1;
	$wpsr_template2['abvcontent'] = 0;
	$wpsr_template2['blwcontent'] = 1;
	$wpsr_template2['addp'] = 0;
	
	update_option("wpsr_template2_data", $wpsr_template2);
	
	## Settings Defaults
	$wpsr_settings['rssoutput'] = '';
	$wpsr_settings['bitlyusername'] = '';
	$wpsr_settings['bitlyapi'] = '';
	$wpsr_settings['disablewpsr'] = 0;
	$wpsr_settings['scriptsplace'] = 'header';
	
	update_option("wpsr_settings_data", $wpsr_settings);
}

## Check what to show in the admin
function wpsr_show_admin(){
	if(get_option('wpsr_version') == WPSR_VERSION){
		return 1;
	}else{
		return 0;
	}
}

## Fix version 1.0 settings
function wpsr_version1_fix(){
	$wpsr_socialbt['selected16px'] = 'facebook,twitter,delicious,digg,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['selected32px'] = 'facebook,twitter,delicious,digg,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['imgpath16px'] = WPSR_SOCIALBT_IMGPATH . '16/';
	$wpsr_socialbt['imgpath32px'] = WPSR_SOCIALBT_IMGPATH . '32/';
	update_option('wpsr_socialbt_data', $wpsr_socialbt);
}

## Admin Menu
function wpsr_admin_page(){

	$wpsr_updated = false;
	
	## Get the global variables
	global $wpsr_socialsites_list, $wpsr_addthis_lang_array, $wpsr_button_code_list, $wpsr_donate_link;
	
	if (function_exists('current_user_can') && !current_user_can('manage_options'))
			die(__('Sorry you do not have enough previliges to access this page.'));
	
	## Reset form on submit
	if (isset($_POST['wpsr_reset']) && check_admin_referer('wpsr_main_form')){
		wpsr_reset_values();
		$wpsr_reseted = true;
	}
	
	## Version intro form on submit
	if (isset($_POST['wpsr_intro_submit']) && check_admin_referer('wpsr_intro_form')){
		update_option("wpsr_version", WPSR_VERSION);
	}
	
	## Main form on submit
	if (isset($_POST["wpsr_submit"]) && check_admin_referer('wpsr_main_form')) {
		## Addthis options
		$wpsr_addthis['username'] = $_POST['wpsr_addthis_username'];
		$wpsr_addthis['language'] = $_POST['wpsr_addthis_lang'];
		$wpsr_addthis['button'] = $_POST['wpsr_addthis_button'];
		
		$wpsr_addthis['tb_16pxservices'] = $_POST['wpsr_addthis_tb_16pxservices'];
		$wpsr_addthis['tb_32pxservices'] = $_POST['wpsr_addthis_tb_32pxservices'];
		$wpsr_addthis['sharecount'] = $_POST['wpsr_addthis_sharecount'];
		
		$wpsr_addthis['btbrand'] = $_POST['wpsr_addthis_btbrand'];
		$wpsr_addthis['clickback'] = $_POST['wpsr_addthis_clickback'];
		
		update_option("wpsr_addthis_data", $wpsr_addthis);
		
		## Sharethis Options
		$wpsr_sharethis['vcount_order'] = $_POST['wpsr_sharethis_vcount_order'];
		$wpsr_sharethis['hcount_order'] = $_POST['wpsr_sharethis_hcount_order'];
		$wpsr_sharethis['buttons_order'] = $_POST['wpsr_sharethis_buttons_order'];
		$wpsr_sharethis['large_order'] = $_POST['wpsr_sharethis_large_order'];
		$wpsr_sharethis['regular_order'] = $_POST['wpsr_sharethis_regular_order'];
		$wpsr_sharethis['regular2_order'] = $_POST['wpsr_sharethis_regular2_order'];
		$wpsr_sharethis['pubkey'] = $_POST['wpsr_sharethis_pubkey'];
		$wpsr_sharethis['addp'] = $_POST['wpsr_sharethis_addp'];
		
		update_option("wpsr_sharethis_data", $wpsr_sharethis);
		
		## Retweet Options
		$wpsr_retweet['username'] = $_POST['wpsr_retweet_username'];
		$wpsr_retweet['type'] = $_POST['wpsr_retweet_type'];
		$wpsr_retweet['service'] = $_POST['wpsr_retweet_service'];
		$wpsr_retweet['topsytheme'] = $_POST['wpsr_retweet_topsytheme'];
		$wpsr_retweet['twitter_recacc'] = $_POST['wpsr_retweet_twitter_recacc'];
		$wpsr_retweet['twitter_lang'] = $_POST['wpsr_retweet_twitter_lang'];
		
		update_option("wpsr_retweet_data", $wpsr_retweet);
		
		## Digg Options
		$wpsr_digg['type'] = $_POST['wpsr_digg_type'];
		
		update_option("wpsr_digg_data", $wpsr_digg);
		
		## Facebook Options
		$wpsr_facebook['btstyle'] = $_POST['wpsr_facebook_btstyle'];
		$wpsr_facebook['showfaces'] = $_POST['wpsr_facebook_showfaces'];
		$wpsr_facebook['width'] = $_POST['wpsr_facebook_width'];
		$wpsr_facebook['verb'] = $_POST['wpsr_facebook_verb'];
		$wpsr_facebook['font'] = $_POST['wpsr_facebook_font'];
		$wpsr_facebook['color'] = $_POST['wpsr_facebook_color'];
		$wpsr_facebook['appid'] = $_POST['wpsr_facebook_appid'];
		
		update_option("wpsr_facebook_data", $wpsr_facebook);
		
		## Social Button Options
		$wpsr_socialbt['target'] = $_POST['wpsr_socialbt_target'];
		$wpsr_socialbt['nofollow'] = $_POST['wpsr_socialbt_nofollow'];
		$wpsr_socialbt['loadcss'] = $_POST['wpsr_socialbt_loadcss'];
		$wpsr_socialbt['effect'] = $_POST['wpsr_socialbt_effect'];
		$wpsr_socialbt['label'] = $_POST['wpsr_socialbt_label'];
		$wpsr_socialbt['columns'] = $_POST['wpsr_socialbt_columns'];
		$wpsr_socialbt['selected16px'] = $_POST['wpsr_socialbt_selected16px'];
		$wpsr_socialbt['selected32px'] = $_POST['wpsr_socialbt_selected32px'];
		$wpsr_socialbt['imgpath16px'] = $_POST['wpsr_socialbt_imgpath16px'];
		$wpsr_socialbt['imgpath32px'] = $_POST['wpsr_socialbt_imgpath32px'];
		$wpsr_socialbt['usesprites'] = $_POST['wpsr_socialbt_usesprites'];
		
		update_option('wpsr_socialbt_data', $wpsr_socialbt);
		
		## Custom Options
		$wpsr_custom['custom1'] = stripslashes($_POST['wpsr_custom1']);
		$wpsr_custom['custom2'] = stripslashes($_POST['wpsr_custom2']);
		
		update_option("wpsr_custom_data", $wpsr_custom);
		
		## Placement OptionS
		$wpsr_templates = $_POST['wpsr_template'];
		$templates = get_option('wpsr_templates'); // Get the list of templates defined
		
		foreach($templates as $k => $v){
			$wpsr_template_temp['content'] = stripslashes($wpsr_templates[$k]['content']);
			$wpsr_template_temp['inhome'] = $wpsr_templates[$k]['inhome'];
			$wpsr_template_temp['insingle'] = $wpsr_templates[$k]['insingle'];
			$wpsr_template_temp['inpage'] = $wpsr_templates[$k]['inpage'];
			$wpsr_template_temp['incategory'] = $wpsr_templates[$k]['incategory'];
			$wpsr_template_temp['intag'] = $wpsr_templates[$k]['intag'];
			$wpsr_template_temp['indate'] = $wpsr_templates[$k]['indate'];
			$wpsr_template_temp['inauthor'] = $wpsr_templates[$k]['inauthor'];
			$wpsr_template_temp['insearch'] = $wpsr_templates[$k]['insearch'];
			$wpsr_template_temp['inexcerpt'] = $wpsr_templates[$k]['inexcerpt'];
			$wpsr_template_temp['infeed'] = $wpsr_templates[$k]['infeed'];
			$wpsr_template_temp['abvcontent'] = $wpsr_templates[$k]['abvcontent'];
			$wpsr_template_temp['blwcontent'] = $wpsr_templates[$k]['blwcontent'];
			$wpsr_template_temp['addp'] = $wpsr_templates[$k]['addp'];
			
			update_option("wpsr_template" . $k . "_data", $wpsr_template_temp);
		}
		
		## Settings options
		$wpsr_settings['rssurl'] = $_POST['wpsr_settings_rssurl'];
		$wpsr_settings['bitlyusername'] = $_POST['wpsr_settings_bitlyusername'];
		$wpsr_settings['bitlyapi'] = $_POST['wpsr_settings_bitlyapi'];
		$wpsr_settings['disablewpsr'] = $_POST['wpsr_settings_disablewpsr'];
		$wpsr_settings['scriptsplace'] = $_POST['wpsr_settings_scriptsplace'];
		
		update_option("wpsr_settings_data", $wpsr_settings);
		
		$wpsr_updated = true;
		
		if(get_option("wpsr_active") == 0){
			update_option("wpsr_active", 1);
		}
	}
	
	if($wpsr_updated == true){
		echo "<div class='message updated autoHide'><p>" . __('Updated successfully', 'wpsr') . "</p></div>";
	}
	
	if($wpsr_reseted == true){
		echo "<div class='message updated autoHide'><p>" . __('Values are set to defaults successfully', 'wpsr') . "</p></div>";
	}
	
	if($wpsr_v1fix == true){
		echo "<div class='message updated autoHide'><p>" . __('You have upgraded from version 1.0, So some settings are fixed to suit new version.', 'wpsr') . "</p></div>";
	}
	
	## Assign the defaults to temp variables
	$wpsr_addthis = get_option('wpsr_addthis_data');
	$wpsr_sharethis = get_option('wpsr_sharethis_data');
	$wpsr_retweet = get_option('wpsr_retweet_data');
	$wpsr_digg = get_option('wpsr_digg_data');
	$wpsr_facebook = get_option('wpsr_facebook_data');
	$wpsr_socialbt = get_option('wpsr_socialbt_data');
	$wpsr_custom = get_option('wpsr_custom_data');
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	$wpsr_settings = get_option('wpsr_settings_data');
	
	## For new users set the defaults
	if($wpsr_template1 == '' && $wpsr_template2 == ''){
		wpsr_reset_values();
	}
	
	## Assign the values of the template temporary
	$templates = get_option('wpsr_templates');
	foreach($templates as $k => $v){
		$wpsr_template[$k] = get_option('wpsr_template' . $k . '_data');
	}
	
	if($wpsr_socialbt['imgpath16px'] == WPSR_URL . 'social-icons/16/'){
		wpsr_version1_fix();
		$wpsr_v1fix = true;
	}

	if($wpsr_settings['disablewpsr']){
		$wpsr_is_disabled = ' | <span class="redText">' . __('Disabled', 'wpsr') . '</span>';
	}

?>

<!-- Hidden fields -->
<div style="display:none">
	<span class="wpsrAdminUrl"><?php echo WPSR_ADMIN_URL; ?></span>
	<span class="tmplUrl"><?php echo WPSR_ADMIN_URL . 'templates/templates.xml'; ?></span>
	<span class="tmplImg"><?php echo WPSR_ADMIN_URL . 'templates/'; ?></span>
	<span class="wpsrVer" style="display:none"><?php echo WPSR_VERSION; ?></span>
</div>

<?php if(wpsr_show_admin() == 1): ?>
<!-- Main ADMIN page -->
<div class="wrap">
	<div class="header">
		<?php echo wpsr_admin_buttons('fbrec'); ?>
		<h2><img width="32" height="32" src="<?php echo WPSR_ADMIN_URL; ?>images/wp-socializer.png" align="absmiddle"/>&nbsp;WP Socializer<span class="smallText"> v<?php echo WPSR_VERSION; ?><?php echo $wpsr_is_disabled; ?></span></h2>
	</div><!-- Header -->
	
	<ul class="wpsr_share_wrap">
	<li class="wpsr_donate" data-width="300" data-height="220" data-url="<?php echo WPSR_ADMIN_URL . 'js/share.php?i=1'; ?>"><a href="#"></a></li>
	<li class="wpsr_share" data-width="350" data-height="85" data-url="<?php echo WPSR_ADMIN_URL . 'js/share.php?i=2'; ?>"><a href="#"></a></li>
	<li class="wpsr_pressthis" title="Share a small post about this plugin in your blog !"><a href="press-this.php" target="_blank"></a></li>
	</ul>
	
	<form id="content" method="post">
		<ul id="tabs" class="clearfix">
			<li><a href="#tab-1">Start</a></li>
			<li><a href="#tab-2">Buttons</a></li>
			<li><a href="#tab-3">Placement</a></li>
			
			<li style="float:right"><a href="#tab-5" class="helpTab">Help</a></li>
			<li style="float:right"><a href="#tab-4">Settings</a></li>
		</ul>
		
		<div id="tab-1" class="clearfix">
			<div class="leftCnt">
				<h2>One click - setup</h2>
				<p>Start using WP Socializer by selecting pre-made set of button templates for your site. Just select the button set you like to use and Save the settings.</p>
				
				<div class="startBt"><span data-win="winTemplates" data-title="Select a template">Select an Inbuilt template</span></div>
				
				<p align="center">(or)</p>
						
				<h2>Manual setup</h2>
				<p>If you want to use your own customized button set for your site, then just move further to create your customized buttons template.</p>
				
				<div class="startBt" data-tab="2"><span>Manual customization</span></div>
				
			</div>
			
		  <div class="rightCnt">
				<h5>Note</h5>
				<p class="note">After selecting an Inbuilt template. You can also customize it under the "<a data-tab="3" href="#tab-2">Placement</a>" tab.</p>
				<h5>Floating Share bar</h5>
				<p class="note">Customize the floating share bar in <a href="admin.php?page=wp_socializer_floating_bar">this page</a>.</p>
				<h5>Other Useful plugins</h5>
				<p class="note">
						- <a href="http://www.aakashweb.com/wordpress-plugins/html-javascript-adder/" target="_blank">HTML Javascript Adder</a><br />
						- <a href="http://www.aakashweb.com/wordpress-plugins/shortcoder/" target="_blank">Shortcoder</a><br />
						- <a href="http://www.aakashweb.com/wordpress-plugins/super-rss-reader/" target="_blank">Super RSS Reader</a><br />
						- <a href="http://www.aakashweb.com/wordpress-plugins/announcer/" target="_blank">Announcer</a><br />
						- <a href="http://www.aakashweb.com/wordpress-plugins/wp-selected-text-sharer/" target="_blank">WP Selected text Sharer</a>
				</p>
			</div>
		</div>
		
		<div id="tab-2" class="clearfix">
			<div class="leftCnt">
				<h3 class="noToggle">Edit button properties: </h3>
				<p>Click to edit the button properties.</p>
				<ul class="buttonsList clearfix">
					<li data-win="winSocialBts" data-width="85%" data-title="Social Buttons"><span class="admSprites socialButtons"></span> Social buttons</li>
					<li data-win="winAddthis" data-title="Addthis"><span class="admSprites addthisIcon"></span> Addthis</li>
					<li data-win="winSharethis" data-title="Sharethis"><span class="admSprites sharethisIcon"></span> Sharethis</li>
					<li data-win="winRetweetDigg" data-title="Retweet and Digg"><span class="admSprites retweetIcon"></span> Retweet &amp; Digg</li>
					<li data-win="winFacebook" data-title="Facebook"><span class="admSprites facebookIcon"></span> Facebook</li>
					<li data-win="winCustom" data-title="Custom buttons"><span class="admSprites customIcon"></span> Add a custom button</li>
				</ul>
				
				<p class="nextStep" data-tab="3">Next step: Insert these customized buttons in the template</p>
				
			</div><!-- Left content -->
			
			<div class="rightCnt">
				<h5>Note</h5>
				<p class="note">Other buttons like Google +1, StumbleUpon, Reddit, Pinterest do not have settings to be customized. <br/> <br/> Just use them directly in the template.</p>
			</div>
			
		</div><!-- Tab - 2-->
		
		<div id="tab-3">
			<ul id="subTabs" class="clearfix">
			<?php
				$templates = get_option('wpsr_templates');
				foreach($templates as $k => $v){
					echo '<li data-editor="wpsr_template[' . $k . '][content]">
						<a href="#sub-tab-' . $k . '">' . $v['name'] . '</a>
					</li>';
				}
			?>
			</ul>
			
			<div class="toolbar clearfix">
			<?php wpsr_addtoolbar(); ?>
			</div>
			
			<?php 
				foreach($templates as $k => $v):
			?>
			<div id="sub-tab-<?php echo $k; ?>">
				<div class="section">
				<textarea class="wpsr_content" name="wpsr_template[<?php echo $k; ?>][content]" id="wpsr_template[<?php echo $k; ?>][content]" rows="7"><?php echo $wpsr_template[$k]['content']; ?></textarea>
				</div>
				
				<h3>Where to show these buttons ?</h3>
				<div class="section">
				<table width="100%" border="0">
				  <tr>
					<td><label><input name="wpsr_template[<?php echo $k; ?>][inhome]" id="wpsr_template[<?php echo $k; ?>][inhome]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['inhome'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in front page', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][insingle]" id="wpsr_template[<?php echo $k; ?>][insingle]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['insingle'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in individual posts', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][inpage]" id="wpsr_template[<?php echo $k; ?>][inpage]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['inpage'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][incategory]" id="wpsr_template[<?php echo $k; ?>][incategory]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['incategory'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Category pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][intag]" id="wpsr_template[<?php echo $k; ?>][intag]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['intag'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Tag pages', 'wpsr'); ?></label></td>
					<td><label><input name="wpsr_template[<?php echo $k; ?>][indate]" id="wpsr_template[<?php echo $k; ?>][indate]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['indate'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in date archives', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][inauthor]" id="wpsr_template[<?php echo $k; ?>][inauthor]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['inauthor'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in author pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][insearch]" id="wpsr_template[<?php echo $k; ?>][insearch]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['insearch'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in search pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][inexcerpt]" id="wpsr_template[<?php echo $k; ?>][inexcerpt]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['inexcerpt'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Excerpt', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template[<?php echo $k; ?>][infeed]" id="wpsr_template[<?php echo $k; ?>][infeed]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['infeed'] == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in RSS feeds', 'wpsr'); ?></label></td>
				  </tr>
				</table>
				</div>
				
				<h3>Where to position these buttons ?</h3>
				<div class="section">
					<label><input name="wpsr_template[<?php echo $k; ?>][abvcontent]" id="wpsr_template[<?php echo $k; ?>][abvcontent]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['abvcontent'] == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Above content', 'wpsr'); ?></label>
				
					<label><input name="wpsr_template[<?php echo $k; ?>][blwcontent]" id="wpsr_template[<?php echo $k; ?>][blwcontent]" type="checkbox" value="1" <?php echo $wpsr_template[$k]['blwcontent'] == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Below content', 'wpsr'); ?></label>
				</div>
				
				<br />
				<h5>Note:</h5>
				<p class="note">Use the menu above to insert the buttons into the template<br/>All HTML/CSS tags can be used. The button codes can be wrapped with HTML tags for proper aligning.</p>
				
			</div>
			<?php endforeach; ?>	
	
		</div><!-- Tab - 3-->
		
		<div id="tab-4">
			<h3>RSS <?php _e('Settings', 'wpsr'); ?></h3>
			<div class="section">
				<table width="100%" height="39" border="0">
				   <tr>
					<td width="49%" height="35">RSS <?php _e('URL', 'wpsr'); ?><br />
		<span class="smallText"><?php _e('Leave blank to use default Wordpress RSS feed.', 'wpsr'); ?> <br/><?php _e('You can use Feedburner feed URL also', 'wpsr'); ?></span></td>
					<td width="51%"><input name="wpsr_settings_rssurl" type="text" id="wpsr_settings_rssurl" value="<?php echo $wpsr_settings['rssurl']; ?>" size="60"/>
					 </td>
				  </tr>
				</table>
			</div>
			
			<h3>Bit.ly <?php _e('Integration', 'wpsr'); ?></h3>
			<div class="section">
				<table width="100%" height="39" border="0">
				  <tr>
					<td width="49%" height="35"><label for="wpsr_settings_bitlyusername">Bit.ly <?php _e('Username', 'wpsr'); ?></label></td>
					<td width="51%"><input name="wpsr_settings_bitlyusername" id="wpsr_settings_bitlyusername" type="text" value="<?php echo $wpsr_settings['bitlyusername']; ?>"/></td>
				  </tr>
				  
				  <tr>
					<td width="49%" height="35"><label for="wpsr_settings_bitlyapi">Bit.ly API Key</label></td>
					<td width="51%"><input name="wpsr_settings_bitlyapi" id="wpsr_settings_bitlyapi" type="text" value="<?php echo $wpsr_settings['bitlyapi']; ?>"/></td>
				  </tr>
				  
				</table>
			</div>
			
			<h3><?php _e('WP Socializer Settings', 'wpsr'); ?></h3>
			<div class="section">
				<table width="100%" height="84" border="0">
				  <tr>
					<td width="49%" height="40"><label for="wpsr_settings_scriptsplace"><?php _e('Load button scripts in ', 'wpsr'); ?></label></td>
					<td width="51%"><select id="wpsr_settings_scriptsplace" name="wpsr_settings_scriptsplace">
					  <option <?php echo $wpsr_settings['scriptsplace'] == 'header' ? ' selected="selected"' : ''; ?> value="header"><?php _e('Header (recommended)', 'wpsr'); ?></option>
					  <option <?php echo $wpsr_settings['scriptsplace'] == 'footer' ? ' selected="selected"' : ''; ?> value="footer"><?php _e('Footer', 'wpsr'); ?></option>
					</select></td>
				  </tr>
				  <tr>
					<td height="34"><?php _e('Load WP Socializer CSS', 'wpsr'); ?>
					<br /><span class="smallText"><?php _e('Note: templates, hover effects &amp; column will not work', 'wpsr'); ?></span></td>
					<td><select id="wpsr_socialbt_loadcss" name="wpsr_socialbt_loadcss">
					  <option <?php echo $wpsr_socialbt['loadcss'] == '1' ? ' selected="selected"' : ''; ?> value="1">
						<?php _e('Yes', 'wpsr'); ?>
					  </option>
					  <option <?php echo $wpsr_socialbt['loadcss'] == '0' ? ' selected="selected"' : ''; ?> value="0">
						<?php _e('No', 'wpsr'); ?>
					  </option>
					</select></td>
				  </tr>
			  </table>
		  </div>
			  
			  <h3><?php _e('Disable WP Socializer', 'wpsr'); ?></h3>
				<div class="section">
					<table width="100%" height="39" border="0">
					   <tr>
						<td width="49%" height="35"><?php _e('Temporarily disable all WP-Socializer buttons ', 'wpsr'); ?><br />
			<span class="smallText"><?php _e('Disabling will stop displaying all buttons, templates', 'wpsr'); ?></span></td>
						<td width="51%"><select id="wpsr_settings_disablewpsr" name="wpsr_settings_disablewpsr">
				<option <?php echo $wpsr_settings['disablewpsr'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
				<option <?php echo $wpsr_settings['disablewpsr'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			</select>
						 </td>
					  </tr>
					</table>
				</div>
				
		</div><!-- Tab - 4 -->
		
		<div id="tab-5">
			<h3>Help</h3>
			<div class="section helpBox">
				<p>Click the "Help" tab to load the help file.</p>
			</div>
		</div>
		
		<div class="footer">
		<?php wp_nonce_field('wpsr_main_form'); ?>
		<input class="button-primary" type="submit" name="wpsr_submit" id="wpsr_submit" value="<?php _e('Update', 'wpsr'); ?>" />
		<input class="button alignright" type="submit" name="wpsr_reset" id="wpsr_reset" value="  <?php _e('Reset', 'wpsr'); ?>   " />
		</div>
		
		
		
	<!-- Button settings -->
	<div class="window">
		
		<!-- SOCIAL BTS -->
		<div class="inWindow winSocialBts">
		<input type="hidden" id="wpsr_socialbt_selected16px" name="wpsr_socialbt_selected16px" value="<?php echo $wpsr_socialbt['selected16px']; ?>" />
		<input type="hidden" id="wpsr_socialbt_selected32px" name="wpsr_socialbt_selected32px" value="<?php echo $wpsr_socialbt['selected32px']; ?>" />
		<a href="#settings" class="sbSettingsBt">Settings</a>
		
		<h3>Select the required social bookmarking buttons</h3>
		
		<div class="section clearfix">
		
		<span class="smallText"><?php _e('Click the icon size to select and "x" button to remove selected. Click and drag to reorder selected sites', 'wpsr'); ?></span>
		
		<div class="sbLeftCnt">
			<h5><?php _e('Available buttons', 'wpsr'); ?> <input type="text" placeholder="Filter..." id="sbFilter" title="<?php _e('Filter buttons', 'wpsr'); ?>"/></h5>
			
			<?php 
				$spriteImage16px = WPSR_SOCIALBT_IMGPATH . 'wp-socializer-sprite-16px.png';
				$spriteMaskImage16px = WPSR_SOCIALBT_IMGPATH . 'wp-socializer-sprite-mask-16px.gif';
				
				echo '<ul id="sbList">';
				foreach ($wpsr_socialsites_list as $sitename => $property) {
				
					$spritesYCoord = get_sprite_coord($sitename, $wpsr_socialsites_list, '16px');
					$finalSprites = '0px -' . $spritesYCoord . 'px';    'wp-socializer-sprite-mask-16px.gif';
					
					echo 
					"\n<li>" .
					'<img src="' . $spriteMaskImage16px . '" alt="' . $sitename . '" style="background-position:' . $finalSprites . '" />' . 
					'<span class="sbName">' . $sitename . '</span>' . 
					'<span class="sbAdd sbAdd_16px" data-pixel="16">16</span>';
					
					if($property['support32px'] == 1){
						echo '<span class="sbAdd sbAdd_32px" data-pixel="32">32</span>';
					}
					echo "</li>\n";
				}
				echo '</ul>';
			?>
		</div>
			
		<div class="sbRightCnt">
			<h4><?php _e('Selected buttons', 'wpsr'); ?> | 16px </h4>
			<ul class="sbSelList" id="sbSelList_16px">
			<?php
				$wpsr_socialbt_splited16px = explode(',', $wpsr_socialbt['selected16px']);
				for($i=0; $i < count($wpsr_socialbt_splited16px); $i++){
					echo '<li><span class="sbName">' . $wpsr_socialbt_splited16px[$i] . '</span><span class="sbDelete">x</span></li>' . "\n";
				}
			?>
			</ul>
						
			<h4><?php _e('Selected buttons', 'wpsr'); ?> | 32px</h4>
			<ul class="sbSelList" id="sbSelList_32px">
			<?php
				$wpsr_socialbt_splited32px = explode(',', $wpsr_socialbt['selected32px']);
				for($i=0; $i < count($wpsr_socialbt_splited32px); $i++){
					echo '<li><span class="sbName">' . $wpsr_socialbt_splited32px[$i] . '</span><span class="sbDelete">x</span></li>';
				}
			?>
			</ul>
		</div>
			
		</div>
		<a id="settings"></a>
		<h3><?php _e('Settings', 'wpsr'); ?></h3>
		<div class="section">
		<table width="100%" border="0">
		  <tr>
			<td height="35"><?php _e('Open links in new tab/window', 'wpsr'); ?></td>
			<td><select id="wpsr_socialbt_target" name="wpsr_socialbt_target">
			  <option <?php echo $wpsr_socialbt['target'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_socialbt['target'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  
		  <tr>
			<td height="35"><?php _e('Add <code>rel="nofollow"</code> attribute to links', 'wpsr'); ?></td>
			<td><select id="wpsr_socialbt_nofollow" name="wpsr_socialbt_nofollow">
			  <option <?php echo $wpsr_socialbt['nofollow'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_socialbt['nofollow'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  
		  <tr>
			<td height="35"><?php _e('Image on Hover effect', 'wpsr'); ?> <small class="redText">New effects</small></td>
			<td><select id="wpsr_socialbt_effect" name="wpsr_socialbt_effect">
			  <option <?php echo $wpsr_socialbt['effect'] == 'magnify' ? ' selected="selected"' : ''; ?> value="magnify">Magnify Effect (New)</option>
			  <option <?php echo $wpsr_socialbt['effect'] == 'jump' ? ' selected="selected"' : ''; ?> value="jump">Jump Effect (Updated)</option>
			  <option <?php echo $wpsr_socialbt['effect'] == 'opacity' ? ' selected="selected"' : ''; ?> value="opacity">Transparency Effect</option>
			  <option <?php echo $wpsr_socialbt['effect'] == 'none' ? ' selected="selected"' : ''; ?> value="none"><?php _e('No Effect', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td height="40"><?php _e('Show Label for buttons', 'wpsr'); ?> </td>
			<td><select id="wpsr_socialbt_label" name="wpsr_socialbt_label">
			  <option <?php echo $wpsr_socialbt['label'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_socialbt['label'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td height="53"><?php _e('Show Icons in', 'wpsr'); ?> <br />
			<span class="smallText"><?php _e('Very very effective when labels are enabled (try it)', 'wpsr'); ?></span>		</td>
			<td><select id="wpsr_socialbt_columns" name="wpsr_socialbt_columns">
			  <option <?php echo $wpsr_socialbt['columns'] == 'no' ? ' selected="selected"' : ''; ?> value="no">No Column</option>
			  <option <?php echo $wpsr_socialbt['columns'] == '5' ? ' selected="selected"' : ''; ?> value="5">5 Columns</option>
			  <option <?php echo $wpsr_socialbt['columns'] == '4' ? ' selected="selected"' : ''; ?> value="4">4 Columns</option>
			  <option <?php echo $wpsr_socialbt['columns'] == '3' ? ' selected="selected"' : ''; ?> value="3">3 Columns</option>
			  <option <?php echo $wpsr_socialbt['columns'] == '2' ? ' selected="selected"' : ''; ?> value="2">2 Columns</option>
			</select></td>
		  </tr>
		  <tr>
			<td height="53"><?php _e('Image folder', 'wpsr'); ?><br />
			<span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span>		</td>
			<td> 
			  <input name="wpsr_socialbt_imgpath16px" type="text" id="wpsr_socialbt_imgpath16px" value="<?php echo (empty($wpsr_socialbt['imgpath16px'])) ? WPSR_SOCIALBT_IMGPATH . '16/' : $wpsr_socialbt['imgpath16px']; ?>" size="40" />
			  (16px)<br />
			   
			  <input name="wpsr_socialbt_imgpath32px" type="text" id="wpsr_socialbt_imgpath32px" value="<?php echo (empty($wpsr_socialbt['imgpath32px'])) ? WPSR_SOCIALBT_IMGPATH . '32/' : $wpsr_socialbt['imgpath32px']; ?>" size="40" />
			  (32px)</td>
		  </tr>
		  <tr>
			<td height="35"><?php _e('Use Sprites', 'wpsr'); ?></td>
			<td><select id="wpsr_socialbt_usesprites" name="wpsr_socialbt_usesprites">
			  <option <?php echo $wpsr_socialbt['usesprites'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_socialbt['usesprites'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		</table>
		</div>
		</div><!-- Social bts -->
		
		
		<div class="inWindow winAddthis">
			<h3>Toolbox</h3>
			<div class="section">
			  <table width="100%" height="139" border="0" class="tableClr">
				<tr>
				  <th height="30">Toolbox type </th>
				  <th><?php _e('Services', 'wpsr'); ?></th>
				</tr>
				<tr>
				  <td width="35%" height="53"><label for="wpsr_addthis_tb_16pxservices"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/addthis-tb-16px.png" title="16px Icons"/></label></td>
				  <td width="65%"><input name="wpsr_addthis_tb_16pxservices" type="text" id="wpsr_addthis_tb_16pxservices" value="<?php echo $wpsr_addthis['tb_16pxservices']; ?>" size="35" /> <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_addthis_tb_16pxservices&bt=addthis&val=', 'wpsr_addthis_tb_16pxservices');" />
				  <br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span>
				  </td>
				</tr>
				<tr>
				  <td height="48"><label for="wpsr_addthis_tb_32pxservices"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/addthis-tb-32px.png" title="32px Icons"/></label></td>
				  <td><input name="wpsr_addthis_tb_32pxservices" type="text" id="wpsr_addthis_tb_32pxservices" value="<?php echo $wpsr_addthis['tb_32pxservices']; ?>" size="35" /> <input class="button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_addthis_tb_32pxservices&bt=addthis&val=', 'wpsr_addthis_tb_32pxservices');"/>
				  <br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span>
				  </td>
				</tr>
			  </table>
			</div>
			
			<h3>Sharecount</h3>
			<div class="section">
			  <table width="100%">
				<tr>
				<td><label><input name="wpsr_addthis_sharecount" id="wpsr_addthis_sharecount" type="radio" value="normal" <?php echo $wpsr_addthis['sharecount'] == 'normal' ? ' checked="checked"' : ''; ?> /> <img src="http://cache.addthiscdn.com/www/q0197/images/sharecount-vertical.png" title="Sharecount - Large"/></label></td>
				<td><label><input name="wpsr_addthis_sharecount" id="wpsr_addthis_sharecount" type="radio" value="pill" <?php echo $wpsr_addthis['sharecount'] == 'pill' ? ' checked="checked"' : ''; ?> /> <img src="http://cache.addthiscdn.com/www/q0197/images/sharecount-horizontal.png" title="Sharecount - Pill style"/></label></td>
				<td> <label><input name="wpsr_addthis_sharecount" id="wpsr_addthis_sharecount" type="radio" value="grouped" <?php echo $wpsr_addthis['sharecount'] == 'grouped' ? ' checked="checked"' : ''; ?> /> <img src="http://cache.addthiscdn.com/www/q0197/images/gtc-like-tweet-share.png" title="Sharecount - grouped"/></label></td>
				</tr>
			</table> 
			</div>
			
			<h3><?php _e('Buttons', 'wpsr'); ?></h3>
			<div class="section">
			<table width="100%">
				<tr>
					<td><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="lg-share-" <?php echo $wpsr_addthis['button'] == 'lg-share-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/lg-share-<?php echo $wpsr_addthis['language']; ?>.gif" alt="Share button - Large"/></label></td>
					<td><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="sm-share-" <?php echo $wpsr_addthis['button'] == 'sm-share-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/sm-share-en.gif" alt="Share button - Small"/></label></td>
				</tr>
			</table>
			</div>
	
			<h3><?php _e('Optional button Settings', 'wpsr'); ?></h3>
			<div class="section">
			<table width="100%" border="0">
			  <tr>
				<td height="52"><label for="wpsr_addthis_username"><?php _e('AddThis PubID', 'wpsr'); ?></label></td>
				<td><input type="text" id="wpsr_addthis_username"  name="wpsr_addthis_username" value="<?php echo $wpsr_addthis['username']; ?>" /><br /><span class="smallText"> <?php _e('If available', 'wpsr'); ?></span></td>
				<td><label for="wpsr_addthis_lang"><?php _e('Language', 'wpsr'); ?></label></td>
				<td><select name="wpsr_addthis_lang" id="wpsr_addthis_lang">
				  <?php foreach ($wpsr_addthis_lang_array as $lang=>$name){echo "<option value=\"$lang\"". ($lang == $wpsr_addthis['language'] ? " selected":"") . ">$name</option>";}?>
				</select></td>
			  </tr>
			  <tr>
				<td width="13%" height="52"><label for="wpsr_addthis_btbrand"><?php _e('Brand Name', 'wpsr'); ?></label></td>
				<td width="30%"><input name="wpsr_addthis_btbrand" id="wpsr_addthis_btbrand" type="text" value="<?php echo $wpsr_addthis['btbrand']; ?>"/><br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span></td>
				
				<td width="14%"><label for="wpsr_addthis_clickback"><?php _e('Track Clickback', 'wpsr'); ?></label></td>
				<td width="43%"><select id="wpsr_addthis_clickback" name="wpsr_addthis_clickback">
			  <option <?php echo $wpsr_addthis['clickback'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_addthis['clickback'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
			  </tr>
			</table>
			</div>
		</div><!-- Addthis -->
		
		
		<div class="inWindow winSharethis">
			<h3>Customize the buttons</h3>
			<div class="section">
			  <table width="100%" height="517" border="0" class="tableClr">
				<tr>
				  <th width="50%" height="21"><?php _e('Buttons', 'wpsr'); ?><br />
				  <span class="smallText"><?php _e('Button type', 'wpsr'); ?></span></th>
				  <th width="50%"><?php _e('Button Order', 'wpsr'); ?><br />
				  <span class="smallText"><?php _e('Reorder, remove or add social buttons', 'wpsr'); ?></span></th>
				</tr>
				<tr>
				  <td width="50%" height="69"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-vcount.png" /></td>
				  <td width="50%"><input name="wpsr_sharethis_vcount_order" id="wpsr_sharethis_vcount_order" type="text" value="<?php echo $wpsr_sharethis['vcount_order']; ?>"/>
				  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_vcount_order&bt=sharethis&val=', 'wpsr_sharethis_vcount_order');" /></td>
				</tr>
				<tr>
				  <td height="64"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-hcount.png" /></td>
				  <td><input name="wpsr_sharethis_hcount_order" id="wpsr_sharethis_hcount_order" type="text" value="<?php echo $wpsr_sharethis['hcount_order']; ?>"/>
				  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_hcount_order&bt=sharethis&val=', 'wpsr_sharethis_hcount_order');" /></td>
				</tr>
				<tr>
				  <td height="65"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-buttons.png" /></td>
				  <td><input name="wpsr_sharethis_buttons_order" id="wpsr_sharethis_buttons_order" type="text" value="<?php echo $wpsr_sharethis['buttons_order']; ?>"/>
				  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_buttons_order&bt=sharethis&val=', 'wpsr_sharethis_buttons_order');" /></td>
				</tr>
				<tr>
				  <td height="67"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-large.png" /></td>
				  <td><input name="wpsr_sharethis_large_order" id="wpsr_sharethis_large_order" type="text" value="<?php echo $wpsr_sharethis['large_order']; ?>"/>
				  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_large_order&bt=sharethis&val=', 'wpsr_sharethis_large_order');" /></td>
				</tr>
				<tr>
				  <td height="70"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-regular.png" /></td>
				  <td><input name="wpsr_sharethis_regular_order" id="wpsr_sharethis_regular_order" type="text" value="<?php echo $wpsr_sharethis['regular_order']; ?>"/>
				  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_regular_order&bt=sharethis&val=', 'wpsr_sharethis_regular_order');" /></td>
				</tr>
				<tr>
				  <td height="75"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-regular-notext.png" /></td>
				  <td><input name="wpsr_sharethis_regular2_order" id="wpsr_sharethis_regular2_order" type="text" value="<?php echo $wpsr_sharethis['regular2_order']; ?>"/>
				  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_regular2_order&bt=sharethis&val=', 'wpsr_sharethis_regular2_order');" /></td>
				</tr>
				<tr>
				  <td><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-classic.png" /></td>
				  <td></td>
				</tr>
			  </table>
			</div>
			
			<h3><?php _e('Settings', 'wpsr'); ?></h3>
			<div class="section">
				<table width="100%" height="100" border="0">
				  <tr>
					<td width="31%" height="49"><label for="wpsr_sharethis_pubkey">Sharethis Publisher Key</label></td>
					<td width="69%"><input name="wpsr_sharethis_pubkey" type="text" id="wpsr_sharethis_pubkey" value="<?php echo $wpsr_sharethis_pubkey; ?>" size="50" /><br /><span class="smallText"><?php _e('You can see you publisher key in this page. ', 'wpsr'); ?> <a href="http://sharethis.com/account/" target="_blank"><?php _e('Click here', 'wpsr'); ?></a></span></td>
				  </tr>
				  <tr>
					<td><label for="wpsr_sharethis_addp">Automatically wrap with paragraph</label></td>
					<td><select id="wpsr_sharethis_addp" name="wpsr_sharethis_addp">
			  <option <?php echo $wpsr_sharethis_addp == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_sharethis_addp == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
				  </tr>
				</table>
			</div>
		</div><!-- Sharethis -->
		
		
		<div class="inWindow winRetweetDigg">
			<h3><?php _e('General', 'wpsr'); ?></h3>
			<div class="section">
			<table width="100%" height="76" border="0">
			  <tr>
				<td width="30%" height="37"><label for="wpsr_retweet_username"><?php _e('Twitter Username', 'wpsr'); ?></label></td>
				<td width="70%">@<input name="wpsr_retweet_username" id="wpsr_retweet_username" type="text" value="<?php echo $wpsr_retweet['username']; ?>"/></td>
			  </tr>
			  <tr>
				<td><label for="wpsr_retweet_type"><?php _e('Retweet Button Type', 'wpsr'); ?></label></td>
				<td><select id="wpsr_retweet_type" name="wpsr_retweet_type">
				  <option <?php echo $wpsr_retweet['type'] == 'normal' ? ' selected="selected"' : ''; ?> value="normal"><?php _e('Normal (Big)', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_retweet['type'] == 'compact' ? ' selected="selected"' : ''; ?> value="compact"><?php _e('Compact', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_retweet['type'] == 'nocount' ? ' selected="selected"' : ''; ?> value="nocount"><?php _e('No Count (only for Twitter\'s Official Button)', 'wpsr'); ?></option>
				</select></td>
			  </tr>
			</table>
			</div>
			
			<h3><?php _e('Choose a service', 'wpsr'); ?></h3>
			<div class="section">
			<table width="100%" border="0">
			  <tr>
				<td width="30%"><label for="wpsr_retweet_service"><?php _e('Retweet Service', 'wpsr'); ?></label></td>
				<td width="70%"><select id="wpsr_retweet_service" name="wpsr_retweet_service">
				  <option <?php echo $wpsr_retweet['service'] == 'twitter' ? ' selected="selected"' : ''; ?> value="twitter"><?php _e('Twitter\'s Official Button', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_retweet['service'] == 'tweetmeme' ? ' selected="selected"' : ''; ?> value="tweetmeme">TweetMeme</option>
				  <option <?php echo $wpsr_retweet['service'] == 'topsy' ? ' selected="selected"' : ''; ?> value="topsy">Topsy</option>
				</select>
		
				<div id="wpsr_retweet_topsysettings">
				<table width="100%" border="0">
				  <tr>
					<td width="32%"><?php _e('Select a theme for topsy', 'wpsr'); ?></td>
					<td width="68%">
					  <select id="wpsr_retweet_topsytheme" name="wpsr_retweet_topsytheme">
						<option value="blue" <?php echo $wpsr_retweet['topsytheme'] == 'blue' ? ' selected="selected"' : ''; ?> >blue</option>
						<option value="brown" <?php echo $wpsr_retweet['topsytheme'] == 'brown' ? ' selected="selected"' : ''; ?>>brown</option>
						<option value="jade" <?php echo $wpsr_retweet['topsytheme'] == 'jade' ? ' selected="selected"' : ''; ?>>jade</option>
						<option value="brick-red" <?php echo $wpsr_retweet['topsytheme'] == 'brick-red' ? ' selected="selected"' : ''; ?>>brick-red</option>
						<option value="sea-foam" <?php echo $wpsr_retweet['topsytheme'] == 'sea-foam' ? ' selected="selected"' : ''; ?>>sea-foam</option>
						<option value="mustard" <?php echo $wpsr_retweet['topsytheme'] == 'mustard' ? ' selected="selected"' : ''; ?>>mustard</option>
						<option value="hot-pink" <?php echo $wpsr_retweet['topsytheme'] == 'hot-pink' ? ' selected="selected"' : ''; ?>>hot-pink</option>
					  </select>
					</td>
				  </tr>
				</table>
				</div>
				
				<div id="wpsr_retweet_twittersettings">			
				<table width="100%" height="75" border="0">
				  <tr>
					<td width="32%" height="34"><?php _e('Recommend people', 'wpsr'); ?> </td>
					<td width="68%"><input name="wpsr_retweet_twitter_recacc" type="text" id="wpsr_retweet_twitter_recacc" value="<?php echo $wpsr_retweet['twitter_recacc']; ?>" size="40"/><br />
					<span class="smallText"><?php _e('Twitter Username: Description (Optional)', 'wpsr'); ?></span>
					</td>
				  </tr>
				  <tr>
					<td><?php _e('Language', 'wpsr'); ?></td>
					<td><select id="wpsr_retweet_twitter_lang" name="wpsr_retweet_twitter_lang">
					  <option value="en" <?php echo $wpsr_retweet['twitter_lang'] == 'en' ? ' selected="selected"' : ''; ?>>English</option>
					  <option value="fr" <?php echo $wpsr_retweet['twitter_lang'] == 'fr' ? ' selected="selected"' : ''; ?>>French</option>
					  <option value="de" <?php echo $wpsr_retweet['twitter_lang'] == 'de' ? ' selected="selected"' : ''; ?>>German</option>
					  <option value="es" <?php echo $wpsr_retweet['twitter_lang'] == 'es' ? ' selected="selected"' : ''; ?>>Spanish</option>
					  <option value="ja" <?php echo $wpsr_retweet['twitter_lang'] == 'ja' ? ' selected="selected"' : ''; ?>>Japanese</option>
					</select></td>
				  </tr>
				</table>
				</div>
				
				</td>
			  </tr>
			</table>
			</div>
		
			<h3><?php _e('Digg Button', 'wpsr'); ?></h3>
			<div class="section">
			<table width="100%" border="0">
			  <tr>
				<td width="31%"><label for="wpsr_digg_type"><?php _e('Digg Button type', 'wpsr'); ?></label></td>
				<td width="69%"><select id="wpsr_digg_type" name="wpsr_digg_type">
				  <option <?php echo $wpsr_digg['type'] == 'DiggMedium' ? ' selected="selected"' : ''; ?> value="DiggMedium"><?php _e('Medium', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_digg['type'] == 'DiggWide' ? ' selected="selected"' : ''; ?> value="DiggLarge"><?php _e('Wide', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_digg['type'] == 'DiggCompact' ? ' selected="selected"' : ''; ?> value="DiggCompact"><?php _e('Compact', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_digg['type'] == 'DiggIcon' ? ' selected="selected"' : ''; ?> value="DiggIcon"><?php _e('Icon', 'wpsr'); ?></option>
				</select></td>
			  </tr>
			</table>
			</div>
		</div> <!-- Retweet and digg -->
		
		
		<div class="inWindow winFacebook">
			<h3><?php _e('Like Button', 'wpsr'); ?></h3>
			<div class="section">
			<table width="100%" border="0">
			  <tr>
				<td width="30%" height="31"><label for="wpsr_facebook_btstyle"><?php _e('Button Style', 'wpsr'); ?></label></td>
				<td width="70%"><select id="wpsr_facebook_btstyle" name="wpsr_facebook_btstyle">
				  <option <?php echo $wpsr_facebook['btstyle'] == 'standard' ? ' selected="selected"' : ''; ?> value="standard"><?php _e('Standard', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_facebook['btstyle'] == 'button_count' ? ' selected="selected"' : ''; ?> value="button_count"><?php _e('Button count', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_facebook['btstyle'] == 'box_count' ? ' selected="selected"' : ''; ?> value="box_count"><?php _e('Box count', 'wpsr'); ?></option>
				</select></td>
			  </tr>
			  <tr>
				<td height="35"><label for="wpsr_facebook_showfaces"><?php _e('Show Faces', 'wpsr'); ?></label></td>
				<td><select id="wpsr_facebook_showfaces" name="wpsr_facebook_showfaces">
				  <option <?php echo $wpsr_facebook['showfaces'] == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_facebook['showfaces'] == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
				</select></td>
			  </tr>
			  <tr>
				<td height="49"><label for="wpsr_facebook_width"><?php _e('Width', 'wpsr'); ?></label></td>
				<td><input name="wpsr_facebook_width" id="wpsr_facebook_width" type="text" value="<?php echo $wpsr_facebook['width']; ?>"/><br /><span class="smallText"><?php _e('In pixels', 'wpsr'); ?></span></td>
			  </tr>
			  <tr>
				<td height="35"><label for="wpsr_facebook_verb"><?php _e('Verb to Display', 'wpsr'); ?></label></td>
				<td><select id="wpsr_facebook_verb" name="wpsr_facebook_verb">
				  <option <?php echo $wpsr_facebook['verb'] == 'like' ? ' selected="selected"' : ''; ?> value="like"><?php _e('Like', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_facebook['verb'] == 'recommend' ? ' selected="selected"' : ''; ?> value="recommend"><?php _e('Recommend', 'wpsr'); ?></option>
				</select></td>
			  </tr>
			  <tr>
				<td height="37"><label for="wpsr_facebook_font"><?php _e('Font', 'wpsr'); ?></label></td>
				<td><select id="wpsr_facebook_font" name="wpsr_facebook_font">
				  <option <?php echo $wpsr_facebook['font'] == 'arial' ? ' selected="selected"' : ''; ?> value="arial">Arial</option>
				  <option <?php echo $wpsr_facebook['font'] == 'lucida grande' ? ' selected="selected"' : ''; ?> value="lucida grande">Lucida Grande</option>
				  <option <?php echo $wpsr_facebook['font'] == 'segoe ui' ? ' selected="selected"' : ''; ?> value="segoe ui">Segoe UI</option>
				  <option <?php echo $wpsr_facebook['font'] == 'tahoma' ? ' selected="selected"' : ''; ?> value="tahoma">Tahoma</option>
				  <option <?php echo $wpsr_facebook['font'] == 'trebuchet ms' ? ' selected="selected"' : ''; ?> value="trebuchet ms">Trebuchet MS</option>
				  <option <?php echo $wpsr_facebook['font'] == 'verdana' ? ' selected="selected"' : ''; ?> value="verdana">Verdana</option>
				</select></td>
			  </tr>
			  <tr>
				<td height="38"><label for="wpsr_facebook_color"><?php _e('Color scheme', 'wpsr'); ?></label></td>
				<td><select id="wpsr_facebook_color" name="wpsr_facebook_color">
				  <option <?php echo $wpsr_facebook['color'] == 'light' ? ' selected="selected"' : ''; ?> value="light"><?php _e('Light', 'wpsr'); ?></option>
				  <option <?php echo $wpsr_facebook['color'] == 'dark' ? ' selected="selected"' : ''; ?> value="dark"><?php _e('Dark', 'wpsr'); ?></option>
				</select></td>
			  </tr>
			</table>
			</div>
			
			<h3><?php _e('General Settings', 'wpsr'); ?></h3>
			<div class="section">
				<table width="100%" border="0">
				   <tr>
					  <td height="38"><label for="wpsr_facebook_appid"><?php _e('Application ID', 'wpsr'); ?></label></td>
					  <td><input name="wpsr_facebook_appid" id="wpsr_facebook_appid" type="text" value="<?php echo $wpsr_facebook['appid']; ?>"/><br /><span class="smallText"><?php _e('Useful in analytics', 'wpsr'); ?>. Enter a <b>valid</b> ID or else leave blank.</span></td>
				   </tr>
				</table>
			</div>
		</div><!-- Facebook -->
		
		<div class="inWindow winCustom">
			<h3><?php _e('Custom 1', 'wpsr'); ?></h3>
			<div class="section">
			<textarea name="wpsr_custom1" id="wpsr_custom1" style="width:99%" rows="8" class="custom_box"><?php echo $wpsr_custom['custom1']; ?></textarea>
			</div>
			
			<h3><?php _e('Custom 2', 'wpsr'); ?></h3>
			<div class="section">
			<textarea name="wpsr_custom2" id="wpsr_custom2" style="width:99%" rows="8" class="custom_box"><?php echo $wpsr_custom['custom2']; ?></textarea>
			</div>
			
			<p class="note"><?php printf(__('Enter any share button code. Use %s for the page url and %s for page title', 'wpsr'), '{url}', '{title}'); ?></p>
			
		</div><!-- Custom -->
		
		<div class="inWindow winTemplates">
			<p class="note"><strong>Note:</strong> Selecting a template will overwrite the current template and button settings.</p>
			<div class="templatesList">
			</div>
			<a href="http://www.aakashweb.com/docs/wp-socializer-docs/creating-a-custom-template/" target="_blank"><?php _e('Create a template', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/docs/wp-socializer-docs/creating-a-custom-template/" target="_blank"><?php _e('Submit a template', 'wpsr'); ?></a>
		</div><!-- One click - templates -->
		
	</div><!-- Window -->
		
	</form><!-- Content -->
	
	<div class="bottomInfo">
		<p align="center"><a href="http://youtu.be/1uimAE8rFYE" target="_blank">(Demo video)</a></p>
		<p align="center"><a href="https://twitter.com/vaakash" target="_blank">Follow @vaakash</a></p>
		<p align="center"><a href="http://www.aakashweb.com/" class="credits" target="_blank">a plugin from Aakash Web</a></p>
	</div>
	
</div><!-- Wrap -->
<?php endif; ?>

<?php if(wpsr_show_admin() == 0): ?>
<!-- Version Intro -->

<span class="blogUrl" style="display:none"><?php echo get_option('siteurl'); ?></span>

<div class="wrap">
	
	<p><strong>NOTE: Please refresh the page the load the new Stylesheets and Javascripts of the admin page.</strong></p>
	
	<h2><img width="32" height="32" src="<?php echo WPSR_ADMIN_URL; ?>images/wp-socializer.png" align="absmiddle"/> WP Socializer <span class="smallText">v<?php echo WPSR_VERSION; ?></span></h2>
		
	<div class="miniWrap introWrap">
	
		<ul class="shareList clearfix">
			<li><?php echo wpsr_admin_buttons('fb'); ?></li>
			<li><?php echo wpsr_admin_buttons('twitter'); ?></li>
			<li><?php echo wpsr_admin_buttons('+1'); ?></li>
			<li><?php echo wpsr_admin_buttons('at'); ?></li>
		</ul>
		
		<div class="infoContent"></div>
	
		<p class="refLinks"><b><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Full Features', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/docs/wp-socializer-docs/" target="_blank"><?php _e('Documentation', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/forum/" target="_blank"><?php _e('Support', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/forum/" target="_blank"><?php _e('Bug Report', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/#videos" target="_blank"><?php _e('Video Demo & Tutorials', 'wpsr'); ?></a></b></p>

		<form class="startForm" method="post">
			<?php wp_nonce_field('wpsr_intro_form'); ?>
			<input class="button-primary" type="submit" name="wpsr_intro_submit" id="wpsr_intro_submit" value="     <?php _e('Start using WP Socializer', 'wpsr'); echo ' v' . WPSR_VERSION; ?>     " />
		</form>
	</div>
</div>
<?php endif; ?>

<?php
}

function wpsr_admin_buttons($type){
	switch($type){
		case 'fb':
		return '<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAakash-Web%2F102453489826234&amp;layout=button_count&amp;show_faces=true&amp;width=48&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>';
		
		case '+1':
		return '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="medium" href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/"></g:plusone>';
		
		case 'twitter':
		return '<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" data-text="Check this out !: WP Socializer - Wordpress plugin - Aakash Web" data-count="horizontal" data-via="vaakash">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
		
		case 'at':
		return '<div class="addthis_toolbox addthis_default_style" addthis:url="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" addthis:title="WP Socializer - Wordpress plugin - Aakash Web"><a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a></div>
<script type="text/javascript">var addthis_share = { templates: {twitter: "Check out http://www.aakashweb.com/wordpress-plugins/wp-socializer/ (from @vaakash)"}}</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=vaakash"></script>';

		case 'fbrec':
		return '<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Faakashweb&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=recommend&amp;colorscheme=light&amp;font=arial&amp;height=21&amp;appId=106994469342299" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 126px; height:21px;float: right;margin-top: 15px;" allowtransparency="true"></iframe>';
	}
}


function wpsr_meta_box(){
	global $post;
	
	$wpsr_post_disabletemplate1 = 0;
	$wpsr_post_disabletemplate2 = 0;
	
	if (get_post_meta($post->ID,'_wpsr-disable-template1', true)) {
		$wpsr_post_disabletemplate1 = 1;
	}
	
	if (get_post_meta($post->ID,'_wpsr-disable-template2', true)) {
		$wpsr_post_disabletemplate2 = 1;
	}
	
?>
	<a name="wp_socializer" id="wp_socializer"></a>
	
	<table width="100%" border="0">
	  <tr>
		<td><label><input name="wpsr_post_disabletemplate1" id="wpsr_post_disabletemplate1" type="checkbox" value="1" <?php echo $wpsr_post_disabletemplate1 == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Disable template 1', 'wpsr'); ?></label></td>
	  </tr>
	  <tr>
		<td><label><input name="wpsr_post_disabletemplate2" id="wpsr_post_disabletemplate2" type="checkbox" value="1" <?php echo $wpsr_post_disabletemplate2 == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Disable template 2', 'wpsr'); ?></label></td>
	  </tr>
	  <tr>
		<td height="28"><small><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Help', 'wpsr'); ?></a> | <a href="admin.php?page=wp_socializer" target="_blank"><?php _e('Settings', 'wpsr'); ?></a></small></td>
	  </tr>
</table>
	
<?php
}

## Add the meta box to post editing page
function wpsr_add_meta_box() {
	add_meta_box('wp-socializer','WP Socializer','wpsr_meta_box','post','side');
	add_meta_box('wp-socializer','WP Socializer','wpsr_meta_box','page','side');
}
add_action('admin_menu', 'wpsr_add_meta_box');

function wpsr_insert_post($post_id) {
	if (isset($_POST['wpsr_post_disabletemplate1']) && $_POST['wpsr_post_disabletemplate1'] == 1) {
		add_post_meta($post_id, '_wpsr-disable-template1', 1, true);
	}else{
		delete_post_meta($post_id, '_wpsr-disable-template1');
	}
	
	if (isset($_POST['wpsr_post_disabletemplate2']) && $_POST['wpsr_post_disabletemplate2'] == 1) {
		add_post_meta($post_id, '_wpsr-disable-template2', 1, true);
	}else{
		delete_post_meta($post_id, '_wpsr-disable-template2');
	}
}
add_action('wp_insert_post', 'wpsr_insert_post');
?>