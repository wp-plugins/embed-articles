<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Plugin for syndicating full-text free content articles
	Author: gprialde
	Version: 5.0.0
	Author URI: http://embedarticles.com
	*/
	
	function embed_host() {
		return 'embedarticles.com';
	}
	function embed_file(){
		return 'button.js';
	}
	function embed_copy_file() {
		return 'button.js';
	}
	function embed_admin_actions() {
		//add_options_page("Embed Articles Settings", "Embed Articles Settings", 'manage_options', "Embed-Articles-Settings", "embedarticles_admin");
		add_menu_page('Embed Articles', 'Embed Articles', 'manage_options', 'embedarticles', 'embedarticles_admin', 'http://embedarticles.com/favicon.png', 109);
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
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
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
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));
		include("dashboard.php");
	}
	
	require_once( 'open-graph-protocol.php' );
	
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
		
		wp_register_style( 'jquery-ui-style', 'http://code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.css' );
		wp_enqueue_style( 'jquery-ui-style' );
		
		wp_register_script( 'jquery-script', 'http://code.jquery.com/jquery-1.10.2.js' );
		wp_enqueue_script( 'jquery-script' );
		
		wp_register_script( 'jquery-ui-script', 'http://code.jquery.com/ui/1.11.2/jquery-ui.js' );
		wp_enqueue_script( 'jquery-ui-script' );
		
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
		if(is_single() && ($_button == 'n')) {
			$_data .= '<p>';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			$_data .= '</p>';
		} else if(is_single() && ($_button == 'bs')) {
			$_data .= '<p>';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="bs">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			$_data .= '</p>';		
		} else if(is_single() && ($_button == 'sq')) {
			$_data .= '<p>';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="sq">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			$_data .= '</p>';		
		} else if(is_single() && ($_button == 'c')) {
			$_data .= '<p>';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Embed Articles</a>';
			$_data .= '<script>var c = "' . htmlspecialchars(get_option('embedarticles_custom_button_code')) . '";</script>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/custom.js"></script>';
			$_data .= '</p>';		
		} else {
			if(is_single()) {
				$_data .= '<p>';
				$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="bs">Embed Articles</a>';
				$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
				$_data .= '</p>';		
			}
		}
		return $_data;
	}
	
?>
