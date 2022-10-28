<?php


public function carga($class){
    $ruta = '../components/'.$class'.php'; 
    if(file_exists($ruta)){
        require_once $ruta;

    }

    $ruta = '../controller/'.$class'.php'; 
    if(file_exists($ruta)){
        require_once $ruta;

    }

    $ruta = '../models/'.$class'.php'; 
    if(file_exists($ruta)){
        require_once $ruta;

    }

    $ruta = '../pages/'.$class'.php'; 
    if(file_exists($ruta)){
        require_once $ruta;

    }
}