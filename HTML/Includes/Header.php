<header class="header">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top header-navbar">
    <!-- LOGO -->
    <a class="navbar-brand" href="#">
      <img src="../imagenes/Logo.png" width="30" height="30" class="d-inline-block align-top img-header-logo" alt="">
      Escribe Conmigo
    </a>


    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto  ul-header">

        <!--HOME-->

        <li class="nav-item
        <?php if ($filename=="Home") {
            active;
        } ?> ">
          <a class="nav-link" href="Home.php">Home
            <span class="sr-only">(current) </span>
          </a>
        </li>

        <!--NOSOTROS-->
        <li class="nav-item
        <?php if ($filename=="Nosotros") {
            active;
        } ?> ">
          <a class="nav-link" href="Nosotros.php">Nosotros</a>
        </li>

        <!--Reglas-->
        <li class="nav-item
        <?php if ($filename=="Reglas") {
            active;
        } ?> ">
          <a class="nav-link" href="Reglas.php">Reglas</a>
        </li>

        <!-- DROPDOWN QUE NO VAMOSA  USAR AHORA
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Nosotros
          </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Quienes Somos</a>
                <a class="dropdown-item" href="#">Historia</a>
                <a class="dropdown-item" href="#">Reglas</a>
         </div>
       </li>
     -->
       <!--LOGIN SINGUP-->
       <li class="nav-item login
       <?php if ($filename=="login") {
           active;
       } ?>">
         <a class="nav-link login" href="login.php">Log in </a>
       </li>
       <li class="nav-item singup">
         <a class="nav-link signup" href="#">Sing Up</a>
       </li>
      </ul>
      <span class="navbar-text"> </span>
    </div>

  </nav>
</header>
