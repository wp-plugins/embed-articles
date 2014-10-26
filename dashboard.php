<div style="border-bottom: 1px solid #555; padding-bottom: 10px; margin-bottom: 10px;">
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
</div>
<div style="border-bottom: 1px solid #555; padding-bottom: 10px; margin-bottom: 10px;">
	<div class="wrap">
		<h2>Embed Articles Reports</h2>
	</div>
</div>