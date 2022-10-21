<?php

require_once("persona.php");

final class alumno extends persona{
    
    
    private $clase;
    private $promocion;
    private $matricula;


    public function __construct(){

        parent::__construct($nombre, $apellido, $apellido2, $dni, $telefono, $correo);
        
        $this->nombre = $nombre;
        $this->apellido = $apellido2;
        $this->apellido2 = $apellido2;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->correo = $correo;

        $this->clase = $clase;
        $this->promocion = $promocion;
        $this->matricula = $matricula;



    /**
     * Get the value of clase
     */ 
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set the value of clase
     *
     * @return  self
     */ 
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get the value of promocion
     */ 
    public function getPromocion()
    {
        return $this->promocion;
    }

    /**
     * Set the value of promocion
     *
     * @return  self
     */ 
    public function setPromocion($promocion)
    {
        $this->promocion = $promocion;

        return $this;
    }

    /**
     * Get the value of matricula
     */ 
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * Set the value of matricula
     *
     * @return  self
     */ 
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;

        return $this;
    }
    }