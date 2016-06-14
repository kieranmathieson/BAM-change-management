<?php
/**
 * Implements hook_theme().
 */
function sheep_theme($existing, $type, $theme, $path) {
    return array(
        'sheepnocount' => array(
            'variables' => array('test_var' => NULL),
        ),
        'evilsheep' => [
            'variables' => ['how_evil' => NULL, ]
        ],
    );
}