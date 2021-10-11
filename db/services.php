<?php

$functions = array(
        'tool_sessionbreaker_mutate_session' => array(
            'classname'     => 'tool_sessionbreaker_external',
            'methodname'    => 'mutate_session',
            'description'   => 'Mutate the session. Maybe.',
            'type'          => 'read',
            'ajax'          => true,
            'readonlysession' => true
        )
);
