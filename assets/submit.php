<?php
include_once('cfg.php');

$data = $_POST['data'];
$gas_limit = $_POST['gas'];
$fee = $_POST['fee'];
//$namespace_id = $_POST['namespace_id'];
//$node = $_POST['node'];

$prefix="/submit_pfb";
$url = Config::NODE.$prefix;

$bytes = random_bytes(8);
$namespace_id = bin2hex($bytes);
$data_hex = bin2hex($data);

$postParameter = array(
    "namespace_id" => $namespace_id,
    "data" => $data_hex,
    "gas_limit" => (int)$gas_limit,
    "fee" => (int)$fee
);
$postParameter = json_encode($postParameter);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postParameter);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$curlResponse = curl_exec($ch);
echo $curlResponse;

if (curl_error($ch)) {
    echo curl_error($ch);
}

curl_close($ch);