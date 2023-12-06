<?php

$title = 'admin portal – findability project';
$styleTemplate = '../../css/template.css';
$utilities = '../../js/utilities.js';
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
echo $head;
echo $wrapper;
echo $header;
include 'content/main.html';
echo $footer;
echo $script;