<?
    wp_register_script( 'embedarticles_slider_js', plugins_url( 'assets/js/jquery.liquid-slider.min.js', __FILE__ ), array(), true );
    wp_enqueue_script( 'embedarticles_slider_js' );
	
    wp_register_script( 'embedarticles_touchswipe_js', plugins_url( 'assets/js/jquery.touchSwipe.min.js', __FILE__ ), array(), true );
    wp_enqueue_script( 'embedarticles_touchswipe_js' );
	
    wp_register_script( 'embedarticles_jqeasing_js', plugins_url( 'assets/js/jquery.easing.1.3.js', __FILE__ ), array(), true );
    wp_enqueue_script( 'embedarticles_jqeasing_js' );	
	
    wp_register_style( 'embedarticles_slider_css', plugins_url( 'assets/css/liquid-slider.css', __FILE__ ), array(), true );
    wp_enqueue_style( 'embedarticles_slider_css' );	
?>

<script>
/* If installing in the footer, you won't need $(function() {} */
$(function(){
     $('#slider-id').liquidSlider();
});
</script>

<div class="liquid-slider" id="slider-id">
     <div>
          <h2 class="title">Settings</h2>
          <p>
			<div class="wrap">
				<?php    echo "<h2>" . __( 'Embed Articles Options', '' ) . " <span style='font-size: 13px;'>[<a href='https://pledgie.com/campaigns/26781' target='_new'>Support and Donate</a>]</span></h2>"; ?>
				<?php if($updated==true) { echo '<div id="message" class="updated"><p>The settings has been <strong>saved</strong>.</p></div>'; }?>
				<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
					<input type="hidden" name="embedarticles_hidden" value="Y">
					<?php    echo "<h4>" . __( 'Settings', '' ) . "</h4>"; ?>
					<p><?php _e("API Key" ); ?><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="30"></p>
					<p>Get your own API Key Free at <a href="http://embedarticles.com/login/" target="_new">http://embedarticles.com/login/</a></p>
					<?php    echo "<h4>" . __( 'Button Location', '' ) . "</h4>"; ?>
					<p>Show the button at <select name="display"><option value="bottom">bottom of post</option><option value="top">top of post</option></select></p>
					<p class="submit">
					<input type="submit" name="Submit" value="<?php _e('Update Options', '' ) ?>" />
					</p>
				</form>
			</div>		  
		  </p>
     </div>
     <div>
          <h2 class="title">Reports</h2>
          <p>Under Construction</p>
     </div>
</div>