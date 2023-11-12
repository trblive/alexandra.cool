<?php
    include_once 'contact.php';
?>

<form action="contact.php" method="post" id="theForm">
<!--    status message -->
    <?php if (!empty($statusMsg)) {
    ?> <div class="status-message <?php echo $status; ?>"><?php echo $statusMsg ?></div>
    <?php } ?>
    <fieldset id="details">
        <label for="firstName" id="firstNameLabel">First name:<input type="text" id="firstName" name="firstName" value="<?php echo !empty($postData['firstName'])?$postData['firstName']:''; ?>"></label>
        <label for="lastName" id="lastNameLabel">Last name:<input type="text" id="lastName" name="lastName" value="<?php echo !empty($postData['lastName'])?$postData['lastName']:''; ?>"></label>
        <label for="email" id="emailLabel">Email address:<input type="text" id="email" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>"></label>
        <label for="phone" id="phoneLabel">Phone number:<input type="text" id="phone" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>"></label>
    </fieldset>
    <fieldset id="reason">
        <label for="message" id="messageLabel">Message:<textarea id="message" name="message"><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea></label>
    </fieldset>
    <fieldset id="contact">
        <p id="contactText">What is your preferred method of contact?</p>
        <ul id="radios">
            <li><label for="phoneContact"><input type="radio" id="phoneContact" value="phoneContact" name="reply">Phone call</label></li>
            <li><label for="emailContact"><input type="radio" id="emailContact" value="emailContact" name="reply">Email</label></li>
            <li><label for="SMS"><input type="radio" id="SMS" value="SMS" name="reply">SMS</label></li>
        </ul>
    </fieldset>
    <fieldset id="submitForm">
        <label for="terms" id="termsLabel"><input type="checkbox" name="terms" id="terms">I agree to the terms, whatever they are.</label>
        <div id="buttons">
            <input type="submit" id="submit" value="Submit">
            <input type="reset" id="clear" value="Clear">
        </div>
    </fieldset>
</form>
