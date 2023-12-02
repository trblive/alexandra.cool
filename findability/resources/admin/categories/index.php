<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/alexandra.cool/findability/resources/includes/';

require_once $includes . 'access.inc.php';

$styleTemplate = 'http://localhost/alexandra.cool/findability/css/template.css';
$utilities = 'http://localhost/alexandra.cool/findability/js/utilities.js';
$title = 'Manage Categories';

include $_SERVER['DOCUMENT_ROOT'] . '/alexandra.cool/findability/template/template.php';
echo $head;
echo $wrapper;
echo $header;

if (!userIsLoggedIn())
{
  include '../login.html.php';
    echo $footer;
    echo $script;
  exit();
}

if (!userHasRole('Site Admin'))
{
  $error = 'Only Site Administrators may access this page.';
  include '../accessdenied.html.php';
    echo $footer;
    echo $script;
  exit();
}

if (isset($_GET['add']))
{
  $title = 'New Category';
  $action = 'addform';
  $name = '';
  $id = '';
  $button = 'Add category';

  include 'form.html.php';
  exit();
}

if (isset($_GET['addform']))
{
    include $includes . 'db.inc.php';

    try
    {
        $sql = 'INSERT INTO categories SET
            categoryName = :name';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $_POST['name']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error adding submitted category.';
        include 'error.html.php';
        exit();
    }

    header('Location: .');
    exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include $includes . 'db.inc.php';

  try
  {
    $sql = 'SELECT categoryID, categoryName FROM categories WHERE categoryID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching category details.';
    include 'error.html.php';
    exit();
  }

  $row = $s->fetch();

  $pageTitle = 'Edit Category';
  $action = 'editform';
  $name = $row['categoryName'];
  $id = $row['categoryID'];
  $button = 'Update category';

  include 'form.html.php';
  exit();
}

if (isset($_GET['editform']))
{
    include $includes . 'db.inc.php';

  try
  {
    $sql = 'UPDATE categories SET
        categoryName = :name
        WHERE categoryID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':name', $_POST['name']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted category.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
    include $includes . 'db.inc.php';

  // Delete joke associations with this category
  try
  {
    $sql = 'DELETE FROM resourceCategories WHERE categoryID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing resources from category.';
    include 'error.html.php';
    exit();
  }

  // Delete the category
  try
  {
    $sql = 'DELETE FROM categories WHERE categoryID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting category.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

// Display category list
include $includes . 'db.inc.php';

try
{
    $sql = 'SELECT categoryID, categoryName, categories.adminID, adminName
        FROM categories INNER JOIN admin
        ON categories.adminID = admin.adminID';
    $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching categories from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $categories[] = array('id' => $row['categoryID'], 'name' => $row['categoryName'], 'admin' => $row['adminName']);
}

include 'categories.html.php';
echo $footer;
echo $script;