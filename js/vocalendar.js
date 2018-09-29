var $ = jQuery;
var calid1 = '0mprpb041vjq02lk80vtu6ajgo@group.calendar.google.com';
var calid2 = '5fsoru1dfaga56mcleu5mp76kk@group.calendar.google.com';
var visibleCal = 'vcl01';
var vcount1 = 0;
var vcount2 = 0;


// 初期化
$(function() {
	
	// IE PNG問題
	if(navigator.userAgent.indexOf("MSIE") != -1) {
	$('img').each(function() {
	if($(this).attr('src').indexOf('.png') != -1) {
	$(this).css({
	'filter': 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' +
	$(this).attr('src') +
	'", sizingMethod="scale");'
	});
	}
	});
	}
	
	$.ajax({
		dataType : "jsonp",
		url: 'https://www.google.com/calendar/feeds/'+calid1+'/public/full?alt=json-in-script&max-results=1',
		success: function(data) {
			vcount1 = data.feed.openSearch$totalResults.$t;
			//$('#item-num').text(data.feed.openSearch$totalResults.$t);
			$.ajax({
			dataType : "jsonp",
				url: 'https://www.google.com/calendar/feeds/'+calid2+'/public/full?alt=json-in-script&max-results=1',
				success: function(data) {
					vcount2 = data.feed.openSearch$totalResults.$t;
					$('#item-num').text(vcount1+vcount2);
				}
			});
		}
	});
	
	$(window).bind("resize", resizeContainer);
	resizeContainer();
	
	
	// 非同期ローディング
	$(".zoom").fancybox({
		openEffect	: 'fade',
		closeEffect	: 'fade',
		helpers: {
			title : {
				type : 'inside'
			}
		}
	});
	
	// デフォルトカレンダーを起動時に表示
	$(window).load(function(){
		//$("#VCLcontainer iframe." + visibleCal ).fadeIn(250);
		//$("#VCLcounter").fadeIn(500);
	});
	
	// ウィンドウリサイズハンドラ
	$(window).resize(function() {
	//	fitStatusBar();
	//alert ('hoge!');
	});
	
	// ウィンドウスクロールハンドラ
	//$(window).scroll(function(){
	//	fitStatusBar();
	//});
	
	$("nav ul li a").hover(
		function(){
			$(this).stop();
			$(this).animate({opacity:1},300);
		},
		function(){
			$(this).stop();
			$(this).animate({opacity:0},1000);
		}
	);
		
	// バナーエリア
	$("#actionBTN").toggle(
		function() {
			$("#actionBTNon").stop();
			$("#actionBTNon").animate({opacity:1},250);
			$("#bannerCNT").slideToggle('fast');
		},
		function() {
			$("#actionBTNon").stop();
			$("#actionBTNon").animate({opacity:0},250);
			$("#bannerCNT").slideToggle('fast');
		}
	);
	// 検索クローズ
	$("#searchCloseBTN").click(function(){
		if ($('#VS_events')) { $('#VS_events').remove(); }
		$('#VS_resultContainer').fadeOut();
		$('#googleCalCNT').fadeIn();
		$('#glCNT').fadeIn();
		$('#elrowaCNT').fadeIn();
		// 検索フォーム有効化
		$('#VS_searchstring, #VS_execute').removeAttr('disabled');
	});
	
	// IE8アラート
	//$("body").iealert();
	
	// dropkick: プルダウンカスタマイズ用
	$('.dropkick').dropkick();
	
	// activity-indicator
	$('#VCLsearchIndicator').activity({segments: 10, steps: 10, opacity: 0.3, width: 5, space: 5, length: 7, color: '#0b0b0b', speed: 1.2});
		
}); // 初期化終了


// リサイズ
function resizeContainer(e) {
	
	// 要素の横幅を常に100%
	var containerWidth = $(window).width();
	// $("#bodyContainer").css("width",containerWidth);
	$("#VCLnavi").css("width",containerWidth);
	
	// クローズボタンの位置調整
	var btnPosition = $('#actionBTN').offset().left;
	// alert (containerWidth+"/"+btnPosition);
	if (containerWidth < 1185) {
		$('#VCLfooterCNT').css('left',containerWidth-325);
	} else {
		$('#VCLfooterCNT').css('left','860px');
	}	
}

// ステータスバーをウィンドウ幅に合わせてposition変更
function fitStatusBar() {
	var presentPosition = $('#VCLnavi').offset().top;
	var windowHeight = $(window).height();
	var scrollPosition = $(window).scrollTop();
	var targetPosition = windowHeight +scrollPosition -32;
	$('#VCLnavi').stop();
	if (presentPosition > targetPosition) {
		$('#VCLnavi').animate({top:targetPosition});
	} else {
		$('#VCLnavi').css('top',targetPosition);
	}
}

// カレンダースイッチ
function switchCal (num) {
	$("#VCLcontainer iframe." + visibleCal ).fadeOut(250, function(){
		$("#VCLcontainer iframe." + num ).fadeIn(250);
	});
	visibleCal = num;
}


// ウィンドウ高さを取得
function getWindowHeight() {
	var windowHeight = 0;
	if (typeof(window.innerHeight) == 'number') {
		windowHeight = window.innerHeight;
	}
	else {
		if (document.documentElement && document.documentElement.clientHeight) {
			windowHeight = document.documentElement.clientHeight;
		}
		else {
			if (document.body && document.body.clientHeight) {
				windowHeight = document.body.clientHeight;
			}
		}
	}
	return windowHeight;
};

// カレンダー要素をフェードアウト
function calendarFadeOut() {

}