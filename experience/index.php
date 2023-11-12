<?php
    $popup =
        "<div id=\"popup\">
        <h2>oh no!</h2>
        <h3>You'll need a key to be able to come in here.</h3>
        <p>To protect my privacy, I haven't included any identifying info. Since I'm still learning, I haven't learnt server-side scripting yet, so I can't moderate who's looking at my stuff.</p>
        <p>In the meantime, here's how this page is supposed to look, without any server-side stuff, and with some <span>~sanitised~</span> info.</p>
        <span id=\"passwordInput\">
            <label for=\"password\">
                <input type=\"text\" id=\"password\" name=\"password\" placeholder=\"what's the password?\">
            </label>
            <input type=\"submit\" id=\"submit\" value=\"let me in\">
        </span>
        <span>hint: just for now, it's 'rose3307'</span>
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



