<?php
    $scripts = "
        <script src=\"../js/utilities.js\"></script>
        <script src=\"js/errorMessages.js\"></script>
        <script src=\"js/script.js\"></script>
    </body>
</html>";

    $title = 'Contact';
    $styleTemplate = '../css/template.css';
    $heading = 'Contact';
    $subtext = "(It's working!! Please say hello <i class=\"fa-regular fa-face-smile-beam\"></i>)";
    include $_SERVER['DOCUMENT_ROOT'].'/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    echo $main;
    include_once 'content/contact.php';
    include 'content/main.html.php';
    echo $footer;
    echo $scripts;
