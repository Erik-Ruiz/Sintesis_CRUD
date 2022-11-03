<?php

require_once '../models/alumno.php';
require_once '../includes/sizeimg.inc.php';
require_once '../includes/valid.inc.php';

function genMatricula(){
    $mat='';
    for ($i=0; $i < 12; $i++) { 
        $mat= $mat.rand(0,9);
    }
    return $mat;
}


if(!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['apellido2']) || !isset($_POST['correo']) || !isset($_POST['telefono']) || !isset($_POST['dni'])){
    ?>
    <script>location.href='../pages/formulario.php?error=Faltan datos'</script>
    <?php 
}

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$apellido2=$_POST['apellido2'];
$correo=$_POST['correo'];
$tel=$_POST['telefono'];
$dni=$_POST['dni'];

if(errorNombre($nombre) || errorNombre($apellido) || errorNombre($apellido2)){
    ?>
    <script>location.href='../pages/formulario.php?error=Error en el nombre o en el apellido'</script>
    <?php 
}

if(errorEmail($correo)){
    ?>
    <script>location.href='../pages/formulario.php?error=Error en el correo'</script>
    <?php 
}

if(errorTelefono($tel)){
    ?>
    <script>location.href='../pages/formulario.php?error=Error en el Telefono'</script>
    <?php  
}

if(errorDni($dni)){
    ?>
    <script>location.href='../pages/formulario.php?error=Error en el DNI'</script>
    <?php 
}


$matricula=genMatricula();
$promocion='2022-2023';
$clase='DAW2';



// $alumno = new Alumno($nombre,$apellido,$apellido2,$dni,$tel,$correo,$clase,$promocion,$matricula);

if(Alumno::crearAlumno($nombre, $apellido, $apellido2, $correo, $dni,$tel, $matricula, $promocion, $clase)){
    
    $target_dir = "../img/alum/";


    $image_file = $_FILES["fileToUpload"];
    
    // Image not defined, let's exit
    if ($image_file['name'] == '') {
        ?>
        <script>location.href='../pages/admin.php?ok=Todo Correcto'</script>
        <?php
    }
    
    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],
    
        // New image location, __DIR__ is the location of the current PHP file
        $target_dir.$matricula.'.png'
    );
    
    GenerateThumbnail($target_dir.$matricula.'.png',$target_dir.$matricula.'.png',64,64);

    ?>
    <script>location.href='../pages/admin.php?ok=Todo Correcto'</script>
    <?php
    
    
}else{
    ?>
    <script>location.href='../pages/admin.php?error=Error al insertar alumno'</script>
    <?php
}

