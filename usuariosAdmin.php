<!DOCTYPE html>
<?php include("Includes/functions.php");
  if(!isset($_SESSION["email"])) {
    redirect("signup.php");

  }
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include("Includes/linkcss.php"); ?>

  </head>
  <body>
    <?php if ($_SESSION['role'] == 1 ):?>
      <?php  include("Includes/HeaderUser.php"); ?>
    <?php else: ?>
      <?php include("Includes/HeaderAdmin.php"); ?>
    <?php endif; ?>

    <?php include("Includes/jquerys.php"); ?>
  </body>
</html>
