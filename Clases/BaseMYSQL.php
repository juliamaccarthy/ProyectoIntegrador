<?php
class BaseMYSQL extends BaseDatos{
    static public function conexion($host,$db_name,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_name.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD ". $errores->getmessage();
            exit;
        }
    }
    static public function buscarPorEmail($email,$pdo,$tabla){
        //Aquí hago la sentencia select, para buscar el email, estoy usando bindeo de parámetros por value
        $sql = "select * from $tabla where email = :email";
        // Aquí ejecuto el prepare de los datos
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }
    static public function guardarUsuario($pdo,$usuario,$tabla,$escritor){
        $sql = "insert into $tabla (name,email,surname,password,escritor,role) values (:name,:email,:surname,:password,:escritor,:role )";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name',$usuario->getName());
        $query->bindValue(':email',$usuario->getEmail());
        $query->bindValue(':surname',$usuario->getSurname());
        $query->bindValue(':password',Encriptar::hashPassword($usuario->getPassword()));
        $query->bindValue(':escritor',$escritor);
        $query->bindValue('role',1);
        $query->execute();
    }

    public function leer(){
        //A futuro trabajaremos en esto
    }
    public function actualizar(){
        //A futuro trabajaremos en esto
    }
    public function borrar(){
        //A futuro trabajaremos en esto
    }
    public function guardar($usuario){
        //Este fue el método usao para json
    }
}
