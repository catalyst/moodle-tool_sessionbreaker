<?php

define('REQUIRE_SESSION_LOCK', false);

require_once(dirname(__FILE__) . '/../../../config.php');

$delay = optional_param('delay', 500, PARAM_INT);

require_login();

$current = cache::make('core', 'tagindexbuilder')->get('count');
$current++;
usleep($delay * 1000); // Enough delay to expose race conditions on this muc item
cache::make('core', 'tagindexbuilder')->set('count', $current);


$gained = empty($PERF->sessionlock['gained']);
$released = empty($PERF->sessionlock['released']);

echo "Start $current - gained $gained - released $released ";


usleep($delay * 1000); // Enough delay to show contention between requests

// uncomment this to see the write when we should be readonly exceptions
// $SESSION->count = $current;

echo "End $current";

// Load test the event logger
\mod_assign\event\course_module_instance_list_viewed::create_from_course($SITE)->trigger();

