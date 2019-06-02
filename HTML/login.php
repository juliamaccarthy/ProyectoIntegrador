<!DOCTYPE html>
<?php
  $filename="login";

  $bookquote=["'We are all storytellers.  We all live in a network of stories. There isn´t a stronger connection between people than sotrytelling.'","'Storytelling is the most powerful way to put ideas into the world today '","'Facts tell, stories sell'","'when you stand and share your sotry ina empowering way, your sotry will heal you and your story will heal sombody else '","'Stories can conquer fear, you know, they can make the hear bigger'","'A short story is a diffrent thing all togheter - a short story is like a kiss in the dark from a stranger.'","'what are we but our stories '","'Great stories happen to those who can tell them '","'Stories of imagination tend to upset those without one '","'the universe is made of stories not of atoms'","'you can always edita a bad page.  You can´t edit a blank page.'","'Every secret of a writer´s soul, every experience of his life, every qulity of his mind, is written large in his works.'",];
  $quote=$bookquote[rand(0, (count($bookquote)-1))];


  include("Includes/functions.php");


  if ($_POST){
    $errores=error($_POST);
  }


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escibe conmigo | LOG IN </title>
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
        <form class="signup-form" action="login.php" method="POST">

          <h5 class="h5-log"> INGRESAR </h5>

          <div class="signup-login">
            <ul>
              <li class="signup-si">
                <a href="signup.php" class="<?php if ($filename=="signup") {
                    echo 'active-sign';
                }?>">Sign Up</a>
              </li>

              <li>
                <a href="login.php" class="
                <?php if ($filename=="login") {
                    echo 'active-sign';
                }?>
                ">Log In</a>
              </li>
            </ul>

          </div>

          <div class="pregunta-signup">
            <label for="email">E-mail *</label>
            <input id="email" type="text" name="email" placeholder="usuario@email.com" value="<?=(isset($_SESSION['email'])?$_SESSION['email']: "");?>">
            <p class="error-for">
            <?=(isset($errores['email'])?$errores['email']: "");?>
            </p>
          </div>

          <div class="pregunta-signup">
            <label for="contrasenia">Contraseña *</label>
            <input id="contrasenia" type="password" name="contrasenia" placeholder="******">
            <p class="error-for">
            <?=(isset($errores['contrasenia'])?$errores['contrasenia']: "");?>
            </p>
          </div>

          <div class="pregunta-signup">

            <input id="recordarme" type="checkbox" name="recordar" value="recordar"/>
            <label> Recuerdame</label>
          </div>

          <div class="pregun-regis olvidarcont">
            <a class="registrarse" href="login.php"> No me acuerdo la contraseña</a>
          </div>

          <div class="pregun-regis">
            <button class="registrarse" type="submit" value="login" action="login.php">Login</button>
          </div>

      </form>
    </main>
    </div>

      <?php include("Includes/jquerys.php"); ?>

  </body>
</html>
