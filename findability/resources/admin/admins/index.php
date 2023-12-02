<?php

$includes = $_SERVER['DOCUMENT_ROOT'] . '/alexandra.cool/findability/resources/includes/';

require_once $includes . 'access.inc.php';

$styleTemplate = 'http://localhost/alexandra.cool/findability/css/template.css';
$utilities = 'http://localhost/alexandra.cool/findability/js/utilities.js';
$title = 'Manage Admins';

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
// works
if (!userHasRole('Site Admin') && !userHasRole('Account Administrator'))
{
  $error = 'Only Account Administrators may access this page.';
    include '../accessdenied.html.php';
    echo $footer;
    echo $script;
  exit();
}

// works
if (isset($_GET['add']))
{
  include $includes . 'db.inc.php';

  $title = 'New Admin';
  $action = 'addform';
  $name = '';
  $email = '';
  $id = '';
  $button = 'Add admin';

  // Build the list of roles
  try
  {
    $result = $pdo->query('SELECT roleID, roleDescription FROM role');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of roles.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $roles[] = array(
      'id' => $row['roleID'],
      'description' => $row['roleDescription'],
      'selected' => FALSE);
  }

  include 'form.html.php';
  exit();
}

// works
if (isset($_GET['addform']))
{
    include $includes . 'db.inc.php';

  try
  {
    $sql = 'INSERT INTO admin SET
        adminName = :name,
        email = :email';
    $s = $pdo->prepare($sql);
    $s->bindValue(':name', $_POST['name']);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error adding submitted admin.';
    include 'error.html.php';
    exit();
  }

  $adminID = $pdo->lastInsertId();

  if ($_POST['password'] != '')
  {
    $password = md5($_POST['password'] . 'cool');

    try
    {
      $sql = 'UPDATE admin SET
          password = :password
          WHERE adminID = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':password', $password);
      $s->bindValue(':id', $adminID);
      $s->execute();
    }
    catch (PDOException $e)
    {
      $error = 'Error setting admin password.';
      include 'error.html.php';
      exit();
    }
  }

  if (isset($_POST['roles']))
  {
    foreach ($_POST['roles'] as $role)
    {
      try
      {
        $sql = 'INSERT INTO adminRoles SET
            adminID = :id,
            roleID = :role';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $adminID);
        $s->bindValue(':role', $role);
        $s->execute();
      }
      catch (PDOException $e)
      {
        $error = 'Error assigning selected role to admin.';
        include 'error.html.php';
        exit();
      }
    }
  }

  header('Location: .');
  exit();
}

//works
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include $includes . 'db.inc.php';

  try
  {
    $sql = 'SELECT adminID, adminName, email FROM admin WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching admin details.';
    include 'error.html.php';
    exit();
  }

  $row = $s->fetch();

  $title = 'Edit Admin';
  $action = 'editform';
  $name = $row['adminName'];
  $email = $row['email'];
  $id = $row['adminID'];
  $button = 'Update admin';

  // Get list of roles assigned to this author
  try
  {
    $sql = 'SELECT roleID FROM adminRoles WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $id);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of assigned roles.';
    include 'error.html.php';
    exit();
  }

  $selectedRoles = array();
  foreach ($s as $row)
  {
    $selectedRoles[] = $row['roleID'];
  }

  // Build the list of all roles
  try
  {
    $result = $pdo->query('SELECT roleID, roleDescription FROM role');
  }
  catch (PDOException $e)
  {
    $error = 'Error fetching list of roles.';
    include 'error.html.php';
    exit();
  }

  foreach ($result as $row)
  {
    $roles[] = array(
      'id' => $row['roleID'],
      'description' => $row['roleDescription'],
      'selected' => in_array($row['roleID'], $selectedRoles));
  }

  include 'form.html.php';
  exit();
}

// update admin details
// works
if (isset($_GET['editform']))
{
    include $includes . 'db.inc.php';

  try
  {
    $sql = 'UPDATE admin SET
        adminName = :name,
        email = :email
        WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->bindValue(':name', $_POST['name']);
    $s->bindValue(':email', $_POST['email']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error updating submitted admin details.';
    include 'error.html.php';
    exit();
  }

  if ($_POST['password'] != '')
  {
    $password = md5($_POST['password'] . 'cool');

    try
    {
      $sql = 'UPDATE admin SET
          password = :password
          WHERE adminID = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':password', $password);
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e)
    {
      $error = 'Error setting admin password.';
      include 'error.html.php';
      exit();
    }
  }

  try
  {
    $sql = 'DELETE FROM adminRoles WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing obsolete admin role entries.';
    include 'error.html.php';
    exit();
  }

  if (isset($_POST['roles']))
  {
    foreach ($_POST['roles'] as $role)
    {
      try
      {
        $sql = 'INSERT INTO adminRoles SET
            adminID = :adminID,
            roleID = :roleID';
        $s = $pdo->prepare($sql);
        $s->bindValue(':adminID', $_POST['id']);
        $s->bindValue(':roleID', $role);
        $s->execute();
      }
      catch (PDOException $e)
      {
        $error = 'Error assigning selected role to admin.';
        include 'error.html.php';
        exit();
      }
    }
  }

  header('Location: .');
  exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
    include $includes . 'db.inc.php';

  // Delete role assignments for this author
  try
  {
    $sql = 'DELETE FROM adminRoles WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing admin from roles.';
    include 'error.html.php';

    exit();
  }

  // Get jokes belonging to author
  try
  {
    $sql = 'SELECT resourceID FROM resources WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error getting list of resources to delete.';
    include 'error.html.php';
    exit();
  }

  $result = $s->fetchAll();

  // Delete joke category entries
  try
  {
    $sql = 'DELETE FROM resourceCategory WHERE resourceID = :id';
    $s = $pdo->prepare($sql);

    // For each joke
    foreach ($result as $row)
    {
      $jokeId = $row['id'];
      $s->bindValue(':id', $jokeId);
      $s->execute();
    }
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting category entries for resource.';
    include 'error.html.php';
    exit();
  }

  // Delete jokes belonging to author
  try
  {
    $sql = 'DELETE FROM resources WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting resources for admin.';
    include 'error.html.php';
    exit();
  }

  // Delete the author
  try
  {
    $sql = 'DELETE FROM admin WHERE adminID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error deleting user.';
    include 'error.html.php';
    exit();
  }

  header('Location: .');
  exit();
}

// Display author list
include $includes . 'db.inc.php';

try
{
    $sql = 'SELECT admin.adminID, admin.adminName, adminRoles.roleID
        FROM admin INNER JOIN adminRoles
        ON admin.adminID = adminRoles.adminID';
    $result = $pdo->query($sql);
}
catch (PDOException $e)
{
    $error = 'Error fetching admins from the database!';
    include 'error.html.php';
    exit();
}

foreach ($result as $row)
{
    $admins[] = array(
        'adminID' => $row['adminID'],
        'adminName' => $row['adminName'],
        'roleID' => $row['roleID']);
}

include 'admins.html.php';
echo $footer;
echo $script;
