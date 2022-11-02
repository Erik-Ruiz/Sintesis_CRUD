<?php

require_once '../models/alumno.php';
require_once '../includes/sizeimg.inc.php';
function genMatricula(){
    $mat='';
    for ($i=0; $i < 12; $i++) { 
        $mat= $mat.rand(0,9);
    }
    return $mat;
}

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$apellido2=$_POST['apellido2'];
$correo=$_POST['correo'];
$tel=$_POST['telefono'];
$dni=$_POST['dni'];

$matricula=genMatricula();
$promocion='2022-2023';
$clase='DAW2';



// $alumno = new Alumno($nombre,$apellido,$apellido2,$dni,$tel,$correo,$clase,$promocion,$matricula);

if(Alumno::crearAlumno($nombre,$apellido,$apellido2,$dni,$tel,$correo,$clase,$promocion,$matricula)){
    
    $target_dir = "../img/alum/";


    $image_file = $_FILES["fileToUpload"];
    
    // Image not defined, let's exit
    if (!isset($image_file)) {
        die('No file uploaded.');
    }
    
    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],
    
        // New image location, __DIR__ is the location of the current PHP file
        $target_dir.$matricula.'.png'
    );
    
    GenerateThumbnail($target_dir.$matricula.'.png',$target_dir.$matricula.'.png',64,64);

    echo "<script>location.href='../pages/admin.php'</script>";
    
}

