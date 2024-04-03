<?php
declare(strict_types=1);

namespace CustomContactForms\Tests;

use CustomContactForms\ContactForm;
use WP_UnitTestCase;

class ContactFormTest extends WP_UnitTestCase
{
    /**
     * @covers ContactForm::render
     */
    public function testFormRenderWithData($inputName, $inputEmail, $inputMessage, $expectedOutput)
    {
        $_POST['name'] = $inputName;
        $_POST['email'] = $inputEmail;
        $_POST['message'] = $inputMessage;
    
        $contact_form = new ContactForm();
        $form_html = $contact_form->render();
    
        $this->assertEquals($expectedOutput, $form_html);
    }
    
    public function formDataProvider()
    {
        return [
            ['John Doe', 'john@example.com', 'Test message', '<form ...'],
            // Add more test cases as needed
        ];
    }

    /**
     * @covers ContactForm::ajax_submit
     */
    public function testFormSubmission()
    {
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

