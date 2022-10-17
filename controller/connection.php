<?php
// Nos conectamos a la base de datos mediante la funcion mysqli_connect
  $conexion = mysqli_connect("192.168.24.228", "admin","admin1234", "bd_sintesis");

if (mysqli_connect_errno()) {
    header("Location: ../pages/login.php?log=2");
    exit();
}

