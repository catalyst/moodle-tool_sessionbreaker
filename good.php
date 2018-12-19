<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(__DIR__ . '/../../../config.php');
require_login();
$PAGE->set_url('/admin/tool/sessionbreaker/bad.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('embedded');
$strheading = 'Good page which is blocked by another page';
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add($strheading, $PAGE->url);

$wait = isset($_GET['wait']) ? $_GET['wait'] : 10;

echo $OUTPUT->header();

echo "I am good but am the victim of ...";

echo $OUTPUT->footer();
