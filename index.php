<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Embed any article or post from your blog to any other external blog or website. Add SEO to your blog with automated Open Graph Protocol meta creation.
	Author: gprialde
	Version: 7.0.3
	Author URI: http://embedarticles.com
	*/	
	
	require_once( 'open-graph-protocol.php' );
	
	function get_rrssb() {
		return '
		<table><tr><td>
			<ul style="display: block !important; list-style: none !important;">
				<li style="display: inline !important; float: left !important;">
					<a href="http://embedarticles.com/embed?url=' . get_permalink() . '" target="_new">
						<img src="' . plugins_url('icons/ea_64x64.png',__FILE__) . '" border="0" alt="ea">
					</a>
				</li>		
				<li style="display: inline !important; float: left !important;">
					<a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" target="_new">
						<img src="' . plugins_url('icons/facebook_64x64.png',__FILE__) . '" border="0" alt="facebook">
					</a>
				</li>					
				<li style="display: inline !important; float: left !important;">
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . get_permalink() . '&amp;title=' . get_the_title() . '" target="_new">
						<img src="' . plugins_url('icons/linkedin_64x64.png',__FILE__) . '" border="0" alt="linkedin">
					</a>
				</li>	
				<li style="display: inline !important; float: left !important;">
					<a href="http://twitter.com/home?status=' . get_the_title() . '' . get_permalink() . '" target="_new">
						<img src="' . plugins_url('icons/twitter_64x64.png',__FILE__) . '" border="0" alt="twitter">
					</a>
				</li>					
				<li style="display: inline !important; float: left !important;">
					<a href="https://plus.google.com/share?url=' . get_permalink() . '" target="_new">
						<img src="' . plugins_url('icons/google_64x64.png',__FILE__) . '" border="0" alt="google">
					</a>
				</li>	
			</ul>
		</td></tr></table>
		';
	}
	
	function button_js() {
		return 'embedbadge.js';
	}	
	
	function embed_articles_meta_box() {
		print 'test';
	}
	
	add_action( 'wp_dashboard_setup', 'embedarticles_add_dashboard_widgets' );	
	add_action( 'wp_head', array( 'Facebook_Open_Graph_Protocol', 'add_og_protocol' ) );		
	add_action(	'admin_menu', 'embed_admin_actions' );
	add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );
	
	add_filter('the_content', 'add_widget', 9);
	add_filter('the_excerpt', 'add_widget_to_excerpt', 9);
	add_filter('the_content', 'add_container_tags');	
	add_filter("mce_external_plugins", "embedarticles_add_buttons");
	add_filter('mce_buttons', 'embedarticles_register_buttons');	
	
	add_shortcode( 'embed_articles', 'embed_articles_shortcode' );
	
	//add_meta_box( 'wp_embed_articles', 'Embed Articles', 'embed_articles_meta_box', 'post', 'side', 'high' );
	
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
			$_answers = $_REQUEST['answers'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			update_option('embedarticles_answers', $_answers);
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
			$_answers = get_option('embedarticles_answers');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));	
		include_once 'discover.php';
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
			$_answers = $_REQUEST['answers'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			update_option('embedarticles_answers', $_answers);
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
			$_answers = get_option('embedarticles_answers');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));	
		include_once 'settings.php';
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
			$_answers = $_REQUEST['answers'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			update_option('embedarticles_answers', $_answers);
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
			$_answers = get_option('embedarticles_answers');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));	
		include_once 'reports.php';
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
			$_answers = $_REQUEST['answers'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
			update_option('embedarticles_recommended', $_recommended);
			update_option('embedarticles_answers', $_answers);
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
			$_answers = get_option('embedarticles_answers');
		}
		$version = file_get_contents(plugins_url('version.txt',__FILE__));
		include_once("settings.php");
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
		$_button = get_option('embedarticles_button');
		
		if ($_button != 'r') {
			if ($display == 'bottom') {
				return $content . display_embedarticles_widget();
			} else if ($display == 'top') {
				return display_embedarticles_widget() . $content;
			} else if ($display == 'custom') {
				return $content;
			} else {
				return $content;
			}
		} else {
			$_embed_button = get_rrssb();
			if ($display == 'bottom') {
				return $content . $_embed_button;
			} else if ($display == 'top') {
				return $_embed_button . $content;
			} else if ($display == 'custom') {
				return $content;
			} else {
				return $content;
			}		
		}
	}
	
	function add_widget_to_excerpt($content) {
		$d = get_option('embedarticles_display');
		$display = empty($d) ? 'bottom' : $d;
		$_button = get_option('embedarticles_button');
		
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
		$_answers = get_option('embedarticles_answers');
		
		/*
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
		} else {
			if(is_single()) {
				$_data .= '<div style="display: inline;">';
				$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="e">Embed Articles</a>';
				$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
				$_data .= '</div>';			
			}
		}		
		
		if(is_single() && ($_socials == 1)) {
			$_data = get_rrssb();
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
		
		if (is_single() && $_answers == 'yes') {
			$_data .= '
				<center>
				<div style="display: block; text-align: center; margin-top: 10px; padding: 10px;">					
					<script type="text/javascript">
						var k = "75c662d19ddb6f83f0e9b58cd55c3449";
					</script>						
					<script type="text/javascript" src="https://www.isnare.org/widget/onpage.js"></script>
				</div>
				</center>
			';
		}		
		*/

		if(is_single()) {
			$_data .= '<div style="display: block;">';
			$_data .= '<a id="embedarticles_badge" href="http://www.isnare.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Free Articles</a>';
			$_data .= '<script type="text/javascript" src="http://embedarticles.com/widget/'.button_js().'"></script>';
			$_data .= '</div>';			
		}
			
		return $_data;
	}
	
?>
