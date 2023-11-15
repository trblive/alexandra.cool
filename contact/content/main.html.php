<div id="form-content">
    <?php if(!empty($statusMsg)) {
        echo "<div class=\"status-msg $status\"><div>$statusMsg</div></div>";
    } ?>

    <form action="" method="post" id="theForm">
        <fieldset id="details">
            <label for="firstName" id="firstNameLabel">First name:<input type="text" id="firstName" name="firstName"></label>
            <label for="lastName" id="lastNameLabel">Last name:<input type="text" id="lastName" name="lastName"></label>
            <label for="email" id="emailLabel">Email address:<input type="text" id="email" name="email"></label>
            <label for="phone" id="phoneLabel">Phone number:<input type="text" id="phone" name="phone"></label>
        </fieldset>
        <fieldset id="reason">
            <label for="subject" id="subjectLabel">Subject:<input type="text" id="subject" name="subject"></label>
            <label for="message" id="messageLabel">Message:<textarea id="message" name="message"></textarea></label>
        </fieldset>
        <fieldset id="contact">
            <p id="contactText">What is your preferred method of contact?</p>
            <ul id="radios">
                <li><label for="phoneContact"><input type="radio" id="phoneContact" value="Phone" name="reply">Phone call</label></li>
                <li><label for="emailContact"><input type="radio" id="emailContact" value="Email" name="reply">Email</label></li>
                <li><label for="SMS"><input type="radio" id="SMS" value="SMS" name="reply">SMS</label></li>
            </ul>
        </fieldset>
        <fieldset id="submitForm">
            <label for="terms" id="termsLabel"><input type="checkbox" name="terms" id="terms">I agree to the terms, whatever they are (there are none, this is just for class).</label>
            <div id="buttons">
                <input type="submit" id="submit" value="Submit" name="submit">
                <input type="reset" id="clear" value="Clear">
            </div>
        </fieldset>
    </form>

    <section id="hcard-section">
        <h2>Preview:</h2>
        <h3 id="preview-subject"><span class="placeholder">Subject</span></h3>
        <div class="short-header">
            <img src="images/contactpic.svg" alt="Default contact photo">
            <div>
                <p class="header-subject">From <span id="header-name"><span class="placeholder">You</span></span> on <?php date_default_timezone_set('Australia/Perth');echo date('Y-m-d H:i') ?></p>
                <p class="header-links">
                    <span class="details">Details</span>
                    <span class="plain">Plain text</span>
                </p>
            </div>
        </div>
        <table class="h-card">
            <thead>
            <tr>
                <th colspan="4"><h1>Message from <span id="full-name"><span class="placeholder">You</span></span></h1></th>
            </tr>
            </thead>
            <tbody>
            <tr class="v1row1">
                <td>From:</td>
                <td>Email:</td>
                <td>Phone:</td>
                <td>Preferred contact:</td>
            </tr>
            <tr class="v1row2">
                <td id="preview-name" class="p-name"><span class="placeholder">Your name</span></td>
                <td id="preview-email"><span class="placeholder">Your email</span></td>
                <td id="preview-tel"><span class="placeholder">Your number</span></td>
                <td id="preview-reply"><span class="placeholder">Contact preference</span></td>
            </tr>
            <tr class="v1message">
                <td colspan="4">
                    <div id="preview-message"><span class="placeholder">Your message</span></div>
                </td>
            </tr>
            </tbody>
        </table>
    </section>

</div>