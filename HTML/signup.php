<!DOCTYPE html>
<?php
  $filename="login";

  $bookquote=["'We are all storytellers.  We all live in a network of stories. There isn´t a stronger connection between people than sotrytelling.'","'Storytelling is the most powerful way to put ideas into the world today '","'Facts tell, stories sell'","'when you stand and share your sotry ina empowering way, your sotry will heal you and your story will heal sombody else '","'Stories can conquer fear, you know, they can make the hear bigger'","'A short story is a diffrent thing all togheter - a short story is like a kiss in the dark from a stranger.'","'what are we but our stories '","'Great stories happen to those who can tell them '","'Stories of imagination tend to upset those without one '","'the universe is made of stories not of atoms'","'you can always edita a bad page.  You can´t edit a blank page.'","'Every secret of a writer´s soul, every experience of his life, every qulity of his mind, is written large in his works.'",];
  $quote=$bookquote[rand(0, (count($bookquote)-1))];

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Escibe conmigo | LOG IN </title>
    <?php include("Includes/linkcss.php"); ?>

  </head>
  <body>
    <?php include("Includes/Header.php"); ?>

    <div class="pagina-login">

    <main class="main-login">
      <form class="login-usuario" action="signup.php" method="POST">
        <br>
        <h5 class="IngresarALibros"> Ingresar </h5>
        <br>

        <label for="email">E-mail *</label>
        <input id="email" type="email" name="" placeholder="usuario@email.com">
        <br>

        <label for="contrasenia">Contraseña *</label>
        <input id="contrasenia" type="password" name="" placeholder="******">
        <br>
        <br>

        <p>
          <label for="Entrar"></label>
          <input class="entrar-signup" type="submit" name="" value="Entrar">

        <p>
            <label for="Crear-Cuenta"></label>
            <input class="Crear-Cuenta" type="submit" name="" value="Crear Cuenta" action="login.php">

      </form>
    </main>
    </div>
      <?php include("Includes/jquerys.php"); ?>

  </body>
</html>