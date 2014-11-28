<?php 
	/*
	Plugin Name: Embed Articles
	Plugin URI: http://embedarticles.com
	Description: Embed any article or post from your blog to any other external blog or website. Add SEO to your blog with automated Open Graph Protocol meta creation.
	Author: gprialde
	Version: 5.0.5
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
			$_socials = $_REQUEST['socials'];
			update_option('embedarticles_pub_value', $pub_value);
			update_option('embedarticles_style', $style);
			update_option('embedarticles_cp', $cp);
			update_option('embedarticles_display', $display);
			update_option('embedarticles_button', $button);
			update_option('embedarticles_lock', $lock);
			update_option('embedarticles_custom_button_code', $ct);
			update_option('embedarticles_socials', $_socials);
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
		
		wp_register_style( 'ea-ui-style', plugins_url('embedarticles.css',__FILE__) );
		wp_enqueue_style( 'ea-ui-style' );

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
		$_socials = get_option('embedarticles_socials');
		if(is_single() && ($_button == 'n')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			$_data .= '</div>';	
		} else if(is_single() && ($_button == 'bs')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="bs">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			$_data .= '</div>';			
		} else if(is_single() && ($_button == 'sq')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="sq">Embed Articles</a>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
			$_data .= '</div>';			
		} else if(is_single() && ($_button == 'c')) {
			$_data .= '<div style="display: inline;">';
			$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="n">Embed Articles</a>';
			$_data .= '<script>var c = "' . htmlspecialchars(stripslashes(get_option('embedarticles_custom_button_code'))) . '";</script>';
			$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/custom.js"></script>';
			$_data .= '</div>';		
		} else {
			if(is_single()) {
				$_data .= '<div style="display: inline;">';
				$_data .= '<a id="embedarticles_button" href="http://embedarticles.com" data-url="'.get_permalink().'" data-key="'.get_option('embedarticles_pub_value').'" data-button-type="bs">Embed Articles</a>';
				$_data .= '<script type="text/javascript" src="http://'.embed_host().'/widget/'.embed_copy_file().'"></script>';
				$_data .= '</div>';			
			}
		}
		if(is_single() && ($_socials == 1)) {
			$_data .= '
				<div style="display: inline;">
					<div class="facebook-like">
						<div class=" fb_reset" id="fb-root"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe src="http://static.ak.facebook.com/connect/xd_arbiter/7r8gQb8MIqE.js?version=41#channel=f16b03972b7a4d6&amp;origin=http%3A%2F%2Fblog.isnare.com" style="border: medium none;" tabindex="-1" title="Facebook Cross Domain Communication Frame" aria-hidden="true" id="fb_xdm_frame_http" scrolling="no" allowtransparency="true" name="fb_xdm_frame_http" frameborder="0"></iframe><iframe src="https://s-static.ak.facebook.com/connect/xd_arbiter/7r8gQb8MIqE.js?version=41#channel=f16b03972b7a4d6&amp;origin=http%3A%2F%2Fblog.isnare.com" style="border: medium none;" tabindex="-1" title="Facebook Cross Domain Communication Frame" aria-hidden="true" id="fb_xdm_frame_https" scrolling="no" allowtransparency="true" name="fb_xdm_frame_https" frameborder="0"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
						<script>
							(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, \'script\', \'facebook-jssdk\'));
						</script>
						<div fb-iframe-plugin-query="app_id=&amp;font=arial&amp;href=http%3A%2F%2Fblog.isnare.com%2Fconvenient-strategies-for-speedy-and-wholesome-weight-loss%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=110" fb-xfbml-state="rendered" class="fb-like fb_iframe_widget" data-href="http://blog.isnare.com/convenient-strategies-for-speedy-and-wholesome-weight-loss/" data-send="false" data-layout="button_count" data-width="110" data-show-faces="false" data-font="arial"><span style="vertical-align: bottom; width: 78px; height: 20px;"><iframe class="" src="http://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F7r8gQb8MIqE.js%3Fversion%3D41%23cb%3Df1be9b4e1c71618%26domain%3Dblog.isnare.com%26origin%3Dhttp%253A%252F%252Fblog.isnare.com%252Ff16b03972b7a4d6%26relation%3Dparent.parent&amp;font=arial&amp;href=http%3A%2F%2Fblog.isnare.com%2Fconvenient-strategies-for-speedy-and-wholesome-weight-loss%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=110" style="border: medium none; visibility: visible; width: 78px; height: 20px;" title="fb:like Facebook Social Plugin" scrolling="no" allowtransparency="true" name="f3e8535a470751c" frameborder="0" height="1000px" width="110px"></iframe></span></div>
					</div>
					<div class="twitter-button">
						<iframe style="width: 110px; height: 20px;" data-twttr-rendered="true" title="Twitter Tweet Button" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" src="http://platform.twitter.com/widgets/tweet_button.2dbfc52aff624254c17d0ae518d60e15.en.html#_=1417158547162&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fblog.isnare.com%2Fconvenient-strategies-for-speedy-and-wholesome-weight-loss%2F&amp;size=m&amp;text=Convenient%20Strategies%20For%20Speedy%20And%20Wholesome%20Weight-loss&amp;url=http%3A%2F%2Fblog.isnare.com%2Fconvenient-strategies-for-speedy-and-wholesome-weight-loss%2F" allowtransparency="true" scrolling="no" id="twitter-widget-0" frameborder="0"></iframe>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			';
		}
		return $_data;
	}
	
?>
