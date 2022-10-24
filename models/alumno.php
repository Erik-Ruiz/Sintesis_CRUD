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
        
        require_once "../controller/config.php";
        require_once "../controller/connection.php";

        $sql="SELECT * FROM tbl_alumno";


        $stmt = mysql_stmt_init($conexion);

        mysql_stmt_prepare($conexion, $sql)

            msqli_stmt_bind_param($stmt, "s", $username, "s", $apellido,"s", $apellido2, "s", $dni, "s", $telefono, 
                                         "s", $correo, "s", $clase, "s", $promocion, "s", $mareicula);

            msqli_stmt_execute($stmt);
            
            $resultadoconsulta=msqli_stmt_get_result($stmt);

            msqli_fetch_assoc($resultadoconsulta);

            msqli_stmt_close($stmt);

        return $resultadoconsulta;
    }

    public static function crearAlumno($nombre,$apellido, $apellido2, $dni, $telefono,
                                       $correo, $clase, $promocion, $matricula){

        require_once "../controller/config.php";
        require_once "../controller/connection.php";
        
        $alu=new Alumno(null,$nombre,$apellido, $apellido2, $dni, $telefono,
        $correo, $clase, $promocion, $matricula);
        

        $stmt=$pdo->prepare("INSERT INTO tbl_alumno(id, nombre,apellido, apellido2, dni, telefono,
        correo, clase, promocion, matricula) 
        VALUES (:id, :nombre,:apellido, :apellido2, :dni, :telefono,:correo, :clase, :promocion, :matricula)");
        $stmt->execute((array)$alu);

        }

        public static function getAlumnoId($id){

            require_once "../controller/config.php";
        require_once "../controller/connection.php";
            
            $stmt = $pdo->prepare("SELECT `id`, `nombre`, `edad` FROM `tbl_alumno` WHERE id = ?");

            $stmt->bindParam(1, $id);
            $stmt->execute();

            $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $alumno;
    
    }

    public static function eliminarAlumno($id){

        require_once "../controller/config.php";
        require_once "../controller/connection.php";
            
            $stmt = $pdo->prepare("DELETE FROM tbl_alumno WHERE id=?");


            $stmt->bindParam(1, $id);
            
            $stmt->execute();

    
    }

    public static function updateAlumno($nombre,$apellido, $apellido2, $dni, $telefono,
                                        $correo, $clase, $promocion, $matricula){

        require_once "../controller/config.php";
        require_once "../controller/connection.php";

        $stmt=$pdo->prepare("UPDATE tbl_alumno SET nombre=?,apellido=?, apellido2=?,dni=?, telefono=?,correo=?, clase=?,promocion=?, matricula=? WHERE id=?");                
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $apellido);
        $stmt->bindParam(3, $apellido2);
        $stmt->bindParam(4, $dni);
        $stmt->bindParam(5, $telefono);
        $stmt->bindParam(6, $correo);
        $stmt->bindParam(7, $clase);
        $stmt->bindParam(8, $promocion);
        $stmt->bindParam(9, $matricula);
        $stmt->bindParam(10, $matricula);

        $stmt->execute();


}







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