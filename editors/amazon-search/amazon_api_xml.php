<?php

$response = ""; // XML戻り値
$xmlArray = array(); // XMLパース後(JSON)
$xmlObject = ""; // JSON->連想配列

function ItemLookup ($id)
{
    $params = array();

    // 必須
    $access_key_id = 'AKIAJKSYD3C3HHE5XAQA';
    $secret_access_key = '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';
    $params['AssociateTag'] = 'curioustander-22';
    $baseurl = 'http://ecs.amazonaws.jp/onca/xml';

    // パラメータ
    $params['Service'] = 'AWSECommerceService';
    $params['AWSAccessKeyId'] = $access_key_id;
    $params['Operation'] = 'ItemSearch';
    $params['Keywords'] = 'megpoid';
    $params['SearchIndex'] = 'Books';
    $params['ResponseGroup'] = 'ItemAttributes,Offers';
    $params['Sort'] = 'daterank';
        $params['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
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
    header('Content-type: text/xml; charset=UTF-8');
    echo $xml;

    //return $xml;
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

    return $response;
    //return simplexml_load_string($response); //オブジェクトとして返す場合
}


ItemLookup('');
?>