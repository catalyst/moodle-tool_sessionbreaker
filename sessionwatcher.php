<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(__DIR__ . '/../../../config.php');

print "SIZE OF SESSION->recentsessionlocks: " . sizeof($SESSION->recentsessionlocks);

