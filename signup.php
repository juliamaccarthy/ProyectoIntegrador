<?php

  $filename="signup";

  $bookquote=["'We are all storytellers.  We all live in a network of stories. There isn´t a stronger connection between people than sotrytelling.'","'Storytelling is the most powerful way to put ideas into the world today '","'Facts tell, stories sell'","'when you stand and share your sotry ina empowering way, your sotry will heal you and your story will heal sombody else '","'Stories can conquer fear, you know, they can make the hear bigger'","'A short story is a diffrent thing all togheter - a short story is like a kiss in the dark from a stranger.'","'what are we but our stories '","'Great stories happen to those who can tell them '","'Stories of imagination tend to upset those without one '","'the universe is made of stories not of atoms'","'you can always edita a bad page.  You can´t edit a blank page.'","'Every secret of a writer´s soul, every experience of his life, every qulity of his mind, is written large in his works.'",];
  $quote=$bookquote[rand(0, (count($bookquote)-1))];


  require_once("autoload.php");
  if ($_POST){

    $_POST['name']=ucwords(strtolower($_POST['name']));
    $_POST['apellido']=ucwords(strtolower($_POST['apellido']));
    $_POST['email']=(strtolower($_POST['email']));
    //Esta variable es quien controla si se desea guardar en archivo JSON o en MYSQL
    $tipoConexion = "MYSQL";
    // Si la función retorn false, significa que se va a guardar los datos en JSON, de lo contrario se guardará los datos en MYSQL
    if($tipoConexion=="JSON"){
      $usuario = new User($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["name"],$_FILES,$_POST["apellido"] );


      $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);

      if(count($errores)==0){
        $usuarioEncontrado = $json->buscarEmail($usuario->getEmail());

        if($usuarioEncontrado != null){
          $errores["email"]="Usuario ya registrado";
        }else{
          $escritor = $registro->armarEscritor($usuario->getEscritor());
          $registroUsuario = $registro->armarUsuario($usuario,$escritor);

          $json->guardar($registroUsuario);

          redirect ("login.php");
        }
      }
    }
   else{
     //Si arriba en la variable $tipoConexion se coloco "MYSQL", entonces genero todo el trabajo pero con MYSQL.
    //Aquí genero mi objeto usuario, partiendo de la clase Usuario
    $usuario = new user($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["name"],$_FILES,$_POST["apellido"]);

    //Aquí verifico si los datos registrados por el usuario pasan las validaciones
    $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
    //De no existir errores entonces:
    if(count($errores)==0){
      //Busco a ver si el usuario existe o no en la base de datos
      $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
      if($usuarioEncontrado != false){
        $errores["email"]= "Usuario ya Registrado";
      }else{
        //Aquí guardo en el servidor la foto que el usuario seleccionó
        $escritor = $registro->armarEscritor($usuario->getEscritor());
        //Aquí procedo a guardar los datos del usuario en la base de datos, ,aquí le paso el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el name del archivo de la imagen del usuario.
        BaseMYSQL::guardarUsuario($pdo,$usuario,'users',$escritor);
        //Aquí redirecciono el usuario al login

        redirect ("login.php");

      }
    }

   }
 }
/*
 require_once("Includes/functions.php");

   if ($_POST){
     $validar=validar($_POST, 'registro');
     $errores=$validar['errores'];
     $persist=$validar['persist'];

     /*si el mail no tiene error pero buscar mail no da null osea que el mail se encuentra en el archivo json entonces el mail tiene error ya que esta registrado */
     /*
     if (!isset($errores['email']) && buscarPorEmail($_POST['email'])!=null) {
     $errores['email']='Este mail ya esta registrado';
     }

     if(count($errores)== 0){

       $escritor = armarEscritor($_FILES);
       $usuario = armarUsuario($_POST,$escritor);

       guardarUsuario($usuario);
       header("location: usuarios.php");
       exit;
     }

   }*/

  ?>



 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escibe conmigo | SIGN UP </title>
    <?php include("Includes/linkcss.php"); ?>
  </head>
  <body>
    <?php include("Includes/Header.php"); ?>

    <div class="paginasignup">
        <div class="quote">
          <p class="p-quote">
            <?=$quote?>
          </p>
        </div>

      <main class="main-signup">

        <form class="signup-form" action="signup.php" method="post" enctype="multipart/form-data" >

          <h5 class="h5-log"> CREAR CUENTA NUEVA </h5>

          <div class="signup-login">
            <ul>
              <li class="signup-si">
                <a href="signup.php" class="<?php if ($filename=="signup") {
                    echo 'active-sign';
                }?>">Sign Up</a>
              </li>

              <li class="signup-lo">
                <a href="login.php" class="
                <?php if ($filename=="login") {
                    echo 'active-sign';
                }?>
                ">Log In</a>
              </li>
            </ul>

          </div>

          <div class="pregunta-signup">
            <label for="name">Name *</label>
            <input id="name" type="text" name="name" placeholder="Miguel" value="<?=(isset($persist['name'])?$persist['name']: "");?>" >
            <p class="error-for">
            <?=(isset($errores['name'])?$errores['name']: "");?>
            </p>
          </div>

          <div class="pregunta-signup">
            <label for="apellido">Apellido *</label>
            <input id="apellido" type="text" name="apellido" placeholder="Sanchez" value="<?=(isset($persist['apellido'])?$persist['apellido']: "");?>">
            <p class="error-for">
            <?=(isset($errores['apellido'])?$errores['apellido']: "");?>
            </p>
          </div>

          <div class="pregunta-signup">
            <label for="email">E-mail *</label>
            <input id="email" type="text" name="email" placeholder="usuario@email.com" value="<?=(isset($persist['email'])?$persist['email']: "");?>">
            <p class="error-for">
            <?=(isset($errores['email'])?$errores['email']: "");?>
            </p>
          </div>

          <div class="pregunta-signup">
            <label for="contrasenia">Contraseña *</label>
            <input id="contrasenia" type="password" name="password" placeholder="******">
            <p class="error-for">
            <?=(isset($errores['password'])?$errores['password']: "");?>
            </p>
          </div>

          <div class="pregunta-signup">
            <label for="verificaContrasenia">Verificar Contraseña *</label>
            <input id="verificaContrasenia" type="password" name="repassword" placeholder="******">
            <p class="error-for">
            <?=(isset($errores['repassword'])?  $errores['repassword']: "");?>
            </p>
          </div>


          <div class="pregunta-signup imagen">
            <input type="file" name="escritor" value="" >
            <p class="error-for">
            <?=(isset($errores['escritor'])?  $errores['escritor']: "");?>
            </p>
          </div>

          <div class="pregun-regis">
            <button class="registrarse" type="submit" value="signup" action="signup.php">Registrar</button>
          </div>



      </form>
    </main>
    </div>

      <?php include("Includes/jquerys.php"); ?>

  </body>
</html>
