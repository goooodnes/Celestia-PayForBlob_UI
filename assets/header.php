<?php
include_once('cfg.php');

$prefix="/header/1";
$url = Config::NODE.$prefix;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$curlResponse = curl_exec($ch);
echo $curlResponse;

if (curl_error($ch)) {
    echo curl_error($ch);
}

curl_close($ch);
