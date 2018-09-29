<?php
$smart_ua_list = array(
	'iPhone',    // Apple iPhone
	'iPod',    // Apple iPod touch
	'Android',    // Android
	'dream',    // Pre 1.5 Android
	'CUPCAKE',    // 1.5+ Android
	'blackberry',    // blackberry
	'webOS',    // Palm Pre Experimental
	'incognito',    // Other iPhone browser
	'webmate',    // Other iPhone browser
	'Kindle'
);

$smart_mode = false;

if ( empty($_GET['if'])) {
	foreach ($smart_ua_list as $ua) {
		if (stripos($_SERVER['HTTP_USER_AGENT'], $ua) === false) continue;
		$smart_mode = true;
		break;
	}
} elseif ( $_GET['if'] == "pc" ) {
	$smart_mode = false;
} elseif ( $_GET['if'] == "sp" ) {
	$smart_mode = true;
} else {
	header("Status: 404 Not Found", true, 404);
	echo "<h1>404 Not Found</h1>";
	exit;
}

if (!$smart_mode) {
	require_once ("modules/index.tpl");
} else {
	require_once ("modules/smart.tpl");
}
