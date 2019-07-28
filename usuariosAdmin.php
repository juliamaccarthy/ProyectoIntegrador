<!DOCTYPE html>
<?php require_once("autoload.php");
  if(!isset($_SESSION["email"]) || $_SESSION['role']==1 ){
    redirect("signup.php");

  }
  $listadoUsuarios = Query::listado($pdo,'users','where role=1');
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

    <div class="listados">
      <h2 class="listatitulo">ESCRITORES</h2>
      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Mostrar</th>
              <th scope="col">Modificar</th>
              <th scope="col">Borrar</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($listadoUsuarios as $key => $value):?>
                <tr>

                  <th scope="row"><?= $value["id"] ?></th>
                  <td><?=$value["name"];?></td>
                  <td><?=$value["surname"];?></td>
                  <td><a href="mostrarUsuarioAdmin.php?id=<?=$value['id'];?>">
                        <i class="far fa-eye"></i>
                      </a>
                  </td>
                  <td><a href="modificarUsuarioAdmin.php?id=<?=$value['id'];?>">
                        <i class="far fa-edit"></i>
                      </a>
                  </td>
                  <td><a href="eliminarUsuarioAdmin.php?id=<?=$value['id'];?>">
                        <i class="far fa-trash-alt"></i>
                      </a>
                  </td>

                </tr>
              <?php endforeach;?>
          </tbody>
      </div>

    </div>
  </body>
</html>
