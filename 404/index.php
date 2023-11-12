<?php
$title = '404';
$styleTemplate = '../css/template.css';
$heading = 'Oh no!';
$subtext = 'The page you were looking for cannot be found. Did you get the right URL?';
include $_SERVER['DOCUMENT_ROOT'].'/template/template.php';
echo $head;
echo $wrapper;
echo $header;
echo $main;
include 'content/main.html';
echo $footer;
echo $pageScript;
?>