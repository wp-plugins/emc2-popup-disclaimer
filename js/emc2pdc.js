// JavaScript Document
var $j = jQuery.noConflict();
//$j(document).ready(function(){
$j(window).load(function(){
	
	// Set cookie expiry, default 1 day
	var cexpire = parseInt( $j('#emc2pdc-vars').children('#cexpire').text() );
	var force = parseInt( $j('#emc2pdc-vars').children('#force').text() );
	var debug = $j('#emc2pdc-vars').children('#debug_mode').text();
	
	if(debug.length) console.log( 'Popup Disclaimer debug mode active!' );
	if(!cexpire){ cexpire = 1; }

	// If force argument is set, display box regardless of cookie state
	if( ($j.cookie('emc2pdc') == 'agreed') && (!force) ){
		// they've already agreed to the disclaimer!	
	} else {
		// display disclaimer!
		$j('#emc2pdc-trigger').fancybox({
			'width': '50%',
			'height': '500px',
			'autoScale': false,
			'hideOnOverlayClick': false,
			'enableEscapeButton': false,
			'showCloseButton': false,
			'showNavArrows': false,
			'transitionIn': 'fade',
			'transitionOut': 'fade',
			'content': $j('#emc2pdc-disc-wrap').html(),
			'onComplete': function(){ }
	
		}).trigger('click');
	} // display disclaimer
	
	$j('.fancybox.agree').click(function(){
		$j.cookie('emc2pdc', 'agreed', { expires: cexpire });
		$j.fancybox.close();
		return false; 
	});
	
}); // document.ready

