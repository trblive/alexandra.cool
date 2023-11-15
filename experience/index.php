<?php
    $popup =
        "<div id=\"popup\">
        <h2>oh no!</h2>
        <h3>You'll need a key to be able to come in here.</h3>
        <p>Definitely don't do <code>Right click > Inspect element > Sources > experience > js > script.js</code>...</p>
        <p>...I haven't had time to sort out the PHP. There's supposed to be a login portal here, but anyway.</p>
        <span id=\"passwordInput\">
            <label for=\"password\">
                <input type=\"text\" id=\"password\" name=\"password\" placeholder=\"what's the password?\">
            </label>
            <input type=\"submit\" id=\"submit\" value=\"let me in\">
        </span>
        <span>The password is <code>rose3307</code>.</span>
    </div>";

    $title = 'Experience';
    $styleTemplate = '../css/template.css';
    include $_SERVER['DOCUMENT_ROOT'] . '/template/template.php';
    echo $head;
    echo $experienceWrapper;
    echo $popup;
    echo $header;
    include 'content/main.html';
    echo $footer;
    echo $pageScript;



