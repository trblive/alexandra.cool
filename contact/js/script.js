
// 13/11/2021
// script.js 2.0

// function sets 'correct' class on form input fields
function setCorrect(id) {
	'use strict';

	var elem = U.$(id);

	if (elem.classList.contains('error')) {
		elem.classList.remove('error');
	}
	elem.classList.add('correct');
}

// function sets 'error' class on form input fields
function setError(id) {
	'use strict';

	var elem = U.$(id);

	if (elem.classList.contains('correct')) {
		elem.classList.remove('correct');
	}
	elem.classList.add('error');
}


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
	var subject = U.$('subject');
    var message = U.$('message');
    var reply = document.getElementsByName('reply');


	// Flag variable:
	var error = false;

	// Validate the first name:
	if (/^[A-Z \.\-']{2,20}$/i.test(firstName.value)) {
		removeErrorMessage('firstName');
		addCorrectMessage('firstName', '✓');
		setCorrect('firstName');
	} else {
		removeCorrectMessage('firstName');
		addErrorMessage('firstName', 'Please enter your full first name (min. 2 characters).');
		setError('firstName');
		error = true;
	}

	// Validate the last name:
	if (/^[A-Z \.\-']{2,20}$/i.test(lastName.value)) {
		removeErrorMessage('lastName');
		addCorrectMessage('lastName', '✓');
		setCorrect('lastName');
	} else {
		removeCorrectMessage('lastName');
		addErrorMessage('lastName', 'Please enter your surname (min. 2 characters).');
		setError('lastName');
		error = true;
	}
	
	// Validate the email address:
	if (/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(email.value)) {
		removeErrorMessage('email');
		addCorrectMessage('email', '✓');
		setCorrect('email');
	} else {
		removeCorrectMessage('email');
		addErrorMessage('email', 'Please enter your email address.');
		setError('email');
		error = true;
	}
	
	// Validate the phone number:
	if (/\d{3}[ \-\.]?\d{3}[ \-\.]?\d{4}/.test(phone.value)) {
		removeErrorMessage('phone');
		addCorrectMessage('phone', '✓');
		setCorrect('phone');
	} else {
		removeCorrectMessage('phone');
		addErrorMessage('phone', 'Please enter your phone number.');
		setError('phone');
		error = true;
	}

	// validate the subject:
	if (/.{1,500}/i.test(subject.value)) {
		removeErrorMessage('subject');
		addCorrectMessage('subject', '✓');
		setCorrect('subject');
	} else {
		removeCorrectMessage('subject');
		addErrorMessage('subject', 'Please give a subject for your message (max. 50 characters).');
		setError('subject');
		error = true;
	}
	
    // validate the message:
    if (/.{1,500}/i.test(message.value)) {
        removeErrorMessage('message');
        addCorrectMessage('message', '✓');
		setCorrect('message');
    } else {
        removeCorrectMessage('message');
        addErrorMessage('message', 'Please enter a short message (max 500 characters).');
		setError('message');
        error = true;
    }

    // get the reply preference
    for (var i = 0; i < reply.length; i++) {
        if (reply[i].checked) {
            reply.value = reply[i].value;
        }
    }
    // validate the reply preference:
    if (/(phone|email|SMS)/i.test(reply.value)) {
        removeErrorMessage('radios');
        addCorrectMessage('radios', '✓');
		setCorrect('radios');
    } else {
        removeCorrectMessage('radios');
        addErrorMessage('radios', 'Please select a preferred method of contact.');
		setError('radios');
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


// Function called when the terms checkbox changes.
// Function enables and disables the submit button.
function toggleSubmit() {
	'use strict';
    
	// Get a reference to the submit button:
	var submit = U.$('submit');
	
	// Toggle its disabled property:
	submit.disabled = !U.$('terms').checked;
	
} // End of toggleSubmit() function.


function preview(e) {
	'use strict';

	// get form references
	var firstName = U.$('firstName').value;
	var lastName = U.$('lastName').value;
	var email = U.$('email').value;
	var phone = U.$('phone').value;
	var subject = U.$('subject').value;
	var message = U.$('message').value;
	var replies = document.getElementsByName('reply');

	// get the reply preference
	for (var i = 0; i < replies.length; i++) {
		if (replies[i].checked) {
			var reply = replies[i].value;
		}
	}

	// get output references
	var previewSubject = U.$('preview-subject');
	var headerName = U.$('header-name');
	var fullName = U.$('full-name');
	var previewName = U.$('preview-name');
	var previewEmail = U.$('preview-email');
	var previewPhone = U.$('preview-tel');
	var previewReply = U.$('preview-reply');
	var previewMessage = U.$('preview-message');

	// set template object
	var templates = {
		full_name: `${firstName} ${lastName}`,
		given_name: `<span class="p-given-name">${firstName} </span>`,
		family_name: `<span class="p-family-name">${lastName}</span>`,
		email: `<a class="u-email" href="mailto:${email}">${email}</a>`,
		tel: `<span class="p-tel">${phone}</span>`,
		subject: `${subject}`,
		message: `${message}`,
		reply: `${reply}`,
	};

	if (subject) {
		previewSubject.innerHTML = templates.subject;
	}
	if (firstName) {
		headerName.innerHTML = templates.full_name;
		fullName.innerHTML = templates.full_name;
		previewName.innerHTML = templates.given_name + templates.family_name;
	}
	if (email) {
		previewEmail.innerHTML = templates.email;
	}
	if (phone) {
		previewPhone.innerHTML = templates.tel;
	}
	if (reply) {
		previewReply.innerHTML = templates.reply;
	}
	if (message) {
		previewMessage.innerHTML = templates.message;
	}
	if(e) {
		U.$('hcard-section').style.display = 'flex';
	}
}

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

	// watch for changes in input and textarea fields
	const fields = document.querySelectorAll('input, textarea');
	fields.forEach((field) => {
		U.addEvent(field, 'keyup', preview);
	})
	U.addEvent(U.$('radios'), 'click', preview);

    // utilities
    U.addEvent(window, 'scroll', U.blurNav);
    U.addEvent(U.$('menu'), 'click', U.openMenu);
    U.addEvent(window, 'load', U.keebInput);

} // End of init() function.

// Assign an event handler to the window's load event:
window.onload = init();

