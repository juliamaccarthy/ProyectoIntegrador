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
                  <a class="ingresar-home" href="#">Ingresá</a>
                </li>
              </ul>
            </div>
            </div>
          </div>
        </section>
<br>

<!-- Reglas : Cambiar nombre de las class desde Div class="texto-info"-->
<section class="Reglas-home">
  <div class="row">
  <div class="col-sm-12 col-lg-12 reglas-home">
    <img class="img-dosescriben" src="../ImagenesDH/escribeconmigo.jpeg" alt="escritores">
    <div class="texto-info">
    <h3 class="info-title"> ESCRIBE CONMIGO </h3>
    <p class="info-subtitulo">Comunidad de escritores para quienes el arte de escribir se contruye a través de la disciplina, la expesión sin  censura y la retroalimentación positiva. En donde la diversidad de los miembros abre mentes, y a veces crea mundos. </p>
    <div class="botonos-info">
      <ul>
        <li>
          <a class="nosotros-info" href="#">Nosotros</a>
        </li>
      </ul>
    </div>
    </div>
  </div>
</div>
</section>
    <?php include("Includes/jquerys.php"); ?>
  </body>
</html>
