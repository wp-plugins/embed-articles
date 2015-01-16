<?
	$buttom = $display == 'bottom' ? 'selected' : null;
	$top = $display == 'top' ? 'selected' : null;
	$custom = $display == 'custom' ? 'selected' : null;
	
	$b1 = $button == 'bs' ? 'checked' : "";
	$b2 = $button == 'n' ? 'checked' : "";
	$b3 = $button == 'ns' ? 'checked' : "";
	$b4 = $button == 'c' ? 'checked' : "";
	$b5 = $button == 'nb' ? 'checked' : "";
	$b6 = $button == 'e' ? 'checked' : "";
	
	$s1 = $_socials == '1' ? 'selected' : "";
	$s2 = $_socials == '2' ? 'selected' : "";

	$r1 = $_recommended == 'yes' ? 'selected' : "";
	$r2 = $_recommended == 'no' ? 'selected' : "";
	
	if ($_REQUEST['lock'] == 'no' || empty($pub_value)) {
		$actual_link = "?page=embedarticles&lock=yes";
		$_locker = '<a href="' . $actual_link . '"><img src="http://embedarticles.com/locked.png" border="0"></a>';
		$_islocked = '';
	} else {
		$actual_link = "?page=embedarticles&lock=no";
		$_locker = '<a href="' . $actual_link . '"><img src="http://embedarticles.com/unlocked.png" border="0"></a>';
		$_islocked = 'readonly="true"';
	}
	
	$custom_button = '<textarea style="width: 350px; height: 64px; padding: 6px 12px; font-size: 14px;">&lt;a id="embedarticles_button" href="http://embedarticles.com" data-url="null" data-key="'.$pub_value.'" data-button-type="'.$button.'">Embed Articles&lt;/a>&lt;script type="text/javascript" src="http://embedarticles.com/widget/button.js">&lt;/script></textarea>';
	$page = isset($_GET['_page']) ? ((int) $_GET['_page']) : 1;
	$_start = 10 * ($page - 1);	
?>

<div style="padding-bottom: 10px; margin-bottom: 10px; margin-right: 25px; border-bottom: 1px solid #555;">
	<div class="wrap">      
		<div id="message" style="display: block; position: relative; padding: 5px; margin-bottom: 10px; background-color: #000; color: #FFF !important; border-bottom: #CCC;"><p><img src="http://embedarticles.org/favicon.png" align="left" alt="logo" style="margin-left: 20px; margin-right: 20px;"> Please do not forget to <a href="http://wordpress.org/support/view/plugin-reviews/embed-articles" target="_new" style="color: #F5F5F5; font-weight: bold;">review this plugin</a>. We humbly ask for your kind donations for us to continually improve this plugin. Donate here [<a href='https://pledgie.com/campaigns/26781' target='_new' style="color: #F5F5F5; font-weight: bold;">Support and Donate</a>].</p></div>
				
		<h2>Embed Articles Settings</span></h2>
		
		<?php if($updated==true) { echo '<div id="message" class="updated"><p>The settings has been <strong>saved</strong>.</p></div>'; }?>
		<div class="postbox" style="padding: 10px; margin: 0px;">
			<form name="emba_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="embedarticles_hidden" value="Y">			
				<table cellpadding="5" cellspacing="5">				
					<tr valign="top"><td align="right"><b><?php _e("API Key" ); ?></b></td><td><input type="text" name="pub_value" value="<?php echo $pub_value; ?>" size="40" <?=$_islocked?>><?=$_locker?><p>Get your own API Key Free at <a href="http://embedarticles.com/login/" target="_new">http://embedarticles.com/login/</a></p></td></tr>						
					<tr valign="top"><td align="right"><b>Choose Buttons</b></td>
						<td>
							<table cellpadding="0" cellspacing="10" border="0">
								<tr>
									<td height="100" bgcolor="E5E5E5"><input type="radio" name="button" value="bs" <?=$b1?>></td><td style="padding: 10px; border: 3px dotted #E5E5E5;"><img src="http://embedarticles.org/button-bubble-right.png" alt="" border="0"></td>
									<td height="100" bgcolor="F0F0F0"><input type="radio" name="button" value="ns" <?=$b3?>></td><td style="padding: 10px; border: 3px dotted #F0F0F0;"><img src="http://embedarticles.org/button-bubble-top.png" alt="" border="0"></td>
									<td height="100" bgcolor="E5E5E5"><input type="radio" name="button" value="n" <?=$b2?>></td><td style="padding: 10px; border: 3px dotted #E5E5E5;"><img src="http://embedarticles.org/button-compact.png" alt="" border="0"></td>									
									<td height="100" bgcolor="F0F0F0"><input type="radio" name="button" value="e" <?=$b6?>></td><td style="padding: 10px; border: 3px dotted #F0F0F0;"><img src="http://embedarticles.org/button-e-compact.png" alt="" border="0"></td>									
								</tr>
							</table>
						</td>
					</tr>
					<tr valign="top"><td align="right"><b>Social Buttons</b></td><td><select name="socials"><option value=""></option><option value="1" <?=$s1?>>YES</option><option value="2" <?=$s2?>>NO</option></select></td></tr>
					<tr valign="top"><td align="right"><b>Button Location</b></td><td><select name="display"><option value="bottom" <?=$buttom?>>bottom of post</option><option value="top" <?=$top?>>top of post</option><option value="custom" <?=$custom?>>custom location</option></select></td></tr>
					<? if ($display == 'custom') { ?>
					<tr valign="top"><td align="right"><b>Button Code</b></td><td><p>Copy and paste this button code anywhere you want it to appear...</p><?=$custom_button?></td></tr>					
					<? } ?>
					<tr valign="top"><td align="right"><b>Recommended Articles</b></td><td><select name="recommended"><option value="yes" <?=$r1?>>YES</option><option value="no" <?=$r2?>>NO</option></select><p>Displays a line of recommended trending articles with images.</p></td></tr>
					<tr><td></td><td><input type="submit" name="Submit" class="button button-primary button-large" value="<?php _e('Update Options', '' ) ?>" /></td></tr>
				</table>		
			</form>
		</div>
	</div>
</div>            
<div style='font-size: 13px;'>Powered by: <a href="http://embedarticles.com" target="_new">EmbedArticles.com</a> <? echo $version; ?> &mdash; <a href='https://pledgie.com/campaigns/26781' target='_new'>Support and Donate</a> (any amount will greatly and surely help!)</div>