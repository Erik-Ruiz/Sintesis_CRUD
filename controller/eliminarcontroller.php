<?php

require_once "../models/alumno.php";

$id = $_GET['id'];

$respuesta = Alumno::eliminarAlumno($id);
echo "<script>location.href='../pages/admin.php?ok=$respuesta</script>";
//header('Location: ../pages/admin.php?ok='.$respuesta);