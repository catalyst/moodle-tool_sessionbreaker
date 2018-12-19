<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(__DIR__ . '/../../../config.php');

require_login();

echo "I am good but am the victim of ...";
