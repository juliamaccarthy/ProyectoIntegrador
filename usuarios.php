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
    <?php include("Includes/HeaderUser.php") ?>

    <?php include("Includes/jquerys.php"); ?>
  </body>
</html>
