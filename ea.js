$(function() {	
	$("#archives").tabs({
			beforeLoad: function( event, ui ) {
				ui.jqXHR.error(function() {
					ui.panel.html("Couldn't load this tab. We'll try to fix this as soon as possible.");
			});
		}
	});
    $("p").contentshare();
    $.fn.contentshare.defaults.shareable.on('mouseup',function(){
        $.fn.contentshare.showTooltip();
    });	
});

(function() {
	var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
	s.type = 'text/javascript';
	s.async = true;
	s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
	t.parentNode.insertBefore(s, t);
})();