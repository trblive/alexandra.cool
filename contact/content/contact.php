<?php

    $mailTo = 'hello@alexandra.cool';
    // data config
    $postData = $statusMsg = $valError = '';
    $status = 'error';


//    if (isset($_POST['submit'])) {
//        echo '<p>form submitted</p>';
//    }

    // execute if form is submitted
    if (isset($_POST['submit'])) {

        $postData = $_POST;

        // Get data from form
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $reply = $_POST['reply'];

        // validate form data
        if (empty($firstName)) {
            $valError = 'Please enter your full first name (min. 2 characters)';
        }
        if (empty($lastName)) {
            $valError = 'Please enter your surname (min. 2 characters).';
        }
        if (empty($email)) {
            $valError = 'Please enter your email address.';
        }
        if (empty($phone)) {
            $valError = 'Please enter your phone number.';
        }
        if (empty($message)) {
            $valError = 'Please enter a short message (max 500 characters).';
        }
        if (empty($reply)) {
            $valError = 'Please select a preferred method of contact.';
        }

        // send email to admin
        if (empty($valError)) {
            $name = $firstName . $lastName;
            $subject = 'Contact form submission';
            // set email content
            $txt = 'Name = ' . $name .
                '\n Email = ' . $email .
                '\n Phone = ' . $phone .
                '\n Preferred contact method = ' . $reply .
                '\n Message =' . $message;
            // set headers for sender info
            $headers = 'From: ' . $name . ' ' . '<' . $email . '>';

            // send email
            mail($mailTo, $subject, $txt, $headers);

            // display status message
            $status = 'success';
            $statusMsg = 'Thank you! The form has been submitted successfully.';
            $postData = '';
        }
        else {
            $statusMsg = 'Please fill in all the required fields.' . $valError;
        }
    }



