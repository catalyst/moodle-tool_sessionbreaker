<?php

define('NO_OUTPUT_BUFFERING', true);

// If you want to test using readonly cookies use index.php?readonly=1
// This should log debug errors when on as we do attempt to change the session.
if (isset($_GET['readonly']) && $_GET['readonly'] == 1) {
    define('READ_ONLY_SESSION', true);
}

require_once(dirname(__FILE__) . '/../../../config.php');

$delay = optional_param('delay', 500, PARAM_INT);

require_login();

// This forces the dev tools to start showing the TTFB vs the 'Content download' parts of the request.
echo " ";

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

