<div class="wrap">
	<?php    echo "<h2>" . __( 'Embed Articles Options', '' ) . "</h2>"; ?>
	<?php if($updated==true) { echo "Your settings have been updated!"; }?>
	<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="embedarticles_hidden" value="Y">
		<?php    echo "<h4>" . __( 'Settings', '' ) . "</h4>"; ?>
		<p><?php _e("API Key" ); ?><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="30"></p>
		<p>Get your own API Key Free at <a href="http://embedarticles.com/login/" target="_new">http://embedarticles.com/login/</a></p>
		<?php    echo "<h4>" . __( 'Button Location', '' ) . "</h4>"; ?>
		<p><input type="radio" name="display" value="top" <?php if($display=='top'){echo 'checked';}?>> Show widget at top of post</p>
		<p><input type="radio" name="display" value="bottom" <?php if($display=='bottom'){echo 'checked';}?>> Show widget at bottom of post</p>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', '' ) ?>" />
		</p>
	</form>
</div>
