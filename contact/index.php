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
    $subtext = "(This form doesn't go anywhere yet – I can't get the PHP to work. Send a message on LinkedIn <a class=\"link\" href=\"https://www.linkedin.com/in/alexandra-adams-237682236/\">here</a>)";
    include $_SERVER['DOCUMENT_ROOT'].'/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    echo $main;
    include 'content/main.html.php';
    echo $footer;
    echo $scripts;
