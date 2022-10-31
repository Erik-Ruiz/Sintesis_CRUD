<?php 
require_once '../models/alumno.php';

$id=$_POST['id'];
$nota=$_POST['nota'];
$alumno=$_POST['idAlumno'];
Alumno::setNotaModulo($id,$nota);

echo "<script>location.href='../pages/alumno.php?id=$alumno'</script>";