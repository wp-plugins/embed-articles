<div class="wrap">
	<?php    echo "<h2>" . __( 'Embed Articles Options', '' ) . "</h2>"; ?>
	<?php if($updated==true) { echo "Your settings have been updated!"; }?>
	<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="emba_hidden" value="Y">
		<?php    echo "<h4>" . __( 'Settings', '' ) . "</h4>"; ?>
		<p><?php _e("API Key" ); ?><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="30"></p>
		<p>Get your own API Key Free at <a href="http://embedarticles.com/login/" target="_new">http://embedarticles.com/login/</a></p>
		<?php    echo "<h4>" . __( 'Display Options', '' ) . "</h4>"; ?>
		<hr />
		<p><input type="radio" name="display" value="show" <?php if($display=='show'){echo 'checked';}?>> Show widget at top of post</p>
		<p><input type="radio" name="display" value="showboth" <?php if($display=='showboth'){echo 'checked';}?>> Show widget at top of post and in excerpt (Note: Your template must display excerpts for this to work)</p>
		<p><input type="radio" name="display" value="none" <?php if($display=='none'){echo 'checked';}?>> I want to place the widget in a specific place (see Advanced)</p>
		<p><b>Advanced</b>: Changing the location of where the widget appears: If you would like to change the location of where the Embed Articles Widget appears, place the following code inside your template exactly where you'd like it to appear.</p>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', '' ) ?>" />
		</p>
	</form>
</div>
