<?php

define('NO_OUTPUT_BUFFERING', true);
require_once(dirname(__FILE__) . '/../../../config.php');

$PAGE->set_url('/admin/tool/sessionbreaker/index.php');
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('admin');
$strheading = 'Session blocking';
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->navbar->add($strheading, $PAGE->url);

require_login();
require_capability('moodle/site:config', context_system::instance());

echo $OUTPUT->header();

?>

<p>This demonstrates a 'bad' script which locks the session and doesn't release it,
and a victim script which is delayed because of it.

<iframe src='bad.php' style='height: 50px; width: 100%'></iframe>

<?php
usleep(200000); // Enough to mostly mean the iframes load in order (not required but easier to read).

?>
<iframe src='good.php' style='height: 50px; width: 100%'></iframe>

<?php

echo $OUTPUT->footer();

