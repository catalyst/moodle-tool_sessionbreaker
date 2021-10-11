<?php

require_once('../../../config.php');

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/asdf');

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('tool_sessionbreaker/testpage', []);
echo $OUTPUT->footer();
