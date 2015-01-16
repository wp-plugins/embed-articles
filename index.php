<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Embed any article or post from your blog to any other external blog or website. Add SEO to your blog with automated Open Graph Protocol meta creation.
	Author: gprialde
	Version: 6.0.24
	Author URI: http://embedarticles.com
	*/
	
	function button_js() {
		return 'button.js';
	}
	function embed_admin_actions() {
		//add_options_page("Embed Articles Settings", "Embed Articles Settings", 'manage_options', "Embed-Articles-Settings", "embedarticles_admin");
		add_menu_page('Embed Articles', 'Embed Articles', 'manage_options', 'embedarticles', 'embedarticles_admin', 'http://embedarticles.org/favicon.png', 109);
		add_submenu_page('embedarticles', 'Embed Articles', 'Settings', 'manage_options', 'embedarticles', 'embedarticles_admin' );
		add_submenu_page('embedarticles', 'Content Discovery', 'Discover', 'publish_posts', 'eadiscover', 'ea_discover' );		
		add_submenu_page('embedarticles', 'Reports', 'Reports', 'manage_options', 'eareports', 'ea_reports' );			
	}

	function embedarticles_dashboard_widget_function() {
		$pub_value = get_option('embedarticles_pub_value');
		echo file_get_contents("http://embedarticles.com/api/index.php?p=top_embeds&k=" . $pub_value . "&_a=list");
	}
	
	function embedarticles_add_dashboard_widgets() {			
		wp_add_dashboard_widget('embedarticles_dashboard_widget', '<img src="http://embedarticles.org/ea-sign.png" height="20" width="auto"> Top 10 Embeds', 'embedarticles_dashboard_widget_function');			
	}	
	
	function ea_discover() {
		if($_POST['embedarticles_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$button = $_POST['button'];
			$lock = $_REQUEST['lock'];
			$display = empty($_POST['display']) ? 'bottom' : $_POST['display'];
			$ct = $_REQUEST['ct'];
			$_socials = $_REQUEST['socials'];
			$_recommended = $_REQUEST['recommended'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			$updated = true;
		} else {
			$lock = get_option('embedarticles_lock');
			$button = get_option('embedarticles_button');
			$d = get_option('embedarticles_display');
			$display = empty($d) ? 'bottom' : $d;
			$pub_value = get_option('embedarticles_pub_value');
			$style = get_option('embedarticles_style');
			$cp = get_option('embedarticles_cp');
			$ct = get_option('embedarticles_custom_button_code');
			$_socials = get_option('embedarticles_socials');
			$_recommended = get_option('embedarticles_recommended');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));	
		include 'discover.php';
	}

	function ea_settings() {
		if($_POST['embedarticles_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$button = $_POST['button'];
			$lock = $_REQUEST['lock'];
			$display = empty($_POST['display']) ? 'bottom' : $_POST['display'];
			$ct = $_REQUEST['ct'];
			$_socials = $_REQUEST['socials'];
			$_recommended = $_REQUEST['recommended'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			$updated = true;
		} else {
			$lock = get_option('embedarticles_lock');
			$button = get_option('embedarticles_button');
			$d = get_option('embedarticles_display');
			$display = empty($d) ? 'bottom' : $d;
			$pub_value = get_option('embedarticles_pub_value');
			$style = get_option('embedarticles_style');
			$cp = get_option('embedarticles_cp');
			$ct = get_option('embedarticles_custom_button_code');
			$_socials = get_option('embedarticles_socials');
			$_recommended = get_option('embedarticles_recommended');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));	
		include 'settings.php';
	}

	function ea_reports() {
		if($_POST['embedarticles_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$button = $_POST['button'];
			$lock = $_REQUEST['lock'];
			$display = empty($_POST['display']) ? 'bottom' : $_POST['display'];
			$ct = $_REQUEST['ct'];
			$_socials = $_REQUEST['socials'];
			$_recommended = $_REQUEST['recommended'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			$updated = true;
		} else {
			$lock = get_option('embedarticles_lock');
			$button = get_option('embedarticles_button');
			$d = get_option('embedarticles_display');
			$display = empty($d) ? 'bottom' : $d;
			$pub_value = get_option('embedarticles_pub_value');
			$style = get_option('embedarticles_style');
			$cp = get_option('embedarticles_cp');
			$ct = get_option('embedarticles_custom_button_code');
			$_socials = get_option('embedarticles_socials');
			$_recommended = get_option('embedarticles_recommended');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));	
		include 'reports.php';
	}
	
	function embedarticles_admin() {
		if($_POST['embedarticles_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$button = $_POST['button'];
			$lock = $_REQUEST['lock'];
			$display = empty($_POST['display']) ? 'bottom' : $_POST['display'];
			$ct = $_REQUEST['ct'];
			$_socials = $_REQUEST['socials'];
			$_recommended = $_REQUEST['recommended'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			$updated = true;
		} else {
			$lock = get_option('embedarticles_lock');
			$button = get_option('embedarticles_button');
			$d = get_option('embedarticles_display');
			$display = empty($d) ? 'bottom' : $d;
			$pub_value = get_option('embedarticles_pub_value');
			$style = get_option('embedarticles_style');
			$cp = get_option('embedarticles_cp');
			$ct = get_option('embedarticles_custom_button_code');
			$_socials = get_option('embedarticles_socials');
			$_recommended = get_option('embedarticles_recommended');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));
		include("settings.php");
	}
	
	require_once( 'open-graph-protocol.php' );	
	
	add_action( 'wp_dashboard_setup', 'embedarticles_add_dashboard_widgets' );
	
	add_action( 'wp_head', array( 'Facebook_Open_Graph_Protocol', 'add_og_protocol' ) );
	
	add_shortcode( 'embed_articles', 'embed_articles_shortcode' );
	
	add_action(	'admin_menu', 'embed_admin_actions' );
	add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );
	
	add_filter('the_content', 'add_widget', 9);
	add_filter('the_excerpt', 'add_widget_to_excerpt', 9);
	add_filter('the_content', 'add_container_tags');	

	add_action( 'init', 'embedarticles_buttons' );
	
	function embedarticles_buttons() {
		add_filter("mce_external_plugins", "embedarticles_add_buttons");
		add_filter('mce_buttons', 'embedarticles_register_buttons');	
		
		wp_register_style( 'ea-ui-style', plugins_url('embedarticles.css',__FILE__) );
		wp_enqueue_style( 'ea-ui-style' );

		wp_register_style( 'jquery-ui-style', 'http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.css' );
		wp_enqueue_style( 'jquery-ui-style' );
		
		wp_register_style( 'jquery-tooltipster-style', 'http://embedarticles.com/assets/css/tooltipster.min.css' );
		wp_enqueue_style( 'jquery-tooltipster-style' );
		
		wp_register_script( 'jquery-script', 'http://code.jquery.com/jquery-1.10.2.js' );
		wp_enqueue_script( 'jquery-script' );
		
		wp_register_script( 'jquery-ui-script', 'http://code.jquery.com/ui/1.11.2/jquery-ui.js' );
		wp_enqueue_script( 'jquery-ui-script' );		

		wp_register_script( 'jquery-tooltipster-script', 'http://embedarticles.com/assets/js/jquery.tooltipster.min.js' );
		wp_enqueue_script( 'jquery-tooltipster-script' );
		
		wp_register_script( 'jquery-contentshare-script', 'http://embedarticles.com/assets/js/contentshare.js' );
		wp_enqueue_script( 'jquery-contentshare-script' );	

		wp_register_script( 'rrssb-script', plugins_url('rrssb.min.js',__FILE__) );
		wp_enqueue_script( 'rrssb-script' );	
		
		wp_register_script( 'ea-script', plugins_url('ea.js',__FILE__) );
		wp_enqueue_script( 'ea-script' );				
	}	
	
	function embedarticles_add_buttons($plugin_array) {
		$plugin_array['embedarticles'] = plugins_url('embedarticles-tinymce-plugin.js',__FILE__);
		return $plugin_array;
	}
	function embedarticles_register_buttons($buttons) {
		array_push( $buttons, 'embedarticles' ); // dropcap', 'recentposts
		return $buttons;
	}
	
	function appthemes_add_quicktags() {
	?>
	<script type="text/javascript">
	  if (QTags && QTags.addButton) {
		QTags.addButton( 'embed_articles', 'embed_articles', '[embed_articles url=]', '', null, 'Embed articles to your post', 507 );
	  }
	</script>
	<?php
	}
		
	function embed_articles_shortcode( $atts ) {
		extract( shortcode_atts(
			array(
				'url' => '\'' . get_permalink() . '\'',
			), $atts )
		);		
		return $content . '<a id="embed_articles" href="http://embedarticles.com" data-url="' . urlencode($url) . '" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="'.get_option('embedarticles_button').'">Embed Articles</a> <script type="text/javascript" src="http://embedarticles.com/widget/embed.js"></script>';
	}
	
	function add_container_tags($content) {
		return $content;
	}
	
	function add_widget($content) {
		$d = get_option('embedarticles_display');
		$display = empty($d) ? 'bottom' : $d;
		
		if ($display == 'bottom') {
			return $content . display_embedarticles_widget();
		} else if ($display == 'top') {
			return display_embedarticles_widget() . $content;
		} else if ($display == 'custom') {
			return $content;
		} else {
			return $content . display_embedarticles_widget();
		}
	}
	
	function add_widget_to_excerpt($content) {
		$d = get_option('embedarticles_display');
		$display = empty($d) ? 'bottom' : $d;
		
		if ($display == 'bottom') {
			return $content . display_embedarticles_widget();
		} else if ($display == 'top') {
			return display_embedarticles_widget() . $content;
		} else if ($display == 'custom') {
			return $content;
		} else {
			return $content;
		}
	}
	
	function display_embedarticles_widget() {
		$_data = null;
		$_button = get_option('embedarticles_button');
		$_socials = get_option('embedarticles_socials');
		$_recommended = get_option('embedarticles_recommended');
		
		if(is_single() && ($_button == 'n')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
			$_data .= '</div>';	
		} else if(is_single() && ($_button == 'bs')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="bs">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
			$_data .= '</div>';			
		} else if(is_single() && ($_button == 'ns')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="ns">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
			$_data .= '</div>';			
		} else if(is_single() && ($_button == 'c')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Embed Articles</a>';
			$_data .= '<script>var c = "' . htmlspecialchars(stripslashes(get_option('embedarticles_custom_button_code'))) . '";</script>';
			$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/custom.js"></script>';
			$_data .= '</div>';		
		} else if(is_single() && ($_button == 'nb')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="nb">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
			$_data .= '</div>';		
		} else if(is_single() && ($_button == 'e')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="e">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
			$_data .= '</div>';		
		} else if(is_single() && ($_button == 'c')) {
			$_rrssb = file_get_contents("rrssb.php");
			$_data .= $_rrssb;
		} else {
			if(is_single()) {
				$_data .= '<div style="display: inline;">';
				$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="e">Embed Articles</a>';
				$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
				$_data .= '</div>';			
			}
		}		
		
		if (is_single() && $_recommended == 'yes') {
			$_data .= '
				<center>
				<div style="display: block; text-align: center; margin-top: 20px; padding: 10px;">					
					<script type="text/javascript">
						var u = null;
						var k = "'.get_option('embedarticles_pub_value').'";
					</script>
					<script type="text/javascript" src="http://embedarticles.com/widget/related.js"></script>
				</div>
				</center>
			';
		}
		
		return $_data;
	}
	
?>
