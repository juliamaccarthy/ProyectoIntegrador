<!DOCTYPE html>
<?php
  $filename="MisEscritos.php";
  require_once("autoload.php");
    if(!isset($_SESSION["email"])){
      redirect("signup.php");}
  $email=$_SESSION["email"];
  /*echo "$email";
  $where= "where email='$email'";
  $infousuario= Query::listado($pdo,'users',$where);
  $id=$infousario['id'];
  $where="where id=$id"
  echo '$where'
  $escritos=Query :: listado ($pdo,'writtings',$where);
  var_dump($escritos);*/
  $select="Select * from writtings inner join users on users.id=writtings.id_writter where email='$email'";
  $infousuario= Query::Consulta1($pdo,$select);



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

        <?php foreach ($infousuario as $key => $value):?>
        <section class="MisEscritos/home">

          <div class="row">

          <div class="col-sm-12 col-lg-12 MisEscritos/Home">
            <div class="MisEscritos/Home">
              <p class="home-title"> <?=$value["title"];?> </p>
              <p class="home-subtitle"><?=$value["subtitle"];?>  </p>
              <p class="home-body"><?=$value["body"];?>  </p>
            </div>
          </div>
        </div>
        </section>
          <?php endforeach;?>

      </body>
