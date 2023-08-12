<?php
/**
 * ContactForm page
 */

namespace Omomohagiogu\CustomContactForms;;

class ContactForm {
    private $form_id;
    private $form_fields;

    public function __construct() {
        $this->form_id = 'custom-contact-form';
        $this->form_fields = array(
            'name' => __('Name', 'custom-contact-forms'),
            'email' => __('Email', 'custom-contact-forms'),
            'message' => __('Message', 'custom-contact-forms')
        );
    }

    public function init() {
        // Initialize form-related actions and hooks
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        // Enqueue the CSS styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    }

    public function enqueue_scripts() {
        // Enqueue scripts and styles for the form
        wp_enqueue_script('custom-contact-form-script', plugin_dir_url(__FILE__) . '../js/form-script.js', array('jquery'), '1.0.0', true);
         // Pass AJAX URL to script using wp_localize_script
         wp_localize_script('custom-contact-form-script', 'custom_contact_form_ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('custom_contact_form_nonce')
        ));
    }
    public function enqueue_styles() {
        wp_enqueue_style('custom-contact-form-styles', CUSTOM_CONTACT_FORMS_PLUGIN_URL . 'css/custom-contact-form.css');
    }
    public function render() {
        ob_start();
        include plugin_dir_path(__FILE__) . '../templates/contact-form-template.php';
        return ob_get_clean();
    }

    public function ajax_submit() {
        if (isset($_POST['action']) && $_POST['action'] === 'custom_contact_form_submit') {
            // Process form submission
            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $message = sanitize_text_field($_POST['message']);

            // Perform form validation and other processing here

            // Example response
            $response = array(
                'success' => true,
                'message' => __('Form submitted successfully!', 'custom-contact-forms')
            );

            wp_send_json($response);
        }
    }
}
