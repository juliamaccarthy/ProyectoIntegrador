<?php
class User{
    private $nombre;
    private $email;
    private $surname;
    private $password;
    private $repassword;
    private $escritor;
    public function __construct($email,$password,$repassword=null, $surname=null, $nombre=null,$escritor=null){
        $this->nombre = $nombre;
        $this->email = $email;
        $this->surname = $surname;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->escritor = $escritor;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
      $this->surname = $surname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getRepassword(){
        return $this->repassword;
    }
    public function setRepassword($password){
        $this->repassword = $repassword;
    }
    public function getEscritor(){
       return $this->$escritor;
    }
    public function setEscritor($escritor){
        $this->escritor = $escritor;
    }
    
}
?>
