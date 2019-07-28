<!DOCTYPE html>

<?php
require_once("autoload.php");
$id_usuario=$_GET["id"];
$usuarioSeleccionado = Query::mostrarUsuario($pdo,'users',$id_usuario);
$where="where id_writter=$id_usuario";
$escritousuario=Query::listado($pdo,'writtings', $where);
$nombrecompleto=$usuarioSeleccionado[0]['name'].' '. $usuarioSeleccionado[0]['surname'];
?>
<html lang="es" dir="ltr">
  <head>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <?php  include("Includes/linkcss.php"); ?>
    <meta charset="utf-8">
    <title><?= $nombrecompleto?></title>
  </head>
  <body>
      <?php if ($_SESSION['role'] == 1 ):?>
          <?php  include("Includes/HeaderUser.php"); ?>
        <?php else: ?>
          <?php include("Includes/HeaderAdmin.php"); ?>
        <?php endif; ?>

    <div class="UsuariosIndiv">
      <h2 class="tituloUsuario"><?=$nombrecompleto?></h2>

      <div class='infousuario'>
        <div class="photo">
                <img class="fotousuario" src="imagenes/<?=$usuarioSeleccionado[0]["escritor"];?>" alt="Escritor.<?=$nombrecompleto?>" >
        </div>
        <div class="info">
            <div class="infous">
              <p class="labelus">Nombre:</p> <p  class="outputus"><?=$nombrecompleto?></p>
            </div>
            <div class="infous">
              <p class="labelus">Email:<p>
              <p class="outputus"> <?=$usuarioSeleccionado[0]["email"];?></p>
            </div>
            <div class="infous">
              <p class="labelus">Perfil:</p>
                <p class="outputus">
              <?php if ($usuarioSeleccionado[0]["role"]==1): ?>
                Escritor
                <?php else: ?>
                Administrador
              <?php endif; ?>


              </p>

            </div>

        </div>

      </div>


      <h2 class="tituloUsuario">ESCRITOS</h2>
      <table class="table">
        <thead>
          <tr>
            <th  scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th class="middle" scope="col">Escrito Completo</th>
            <th class="middle" scope="col">Likes</th>

          </tr>
        </thead>
        <tbody>
            <?php foreach ($escritousuario as $key => $value):?>
              <tr>

                <th scope="row"><?= $value["id"] ?></th>
                <td><?=$value["title"];?></td>
                <td><a class="middle" href="mostrarEscrito.php?id=<?=$value['id'];?>">
                      <i class="far fa-eye"></i>
                    </a>
                </td>
                <td>
                    <div class="middle">
                      <?=$value['likes'];?>
                      <i class="fas fa-thumbs-up"></i>

                    </div>


                </td>

             </tr>
            <?php endforeach;?>
        </tbody>
    </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
