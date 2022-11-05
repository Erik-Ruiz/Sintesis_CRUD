<?php

include '../controller/connection.php';

session_start();

if(empty($_SESSION['login'])){

  echo "<script>location.href='../pages/login.php?nok=1'</script>";
  
}


$sql="SELECT matricula, nombre, apellido, apellido2, correo, dni FROM tbl_alumno where matricula like %?% and nombre like %?% and apellido like %?% and apellido2 like %?% and correo like %?% and dni like %?% ";
$stmt=mysqli_stmt_init($conexion);

if(!mysqli_stmt_prepare($stmt,$sql)){
       header('Location:../registro.php?error=errorconexion');
    exit();
}

mysqli_stmt_bind_param($stmt,"ssssss",$matricula,$nombre,$apellido,$apellido2,$correo,$dni);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);


?>
<script>location.href='./admin.php?filter'</script>