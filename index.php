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

cache::make('core', 'tagindexbuilder')->set('count', 0);
\core\session\manager::write_close();

echo $OUTPUT->header();

// echo "<p>The session_handler_class is " . $CFG->session_handler_class . "</p>";

echo "<p>This loads a bunch of iframes in parallel which all mess with the same session attribute.
If session locking is working then this these are forced to queue and process one at a time, and then
last iframe to load should 'end' with 10.</p>
<p>If any iframes have the have the same number then locking is busted</p>";

for ($c=1; $c<=20; $c++) {

    echo "<p>Frame $c: ";
    echo "<iframe src='count.php?c=$c' style='height: 30px;'></iframe>";

    usleep(100 * 1000); // Enough to mostly mean the iframes load in order (not required but easier to read).

}

echo $OUTPUT->footer();

