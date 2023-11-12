
// 31/05/2021 
// script.js 1.0 – completed draft

// Function called when the form is submitted.
// Function validates the form data.
function validateForm(e) {
    'use strict';

    // Get the event object:
	if (typeof e == 'undefined') e = window.event;
    console.log(e);

    // Get form references:
	var firstName = U.$('firstName');
	var lastName = U.$('lastName');
	var email = U.$('email');
	var phone = U.$('phone');
    var message = U.$('message');
    var reply = document.getElementsByName('reply');


	// Flag variable:
	var error = false;

	// Validate the first name:
	if (/^[A-Z \.\-']{2,20}$/i.test(firstName.value)) {
		removeErrorMessage('firstName');
		addCorrectMessage('firstName', '✓');
	} else {
		removeCorrectMessage('firstName');
		addErrorMessage('firstName', 'Please enter your full first name (min. 2 characters).');
		error = true;
	}

	// Validate the last name:
	if (/^[A-Z \.\-']{2,20}$/i.test(lastName.value)) {
		removeErrorMessage('lastName');
		addCorrectMessage('lastName', '✓');
	} else {
		removeCorrectMessage('lastName');
		addErrorMessage('lastName', 'Please enter your surname (min. 2 characters).');
		error = true;
	}
	
	// Validate the email address:
	if (/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(email.value)) {
		removeErrorMessage('email');
		addCorrectMessage('email', '✓');
	} else {
		removeCorrectMessage('email');
		addErrorMessage('email', 'Please enter your email address.');
		error = true;
	}
	
	// Validate the phone number:
	if (/\d{3}[ \-\.]?\d{3}[ \-\.]?\d{4}/.test(phone.value)) {
		removeErrorMessage('phone');
		addCorrectMessage('phone', '✓');
	} else {
		removeCorrectMessage('phone');
		addErrorMessage('phone', 'Please enter your phone number.');
		error = true;
	}
	
    // validate the message:
    if (/.{1,500}/i.test(message.value)) {
        removeErrorMessage('message');
        addCorrectMessage('message', '✓');
    } else {
        removeCorrectMessage('message');
        addErrorMessage('message', 'Please enter a short message (max 500 characters).');
        error = true;
    }

    // get the reply preference
    for (var i = 0; i < reply.length; i++) {
        if (reply[i].checked) {
            reply.value = reply[i].value;
        }
    }
    // validate the reply preference:
    if (/(phoneContact|emailContact|SMS)/i.test(reply.value)) {
        removeErrorMessage('radios');
        addCorrectMessage('radios', '✓');
    } else {
        removeCorrectMessage('radios');
        addErrorMessage('radios', 'Please select a preferred method of contact.');
        error = true;
    }

    // If an error occurred, prevent the default behavior:
	if (error) {

		// Prevent the form's submission:
	    if (e.preventDefault) {
	        e.preventDefault();
	    } else {
	        e.returnValue = false;
	    }
	    return false;
	}
    
} // End of validateForm() function.


// function called when attachment file is uploaded
// function displays name of uploaded file
function showFileName() {
    'use strict';

    var attachment = U.$('attachment');
    var fileName = attachment.files[0].name;
    var attachmentText = U.$('attachmentText');

    if (/./i.test(fileName)) {
        if (fileName.length > 30) {
            attachmentText.innerText = fileName.slice(0, 30) + '...';
        } else {
            attachmentText.innerText = fileName;
        }
    } else {
        attachmentText.innerText = 'No file chosen.';
    }
    
} // end of showFileName() function


//function called when "Reset" button is clicked
// function resets uploaded file
function resetFile() {
    'use strict';

    U.$('attachment').value = null;
    U.$('attachmentText').innerText = 'No file chosen.';

} // end of resetFile() function


// Function called when the terms checkbox changes.
// Function enables and disables the submit button.
function toggleSubmit() {
	'use strict';
    
	// Get a reference to the submit button:
	var submit = U.$('submit');
	
	// Toggle its disabled property:
	if (U.$('terms').checked) {
		submit.disabled = false;
	} else {
		submit.disabled = true;
	}
	
} // End of toggleSubmit() function.


// Function is called when window loads:
// Initial setup:
function init() {
    'use strict';

	// The validateForm() function handles the form:
    U.addEvent(U.$('theForm'), 'submit', validateForm);

	// Disable the submit button to start:
	U.$('submit').disabled = true;

	// Watch for changes on the terms checkbox:
    U.addEvent(U.$('terms'), 'change', toggleSubmit);

	// Enable tooltips on upload field:
	U.enableTooltips('uploadText');

    // display the file name for the attachment field:
    U.addEvent(U.$('attachment'), 'change', showFileName);

    // reset file upload:
    U.addEvent(U.$('resetFile'), 'click', resetFile);

    // utilities
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(window, 'load', U.keebInput);

} // End of init() function.

// Assign an event handler to the window's load event:
window.onload = init();

