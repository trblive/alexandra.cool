<?php
    $scripts = "
        <script src=\"../js/utilities.js\"></script>
        <script src=\"js/errorMessages.js\"></script>
        <script src=\"js/script.js\"></script>
    </body>
</html>";

    $title = 'Contact';
    $styleTemplate = '../css/template.css';
    include $_SERVER['DOCUMENT_ROOT'].'/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    include_once 'content/contact.php';
    include 'content/main.html.php';
    echo $footer;
    echo $scripts;
