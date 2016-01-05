<?php
 
require_once(__DIR__ . '/config.php');
 
// package
// - Composer
 
use Abraham\TwitterOAuth\TwitterOAuth;
 
$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET,
  ACCESS_TOKEN,
  ACCESS_TOKEN_SECRET);
 
// $content = $connection->get("account/verify_credentials");
// $content = $connection->get("statuses/home_timeline", ['count'=>3]);
// var_dump($content);
 
$res = $connection->post("statuses/update", [
  'status' => 'ドットインストールがおすすめ! http://dotinstall.com #dotinstall'
]);
 
if ($connection->getLastHttpCode() === 200) {
  echo 'Success!' . PHP_EOL;
} else {
  echo 'Error!' . $res->errors[0]->message . PHP_EOL;
}

