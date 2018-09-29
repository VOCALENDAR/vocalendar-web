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
	<title>VOCALENDAR（ボカレンダー）| ボカロイベントの共有カレンダー！</title>
	
	<!-- IE HTML5 ENABLER //-->
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- CSS FILEs //-->
	<link rel="stylesheet" href="/css/html5reset-1.6.1.css" media="all" />
	<link rel="stylesheet" href="/css/project-vocalendar-august2012.css" media="all" />
	
	<!-- Google AJAX LIBRARIEs //-->
	<!-- 使用する場合はそれぞれの読み込み箇所を書き換え //-->
	<!-- ホストされているバージョンに注意 //-->
	<!-- http://code.google.com/intl/ja/apis/ajaxlibs/ //-->
	<script src="//www.google.com/jsapi"></script>
	<script>google.load("jquery", "1.7.0");</script>
	<script>google.load("jqueryui", "1.8.16");</script>
	<script src="../js/jquery.gcal_flow.js"></script>
	<script src="../js/jquery.li-scroller.1.0.js"></script>
	<script src="../js/jquery.pinnedfooter.js"></script>
	
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
					<li id="nav01"><a href="../about/">about</a></li>
					<!--<li id="nav02"><a href="#">event portal</a></li>//-->
					<li id="nav03"><a href="../gallery/">gallery</a></li>
				</ul>
			</nav>
			
		</header>
		
		
		<section  id="heroCNT">
			<img id="aboutShadow" src="../images/vocalendar-bg-shadow.png" alt="vocalendar-bg-shadow" />
			<img id="aboutHero" src="../images/vocalendar-photo-pcs.png" alt="vocalendar-photo-pcs" />
			<img id="aboutLead" src="../images/vocalendar-statement-about.png" alt="vocalendar-statement-about" />
		</section>
		
		<section id="ppCNT">
			<h2 id="ppCNT01">VOCALENDARの活動目的は3つ。</h2>
			<ul id="ppCNT02">
				<li>1. VOCALOIDファンのお役にたつこと</li>
				<li>2. VOCALOID文化を活性化させるための触媒となること</li>
				<li>3. VOCALOID文化の歴史を記録すること</li>
			</ul>
			<p id="ppCNT03">
				VOCALENDARのプロダクトは、1つの宣言と3つの活動目的に必ず関連しています。これらを大きく逸脱することはありません。それはVOCALENDARのアイデンティティをぼやかし、VOCALOIDという大きな流れの中で自らの進むべき道を見えにくくするからです。
			</p>
		</section>
		
		<section class="InfoBox">
			<h2 class="InfoBoxH2">編集メンバー募集中！</h2>
			<p class="InfoBoxP">VOCALENDARでは、編集メンバーを随時募集しています。VOCALENDARは多数の有志による活動によって支えられています。ボーカロイドが好きな方、ボーカロイド関連のイベント関係の方はぜひ編集にご協力ください。編集メンバー参加のご希望はTwitterアカウント<a href="https://twitter.com/curioustander" target="_blank">@curioustander</a>まで。</p>
		</section>
		
		<section class="InfoBox right">
			<h2 class="InfoBoxH2">情報をご提供ください！</h2>
			<p class="InfoBoxP">VOCALENDARでは、イベント情報のご提供を随時受け付けています。掲載されていないイベント情報がありましたら、Twitterで<a href="https://twitter.com/search/%23vocalendar" target="_blank">#vocalendar</a>をつけてつぶやくか、<a href="https://twitter.com/VOCALENDAR/" target="_blank">@VOCALENDAR</a>宛にリプライを送ってください。編集メンバーがサイトに掲載させていただきます。</p>
		</section>
		
		<!-- フッタセクション //-->
		<footer>
			<span class="gray"><span class="red">現在BETA運用につきカレンダーがいきなりバグる(!)・突然消失(!!)する</span>などの不具合が予想されます。ひとまず眺めるだけに留めていただけると安心で嬉しい感じです。 / 『VOCALENDAR』編集メンバー募集中！（特に過去の出来事をアーカイブできちゃう方）ご興味ある方は <a href="https://twitter.com/curioustander/" target="_blank">@curioustander</a> (twitter) までご連絡ください！ / 当サイト『VOCALENDAR』に掲載されている情報は個人利用の範囲でご自由にお使いいただいて結構ですが、商用利用はご遠慮ください。 / イラストはイラストレーターさんの大切な作品です。無断使用・転載などはくれぐれもおやめください。</span> / 当サイトで使用しているイラストはピアプロ・キャラクター・ライセンスに基いて<!--各社のキャラクターライセンスに基いて//-->クリプトン・フューチャー・メディア株式会社のキャラクター『初音ミク』を描いたものです。 / VOCALOIDならびにボーカロイドはヤマハ株式会社の登録商標です。 / 『MEIKO』『KAITO』『初音ミク』『鏡音リン』『鏡音レン』『巡音ルカ』はクリプトン・フューチャー・メディア株式会社の著作物です。 / 『歌愛ユキ』『氷山キヨテル』『SF-A2 開発コード miki』『猫村いろは』『結月ゆかり』は、株式会社AHSの登録商標です。 / 『Megpoid』『がくっぽいど』『Lily』『CUL』は株式会社インターネットの登録商標です。 / その他の製品・商品名は各社の商標または登録商標です。 / &copy; 2012 VOCALENDAR. Official illustration by ELrowa.
		</footer>
		
	</div><!-- EOD:#vocalendarCNT //-->

<!-- フッター読み込み //-->
<?php include "../modules/footer.tpl"; ?>

<!-- VOCALENDAR JS読み込み //-->
<script src="../js/vocalendar.js"></script>
	
</body>
</html>