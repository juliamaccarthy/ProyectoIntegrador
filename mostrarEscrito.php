<!DOCTYPE html>

<?php
require_once("autoload.php");
$id_escrito=$_GET["id"];
$EscritoSeleccionado = Query::mostrarUsuario($pdo,'writtings',$id_escrito);
$id=$EscritoSeleccionado[0]["id_writter"];
$infoEscrito = Query::mostrarUsuario($pdo,'users',$id);
$nombrecompleto=$infoEscrito[0]['name']." " . $infoEscrito[0]['surname'];
?>
<html lang="es" dir="ltr">
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <?php  include("Includes/linkcss.php"); ?>
    <meta charset="utf-8">
    <title>Mostrar Escrito</title>
  </head>
  <body>

    <?php if ($_SESSION['role'] == 1 ):?>
      <?php  include("Includes/HeaderUser.php"); ?>
    <?php else: ?>
      <?php include("Includes/HeaderAdmin.php"); ?>
    <?php endif; ?>

    <div class="EscritoInd">
     <div class="EscritoInfo">
     </div>
     <h2 class="title-me">
       "<?= strtoupper($EscritoSeleccionado[0]["title"]) ;?>"
     </h2>
     <h2 class='subtitle'>
         <?= $EscritoSeleccionado[0]["subtitle"] ;?>
     </h2>
     <h6 class="escritor">
       <?= $nombrecompleto;?>
     </h6>
     <div class="fondo-escrito">
     <p class="body">
           <?= $EscritoSeleccionado[0]["body"] ;?>
     </p>
   </div>
     <p class="likes-me">
         <strong><?= $EscritoSeleccionado[0]["likes"] ;?> </strong>
           <i class="fas fa-thumbs-up"></i>
     </p>
   </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
