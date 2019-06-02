<?php
session_start();

function error(){
    $errores=[];

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


    return $errores;
/* NO GUARDAMOS LAS CONTRASE;AS */




}

?>
