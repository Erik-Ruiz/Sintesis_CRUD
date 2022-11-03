<?php

$server = '192.168.3.109';
$username = 'admin1';
$password = 'admin1234';
$bd = 'bd_sintesis';
// Nos conectamos a la base de datos mediante la funcion mysqli_connect
$conexion = mysqli_connect($server,$username,$password,$bd);

if (mysqli_connect_error()) {
    echo "<script>location.href='../pages/login.php?log=2'</script>";
    exit();
}

// Definimos como una constante "NUM_ITEMS_BY_PAGE", esto solo mostrara 10 registros
