<ul style="list-style: none;">
	<li style="display: inline !important; max-width: 150px !important;">
		<a href="http://embedarticles.com/ea?url=<?=get_permalink()?>" class="popup">
			<img src="<?=plugins_url('icons/ea_64x64.png',__FILE__)?>" border="0" alt="ea">
		</a>
	</li>		
	<li class="pull-left" style="display: inline; margin-left: 10px;">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?=get_permalink()?>" class="popup">
			<img src="<?=plugins_url('icons/facebook_64x64.png',__FILE__)?>" border="0" alt="facebook">
		</a>
	</li>					
	<li class="pull-left" style="display: inline;">
		<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=get_permalink()?>&amp;title=<?=get_the_title()?>" class="popup">
			<img src="<?=plugins_url('icons/linkedin_64x64.png',__FILE__)?>" border="0" alt="linkedin">
		</a>
	</li>	
	<li class="pull-left" style="display: inline;">
		<a href="http://twitter.com/home?status=<?=get_the_title()?><?=get_permalink()?>" class="popup">
			<img src="<?=plugins_url('icons/twitter_64x64.png',__FILE__)?>" border="0" alt="twitter">
		</a>
	</li>					
	<li class="pull-left" style="display: inline;">
		<a href="https://plus.google.com/share?url=<?=get_permalink()?>" class="popup">
			<img src="<?=plugins_url('icons/google_64x64.png',__FILE__)?>" border="0" alt="google">
		</a>
	</li>	
</ul>