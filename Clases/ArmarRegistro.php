<?php
class ArmarRegistro{
    public function armarEscritor($imagen){
        $name = $imagen["escritor"]["name"];
        $ext = pathinfo($name,PATHINFO_EXTENSION);
        $archivoOrigen = $imagen["escritor"]["tmp_name"];
        $archivoDestino = dirname(__DIR__);
        $archivoDestino = $archivoDestino."/imagenes/";
        $escritor = uniqid();
        $archivoDestino = $archivoDestino.$escritor;
        $archivoDestino = $archivoDestino.".".$ext;

        move_uploaded_file($archivoOrigen,$archivoDestino);
        $escritor = $escritor.".".$ext;

        return $escritor;
    }

    public function armarUsuario($registro,$escritor){

        $usuario = [
            "name"=>$registro->getName(),
            "surname"=>$registro->getSurname(),
            "email"=>$registro->getEmail(),
            "password"=> Encriptar::hashPassword($registro->getPassword()),
            "escritor"=>$escritor,
            "role"=>1
        ];

        return $usuario;
    }
}
