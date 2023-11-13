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

    <div id="hcard-section"></div>


</div>