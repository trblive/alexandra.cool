<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/';
$errorpath = $includes . 'error.html.php';

include_once  $includes . 'db.inc.php';

$title = 'resources – findability project';
$styleTemplate = '../css/template.css';
$utilities = '../js/utilities.js';
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
echo $head;
echo $wrapper;
echo $header;

try
{
    $sql = 'SELECT resources.resourceID, resourceName, url, resourceDate, adminName, email, categoryName, categories.categoryID FROM resources 
    INNER JOIN admin ON resources.adminID = admin.adminID
    INNER JOIN resourceCategories ON resources.resourceID = resourceCategories.resourceID
    INNER JOIN categories ON resourceCategories.categoryID = categories.categoryID';
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
        'resourceDate' => $row['resourceDate'],
        'category' => $row['categoryName']
    );
}

include 'resources.html.php';
echo $footer;
echo $script;