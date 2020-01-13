<?php
define('ACCESS_KEY_ID', 'AKIAIWRGIBFOT7TX2HIA');
define('YOUR_SECRET_KEY', 'HNSLGMSrtqTZOGGZnpg6BCTvG4f/hRQP8YELlf6g');

$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_BACKTICK) ?? 'Music';
$keywords = filter_input(INPUT_GET, 'keywords', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_BACKTICK) ?? "初音ミク";

$response = ""; // XML戻り値
$xmlArray = array(); // XMLパース後(JSON)
$xmlObject = ""; // JSON->連想配列
$ItemArray = array();
$releasedate = "";

?><!DOCTYPE html>
<html lang="ja">
<head>
    <title>Amazon API test</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="amazon_api.css">
</head>
<body>

<section id="searchOptions">

<form method="GET">
<input type="text" name="keywords" value="<?= htmlspecialchars($keywords) ?>">
<input type="hidden" name="category" value="<?= htmlspecialchars($category) ?>">

<ul id="categorySelector">
<li <?php if ($category == "Music") echo "class='active'"; ?>><label><input type="radio" name="category" value="Music" <?php if ($category == "Music") echo "checked"; ?>><a href="?category=Music&keywords=<?php echo $keywords; ?>">Music</a></label></li>
<li <?php if ($category == "DVD") echo "class='active'"; ?>><label><input type="radio" name="category" value="DVD" <?php if ($category == "DVD") echo "checked"; ?>><a href="?category=DVD&keywords=<?php echo $keywords; ?>">DVD</a></li>
<li <?php if ($category == "Books") echo "class='active'"; ?>><label><input type="radio" name="category" value="Books" <?php if ($category == "Books") echo "checked"; ?>><a href="?category=Books&keywords=<?php echo $keywords; ?>">Books</a></li>
<li <?php if ($category == "Hobbies") echo "class='active'"; ?>><label><input type="radio" name="category" value="Hobbies" <?php if ($category == "Hobbies") echo "checked"; ?>><a href="?category=Hobbies&keywords=<?php echo $keywords; ?>">Hobbies</a></li>
<li <?php if ($category == "Toys") echo "class='active'"; ?>><label><input type="radio" name="category" value="Toys" <?php if ($category == "Toys") echo "checked"; ?>><a href="?category=Toys&keywords=<?php echo $keywords; ?>">Toys</a></li>
</ul>

</form>

<?php if (!defined('ACCESS_KEY_ID') || ACCESS_KEY_ID　== "" ||
         !defined('YOUR_SECRET_KEY') || YOUR_SECRET_KEY == ""): ?>
    <p>設定が読み取れません</p>
</body>
<?php exit(); ?>
<?php endif; ?>

</section>

<?php

