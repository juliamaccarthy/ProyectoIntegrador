<?php
class Validador{

    public function validacionUsuario($usuario){

        $errores=array();
        $name = trim($usuario->getName());
        if(isset($name)) {
            if(empty($name)){
                $errores["name"]= "El campo name no debe estar vacio";
            }
        }
        $apellido = trim($usuario->getSurname());
        if(isset($apellido)) {
            if(empty($apellido)){
                $errores["apellido"]= "El campo apellido no debe estar vacio";
            }
        }

        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]="Email invalido !!!!!";
        }
        $password= trim($usuario->getPassword());

        $repassword = trim($usuario->getRepassword());


        if(empty($password)){
            $errores["password"]= "Hermano querido el campo password no lo podés dejar en blanco";
        }elseif (strlen($password)<6) {
            $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
        }
        if(isset($repassword)){
            if ($password != $repassword) {
                $errores["repassword"]="Las contraseñas no coinciden";
            }
        }
        if($usuario->getEscritor()!=null){
            if($_FILES["escritor"]["error"]!=0){
                $errores["escritor"]="Error debe subir imagen";
            }else{
                $name = $_FILES["escritor"]["name"];
                $ext = pathinfo($name,PATHINFO_EXTENSION);
                if($ext != "png" && $ext != "PNG" && $ext != "jpg" && $ext != "JPG"){
                    $errores["escritor"]="Debe seleccionar archivo png ó jpg";
                }
            }
        }

        return $errores;
    }
    //Metodo creado para validar el login del usuario
    public function validacionLogin($usuario){
        $errores=array();

        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]="Email invalido !!!!!";
        }
        $password= trim($usuario->getPassword());

        if(empty($password)){
            $errores["password"]= "Hermano querido el campo password no lo podés dejar en blanco";
        }elseif (strlen($password)<6) {
            $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
        }

        return $errores;
    }
    //Método para validar si el usuario desea recuperar su contraseña
    public function validacionOlvide($usuario){

        $errores=array();

        $email = trim($usuario->getEmail());
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errores["email"]="Email invalido !!!!!";
        }
        $password= trim($usuario->getPassword());

        $repassword = trim($usuario->getRepassword());


        if(empty($password)){
            $errores["password"]= "Hermano querido el campo password no lo podés dejar en blanco";
        }elseif (strlen($password)<6) {
            $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
        }
        if(empty($repassword)){
            $errores["repassword"]= "Hermano querido el campo confirmar nuevo password no lo podés dejar en blanco";
        }

        return $errores;
    }


}
