<?php

require_once "../models/alumno.php";
session_start();

if(empty($_SESSION['login'])){

  echo "<script>location.href='../pages/login.php?nok=1'</script>";
  
}
$id = $_GET['id'];

Alumno::eliminarAlumno($id);
?>
<script>location.href='../pages/admin.php?ok=Todo Correcto'</script>
