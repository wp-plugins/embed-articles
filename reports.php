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
	$b7 = $button == 'r' ? 'checked' : "";
	
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
		
		<h2>Reports & Community Forums</span> <p class='wp-flattr-button'><a class='FlattrButton' style='display:none;' href='https://wordpress.org/plugins/embed-articles/' title='Embed Articles WordPress Plugin'>Embed Articles WordPress Plugin</a></p></h2>
		<? if (!empty($pub_value) && isset($pub_value)) { ?>
		<p>
			<div id="archives">
				<ul>
					<li class="active"><a href="http://embedarticles.com/api/index.php?p=embeds&k=<?=$pub_value?>&_a=list&_id=<?=$_REQUEST['_id']?>">Embed Reports</a></li>
					<li><a href="#community">The Community</a></li>					
				</ul>
				<div id="community">
					<script type="text/javascript" src="http://embedarticles.com/community/js/embed.js"></script>
				</div>
			</div>
		</p>
		<? } else { ?>
		<p>
			You must provide a valid API Key for this section to work.
		</p>
		<? } ?>
	</div>
</div>
<div style='font-size: 13px;'>Powered by: <a href="http://embedarticles.com" target="_new">EmbedArticles.com</a> <? echo $version; ?> &mdash; <a href='https://pledgie.com/campaigns/26781' target='_new'>Support and Donate</a> (any amount will greatly and surely help!)</div>