<?php

define('REQUIRE_SESSION_LOCK', false);

require_once(dirname(__FILE__) . '/../../../config.php');

require_login();

$current = cache::make('core', 'tagindexbuilder')->get('count');
$current++;
usleep(500 * 1000); // Enough delay to expose race conditions on this muc item
cache::make('core', 'tagindexbuilder')->set('count', $current);


$gained = empty($PERF->sessionlock['gained']);
$released = empty($PERF->sessionlock['released']);

echo "Start $current - gained $gained - released $released ";


usleep(500 * 1000); // Enough delay to show contention between requests

// uncomment this to see the write when we should be readonly exceptions
// $SESSION->count = $current;

echo "End $current";

