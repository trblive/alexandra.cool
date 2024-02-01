<?php
$title = '404';
$styleTemplate = '../css/template.css';
include $_SERVER['DOCUMENT_ROOT'].'/template/template.php';
echo $head;
echo $wrapper;
echo $header;
include 'content/main.html';
echo $footer;
echo $pageScript;
