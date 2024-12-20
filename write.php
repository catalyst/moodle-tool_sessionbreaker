<?php

define('NO_OUTPUT_BUFFERING', true);

require_once(dirname(__FILE__) . '/../../../config.php');

$delay = optional_param('delay', 500, PARAM_INT);
$modulo = optional_param('modulo', 100, PARAM_INT);
$c = optional_param('c', 1, PARAM_INT);

require_login();

// This forces the dev tools to start showing the TTFB vs the 'Content download' parts of the request.
echo " ";

$c = ($c - 1) % $modulo + 1;

$attr = "var$c";

usleep($delay * 1000); // Enough delay to expose race conditions on this muc item

if (isset($SESSION->$attr)) {
    $SESSION->$attr = $SESSION->$attr + 1;
} else {
    $SESSION->$attr = 1;
}

echo " $attr is now " . $SESSION->$attr;

