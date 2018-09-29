<?php

function proxyToCore($path) {
        $calUrl = "http://vocalendar.jp/core".$path;
        $curlObj = curl_init();
        curl_setopt($curlObj, CURLOPT_URL, $calUrl);
        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        // trust any SSL certificate (we're only retrieving public data)
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYHOST, FALSE);
        $ret = curl_exec($curlObj);
	$code = curl_getinfo($curlObj, CURLINFO_HTTP_CODE);
        curl_close($curlObj);
	if ($code == 200) {
		# ok
	} else if ($code == 404) {
		$ret = "<h2>Not Found</h2>";
		header("HTTP/1.0 404 Not Found", true, 404);
		header("Status: 404 Not Found", true, 404);
	} else {
		error_log("{$_SERVER['PHP_SELF']}: Core returns error; code={$code}, content={$ret}");
		$ret = "<h2>Internal Error</h2>";
		header("HTTP/1.0 500 Not Found", true, 500);
		header("Status: 500 Not Found", true, 500);
	}
	return $ret;
}

if (!empty($_GET['feedurl'])) {
	$url = "http://{$_SERVER["HTTP_HOST"]}{$_SERVER["SCRIPT_NAME"]}/gid/".basename($_GET['feedurl']);
	$url = str_replace(array("\n", "\r"), array("", ""), $url);
	header("Location: {$url}", true, 301);
	exit;
}
$path = "/ex/events".$_SERVER['PATH_INFO']."?embed=1";

$content = proxyToCore($path);

include("../modules/header.tpl");
echo $content;
include("../modules/footer.tpl");
?>
