<?php
echo "<html><head></head>";
echo "<body>";
echo "<center><table>";


$temp_code = $_GET["code"];
$client_secret = "293a6e99180c01a33a638d4393995391a7e87f7d";
echo "<h1>リダイレクトページ</h1><br><br>";


//違うユーザーでコミット
//名前を変えてみた
//アクセストークン取得用パラメータ設定
$array = array(
	"client_id" => "d2f2698fe04895f91985" ,
	"client_secret" => $client_secret,
	"code" => $temp_code,
);
$json = json_encode($array);
echo "■OAuth認証パラメータ(JSON):<br>";
var_dump ($json);
//認証リクエスト
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://github.com/login/oauth/access_token');
$result=curl_exec($ch);
//アクセストークン取得できたかなぁ・・・・




//$info = curl_getinfo ($ch);
//echo '<br>--VARDUMP--<br>';
//var_dump ($info);
//echo '<br>----<br>';
//echo 'RETURN:'.$result;
curl_close($ch);

echo "■認証結果<br>";
echo htmlspecialchars($result);

/*
echo '<br>';

//echo htmlspecialchars($result);
echo '<br>';

$personalcode = $result['access_token'];
$body = substr ($result, $info["header_size"]);
parse_str($result,$parParam);
$personalcode = $parParam[access_token];


echo '---情報---';


$array = array(
	"access_token " => $personalcode,
);
var_dump $array;
exho '<br>';
*/

/*
$json = json_encode($array);
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://github.com/user/viewer');
$result=curl_exec($ch);

echo 'RETURN:'.$result;

curl_close($ch);
*/
//92e16199263d9ad5edfcbd8624f08386dcb349d4


//変更コミット

echo "</table></center>";
echo "</body>";

?>