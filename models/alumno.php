<?php

require_once("persona.php");

final class alumno extends persona{
    
    
    private $clase;
    private $promocion;
    private $matricula;


    public function __construct(){

        parent::__construct($nombre, $apellido, $apellido2, $dni, $telefono, $correo);
        
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->apellido2 = $apellido2;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->correo = $correo;

        $this->clase = $clase;
        $this->promocion = $promocion;
        $this->matricula = $matricula;

    }
    public static function getAlumnos(){
        $var = 1;
        require_once "../controller/config.php";
        require_once "../controller/connection.php";

        $sql="SELECT matricula, nombre, apellido, apellido2, correo, dni FROM tbl_alumno ";


        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
            
        $resultadoconsulta= mysqli_stmt_get_result($stmt);

        mysqli_fetch_assoc($resultadoconsulta);

        mysqli_stmt_close($stmt);

        mysqli_fetch_assoc($resultadoconsulta);
        return $resultadoconsulta;
    }

    public static function getAlumnoId($id){

        require_once "../controller/config.php";
        require_once "../controller/connection.php";
        

        $sql="SELECT * FROM `tbl_alumno` WHERE id = ?";


        $stmt = mysql_stmt_init($conexion);

        mysql_stmt_prepare($conexion, $sql);

        mysqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $apellido2, $dni, $telefono, $correo, $clase, $promocion, $matricula);

        mysqli_stmt_execute($stmt);
            
        $resultadoconsulta=msqli_stmt_get_result($stmt);

        mysqli_fetch_assoc($resultadoconsulta);

        mysqli_stmt_close($stmt);

        return $resultadoconsulta;
    }

    // public static function crearAlumno($id,$nombre,$apellido, $apellido2, $dni, $telefono,$correo, $clase, $promocion, $matricula){

    //     require_once "../controller/config.php";
    //     require_once "../controller/connection.php";
        
    //     $sql="INSERT INTO tbl_alumno(id, nombre,apellido, apellido2, dni, telefono,
    //      correo, clase, promocion, matricula";


    //     $stmt = mysql_stmt_init($conexion);

    //     mysql_stmt_prepare($conexion, $sql)

    //         msqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $apellido2, $dni, $telefono, 
    //         $correo,, $clase, $promocion, $matricula);

    //         msqli_stmt_execute($stmt);
            
    //         $resultadoconsulta=msqli_stmt_get_result($stmt);

    //         msqli_fetch_assoc($resultadoconsulta);

    //         msqli_stmt_close($stmt);

    //     }


    // public static function eliminarAlumno($id){

    //     require_once "../controller/config.php";
    //     require_once "../controller/connection.php";
            
    //     $sql="DELETE FROM tbl_alumno WHERE id=?";


    //         $stmt = mysql_stmt_init($conexion);

    //         mysql_stmt_prepare($conexion, $sql)

    //         msqli_stmt_bind_param($stmt, "i", $id);

    //         msqli_stmt_execute($stmt);
            
    //         $resultadoconsulta=msqli_stmt_get_result($stmt);

    //         msqli_fetch_assoc($resultadoconsulta);

    //         msqli_stmt_close($stmt);

    
    // }

    // public static function updateAlumno($nombre,$apellido, $apellido2, $dni, $telefono,
    //                                     $correo, $clase, $promocion, $matricula){

    //     require_once "../controller/config.php";
    //     require_once "../controller/connection.php";


    //     $sql="UPDATE tbl_alumno SET nombre=?,apellido=?, apellido2=?,dni=?, telefono=?,correo=?, clase=?,promocion=?, matricula=? WHERE id=?";


    //    $stmt = mysql_stmt_init($conexion);

    //    mysql_stmt_prepare($conexion, $sql)

    //        msqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $apellido2, $dni, $telefono, 
    //        $correo,, $clase, $promocion, $matricula);

    //        msqli_stmt_execute($stmt);
           
    //        $resultadoconsulta=msqli_stmt_get_result($stmt);

    //        msqli_fetch_assoc($resultadoconsulta);

    //        msqli_stmt_close($stmt);


    // }

    // /**
    //  * Get the value of clase
    //  */ 
    // public function getClase()
    // {
    //     return $this->clase;
    // }

    // /**
    //  * Set the value of clase
    //  *
    //  * @return  self
    //  */ 
    // public function setClase($clase)
    // {
    //     $this->clase = $clase;

    //     return $this;
    // }

    // /**
    //  * Get the value of promocion
    //  */ 
    // public function getPromocion()
    // {
    //     return $this->promocion;
    // }

    // /**
    //  * Set the value of promocion
    //  *
    //  * @return  self
    //  */ 
    // public function setPromocion($promocion)
    // {
    //     $this->promocion = $promocion;

    //     return $this;
    // }

    // /**
    //  * Get the value of matricula
    //  */ 
    // public function getMatricula()
    // {
    //     return $this->matricula;
    // }

    // /**
    //  * Set the value of matricula
    //  *
    //  * @return  self
    //  */ 
    // public function setMatricula($matricula)
    // {
    //     $this->matricula = $matricula;

    //     return $this;
    // }
    
}