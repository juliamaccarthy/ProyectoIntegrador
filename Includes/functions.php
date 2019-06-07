<?php

session_start();

function validar($datos, $bandera){
    $errores=[];
    $persist=[];
    $validar=[];

if ($bandera=='registro') {
/*ERROR DEL NOMBRE*/
    if (!isset($datos['nombre']) || strlen($datos['nombre']) == 0){
      $errores['nombre']='Falta completar el nombre';
// SI NO HAY ERROR --> GUARDAR EL NOMBRE//
    } else {
      $persist['nombre']=trim($datos['nombre']);
    }

/*ERROR APELLIDO*/
    if (!isset($datos['apellido']) || (strlen($datos['apellido'])==0)){
      $errores['apellido']='Falta completar el apellido';
// SI NO HAY ERROR --> GUARDAR EL apellido//
    } else {
      $persist['apellido']=trim($datos['apellido']);
    }

/* ERROR EMAIL INCOMPLETO*/
    if (!isset($datos['email']) || (strlen($datos['email'])==0)){
      $errores['email']='Falta completar el mail';
/* ERROR MAIL FORMATO INCOMPLETO*/
    } elseif (filter_var($datos['email'],FILTER_VALIDATE_EMAIL)==false) {
      $errores['email']='El formato de email no es valido';
// SI NO HAY ERROR --> GUARDAR EL mail//
    } else {
      $persist['email']=trim($datos['email']);
    }

/*ERROR DEL USUARIO*/
    if (!isset($datos['usuario']) || strlen($datos['usuario'])==0){
      $errores['usuario']='Falta completar el usuario';
// SI NO HAY ERROR --> GUARDAR EL USUARIO//
    } else {
      $persist['usuario']=trim($datos['usuario']);
    }

/*ERROR DE CONTRASENIA*/
    $password = $datos['contrasenia'];
      // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);


    if (!isset($datos['contrasenia']) || strlen($datos['contrasenia'])==0){
      $errores['contrasenia']='Falta completar la contraseña';
    } elseif (!$uppercase || !$lowercase || !$number || strlen($password) < 8){
      $errores['contrasenia']='La contraseña debe tener al menos 8 caracteres, incluir al menos una mayúscula y un número';
    }else{
      $persist['password'] = trim($datos['contrasenia']);
    }



/*ERROR DE CONTRASENIA*/
    if (!isset($datos['verificaContrasenia']) || strlen($datos['verificaContrasenia'])==0){

      $errores['verificaContrasenia']='Falta completar la verificación de la contraseña';
    } elseif ($password!=trim($datos['verificaContrasenia'])) {
      $errores['verificaContrasenia']='Las contraseñas no coinciden';
    } else {
      $repassword=trim($datos['verificaContrasenia']);
    }

    if(isset($_FILES)){
       if($_FILES["imagen"]["error"]!=0){
           $errores["imagen"]="No recibi la imagen";
       }
       $imagen = $_FILES["imagen"]["name"];
       $ext = pathinfo($imagen,PATHINFO_EXTENSION);
       if($ext != "jpg" && $ext != "JPG" && $ext != "png" && $ext != "PNG"){
           $errores["imagen"] = "Querido escritor la extensión debe ser PNG o JPG";
       }
     }
  }

  if ($bandera=='login') {
/* ERROR EMAIL INCOMPLETO*/
    if (!isset($datos['email']) || (strlen($datos['email'])==0)){
      $errores['email']='Falta completar el mail';
/* ERROR MAIL FORMATO INCOMPLETO*/
    } elseif (filter_var($datos['email'],FILTER_VALIDATE_EMAIL)==false) {
      $errores['email']='El formato de email no es valido';
// SI NO HAY ERROR --> GUARDAR EL mail//
    } else {
      $persist['email']=trim($datos['email']);
    }


    if (!isset($datos['contrasenia']) || strlen($datos['contrasenia'])==0){
      $errores['contrasenia']='Falta completar la contraseña';
    }else{
      $persist['password'] = trim($datos['contrasenia']);
    }

  }
    $validar['errores']=$errores;
    $validar['persist']=$persist;

    return $validar;
}

function armarEscritor($imagen){
    $nombre = $imagen["imagen"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["imagen"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imgEscritores/";
    $escritor = uniqid();
    $archivoDestino = $archivoDestino.$escritor;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $escritor = $escritor.".".$ext;
    return $escritor;
}

function armarUsuario($datos,$avatar){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "email"=>$datos["email"],
        "usuario"=>$datos["usuario"],
        "contrasenia"=>password_hash($datos["contrasenia"],PASSWORD_DEFAULT),
        "imagen"=>$avatar,
/*TIPO DE PERMISOS, USARIOS O ADMINS */
        "perfil"=>1
    ];
    return $usuario;
}

function guardarUsuario($usuario){
    $json = json_encode($usuario);
    file_put_contents("Archivos/escritores.json",$json.PHP_EOL,FILE_APPEND);
}


function abrirBaseJSON($archivo){
    if(file_exists($archivo)){
        $json = file_get_contents($archivo);
        $json = explode(PHP_EOL,$json);
        array_pop($json);
        foreach ($json as $key => $value) {
            $arrayUsuarios[]=json_decode($value,true);
        }
        return $arrayUsuarios ;
    }
    return null;
}

function buscarPorEmail($email){
    $usuarios = abrirBaseJSON("Archivos/escritores.json");

    foreach ($usuarios as $key => $value) {

        if($email == $value["email"]){
            return $value;
        }
    }
    return null;
}


function seteoUsuario($usuario,$datos){

    $_SESSION["nombre"] = $usuario["nombre"];
    $_SESSION["email"]=$usuario["email"];
    $_SESSION["usuario"]=$usuario["usuario"];
    $_SESSION["escritor"]=$usuario["escritor"];
    $_SESSION["perfil"]=$usuario["perfil"];
    if(isset($datos["recordar"])){
        setcookie("email",$datos["email"],time()+3600);
        setcookie("contrasenia",$datos["contrasenia"],time()+3600);
    }

}

function validarAcceso(){
    if(isset($_SESSION["email"])){
        return true;
    }elseif (isset($_COOKIE["email"])) {
        $_SESSION["email"]= $_COOKIE["email"];
        $_SESSION["contrasenia"]=$_COOKIE["contrasenia"];
        return true;
    }else{
        return false;
    }
}
?>
