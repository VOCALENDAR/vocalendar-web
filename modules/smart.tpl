<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-script-type" content="text/javascript">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="http://vocalendar.jp/css/html5reset-1.6.1.css" media="all" />
	<link rel="stylesheet" href="/css/jquery.mobile-1.1.0.css" />
	<link rel="stylesheet" href="/css/project-vocalendar-smartphone.css" />
	<!--<script type="text/javascript" src="js/jquery.js"></script>//-->
	<!--<script type="text/javascript" src="js/smartphone.js"></script>//-->
	
	<!-- Google AJAX LIBRARIEs //-->
	<!-- 使用する場合はそれぞれの読み込み箇所を書き換え //-->
	<!-- ホストされているバージョンに注意 //-->
	<!-- http://code.google.com/intl/ja/apis/ajaxlibs/ //-->
	<script src="http://www.google.com/jsapi"></script>
	<script>google.load("jquery", "1.7.0");</script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<script src="/js/jquery.gcal_flow.min.js?3.0.1"></script>
	<script src="/js/jquery.autolink.js"></script>
</head>

<body>


<div data-role="page" id="page1">
<?php require 'modules/sp-header.tpl' ?>
<!--<div data-role="navbar" class="navbar">
<ul>
<li><a class="ui-btn-active ui-state-persist" href="#page1">メイン</a></li>
<li><a class="ui-btn" href="#page2">放送系</a></li>
</ul>
</div>//-->
<div id="VCLbody1">
<section class="VCLsmp gcf-item-container-block">
<article class="gcf-item-block">
<h5 class="gcf-item-daterange"></h5>
<h4 class="gcf-item-title"></h4>
<p class="gcf-item-description"></p>
</article>
</section>
</div>
</div>
<!-- フッター //-->
<?php require 'modules/sp-footer.tpl' ?>	
</div>

<div data-role="page" id="page2">
<?php require 'modules/sp-header.tpl' ?>
<div data-role="navbar" class="navbar">
<ul>
<li><a class="ui-btn" href="#page1">メイン</a></li>
<li><a class="ui-btn-active ui-state-persist" href="#page2">放送系</a></li>
</ul>
</div>
<div id="VCLbody2">
<section class="VCLsmp gcf-item-container-block">
<article class="gcf-item-block">
<h5 class="gcf-item-daterange"></h5>
<h4 class="gcf-item-title"></h4>
<p class="gcf-item-description"></p>
</article>
</section>
</div>
</div>
<!-- フッター //-->
<?php require 'modules/sp-footer.tpl' ?>	
</div>

<!-- gCalFlow //-->
<script type="text/javascript">
$(function(){
$('#VCLbody1').gCalFlow({
calid: '0mprpb041vjq02lk80vtu6ajgo@group.calendar.google.com',
apikey: 'AIzaSyCBUikL-O7uEc54tV3uIHNX5RmijV2gxlQ',
maxitem: 25,
auto_scroll: false,
link_item_title: false,
callback: function () {
$(".gcf-item-description").autolink();
}
});
$('#VCLbody2').gCalFlow({
calid: '5fsoru1dfaga56mcleu5mp76kk@group.calendar.google.com',
apikey: 'AIzaSyCBUikL-O7uEc54tV3uIHNX5RmijV2gxlQ',
maxitem: 25,
auto_scroll: false,
link_item_title: false,
callback: function () {
$(".gcf-item-description").autolink();
}
});
});
</script>

</body>
</html>
