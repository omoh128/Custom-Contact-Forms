document.addEventListener('DOMContentLoaded', function() {
    var contactForm = document.getElementById('custom-contact-form');
    
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Get form data
        var formData = new FormData(contactForm);

        // Convert FormData to serialized string
        var serializedFormData = jQuery(contactForm).serialize();

        // Send form data via AJAX
        jQuery.ajax({
            type: 'POST',
            url: custom_contact_form_ajax_object.ajax_url, // Use the localized ajax_url
            data: {
                action: 'custom_contact_form_submit', // Custom AJAX action
                formData: serializedFormData, //the serialized form data
                nonce: custom_contact_form_ajax_object.nonce //  localized nonce
            },
            success: function(response) {
                console.log(response); // response in the browser console

                // Reset form fields if submission was successful
                contactForm.reset();
            }
        });
    });
});
