<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(__DIR__ . '/../../../config.php');
require_login();
$PAGE->set_url('/admin/tool/sessionbreaker/bad.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('embedded');
$strheading = 'Bad session lock page';
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add($strheading, $PAGE->url);

$wait = isset($_GET['wait']) ? $_GET['wait'] : 10;

echo $OUTPUT->header();
echo "I am bad and block the session for $wait seconds";
sleep($wait);
echo \core\session\manager::display_blocking_page();

echo $OUTPUT->footer();
