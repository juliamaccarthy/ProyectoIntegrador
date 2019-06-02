<?php
session_start();

function error($datos, $bandera){
    $errores=[];

/*ERROR DEL NOMBRE*/
    if (!isset($datos['nombre']) || strlen($datos['nombre']) == 0){
      $errores['nombre']='Falta completar el nombre';
// SI NO HAY ERROR --> GUARDAR EL NOMBRE//
    } else {
      $nombre=trim($datos['nombre']);
    }

/*ERROR APELLIDO*/
    if (!isset($datos['apellido']) || (strlen($datos['apellido'])==0)){
      $errores['apellido']='Falta completar el apellido';
// SI NO HAY ERROR --> GUARDAR EL apellido//
    } else {
      $apellido=trim($datos['apellido']);
    }

/* ERROR EMAIL INCOMPLETO*/
    if (!isset($datos['email']) || (strlen($datos['email'])==0)){
      $errores['email']='Falta completar el mail';
/* ERROR MAIL FORMATO INCOMPLETO*/
    } elseif (filter_var($datos['email'],FILTER_VALIDATE_EMAIL)==false) {
      $errores['email']='El formato de email no es valido';
// SI NO HAY ERROR --> GUARDAR EL mail//
    } else {
      $email['email']=trim($datos['email']);
    }

/*ERROR DEL USUARIO*/
    if (!isset($datos['usuario']) || strlen($datos['usuario'])==0){
      $errores['usuario']='Falta completar el usuario';
// SI NO HAY ERROR --> GUARDAR EL USUARIO//
    } else {
      $usuario=trim($datos['usuario']);
    }

/*ERROR DE CONTRASENIA*/
    $password = $datos['contrasenia'];
      // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!isset($datos['contrasenia']) || strlen($datos['contrasenia'])==0){
      $errores['contrasenia']='Falta completar la contraseña';
    } elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
      $errores['contrasenia']='La contraseña debe tener al menos 8 caracteres, incluir al menos una mayúscula, un número y un caracter especial (!#$%&)';
    }else{
      $password = trim($datos['contrasenia']);
    }


    $repassword=trim($datos['verificaContrasenia']);
/*ERROR DE CONTRASENIA*/
    if (!isset($datos['verificaContrasenia']) || strlen($datos['verificaContrasenia'])==0){
      $errores['verificaContrasenia']='Falta completar la verificación de la contraseña';
    } elseif ($password!=$repassword) {
      $errores['verificaContrasenia']='Las contraseñas no coinciden';
    }

    if(isset($_FILES) && $bandera == 'registro'){
       if($_FILES["imagen"]["error"]!=0){
           $errores["imagen"]="No recibi la imagen";
       }
       $imagen = $_FILES["imagen"]["name"];
       $ext = pathinfo($imagen,PATHINFO_EXTENSION);
       if($ext != "jpg" && $ext != "png"){
           $errores["imagen"] = "Querido escritor la extensión debe ser PNG o JPG";
       }

    return $errores;

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
