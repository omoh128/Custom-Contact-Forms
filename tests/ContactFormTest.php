<?php
namespace CustomContactForms\Tests;

use CustomContactForms\ContactForm;
use WP_UnitTestCase;

class ContactFormTest extends WP_UnitTestCase {

    public function testFormRender() {
        $contact_form = new ContactForm();
        $form_html = $contact_form->render();

        // Perform assertions to validate the rendered form HTML
        $this->assertContains('<form', $form_html);
        $this->assertContains('name="name"', $form_html);
        $this->assertContains('name="email"', $form_html);
        $this->assertContains('name="message"', $form_html);
    }

    public function testFormSubmission() {
        // Simulate an AJAX form submission
        $_POST['action'] = 'custom_contact_form_submit';
        $_POST['name'] = 'John Doe';
        $_POST['email'] = 'john@example.com';
        $_POST['message'] = 'Test message';

        // Mock the wp_send_json function
        $this->expectOutputString(json_encode(array(
            'success' => true,
            'message' => 'Form submitted successfully!'
        )));

        $contact_form = new ContactForm();
        $contact_form->ajax_submit();

        // Additional assertions can be added to test form processing logic
    }
}
