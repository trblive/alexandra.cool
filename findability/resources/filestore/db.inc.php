<?php
$title = 'filestore – findability project';
$styleTemplate = '../../css/template.css';
$utilities = '../../js/utilities.js';
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
try
{
    //$pdo = new PDO('mysql:host=localhost;dbname=filestore', 'filestoreuser', 'mypassword');
    $pdo = new PDO('mysql:host=localhost:3306;dbname=alexandra_cool_mpc0_', 'alexandra', 'a2gR7&9a7');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
    echo $head;
    echo $wrapper;
    echo $header;
    $error = 'Unable to connect to the database server.';
    include 'error.html.php';
    exit();
}
