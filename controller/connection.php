<?php
<<<<<<< HEAD

$server = '192.168.114.109';
$username = 'admin1';
$password = 'admin1234';
$bd = 'bd_sintesis';
=======
require_once "config.php";
$server = SERVIDOR;
$username = USUARIO;
$password = PASSWORD;
$bd = BD;
>>>>>>> bb08e384a123725e9887187538a7d45b772f2802
// Nos conectamos a la base de datos mediante la funcion mysqli_connect
$conexion = mysqli_connect($server,$username,$password,$bd);

if (mysqli_connect_error()) {
    echo "<script>location.href='../pages/login.php?log=2'</script>";
    exit();
}

try {
    $servidor = "mysql:host=".$server.";dbname=".BD;
    $pdo = new PDO($servidor,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "<script>alert('conexion establecida con exito')</script>";   
 } catch(Exception $e) {
     echo $e->getMessage();
    
 }