<?php
    $title = 'Kitties';
    $styleTemplate = '../css/template.css';
    $heading = 'Image gallery';
    $subtext = 'A gallery of my cats, that I just made for fun.';
    include $_SERVER['DOCUMENT_ROOT'] . '/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    echo $main;
    include 'content/main.html';
    echo $footer;
    echo $pageScript;
?>