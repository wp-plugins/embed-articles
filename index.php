<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Plugin for syndicating full-text free content articles
	Author: Embed Articles
	Version: 1.8.1
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
		add_options_page("Embed Articles Settings", "Embed Articles Settings", 'manage_options', "Embed-Articles-Settings", "embedarticles_admin");
	}

	require_once( 'open-graph-protocol.php' );
	
	add_action( 'wp_head', array( 'Facebook_Open_Graph_Protocol', 'add_og_protocol' ) );
	
	add_shortcode( 'embed_articles', 'embed_articles_shortcode' );
	add_action('admin_menu', 'embed_admin_actions');
	add_filter('the_content', 'add_widget', 9);
	add_filter('the_excerpt', 'add_widget_to_excerpt', 9);
	add_filter('the_content', 'add_container_tags');	
		
	function embed_articles_shortcode( $atts ) {
		extract( shortcode_atts(
			array(
				'url' => '\'' . get_permalink() . '\'',
			), $atts )
		);		
		return $content.'<a id="embed_articles" href="http://embedarticles.com" data-url="' . $url . '" data-key="null">Embed Articles</a><script type="text/javascript" src="http://embedarticles.com/widget/embed.js"></script>';
	}
	
	function embedarticles_admin() {
		if($_POST['embedarticles_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$display = empty($_POST['display']) ? 'bottom' : $_POST['display'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			$updated = true;
		} else {
			$pub_value = get_option('embedarticles_pub_value');
			$style = get_option('embedarticles_style');
			$cp = get_option('embedarticles_cp');
			$display = get_option('embedarticles_display');
		}
		include("embed_admin.php");
	}
	
	function add_container_tags($content) {
		return $content;
	}
	
	function add_widget($content) {
		$display = get_option('embedarticles_display');
		
		if ($display == 'bottom') {
			return $content . display_embedarticles_widget();
		}
		
		if ($display == 'top') {
			return display_embedarticles_widget() . $content;
		}
		
		if ($display == '' || empty($display)) {
			return display_embedarticles_widget() . $content;
		}
	}
	
	function add_widget_to_excerpt($content) {
		$display = get_option('embedarticles_display');
		if ($display == 'bottom') {
			return $content . display_embedarticles_widget();
		} else if ($display == 'top') {
			return display_embedarticles_widget() . $content;
		} else {
			return $content;
		}
	}
	
	function display_embedarticles_widget() {
		if(is_single()) {
			echo 	'<p>';
			echo 	'<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'">Embed Articles</a>';
			echo	'<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			echo 	'</p>';
		}
	}
	
?>
