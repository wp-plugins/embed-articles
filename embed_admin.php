<div class="wrap">
	<?php    echo "<h2>" . __( 'Embed Articles Options', '' ) . "</h2>"; ?>
	<?php if($updated==true) { echo "Your settings have been updated!"; }?>
	<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="emba_hidden" value="Y">
		<?php    echo "<h4>" . __( 'Settings', '' ) . "</h4>"; ?>
		<p><?php _e("API Key" ); ?><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="30"></p>
		<p>Get your own API Key Free at <a href="http://embedarticles.com/login/" target="_new">http://embedarticles.com/login/</a></p>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', '' ) ?>" />
		</p>
	</form>
</div>
