<?php
    $title = 'Projects';
    $styleTemplate = '../css/template.css';
    $heading = 'Past Projects';
    include $_SERVER['DOCUMENT_ROOT'] . '/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    include 'content/main.html';
    echo $pageScript;
?>