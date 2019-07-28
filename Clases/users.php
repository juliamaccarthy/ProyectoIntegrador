<?php
class User{
    private $name;
    private $email;
    private $surname;
    private $password;
    private $repassword;
    private $escritor;
    public function __construct($email,$password,$repassword=null, $name=null,$escritor=null,$surname=null){
        $this->name = $name;
        $this->email = $email;
        $this->surname = $surname;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->escritor = $escritor;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
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
       return $this->escritor;
    }
    public function setEscritor($escritor){
        $this->escritor = $escritor;
    }

}
?>
