<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/alexandra.cool/findability/resources/includes/';

require_once $includes . 'access.inc.php';

$styleTemplate = 'http://localhost/alexandra.cool/findability/css/template.css';
$utilities = 'http://localhost/alexandra.cool/findability/js/utilities.js';
$title = 'Manage Resources';

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

if (!userHasRole('Content Editor') && !userHasRole('Site Admin'))
{
	$error = 'Only Content Editors may access this page.';
	include '../accessdenied.html.php';
    echo $footer;
    echo $script;
	exit();
}
//works
if (isset($_GET['add']))
{
    $title = 'New Resource';
    $action = 'addform';
    $resourceName = '';
    $url = '';
    $adminID = '';
    $id = '';
    $button = 'Add resource';

    include $includes . 'db.inc.php';

    // Build the list of admins
    try
    {
        $result = $pdo->query('SELECT adminID, adminName FROM admin');
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching list of admins.';
        include 'error.html.php';
        exit();
    }

    foreach ($result as $row)
    {
        $admins[] = array('id' => $row['adminID'], 'name' => $row['adminName']);
    }

  // Build the list of categories
    try
    {
        $result = $pdo->query('SELECT categoryID, categoryName FROM categories');
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching list of categories.';
        include 'error.html.php';
        exit();
    }

    foreach ($result as $row)
    {
        $categories[] = array(
            'id' => $row['categoryID'],
            'name' => $row['categoryName'],
            'selected' => FALSE);
    }

  include 'form.html.php';
  exit();
}

