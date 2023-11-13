<?php

    $error = '';
    $status = '';
    $statusMsg = '';

    // execute if form is submitted
    if (isset($_POST['submit'])) {

        // Get data from form
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $reply = $_POST['reply'];

        // validate data
        // validate first name
        if (!preg_match("/^[A-Z \.\-']{2,20}$/i", $firstName)) {
            $error .= '<li>Please enter your full first name (min. 2 characters).</li>';
        }
        // validate last name
        if (!preg_match("/^[A-Z \.\-']{2,20}$/i", $lastName)) {
            $error .= '<li>Please enter your surname (min. 2 characters).</li>';
        }
        // validate email
        if (!preg_match("/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/", $email)) {
            $error .= '<li>Please enter your email address.</li>';
        }
        // validate phone number
        if (!preg_match("/\d{3}[ \-\.]?\d{3}[ \-\.]?\d{4}/", $phone)) {
            $error .= '<li>Please enter your phone number.</li>';
        }
        // validate subject
        if (!preg_match("/.{1,50}/i", $subject)) {
            $error .= '<li>Please give a subject for your message (max. 50 characters).</li>';
        }
        // validate message
        if (!preg_match("/.{1,500}/i", $message)) {
            $error .= '<li>Please enter a short message (max 500 characters).</li>';
        }
        // validate reply preference
        if (empty($reply)) {
            $error .= '<li>Please select a preferred method of contact.</li>';
        }

        // email setup
        $mailTo = 'hello@alexandra.cool';
        $name = $firstName . ' ' . $lastName;

        // set email content
        $htmlContent = "
            <style>
                h1 {
                    font-size: 2em;
                }
                h1 span {
                    color: lightslategrey;
                }
                table, th, td {
                    border-collapse: collapse;
                }
                table {
                    width: calc(100% - 32px);
                    margin: 16px;
                }
                th {
                    border-bottom: 1px solid black;
                    padding: 0;
                }
                th {
                    padding: 10px 20px;
                }
                .row1 td {
                    padding: 20px 20px 10px;
                }
                .row2 {
                    border-bottom: 1px solid lightgrey;
                }
                .row2 td {
                    padding: 10px 20px 20px;
                }
                .message td {
                    padding: 40px 50px;
                }
                .message td div {
                    padding: 24px;
                    border: 1px solid lightgrey;
                    border-radius: 12px;
                }
            </style>
            <table>
                <thead>
                    <tr>
                        <th colspan='4'><h1>Message from <span>$name</span></h1></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class='row1'>
                        <td>From:</td>
                        <td>Email:</td>
                        <td>Phone:</td>
                        <td>Preferred contact:</td>
                    </tr>
                    <tr class='row2'>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td>$reply</td>
                    </tr>
                    <tr class='message'>
                        <td colspan='4'>
                            <div>$message</div>
                        </td>
                    </tr>
                </tbody>
            </table>";

        // set headers for sender info
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: ' . $name . '<' . $email . '>';

        // send email if no error
        if (empty($error)) {
            $status = 'success';
            $statusMsg = 'Thank you! Your message has been sent successfully.';
            mail($mailTo, $subject, $htmlContent, $headers);
        } else {
            $status = 'error';
            $statusMsg = '<p>Please fill in all the required fields:</p><ul>' . $error . '</ul>';
        }
    }



