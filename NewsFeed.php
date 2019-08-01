<!DOCTYPE html>
<?php
  $filename="NewsFeed.php";
  require_once("autoload.php");
    if(!isset($_SESSION["email"])){
      redirect("signup.php");}
    $select="Select * from writtings order by likes desc";
      $infousuario= Query::Consulta1($pdo,$select);
      var_dump($infousuario);


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

        <section class="NewsFeed/home">
          <div class="row">

          <div class="col-sm-12 col-lg-12 NewsFeedHome">
            <div class="Newsfeed home">
              <p class="home-title"> TITULO </p>
              <p class="home-subtitle">SUBTITULO </p>
              <p class="home-body"> BODY </p>
            </div>
          </div>
        </div>
        </section>

      </body>
