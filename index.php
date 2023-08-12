<?php
/**
 * Plugin Name: Custom Contact Forms
 * Description: Create and manage custom contact forms easily.
 * Version: 1.0.0
 * Author: Omomoh Agiogu
 * Text Domain: custom-contact-forms
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
require_once __DIR__ . '/vendor/autoload.php';

// Define constants/
define('CUSTOM_CONTACT_FORMS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CUSTOM_CONTACT_FORMS_PLUGIN_URL', plugin_dir_url(__FILE__));

use Omomohagiogu\CustomContactForms\CustomContactFormsPlugin;
// Initialize the plugin
add_action('plugins_loaded', function () {
    new CustomContactFormsPlugin;
});
