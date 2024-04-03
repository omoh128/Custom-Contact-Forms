<?php
/**
 * Plugin Name: Custom Contact Forms
 * Description: Create and manage custom contact forms easily.
 * Version: 1.0.0
 * Author: Omomoh Agiogu
 * Author URI: https://www.example.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: custom-contact-forms
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

// Define constants/
define('CUSTOM_CONTACT_FORMS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CUSTOM_CONTACT_FORMS_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include the autoloader if it's available
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';

    // Initialize the plugin
    add_action('plugins_loaded', function () {
        if (class_exists('Omomohagiogu\CustomContactForms\CustomContactFormsPlugin')) {
            new Omomohagiogu\CustomContactForms\CustomContactFormsPlugin();
        }
    });
} else {
    // Handle the case where the autoloader is missing
    add_action('admin_notices', function ()
    {
        echo '<div class="error"><p>Custom Contact Forms plugin requires Composer autoloader. Please run "composer install" to install dependencies.</p></div>';
    });
}
