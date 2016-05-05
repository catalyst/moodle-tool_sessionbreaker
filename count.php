<?php

require_once(dirname(__FILE__) . '/../../../config.php');

require_login();

$current = $SESSION->foo;

echo "Start $current - ";

$current++;

sleep(1);

$SESSION->foo = $current;

echo "End $current";

