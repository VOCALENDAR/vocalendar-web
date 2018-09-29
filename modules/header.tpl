<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" lang="ja">

<head>
	
	<!-- PAGE ATTRIBUTEs //-->
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="http://vocalendar.jp/favicon.ico">
	
	<!-- Open Graph //-->
	<meta property="og:title" content="VOCALENDAR（ボカレンダー）" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://vocalendar.jp/" />
	<meta property="og:image" content="http://vocalendar.jp/images/vocalendar-square-icon-ss.jpg" />
	<meta property="og:site_name" content="vocalendar.jp" />
	<meta property="fb:admins" content="1385630041" />
	
	<!-- CONTENTS INFORMATIONs //-->
	<meta name="keywords" content="VOCALENDAR,ボカレンダー,ボカロ,カレンダー,スケジュール" />
	<meta name="description" content="ボーカロイド関連イベントの予定日を集めたカレンダー。同人即売会やライブの開催日、CDや雑誌の発売日、TVやラジオ番組の予定まで。あなたのボーカロイドライフにお役立てください。" />
	<meta name="viewport" content="width=1280" />
	<title>VOCALENDAR（ボカレンダー）| ボカロイベントの共有カレンダー！</title>
	
	<!-- IE HTML5 ENABLER //-->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- CSS FILEs //-->
	<link rel="stylesheet" href="/css/html5reset-1.6.1.css" media="all" />
	<link rel="stylesheet" href="/css/project-vocalendar-august2012.css" media="all" />
	
	<!-- Google AJAX LIBRARIEs //-->
	<!-- 使用する場合はそれぞれの読み込み箇所を書き換え //-->
	<!-- ホストされているバージョンに注意 //-->
	<!-- http://code.google.com/intl/ja/apis/ajaxlibs/ //-->
	<script src="http://www.google.com/jsapi"></script>
	<script>google.load("jquery", "1.7.0");</script>
	<script>google.load("jqueryui", "1.8.16");</script>
	<script src="js/jquery.easing.js"></script>
	<script src="js/jquery.gcal_flow.js"></script>
	<script src="js/jquery.dropkick-1.0.0.js"></script>
	<script src="js/vocalendar-search.js"></script>
	<script src="js/jquery.activity-indicator-1.0.0.js"></script>
	<script src="js/jquery.autolink.js"></script>
	<!--<script src="js/jquery.pinnedfooter.js"></script>//-->
	
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/js/fancybox/jquery.fancybox.css?v=2.0.6" type="text/css" media="screen" />
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js?v=2.0.6"></script>
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="/js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.2" type="text/css" media="screen" />
	<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.2"></script>
	<script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
	
	<!-- IE8 ALERT //-->
	<script type="text/javascript" src="/js/jquery.iealert.js"></script>
	<link rel="stylesheet" type="text/css" href="/js/iealert/style.css" />
	
	<!-- Google Analytics //-->
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-28637999-1']);
	_gaq.push(['_setDomainName', 'vocalendar.jp']);
	_gaq.push(['_trackPageview']);
	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
	<!-- Google PlusOne //-->
	<script type="text/javascript">
	window.___gcfg = {lang: 'ja'};
	
	(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
	</script>
	
</head>

<body id="vocalendar">
	
	<!-- facebook OpenGraph //-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1&appId=267176486714015";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div id="vocalendarCNT">
		
		<header>
			<h1 id="vocalendarTitle"><a href="/">VOCALENDAR（ボカレンダー）</a></h1>
			<nav>
				<ul>
					<li id="nav01"><a href="about/">about</a></li>
					<!--<li id="nav02"><a href="#">event portal</a></li>//-->
					<li id="nav03"><a href="gallery/">gallery</a></li>
				</ul>
			</nav>
			
			<section id="searchCNT">
				<form id="VS_conditionContainer" name='VS_searchCondition'>
				<select name='VS_selectCalendar' id='VS_selectCalendar' class="dropkick" >
				<option value='0'>メイン</option>
				<option value='1'>放送系</option>
				</select>
				<input type='text' name='VS_searchstring' id='VS_searchstring' placeholder="VOCALENDAR検索" autofocus />
				<input type='button' name='VS_execute' id='VS_execute' value='検索' onClick="_gaq.push(['_trackEvent', 'Search', 'Search']);" />
				</form>
			</section>
			
		</header>
