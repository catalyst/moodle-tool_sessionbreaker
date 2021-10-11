<?php

define('READ_ONLY_SESSION', true);
require_once('../../../config.php');

global $SESSION;
$newval = uniqid();
echo "Current value in SESSION: " . ($SESSION->myvar ?? '') . ". Attempting to set it to $newval";
$SESSION->myvar = $newval;
