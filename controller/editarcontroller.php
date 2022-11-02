<?php
require_once '../models/alumno.php';
require_once '../includes/sizeimg.inc.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$apellido2=$_POST['apellido2'];
$correo=$_POST['correo'];
$tel=$_POST['telefono'];
$dni=$_POST['dni'];

$matricula=$_POST['matricula'];

$promocion='2022-2023';
$clase='DAW2';

$ok = Alumno::updateAlumno($id,$nombre,$apellido,$apellido2,$dni,$tel,$correo,$clase,$promocion);

if($ok == 1){
    try{
    $image_file = $_FILES["fileToUpload"];
    
    // Image not defined, let's exit
    if (count($image_file)==0) {
        echo "IMG NOT SET";
        echo "<script>location.href='../pages/admin.php'</script>";
        die();
    }

    $target_dir = "../img/alum/";
    unlink($target_dir.$matricula.".png");

    
    
    
    
    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],
    
        // New image location, __DIR__ is the location of the current PHP file
        $target_dir.$matricula.'.png'
    );
    
    GenerateThumbnail($target_dir.$matricula.'.png',$target_dir.$matricula.'.png',64,64);
    echo "<script>location.href='../pages/admin.php'</script>";
    echo "OK";
    }catch(Exception $e){
        echo $e;
    }
}else{
  echo "Error";
  echo "<script>location.href='../pages/admin.php'</script>"; 
}

