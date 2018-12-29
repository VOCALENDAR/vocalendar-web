<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" lang="ja">

<head>
	
	<!-- PAGE ATTRIBUTEs //-->
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="/favicon.ico">
	
	<!-- Open Graph //-->
	<meta property="og:title" content="VOCALENDAR（ボカレンダー）" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://vocalendar.jp/" />
	<meta property="og:image" content="//vocalendar.jp/images/vocalendar-square-icon-ss.jpg" />
	<meta property="og:site_name" content="vocalendar.jp" />
	<meta property="fb:admins" content="1385630041" />
	
	<!-- CONTENTS INFORMATIONs //-->
	<meta name="keywords" content="VOCALENDAR,ボカレンダー,ボカロ,カレンダー,スケジュール" />
	<meta name="description" content="ボーカロイド関連イベントの予定日を集めたカレンダー。同人即売会やライブの開催日、CDや雑誌の発売日、TVやラジオ番組の予定まで。あなたのボーカロイドライフにお役立てください。" />
	<meta name="viewport" content="width=1280" />
	<title>ボーカロイド/UTAU関連のイベントカレンダー | VOCALENDAR（ボカレンダー）</title>
	
	<!-- IE HTML5 ENABLER //-->
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- CSS FILEs //-->
	<link rel="stylesheet" href="/css/html5reset-1.6.1.css" media="all" />
	<link rel="stylesheet" href="/css/project-vocalendar-august2012.css?20140309b" media="all" />
	
	<!-- Google AJAX LIBRARIEs //-->
	<!-- 使用する場合はそれぞれの読み込み箇所を書き換え //-->
	<!-- ホストされているバージョンに注意 //-->
	<!-- http://code.google.com/intl/ja/apis/ajaxlibs/ //-->
	<script src="//www.google.com/jsapi"></script>
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
					<li class="nav" id="nav01"><a href="about/">about</a></li>
					<!--<li id="nav02"><a href="#">event portal</a></li>//-->
					<li class="nav" id="nav03"><a href="gallery/">gallery</a></li>
					<li id="googleplay"><a href="https://play.google.com/store/apps/details?id=jp.vocalendar" target="_blank"><img src="../images/google-play-badge.png" height="40px" alt="Get it on Google Play"></a></li>
					<li id="appstore"><a href="https://itunes.apple.com/jp/app/vocalendar/id1428412596" target="_blank"><img src="../images/app-store-badge.png" height="40px" alt="Download on the App Store"></a></li>
				</ul>
			</nav>
			
			<!--<section id="searchCNT">
				<form id="VS_conditionContainer" name='VS_searchCondition'>
				<select name='VS_selectCalendar' id='VS_selectCalendar' class="dropkick" >
				<option value='0'>メイン</option>
				<option value='1'>放送系</option>
				</select>
				<input type='text' name='VS_searchstring' id='VS_searchstring' placeholder="VOCALENDAR検索" autofocus />
				<input type='button' name='VS_execute' id='VS_execute' value='検索' onClick="_gaq.push(['_trackEvent', 'Search', 'Search']);" />
				</form>
			</section>//-->
			
		</header>
		
		<section id="googleCalCNT">
		<!--- width 900 to 850 //-->
			<iframe class="vcl01" src="/modules/gcalendar-wrapper-tsubaki.php?src=0mprpb041vjq02lk80vtu6ajgo%40group.calendar.google.com&amp;color=%230F4B38&amp;ctz=Asia%2FTokyo&amp;showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;showPrint=0&amp;mode=MONTH&amp;height=650&amp;wkst=2&amp;bgcolor=%23FFFFFF" style=" border-width:0 " width="875" height="650" frameborder="0" scrolling="no"></iframe>
			<!--<iframe class="vcl01" src="/gcalendar-wrapper-tsubaki.php?src=0mprpb041vjq02lk80vtu6ajgo%40group.calendar.google.com&amp;color=%230F4B38&amp;src=5fsoru1dfaga56mcleu5mp76kk%40group.calendar.google.com&amp;color=%23AB8B00&amp;ctz=Asia%2FTokyo&amp;showTitle=0&amp;showCalendars=1&amp;showTz=0&amp;showPrint=0&amp;height=650&amp;wkst=2&amp;bgcolor=%23FFFFFF" style=" border-width:0 " width="875" height="650" frameborder="0" scrolling="no"></iframe>//-->
		</section>
		
		<!-- 検索結果エリア //-->
		<section id='VS_resultContainer' class="clearfix">
			<h2 id="VCLsearchResultTitle">イベント検索結果<span style="color:#aaa;font-size:20px;"> &nbsp;BETA</span></h2>
			<a id="searchCloseBTN"></a>
			<div id="VCLsearchIndicator">検索中</div>
		</section>
		
		<!-- GL //-->
		<div id="glOS">
		<aside id="glCNT">
			<section id="glCNTtwitterAbout">
				twitterアカウントでは、開始4時間前にイベントタイトルを自動でお知らせします。ぜひフォローしてお役立てくださいね！
			</section>
			<section id="glCNTtwitterBTN">
			<a href="https://twitter.com/VOCALENDAR" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @VOCALENDAR</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</section>
		</aside>
		</div>
		
		<!-- 新エルロワエリア //-->
		<aside id="elrowaCNT">
			<img src="images/illustrations/vocalendar-elrowa-mikuoriginal.png" alt="初音ミク@VOCALENDAR" />
			<section class="credit">
				Illustration by <a href="http://www.elrowa.com/" target="_blank">ELrowa</a>.
			</section>
		</aside>
		
		<!-- フッタセクション //-->
		<footer>
			<span class="gray">VOCALENDAR編集メンバー募集中！（特に過去の出来事をアーカイブできちゃう方）ご興味ある方は <a href="https://twitter.com/curioustander/" target="_blank">@curioustander</a> (twitter) までご連絡ください！ / メールでのお問い合わせは contact(at)vocalendar.jp まで。 / 当サイトに掲載されている情報は個人利用の範囲でご自由にお使いいただいて結構ですが、商用利用はご遠慮ください。 / イラストはイラストレーターさんの大切な作品です。無断使用・転載などはくれぐれもおやめください。</span> / 当サイトで使用しているイラストはピアプロ・キャラクター・ライセンスに基いて<!--各社のキャラクターライセンスに基いて//-->クリプトン・フューチャー・メディア株式会社のキャラクター『初音ミク』を描いたものです。 / VOCALOIDならびにボーカロイドはヤマハ株式会社の登録商標です。 / 『MEIKO』『KAITO』『初音ミク』『鏡音リン』『鏡音レン』『巡音ルカ』はクリプトン・フューチャー・メディア株式会社の著作物です。 / 『歌愛ユキ』『氷山キヨテル』『SF-A2 開発コード miki』『猫村いろは』『結月ゆかり』は、株式会社AHSの登録商標です。 / 『Megpoid』『がくっぽいど』『Lily』『CUL』は株式会社インターネットの登録商標です。 / その他の製品・商品名は各社の商標または登録商標です。 / &copy; 2012 VOCALENDAR. / Design by curioustander. / Official illustration by ELrowa.
		</footer>
		
	</div><!-- EOD:#vocalendarCNT //-->

<!-- フッタ読み込み //-->
<?php include "modules/footer.tpl"; ?>

<!-- VOCALENDAR JS読み込み //-->
<script src="js/vocalendar.js"></script>
	
</body>
</html>
