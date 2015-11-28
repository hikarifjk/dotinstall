<?php

require_once(__DIR__ . '/config.php');

use Abraham\TwitterOAuth\TwitterOAuth;

$connection = new TwitterOAuth(
  CONSUMER_KEY,
  CONSUMER_SECRET,
  ACCESS_TOKEN,
  ACCESS_TOKEN_SECRET);

$content = $connection->get("account/vefity_credentials");
$content = $connection->get("statuses/home_timeline", ['count'=>3]);

var_dump($content);
