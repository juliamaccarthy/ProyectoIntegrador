<!DOCTYPE html>
<?php
  $filename="MisEscritos.php";
  require_once("autoload.php");
    if(!isset($_SESSION["email"]) && $_SESSION['role']!=1 ){
      redirect("signup.php");}
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Feed</title>


    <?php include("Includes/linkcss.php"); ?>

  </head>
  <body>

    <!--NewsFeed-->
        <?php include("Includes/HeaderUser.php"); ?>

        <section class="MisEscritos/home">
          <div class="row">

          <div class="col-sm-12 col-lg-12 MisEscritos/Home">
            <div class="MisEscritos/Home">
              <p class="home-title"> TITULO </p>
              <p class="home-subtitle">SUBTITULO </p>
              <p class="home-body"> BODY </p>
            </div>
          </div>
        </div>
        </section>

      </body>
