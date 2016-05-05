<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(dirname(__FILE__) . '/../../../config.php');

$PAGE->set_url('/admin/tool/sessionbreaker/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('admin');
$strheading = get_string('pluginname', 'tool_sessionbreaker');
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add(get_string('pluginname', 'tool_sessionbreaker'), $PAGE->url);

require_login();

require_capability('moodle/site:config', context_system::instance());


echo $OUTPUT->header();

// echo "<p>The session_handler_class is " . $CFG->session_handler_class . "</p>";

$SESSION->foo = 0;

for ($c=0; $c<10; $c++) {

    echo "<p>Frame $c: ";
    echo "<iframe src='count.php?c=$c' style='height: 30px;'></iframe>";

    usleep(200000); // Enough to mostly mean the iframes load in order (not required but easier to read).

}

echo $OUTPUT->footer();