if (isset($_GET['addform']))
{
    include $includes . 'db.inc.php';

    // this works
    if ($_POST['admin'] == '')
    {
        $error = 'You must choose a user for this resource.
            Click &lsquo;back&rsquo; and try again.';
        include 'error.html.php';
        exit();
    }

    // working!!
    try
    {
        $sql = 'INSERT INTO `resources` SET
            `resourceName` = :resourceName,
            `url` = :url,
            `resourceDate` = CURDATE(),
            `adminID` = :adminID';
        $s = $pdo->prepare($sql);
        $s->bindValue(':resourceName', $_POST['resourceName']);
        $s->bindValue(':url', $_POST['url']);
        $s->bindValue(':adminID', $_POST['admin'], PDO::PARAM_INT);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error adding submitted resource.';
        include 'error.html.php';
        exit();
    }

  $resourceID = $pdo->lastInsertId();

  if (isset($_POST['category']))
  {
    try
    {
      $sql = 'INSERT INTO resourceCategory SET
          resourceID = :resourceID,
          categoryID = :categoryID';
      $s = $pdo->prepare($sql);

      foreach ($_POST['category'] as $categoryID)
      {
        $s->bindValue(':resourceID', $resourceID);
        $s->bindValue(':categoryID', $categoryID);
        $s->execute();
      }
    }
    catch (PDOException $e)
    {
      $error = 'Error inserting joke into selected categories.';
      include 'error.html.php';
      exit();
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include $includes . 'db.inc.php';

  try
  {
    $sql = 'SELECT resourceID, resourceName, url, adminID FROM resources WHERE resourceID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching resource details.';
    include 'error.html.php';
    exit();
  }
  $row = $s->fetch();

  $pageTitle = 'Edit Resource';
  $action = 'editform';
  $resourceName = $row['resourceName'];
  $url = $row['url'];
  $adminID = $row['adminID'];
  $id = $row['resourceID'];
  $button = 'Update resource';

  // Build the list of admins
  try
  {
    $result = $pdo->query('SELECT adminID, adminName FROM admin');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of admins.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $admins[] = array('id' => $row['adminID'], 'name' => $row['adminName']);
  }

  // Get list of categories containing this resource
  try
  {
    $sql = 'SELECT categoryID FROM resourceCategories WHERE resourceID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $id);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of selected categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $selectedCategories[] = $row['categoryID'];
  }

  // Build the list of all categories
  try
  {
    $result = $pdo->query('SELECT categoryID, categoryName FROM categories');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of categories.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $categories[] = array(
        'id' => $row['categoryID'],
        'name' => $row['categoryName'],
        'selected' => in_array($row['categoryID'], $selectedCategories));
  }

  include 'form.html.php';
  exit();
}

if (isset($_GET['editform']))
{
    include $includes . 'db.inc.php';

  if ($_POST['admin'] == '')
  {
    $error = 'You must choose an admin for this resource.
        Click &lsquo;back&rsquo; and try again.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'UPDATE resources SET
        resourceName = :resourceName,
        url = :url,
        adminID = :adminID
        WHERE resourceID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':resourceName', $_POST['resourceName']);
    $s->bindValue(':url', $_POST['url']);
    $s->bindValue(':adminID', $_POST['admin']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted resource.';
    include 'error.html.php';
    exit();
  }

  try
  {
    $sql = 'DELETE FROM resourceCategories WHERE resourceID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing obsolete resource category entries.';
    include 'error.html.php';
    exit();
  }

  if (isset($_POST['category']))
  {
    try
    {
      $sql = 'INSERT INTO resourceCategory SET
          resourceID = :resourceID,
          categoryID = :categoryID';
      $s = $pdo->prepare($sql);

      foreach ($_POST['category'] as $categoryid)
      {
        $s->bindValue(':resourceID', $_POST['id']);
        $s->bindValue(':categoryID', $categoryid);
        $s->execute();
      }
    }
    catch (PDOException $e)
    {
      $error = 'Error inserting resource into selected categories.';
      include 'error.html.php';
      exit();
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
    include $includes . 'db.inc.php';

  // Delete category assignments for this joke
  try
  {
    $sql = 'DELETE FROM resourceCategories WHERE resourceID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing resource from categories.';
    include 'error.html.php';
    exit();
  }

  // Delete the joke
  try
  {
    $sql = 'DELETE FROM resources WHERE resourceID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting resource.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

// display search results
if (isset($_GET['action']) and $_GET['action'] == 'search')
{
    include $includes . 'db.inc.php';

  // The basic SELECT statement
  $select = 'SELECT resources.resourceID, resourceName, url';
  $from   = ' FROM resources';
  $where  = ' WHERE TRUE';

  $placeholders = array();

  if ($_GET['admin'] != '') // An admin is selected
  {
    $where .= " AND adminID = :adminID";
    $placeholders[':adminID'] = $_GET['admin'];
  }

  if ($_GET['category'] != '') // A category is selected
  {
    $from  .= ' INNER JOIN resourceCategories ON resources.resourceID = resourceCategories.resourceID';
    $where .= " AND resourceCategories.categoryID = :categoryid";
    $placeholders[':categoryid'] = $_GET['category'];
  }

  try
  {
    $sql = $select . $from . $where;
    $s = $pdo->prepare($sql);
    $s->execute($placeholders);
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching resources.';
    include 'error.html.php';
    exit();
  }

  foreach ($s as $row)
  {
    $resources[] = array('id' => $row['resourceID'], 'resourceName' => $row['resourceName'], 'url' => $row['url']);
  }

  include 'resources.html.php';
  exit();
}

// Display search form
include $includes . 'db.inc.php';

try
{
  $result = $pdo->query('SELECT adminID, adminName FROM admin');
}
catch (PDOException $e)
{
  $error = 'Error fetching admins from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $admins[] = array('id' => $row['adminID'], 'name' => $row['adminName']);
}

try
{
  $result = $pdo->query('SELECT categoryID, categoryName FROM categories');
}
catch (PDOException $e)
{
  $error = 'Error fetching categories from database!';
  include 'error.html.php';
  exit();
}

foreach ($result as $row)
{
  $categories[] = array('id' => $row['categoryID'], 'name' => $row['categoryName']);
}

include 'searchform.html.php';
echo $footer;
echo $script;
