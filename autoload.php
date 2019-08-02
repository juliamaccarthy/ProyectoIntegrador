<?php
require_once("helpers.php");
require_once("clases/users.php");
require_once("clases/Validador.php");
require_once("clases/ArmarRegistro.php");
require_once("clases/BaseDatos.php");
require_once("clases/BaseJSON.php");
require_once("clases/Encriptar.php");
require_once("clases/Autenticador.php");
require_once("clases/BaseMYSQL.php");
require_once("clases/Query.php");
require_once("clases/seasons.php");
require_once("clases/words.php");
require_once("clases/writtings.php");


//Declaro mis variables
$host = "localhost";
$bd = "escribeconmigo";
$usuario = "root";
$password = "root";
$puerto = "8888";
$charset = "utf8mb4";
//Ojo: Para los que trabajan con MAC: deben colocar el puerto: 8889

$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);


$validar = new Validador();
$registro = new ArmarRegistro();
//$json = new BaseJSON("usuarios.json");
Autenticador::iniciarSession();
