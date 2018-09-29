$(function() {

	//”wŒiæ“Ç‚İ‚İ
	var url="./images/base/bg_01.jpg";
	var imgPreloader = new Image();
	imgPreloader.onload=function() {
	//ƒ[ƒhŠ®—¹‚Å‰æ‘œ‚ğ•\¦
		$("h1").stop().animate({"opacity": 1}, 1000, function(){
			$(".miku").stop().animate({top: "2px","opacity": 1}, 800, "swing", function(){
				$(".sns").stop().animate({"opacity": 1}, 800);
			});
		});
	}
	
	imgPreloader.src=url;
	
	//fancybox
	$(".infomation_area .cd").fancybox({
			'autoSize': true,
			'hideOnContentClick': true,
        	'zoomSpeedIn' : 600,
        	'zoomSpeedOut': 600,
        	'zoomSpeedChange':  500,
			'overlayShow' : true,
			'overlayOpacity' :  0.5,
			'easingIn' : 'easeInOutBack',
			'easingOut' : 'easeInOutBack',
			'easingChange' : 'easeInOutBack',
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
	});

});