<?php

function error(){
  $errores=[];
  session_start();

/*ERROR DEL NOMBRE*/
    if (!isset($_POST['nombre']) || strlen($_POST['nombre']) == 0){
      $errores['nombre']='Falta completar el nombre';
// SI NO HAY ERROR --> GUARDAR EL NOMBRE//
    } else {
      $_SESSION['nombre']=$_POST['nombre'];
    }

/*ERROR APELLIDO*/
    if (!isset($_POST['apellido']) || (strlen($_POST['apellido'])==0)){
      $errores['apellido']='Falta completar el apellido';
// SI NO HAY ERROR --> GUARDAR EL apellido//
    } else {
      $_SESSION['apellido']=$_POST['apellido'];
    }

/* ERROR EMAIL INCOMPLETO*/
    if (!isset($_POST['email']) || (strlen($_POST['email'])==0)){
      $errores['email']='Falta completar el mail';
/* ERROR MAIL FORMATO INCOMPLETO*/
    } elseif (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false) {
      $errores['email']='El formato de email no es valido';
// SI NO HAY ERROR --> GUARDAR EL mail//
    } else {
      $_SESSION['email']=$_POST['email'];
    }

/*ERROR DEL USUARIO*/
    if (!isset($_POST['usuario']) || strlen($_POST['usuario'])==0){
      $errores['usuario']='Falta completar el usuario';
// SI NO HAY ERROR --> GUARDAR EL USUARIO//
    } else {
      $_SESSION['usuario']=$_POST['usuario'];
    }

/*ERROR DE CONTRASENIA*/
    if (!isset($_POST['contrasenia']) || strlen($_POST['contrasenia'])==0){
      $errores['contrasenia']='Falta completar la contraseña';
    }

/*ERROR DE CONTRASENIA*/
    if (!isset($_POST['verificaContrasenia']) || strlen($_POST['verificaContrasenia'])==0){
      $errores['verificaContrasenia']='Falta completar la verificación de la contraseña';
    } elseif ($_POST['verificaContrasenia']!=$_POST['contrasenia']) {
      $errores['verificaContrasenia']='Las contraseñas no coinciden';
    }

/* NO GUARDAMOS LAS CONTRASE;AS */

  var_dump($_POST);
  var_dump($errores);
  var_dump($_SESSION);

}



function armarAvatar($imagen){
    $nombre = $imagen["avatar"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["avatar"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/fotosPerfil/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $avatar = $avatar.".".$ext;
    return $avatar;
}

function armarUsuario($datos,$avatar){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "email"=>$datos["email"],
        "password"=>password_hash($datos["password"],PASSWORD_DEFAULT),
        "avatar"=>$avatar,
        "perfil"=>1
    ];
    return $usuario;
}

function guardarUsuario($usuario){
    $json = json_encode($usuario);
    file_put_contents("usuarios.json",$json.PHP_EOL,FILE_APPEND);
}
function buscarPorEmail($email){
    $usuarios = abrirBaseJSON("usuarios.json");

    foreach ($usuarios as $key => $value) {

        if($email == $value["email"]){
            return $value;
        }
    }
    return null;
}

function abrirBaseJSON($archivo){
    if(file_exists($archivo)){
        $json = file_get_contents($archivo);
        $json = explode(PHP_EOL,$json);
        array_pop($json);
        foreach ($json as $key => $value) {
            $arrayUsuarios[]=json_decode($value,true);
        }
        return $arrayUsuarios;
    }
    return null;
}

function seteoUsuario($usuario,$datos){

    $_SESSION["nombre"] = $usuario["nombre"];
    $_SESSION["email"]=$usuario["email"];
    $_SESSION["avatar"]=$usuario["avatar"];
    $_SESSION["perfil"]=$usuario["perfil"];
    if(isset($datos["recordar"])){
        setcookie("email",$datos["email"],time()+3600);
        setcookie("password",$datos["password"],time()+3600);
    }

}

function validarAcceso(){
    if(isset($_SESSION["email"])){
        return true;
    }elseif (isset($_COOKIE["email"])) {
        $_SESSION["email"]= $_COOKIE["email"];
        $_SESSION["password"]=$_COOKIE["password"];
        return true;
    }else{
        return false;
    }
}
?>
