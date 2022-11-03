<?php

require_once "../models/alumno.php";

$id = $_GET['id'];

Alumno::eliminarAlumno($id);
?>
<script>location.href='../pages/admin.php?ok=Todo Correcto'</script>
