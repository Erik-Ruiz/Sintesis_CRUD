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



<<<<<<< HEAD
$ok=Alumno::crearAlumno($nombre,$apellido,$apellido2,$dni,$tel,$correo,$clase,$promocion,$matricula);
echo $ok;
if($ok == 1){
=======
// $alumno = new Alumno($nombre,$apellido,$apellido2,$dni,$tel,$correo,$clase,$promocion,$matricula);

if(Alumno::crearAlumno($nombre, $apellido, $apellido2, $correo, $dni,$tel, $matricula, $promocion, $clase)){
>>>>>>> dee8ee6d4487a492a73c62d2d2f99b58eba024f1
    
    $target_dir = "../img/alum/";


    $image_file = $_FILES["fileToUpload"];
    
    // Image not defined, let's exit
    if (count($image_file)==0) {
        echo "<script>location.href='../pages/admin.php'</script>";
    }
    
    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],
    
        // New image location, __DIR__ is the location of the current PHP file
        $target_dir.$matricula.'.png'
    );
    
    GenerateThumbnail($target_dir.$matricula.'.png',$target_dir.$matricula.'.png',64,64);

    //echo "<script>location.href='../pages/admin.php'</script>";
    
}else{
    echo "Error:";
}

