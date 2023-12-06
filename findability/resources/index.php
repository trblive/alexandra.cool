<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/';
$errorpath = $includes . 'error.html.php';

include_once  $includes . 'db.inc.php';

try
{
    $sql = 'SELECT resourceID, resourceName, url, resourceDate, adminName, email
        FROM resources INNER JOIN admin
            ON resources.adminID = admin.adminID';
    $result = $pdo->query($sql);
}
catch (PDOException $e)
{
    $error = 'Error fetching resources: ' . $e->getMessage();
    include $errorpath;
    exit();
}

foreach ($result as $row)
{
    $resources[] = array(
        'id' => $row['resourceID'],
        'resourceName' => $row['resourceName'],
        'url' => $row['url'],
        'adminName' => $row['adminName'],
        'email' => $row['email'],
        'resourceDate' => $row['resourceDate']
    );
}

$title = 'resources – findability project';
$styleTemplate = '../css/template.css';
$utilities = '../js/utilities.js';
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
echo $head;
echo $wrapper;
echo $header;
include 'resources.html.php';
echo $footer;
echo $script;