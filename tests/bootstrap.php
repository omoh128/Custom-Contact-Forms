<?php

// Load WordPress testing environment
$_tests_dir = getenv('WP_TESTS_DIR') ?: '/path/to/wordpress/tests/phpunit';

$_tests_dir = './';

require_once $_tests_dir . '/includes/functions.php';

// Load the plugin files
define('WP_PLUGIN_DIR', '/Users/omomohagiogu/Local Sites/newbook/app/public/wp-content/plugins');
require_once WP_PLUGIN_DIR . '/custom-contact-forms/vendor/autoload.php'; // Update this line to autoload.php

// Start up the WP testing environment
function _manually_load_plugin() {
    require WP_PLUGIN_DIR . '/custom-contact-forms/custom-contact-forms.php';
}
tests_add_filter('muplugins_loaded', '_manually_load_plugin');

// Load the WP testing environment
require $_tests_dir . '/includes/bootstrap.php';