function ItemLookup ($category, $keyword, $page = 1)
{
    global $releasedate;
    $params = array();

    // 必須
    $access_key_id = ACCESS_KEY_ID;
    $secret_access_key = YOUR_SECRET_KEY;
    $params['AssociateTag'] = 'vocalendar-22';
    $baseurl = 'http://ecs.amazonaws.jp/onca/xml';

    // パラメータ
    $params['Service'] = 'AWSECommerceService';
    $params['Keywords'] = $keyword;
    $params['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
    $params['ItemPage'] = $page;
    $params['AWSAccessKeyId'] = $access_key_id;
    $params['Operation'] = 'ItemSearch';

    switch ($category) {
        case "Books":
            $params['SearchIndex'] = 'Books';
            $params['ResponseGroup'] = 'ItemAttributes,Offers';
            $params['Sort'] = 'daterank';
            $releasedate = 'PublicationDate';
            break;
        case "Hobbies":
            $params['SearchIndex'] = 'Hobbies';
            $params['ResponseGroup'] = 'ItemAttributes,Offers';
            $params['Sort'] = '-release-date';
            $releasedate = 'ReleaseDate';
            break;
        case "Toys":
            $params['SearchIndex'] = 'Toys';
            $params['ResponseGroup'] = 'ItemAttributes,Offers';
            $params['Sort'] = '-releasedate';
            $releasedate = 'ReleaseDate';
            break;
        case "Electronics":
            $params['SearchIndex'] = 'Electronics';
            $params['ResponseGroup'] = 'ItemAttributes,Offers';
            $params['Sort'] = '-releasedate';
            $releasedate = 'ReleaseDate';
            break;
        case "DVD":
            $params['SearchIndex'] = 'DVD';
            $params['ResponseGroup'] = 'ItemAttributes,Offers';
            $params['Sort'] = '-releasedate';
            $releasedate = 'ReleaseDate';
            break;
        default:
            $params['SearchIndex'] = 'Music';
            $params['ResponseGroup'] = 'ItemAttributes,Offers';
            $params['Sort'] = '-orig-rel-date';
            $releasedate = 'ReleaseDate';
            break;
    }

    ksort($params);

    // 送信用URL・シグネチャ作成
    $canonical_string = '';
    foreach ($params as $k => $v) {
        $canonical_string .= '&' . urlencode_rfc3986($k) . '=' . urlencode_rfc3986($v);
    }
    $canonical_string = substr($canonical_string, 1);
    $parsed_url = parse_url($baseurl);
    $string_to_sign = "GET\n{$parsed_url['host']}\n{$parsed_url['path']}\n{$canonical_string}";
    $signature = base64_encode(hash_hmac('sha256', $string_to_sign, $secret_access_key, true));
    $url = $baseurl . '?' . $canonical_string . '&Signature=' . urlencode_rfc3986($signature);

    // xml取得
    $xml = request($url);

    // xml出力
    return $xml;
}

function urlencode_rfc3986($str)
{
    return str_replace('%7E', '~', rawurlencode($str));
}

function request($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    $response = curl_exec($ch);
    curl_close($ch);

    $xmlObject = simplexml_load_string($response);

    $xmlArray = json_decode( json_encode($xmlObject), TRUE);
    return $xmlArray;

    //return simplexml_load_string($response); //オブジェクトとして返す場合
}


for ($page = 1; $page <= 3; $page++) {

    $xmlArray = ItemLookup($category, $keywords, $page);

    if ($xmlArray === false) {
        outputErrorMessage('false', 'simplexml_load_string Request Error!');
        break;
    } else if (is_array($xmlArray)) {
        if(array_key_exists('Error', $xmlArray)) {
            $code = $xmlArray['Error']['Code'] ?? '';
            $msg = $xmlArray['Error']['Message'] ?? 'System Error.';
            outputErrorMessage($code, $msg);
            break;
        } else if (!isset($xmlArray['Items']['Item'])) {
            $code = $xmlArray['Items']['Request']['Errors']['Error']['Code'] ?? '';
            $msg = $xmlArray['Items']['Request']['Errors']['Error']['Message'] ?? 'System Error.';
            outputErrorMessage($code, $msg);
            break;
        }
        $ItemArray = array_merge($ItemArray, $xmlArray['Items']['Item']);
    }
    // 間隔を開けないとアクセスエラーとなるため、0.5秒sleep
    usleep(500 * 1000);
}

function outputErrorMessage($code, $msg) {
    echo 'Error!!<br />';
    echo htmlspecialchars($code).'<br />';
    echo htmlspecialchars($msg).'<br />';
    echo '<br />';
}

function get_affiliate_url($url) {
    $component = parse_url($url);
    if ($component === false) {
        return $url;
    }

    $affaliate = ($component['scheme'] ?? 'https').'://'.($component['host'] ?? 'www.amazon.co.jp').'/dp';
    parse_str($component['query'] ?? '', $query);
    $ASIN = $query['creativeASIN'] ?? '';

    if (empty($ASIN)) {
        return $url;
    }

    $affaliate = $affaliate.'/'.$ASIN.'/ref=nosim?tag=vocalendar-22';
    return $affaliate;
}

?>
<ul id='SearchResult'>
<?php if( is_array( $ItemArray ) ): ?>
    <?php foreach ($ItemArray as $ItemTemp) : ?>
        <li>
            <p class='ReleaseDate'><?= htmlspecialchars($ItemTemp['ItemAttributes'][$releasedate]) ?></p>
            <p class='title'>
                [<a href='<?= htmlspecialchars($ItemTemp['DetailPageURL']) ?>' target='_blank'>Link</a>]
                [<a href='<?= htmlspecialchars(get_affiliate_url( $ItemTemp['DetailPageURL'] )) ?>' target='_blank'>Affiliate</a>]
                 <?= htmlspecialchars($ItemTemp['ItemAttributes']['Title']) ?>
            </p>
        </li>
    <?php endforeach; ?>
<?php else: ?>
    <li>It IS NOT the array!</li>
<?php endif; ?>
</ul>

</body>
</html>
