<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(__DIR__ . '/../../../config.php');
require_login();
$PAGE->set_url('/admin/tool/sessionbreaker/sessionwatcher.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('embedded');
$strheading = 'Watch $SESSION';
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add($strheading, $PAGE->url);

echo $OUTPUT->header();

\core\session\manager::write_close();
error_log( "SIZE OF SESSION->recentsessionlocks: " . sizeof($SESSION->recentsessionlocks));
$manager = new \core\session\manager();
if (method_exists($manager, 'display_blocking_page')) {
    echo $manager->display_blocking_page();
}
echo $OUTPUT->footer();
