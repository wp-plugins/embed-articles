<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Embed any article or post from your blog to any other external blog or website. Add SEO to your blog with automated Open Graph Protocol meta creation.
	Author: gprialde
	Version: 6.0.22
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
		} else {
			if(is_single()) {
				$_data .= '<div style="display: inline;">';
				$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="e">Embed Articles</a>';
				$_data .= '<script type="text/javascript" src="http://wpembedarticles.sourceforge.net/widget/'.button_js().'"></script>';
				$_data .= '</div>';			
			}
		}
		if(is_single() && ($_socials == 1)) {
			$_data = '
				<table style="display: inline; max-height: 21px !important;" border="0" cellpadding="0" cellspacing="0">
					<tr valign="top" style="display: block !important; max-height: 21px !important;">						
						<td style="max-height: 20px !important; height: 20px; width: 110px; max-width: 110px; float: left !important;">
							' . $_data . '
						</td><td style="max-height: 20px !important; height: 20px; width: 110px; max-width: 110px; float: left !important;">
							<iframe src="//www.facebook.com/plugins/share_button.php?href=' . get_permalink() . '&amp;layout=button_count&amp;appId=585069028270617" scrolling="no" frameborder="0" style="border:none; overflow:hidden; max-height: 20px !important; height: 20px !important; " allowTransparency="true"></iframe>							
						</td><td style="max-height: 20px !important; height: 20px; width: 110px; max-width: 110px; float: left !important;">
							<iframe style="width: 110px; height: 20px;" data-twttr-rendered="true" title="Twitter Tweet Button" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" src="http://platform.twitter.com/widgets/tweet_button.2dbfc52aff624254c17d0ae518d60e15.en.html#_=1417158547162&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=' . get_permalink() . '&amp;size=m&amp;text=' . get_the_title() . '&amp;url=' . get_permalink() . '" allowtransparency="true" scrolling="no" id="twitter-widget-0" frameborder="0"></iframe>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</td><td style="max-height: 20px !important; height: 20px; width: 110px; max-width: 110px; float: left !important;">
							<div class="g-plusone" data-size="medium" data-href="' . get_permalink() . '" style="max-height: 20px !important; height: 20px; width: 110px; max-width: 110px; float: left !important;"></div>
							<script type="text/javascript">(function(){var po=document.createElement(\'script\');po.type=\'text/javascript\';po.async=true;po.src=\'https://apis.google.com/js/platform.js\';var s=document.getElementsByTagName(\'script\')[0];s.parentNode.insertBefore(po,s);})();</script>											
						</td><td style="max-height: 20px !important; height: 20px; width: 110px; max-width: 110px; float: left !important;">							
							<script class="inshare" type="IN/Share" data-url="' . get_permalink() . '" data-counter="right" data-showzero="true"></script><script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
						</td>
					</tr>
				</table>
			';
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
