<header class="header">
  <nav class="navbar navbar-expand-lg header-navbar navbar-dark" style="background-color: rgb(87, 197, 164)";>
    <!-- LOGO -->
    <div class="navbar-div" href="#">
      <img src="imagenes/logoescribir.png" width="50" height="50" class="d-inline-block align-top img-header-logo" alt="">
    <a class="navbar-brand"  href="Home.php">Escribe Conmigo | <?=$_SESSION['name']?></a>
  </div>


    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse div-col" id="navbarText">
      <ul class="navbar-nav ml-auto  ul-header">

        <!--HOME-->

        <li class="nav-item">
          <a class="nav-link " href="NewsFeed.php">News Feed
            <span class="sr-only">(current) </span>
          </a>
        </li>

        <!--NOSOTROS-->
        <li class="nav-item ">
          <a class="nav-link" href="usuariosAdmin.php">Usuarios</a>
        </li>

        <!--Reglas--> <!--TODAVIA NO VA A NINGUN LADO-->
        <li class="nav-item">
          <a class="nav-link" href="escritosAdmin.php">Escritos</a>
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
       <li class="nav-item">
         <a class="nav-link login" href="logout.php">Log out</a>
       </li>
      </ul>
      <span class="navbar-text"> </span>
    </div>

  </nav>
</header>
