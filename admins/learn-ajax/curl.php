<?php
//Get the $target_url here from $_GET[];
$my_url="https://www.youtube.com/";
$ch = curl_init("$my_url");
$fp = fopen("$target_url", "r");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
?>