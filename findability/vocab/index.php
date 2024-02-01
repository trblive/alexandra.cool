<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/findability/vocab/includes/';
$errorpath = $includes . 'error.html.php';

include_once  $includes . 'db.inc.php';

try
{
    $sql = 'SELECT id, term, definition
        FROM vocab';
    $result = $pdo->query($sql);
}
catch (PDOException $e)
{
    $error = 'Error fetching definitions: ' . $e->getMessage();
    include $errorpath;
    exit();
}

foreach ($result as $row)
{
    $vocabs[] = array(
        'id' => $row['id'],
        'term' => $row['term'],
        'definition' => $row['definition']
    );
}

$title = 'vocab – findability project';
$styleTemplate = '../css/template.css';
$utilities = '../js/utilities.js';
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
echo $head;
echo $wrapper;
echo $header;
include 'vocab.html.php';
echo $footer;
echo $script;