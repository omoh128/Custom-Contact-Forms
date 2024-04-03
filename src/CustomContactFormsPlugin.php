<?php
/**
 * CustomContactFormsPlugin
 */


namespace Omomohagiogu\CustomContactForms;


use Omomohagiogu\CustomContactForms\ContactForm;

class CustomContactFormsPlugin
{
    private $version;

    public function __construct()
    {
        $this->version = '1.0.0';

        add_action('init', array($this, 'init'));
    }

    public function init()
    {
        // Initialize the contact form
        $contact_form = new ContactForm();
        $contact_form->init();

        // Load translations
        load_plugin_textdomain('custom-contact-forms', false, dirname(plugin_basename(__FILE__)) . '/languages');

        // Shortcode to display the form
        add_shortcode('custom_contact_form', array($contact_form, 'render'));

        // Add AJAX endpoint for form submission
        add_action('wp_ajax_custom_contact_form_submit', array($contact_form, 'ajax_submit'));
        add_action('wp_ajax_nopriv_custom_contact_form_submit', array($contact_form, 'ajax_submit'));
    }
}
