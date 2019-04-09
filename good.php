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

echo $OUTPUT->header();

\core\session\manager::write_close();
$slow = 300;
usleep($slow * 1000);
echo "I am good, I am a litte slow ($slow ms) but I unlock the session before the slow bits.";
$manager = new \core\session\manager();
if (method_exists($manager, 'display_blocking_page')) {
    echo $manager->display_blocking_page();
}
echo $OUTPUT->footer();
