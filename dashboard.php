<?
	$display_bottom = $_POST['display'] == 'bottom' ? 'selected' : null;
	$display_top = $_POST['display'] == 'top' ? 'selected' : null;
?>
<div class="wrap">
	<?php    echo "<h2>" . __( 'Embed Articles Options', '' ) . "</h2>"; ?>
	<?php if($updated==true) { echo "Your settings have been updated!"; }?>
	<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="embedarticles_hidden" value="Y">
		<?php    echo "<h4>" . __( 'Settings', '' ) . "</h4>"; ?>
		<p><?php _e("API Key" ); ?><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="30"></p>
		<p>Get your own API Key Free at <a href="http://embedarticles.com/login/" target="_new">http://embedarticles.com/login/</a></p>
		<?php    echo "<h4>" . __( 'Button Location', '' ) . "</h4>"; ?>
		<p>Show the button at <select name="display"><option value="bottom" <?=$display_top?>>bottom of post</option><option value="top" <?=$display_bottom?>>top of post</option></select></p>
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', '' ) ?>" />
		</p>
	</form>
</div>
<div>
	<script id='fb4kxgc'>(function(i){var f,s=document.getElementById(i);f=document.createElement('iframe');f.src='//api.flattr.com/button/view/?uid=embedarticles&button=compact&url=http%3A%2F%2Fembedarticles.com';f.title='Flattr';f.height=20;f.width=110;f.style.borderWidth=0;s.parentNode.insertBefore(f,s);})('fb4kxgc');</script>
</div>