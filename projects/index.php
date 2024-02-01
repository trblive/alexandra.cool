<?php
    $title = 'Projects';
    $styleTemplate = '../css/template.css';
    $heading = 'Past Projects';
    $credit = "<p class='design'>Inspired by <a href='https://www.cassie.codes/'>Cassie Evans</a>.</p>";
    include $_SERVER['DOCUMENT_ROOT'] . '/template/template.php';
    echo $head;
    echo $wrapper;
    echo $header;
    include 'content/main.html';
    echo $footer;
    echo $pageScript;
