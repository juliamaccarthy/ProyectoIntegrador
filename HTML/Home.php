<!DOCTYPE html>
<?php
  $filename="Home";
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <?php include("Includes/linkcss.php"); ?>

  </head>
  <body>

    <!-- header -->
        <?php include("Includes/Header.php"); ?>

    <!-- banner -->
        <section class="banner">
          <div class="row">

          <div class="col-sm-12 col-lg-12 img-principal photo-container">
            <img class="img-fondo" src="../ImagenesDH/cuentanostuhistoria.jpg" alt="banner">
            <p class="subtitulo-banner">Vivir. Escribir. Imaginar. Contar. Drenar. <br> Aprender. Motivar. Sanar. </p>
            <div class="botones-sing">
              <ul>
                <li>
                  <a class="ingresar-home" href="login.php">Ingresá</a>
                </li>
              </ul>
            </div>
            </div>
          </div>
        </section>

<!--Home-Nosotros-->
<section class="Home-Nosotros">
  <div class="row">

  <div class="col-sm-12 col-lg-12 HomeNosotros">
    <img class="img-escritor" src="../ImagenesDH/escritor.jpeg" alt="escritor">
    <div class="homeNosotros-escrito-nosotros">
      <p class="home-title"> ESCRIBE CONMIGO </p>
      <p class="home-subtitle">Comunidad de escritores para quienes el arte de escribir se contruye a través de la disciplina, la expesión sin  censura y la retroalimentación positiva. En donde la diversidad de los miembros abre mentes, y a veces crea mundos. </p>
      <div class="home-botoninfo">
        <ul>
          <li>
            <a class="home-boton" href="Nosotros.php">Nosotros</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>


<!-- Home - Reglas-->
<section class="Home-reglas">
  <div class="row">
    <div class="col-sm-12 col-lg-12 HomeReglas">
      <img class="img-dosescriben" src="../ImagenesDH/escribeconmigo.jpg" alt="escritores">
        <div class="homeNosotros-escrito-reglas">
        <p class="home-title"> ESCRIBE CONMIGO </p>
          <p class="home-subtitulo">Comunidad de escritores para quienes el arte de escribir se contruye a través de la disciplina, la expesión sin  censura y la retroalimentación positiva. En donde la diversidad de los miembros abre mentes, y a veces crea mundos. </p>
        <div class="home-botoninfo">
          <ul>
            <li>
              <a class="home-boton" href="Reglas.php">Preguntas frecuentes</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php include("Includes/Footer.php");?>
    <?php include("Includes/jquerys.php"); ?>
  </body>
