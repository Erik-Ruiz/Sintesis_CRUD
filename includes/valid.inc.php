<?php
function errorEmail($email){
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error=true;
    }else{
        $error=false;
    }
    return $error;
    
}

function errorNombre($nombre){
    if(!preg_match("/^[a-zA-Z]*$/",$nombre)){
        $error=true;
    }else{
        $error=false;
    }
    return $error;
    
}

function errorNota($nota){
    if(is_float($nota) || is_int($nota)){
        $error=false;
    }else{
        $error=true;
    }  
    return $error;
}

function is_valid_dni($dni){
    $letter = substr($dni, -1);
    $numbers = substr($dni, 0, -1);
  
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers%23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
      return true;
    }
    return false;
}