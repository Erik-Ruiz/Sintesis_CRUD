<?php

require_once '../models/alumno.php';

function genMatricula(){
    $mat='';
    for ($i=0; $i < 12; $i++) { 
        $mat= $mat.rand(0,9);
    }
    return $mat;
}
function GenerateThumbnail($im_filename,$th_filename,$max_width,$max_height,$quality = 1){
    // The original image must exist
    if(is_file($im_filename))
    {
        // Let's create the directory if needed
        
        // If the thumb does not aleady exists
        
        
            // Get Image size info
            list($width_orig, $height_orig, $image_type) = @getimagesize($im_filename);
            if(!$width_orig)
                return 2;
            switch($image_type)
            {
                case 1: $src_im = @imagecreatefromgif($im_filename);    break;
                case 2: $src_im = @imagecreatefromjpeg($im_filename);   break;
                case 3: $src_im = @imagecreatefrompng($im_filename);    break;
            }
            if(!$src_im)
                return 3;

            

            $width  = $max_width;
            $height = $max_height;

            $dst_img = @imagecreatetruecolor($width, $height);
            if(!$dst_img)
                return 4;
            $success = @imagecopyresampled($dst_img,$src_im,0,0,0,0,$width,$height,$width_orig,$height_orig);
            if(!$success)
                return 4;
            switch ($image_type) 
            {
                case 1: $success = @imagegif($dst_img,$th_filename); break;
                case 2: $success = @imagejpeg($dst_img,$th_filename,intval($quality*100));  break;
                case 3: $success = @imagepng($dst_img,$th_filename,intval($quality*9)); break;
            }
            if(!$success)
                return 4;
        
        
    }
    return 1;
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

    echo 'OK';
    
}

