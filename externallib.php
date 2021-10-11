<?php

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->libdir/externallib.php");

class tool_sessionbreaker_external extends external_api {

    public static function mutate_session_parameters() {
        return new external_function_parameters(
            array()
        );
    }

    public static function mutate_session() {
        global $SESSION;
        $newval = uniqid();

        error_log('Current value in session: ' . ($SESSION->something ?? '') . '. Attempting to change it to: ' . $newval);
        $SESSION->something = $newval;

	return [];
    }

    public static function mutate_session_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array()
            )
        );
    }
}
