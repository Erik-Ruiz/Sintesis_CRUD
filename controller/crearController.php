<?php
//recoge los datos de crear vista y los llevamos a alumno que es dnd los creamos, y vuelve

require_once "../model/alumno.php";

$nombre = $_POST['name'];
$edad = $_POST['edad'];

Alumno::crearAlumno($nombre, $edad);



echo "<script>  

location.href='./indexcontroller.php';

</script>";