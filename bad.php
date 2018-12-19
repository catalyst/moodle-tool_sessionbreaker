<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(__DIR__ . '/../../../config.php');
require_login();

$wait = isset($_GET['wait']) ? $_GET['wait'] : 10;

echo "I am bad and block the session for $wait seconds";
sleep($wait);


