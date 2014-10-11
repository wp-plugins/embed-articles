<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Plugin for syndicating full-text free content articles
	Author: Embed Articles
	Version: 1.0
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
		add_options_page("Embed Articles", "Embed Articles Options", 'manage_options', "Embed-Articles-Options", "embed_admin");
	}

	add_action('admin_menu', 'embed_admin_actions');
	add_filter('the_content', 'add_widget', 9);
	add_filter('the_excerpt', 'add_widget_to_excerpt', 9);
	add_filter('the_content', 'add_container_tags');
	
	function embed_admin() {
		if($_POST['emba_hidden'] == 'Y') {
			$pub_value = $_POST['pub_value'];  
			$style = $_POST['style'];
			$cp = $_POST['cp'];
			$display = $_POST['display'];
			update_option('emba_pub_value', $pub_value);
			update_option('emba_style', $style);
			update_option('emba_cp', $cp);
			update_option('emba_display', $display);
			$updated = true;
		} else {
			$pub_value = get_option('emba_pub_value');
			$style = get_option('emba_style');
			$cp = get_option('emba_cp');
			$display = get_option('emba_display');
		}
		include("embed_admin.php");
	}
	
	function add_container_tags($content) {
		return "<div class='embaArticle' style='display:inline'>".$content."</div>";
	}
	
	function add_widget($content) {
		if(get_option('emba_display')=="show" || get_option('emba_display')=="showboth") {
			return display_embedarticle_widget().$content;
		} else {
			return display_embedarticle_cp().$content;
		}
	}
	
	function add_widget_to_excerpt($content) {
		if(get_option('emba_display')=="showboth") {
			return display_embedarticle_widget().$content;
		} else {
			return $content;
		}
	}
	
	function display_embedarticle_widget() {
		if(get_option('emba_pub_value')!="" && get_option('emba_pub_value')!=NULL && is_single()) {
			if(get_option('emba_cp')=="true" || get_option('emba_style')=="invisible") {
				echo 	'<a id="embed_articles" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('emba_pub_value').'">Embed Articles</a>';
				echo	'<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			}
		}
	}
	
	function display_embedarticle_cp() {
		if(get_option('emba_cp')=="true") {
			echo 	'<a id="embed_articles" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('emba_pub_value').'">Embed Articles</a>';
			echo	'<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
		}
	}
	
?>
