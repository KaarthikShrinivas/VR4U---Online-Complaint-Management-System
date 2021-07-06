<?php
$queryString = http_build_query([
    'access_key' => 'dd52cad410e9ea3ff06a2c4c152ef83d',
    'query' => 'kolathur chennai', //Keep the sql query here
    'output' => 'json',
    'limit' => 1,
]);

$ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$json = curl_exec($ch);

curl_close($ch);

$apiResult = json_decode($json, true);

print_r($apiResult);
echo $apiResult['data'][0]['latitude'];
echo $apiResult['data'][0]['longitude'];
