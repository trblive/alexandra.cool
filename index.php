<?php
    $title = '(Student) Web Developer';
    $styleTemplate = 'css/template.css';
    $credit = "<p class='design'>Inspired by <a href='https://www.rubens.design/'>Rubens Cantuni</a> and <a href='https://catalinonutu.com/'>Cătălin Onuțu</a>.</p>";
    include $_SERVER['DOCUMENT_ROOT'] . '/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    include 'content/main.html';
    echo $footer;
    echo $homeScript;