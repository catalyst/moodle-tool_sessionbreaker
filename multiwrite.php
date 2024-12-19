<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(dirname(__FILE__) . '/../../../config.php');

$count = optional_param('count', 20, PARAM_INT);
$delay = optional_param('delay', 100, PARAM_INT);
$modulo = optional_param('modulo', 20, PARAM_INT);
$countdelay = optional_param('countdelay', 500, PARAM_INT);
$readonly = optional_param('readonly', false, PARAM_BOOL);

$PAGE->set_url('/admin/tool/sessionbreaker/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('admin');
$strheading = 'Multi write';
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add(get_string('pluginname', 'tool_sessionbreaker'), $PAGE->url);

\core\session\manager::write_close();

echo $OUTPUT->header();

echo "<p>The session_handler_class is " . $CFG->session_handler_class . "</p>";

echo "<p>This loads a bunch of iframes in parallel which all mess with different session attributes.
<p>Each also waits for a second before completing.</p>";

echo '<table><tr>';
for ($c=1; $c<=$count; $c++) {

    echo '<td>';
    echo "<p>Frame $c: ";
    echo "<iframe src='write.php?c=$c&delay=$countdelay&modulo=$modulo' style='height: 40px;'></iframe>";

    usleep($delay * 1000); // Enough to mostly mean the iframes load in order (not required but easier to read).

    if ($c % $modulo == 0) {
        echo '<tr>';
    }

}
echo '</table>';

echo $OUTPUT->footer();

