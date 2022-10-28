<?php

require_once "../models/alumno.php";

$id = $_GET['id'];

$respuesta= Alumno::eliminarAlumno($id);

header('Location: ./admin.php?ok=.'$respuesta);