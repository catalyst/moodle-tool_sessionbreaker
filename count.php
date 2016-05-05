<?php

require_once(dirname(__FILE__) . '/../../../config.php');

require_login();

$current = $SESSION->count;

echo "Start $current - ";

$current++;

sleep(1);

$SESSION->count = $current;

echo "End $current";

