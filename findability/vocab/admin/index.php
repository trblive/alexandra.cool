<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/findability/vocab/includes/';

require_once $includes . 'access.inc.php';

$styleTemplate = '../../css/template.css';
$utilities = '../../js/utilities.js';
$title = 'Manage Definitions';

include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
echo $head;
echo $wrapper;
echo $header;


if (!userIsLoggedIn())
{
	include 'login.html.php';
    echo $footer;
    echo $script;
	exit();
}

if (!userHasRole('Site Admin'))
{
	$error = 'Only Site Admins may access this page.';
	include 'accessdenied.html.php';
    echo $footer;
    echo $script;
	exit();
}
// works
if (isset($_GET['add']))
{
    $title = 'New Definition';
    $action = 'addform';
    $id = '';
    $term = '';
    $definition = '';
    $button = 'Add definition';

    include 'form.html.php';
    exit();
}

// ???
if (isset($_GET['addform']))
{
    include $includes . 'db.inc.php';

    try {
        $sql = 'INSERT INTO vocab SET
            term = :term,
            definition = :definition';
        $s = $pdo->prepare($sql);
        $s->bindValue(':term', $_POST['term']);
        $s->bindValue(':definition', $_POST['definition']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Error adding submitted definition.';
        include 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

// works
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include $includes . 'db.inc.php';

    try {
        $sql = 'SELECT id, term, definition FROM vocab WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Error fetching definition details.';
        include 'error.html.php';
        exit();
    }

    $row = $s->fetch();

    $title = 'Edit Definition';
    $action = 'editform';
    $term = $row['term'];
    $definition = $row['definition'];
    $id = $row['id'];
    $button = 'Update definition';

    include 'form.html.php';
    exit();
}

// works
if (isset($_GET['editform']))
{
    include $includes . 'db.inc.php';

    try {
        $sql = 'UPDATE vocab SET
            term = :term,
            definition = :definition
            WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':term', $_POST['term']);
        $s->bindValue(':definition', $_POST['definition']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Error updating submitted definition.';
        include 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

// works
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
    include $includes . 'db.inc.php';

    try {
        $sql = 'DELETE FROM vocab WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e) {
        $error = 'Error deleting definition.';
        include 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

// Display definitions
include $includes . 'db.inc.php';

try {
    $result = $pdo->query('SELECT id, term, definition FROM vocab');
}
catch (PDOException $e) {
    $error = 'Error fetching definitions from database!';
    include 'error.html.php';
    exit();
}

foreach ($result as $row) {
    $vocabs[] = array('id' => $row['id'], 'term' => $row['term'], 'definition' => $row['definition']);
}

include 'vocab.html.php';
echo $footer;
echo $script;
