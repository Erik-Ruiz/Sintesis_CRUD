<?php

require_once("persona.php");

final class Alumno extends Persona{
    
    
    private $clase;
    private $promocion;
    private $matricula;


    public function __construct($nombre, $apellido, $apellido2, $dni, $telefono, $correo,$clase,$promocion,$matricula){

        parent::__construct($nombre, $apellido, $apellido2, $dni, $telefono, $correo);
        

        $this->clase = $clase;
        $this->promocion = $promocion;
        $this->matricula = $matricula;

    }
    private function bd(){
        require  "../controller/connection.php";
        return $conexion;
    }
    public static function getAlumnos(){
        
        //require_once "../controller/config.php";
        $conexion=self::bd();//conexion con la bd

        define('NUM_ITEMS_BY_PAGE', 16);

        //Parte paginacion
        $resultado = $conexion->query('SELECT COUNT(*) as total_alu FROM tbl_alumno;');
        $row = $resultado->fetch_assoc();
        // Asignamos el numero de resultados a estas variables
        $num_total_rows = $row['total_alu'];
        if ($num_total_rows > 0) {
            $page = false;
    
        //Examinamos la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
    
        if (!$page) {
            $start = 0;
            $page = 1;
        } else {
            $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
        }
        //Calculo el total de paginas
        $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
        }
  
        $paginas = NUM_ITEMS_BY_PAGE;


        //Parte alumno
        $sql="SELECT id, matricula, nombre, apellido, apellido2, correo, dni FROM tbl_alumno LIMIT $start, $paginas";


        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
                
        $resultadoconsulta= mysqli_stmt_get_result($stmt);

        mysqli_fetch_assoc($resultadoconsulta);

        mysqli_stmt_close($stmt);
        mysqli_fetch_assoc($resultadoconsulta);
        $results = array($resultadoconsulta,$total_pages,$page);
        return $results;
    }

    public static function getAlumnoId($id){

        //require_once "../controller/config.php";
        $conexion=self::bd();
        

        $sql="SELECT * FROM tbl_alumno where id = ?";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_assoc($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }   

        
    public static function getMateriasAlumno($id){

        //require_once "../controller/config.php";
        $conexion=self::bd();
        

        $sql="SELECT modulo FROM tbl_notas where id_alumno = ? group by modulo ORDER BY modulo";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
    
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);  //mysqli_fetch_assoc();

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    } 

    public static function getNotasAlumno($id,$modulo){

        $conexion=self::bd();
        

        $sql="SELECT id_notas,uf,nota FROM tbl_notas where id_alumno = ? and modulo = ? ;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
    
        mysqli_stmt_bind_param($stmt,"is",$id,$modulo);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);  //mysqli_fetch_assoc();
        //$resultadoconsulta=mysqli_fetch_assoc($consulta);
        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }

    public static function getGeneralNota(){

        $conexion=self::bd();
        

        $sql="SELECT avg(nota) as media,modulo, max(nota) as 'Mejor' FROM tbl_notas group by modulo order by media desc;";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
    
        //mysqli_stmt_bind_param($stmt,"is",$id,$modulo);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);  //mysqli_fetch_assoc();
        //$resultadoconsulta=mysqli_fetch_assoc($consulta);
        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }
    public static function getCorreoAlumno($id){

        $conexion=self::bd();

        $sql="SELECT correo FROM tbl_alumno WHERE id = ?";  
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        
        mysqli_stmt_bind_param($stmt,"i",$id);
        
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);  //mysqli_fetch_assoc();
        //$resultadoconsulta=mysqli_fetch_assoc($consulta);
        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }
    public static function getAllCorreoAlumno(){

        $conexion=self::bd();

        $sql="SELECT correo FROM tbl_alumno";  
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_all($consulta);  //mysqli_fetch_assoc();
        //$resultadoconsulta=mysqli_fetch_assoc($consulta);
        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }
    // public static function crearAlumno($id,$nombre,$apellido, $apellido2, $dni, $telefono,
    //                                    $correo, $clase, $promocion, $matricula){

    //     require_once "../controller/config.php";
    //     require_once "../controller/connection.php";
        
    //     $sql="INSERT INTO tbl_alumno(id, nombre,apellido, apellido2, dni, telefono,
    //      correo, clase, promocion, matricula";


    //     $stmt = mysqli_stmt_init($conexion);

    //     mysqli_stmt_prepare($conexion, $sql);

    //         mysqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $apellido2, $dni, $telefono, 
    //         $correo, $clase, $promocion, $matricula);

    //         mysqli_stmt_execute($stmt);
            
    //         $resultadoconsulta=mysqli_stmt_get_result($stmt);

    //         mysqli_fetch_assoc($resultadoconsulta);

    //         mysqli_stmt_close($stmt);

    //     }


    public static function eliminarAlumno($id){

        $conexion=self::bd();
          
        try{
            $sql="SELECT matricula FROM tbl_alumno where id = ?";

            $stmt = mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($stmt,$sql);
                
            mysqli_stmt_bind_param($stmt,"i",$id);
            mysqli_stmt_execute($stmt);
            $consulta = mysqli_stmt_get_result($stmt);
        
            $matricula=mysqli_fetch_assoc($consulta);

            $sql="DELETE FROM tbl_alumno WHERE id=?";


            $stmt = mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($stmt,$sql);
        
            mysqli_stmt_bind_param($stmt,"i",$id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $sql="DELETE FROM tbl_notas WHERE id_alumno=?";

            $stmt = mysqli_stmt_init($conexion);
            mysqli_stmt_prepare($stmt,$sql);
        
            mysqli_stmt_bind_param($stmt,"i",$id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $ok=true;
            try{
              unlink('../img/alum/'.$matricula[0]['matricula'].'.png');  
            }catch(Exception $e){
                
            }
            

        }catch(Exception $e){
            $ok=false;
        }finally{
            return $ok;
        }


        
    }

    // public static function updateAlumno($nombre,$apellido, $apellido2, $dni, $telefono,
    //                                     $correo, $clase, $promocion, $matricula){

    //     require_once "../controller/config.php";
    //     require_once "../controller/connection.php";


    //     $sql="UPDATE tbl_alumno SET nombre=?,apellido=?, apellido2=?,dni=?, telefono=?,correo=?, clase=?,promocion=?, matricula=? WHERE id=?";


    //    $stmt = mysqli_stmt_init($conexion);

    //    mysqli_stmt_prepare($conexion, $sql);

    //        mysqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $apellido2, $dni, $telefono, 
    //        $correo, $clase, $promocion, $matricula);

    //        mysqli_stmt_execute($stmt);
           
    //        $resultadoconsulta=mysqli_stmt_get_result($stmt);

    //        mysqli_fetch_assoc($resultadoconsulta);

    //        mysqli_stmt_close($stmt);


    // }SELECT avg(nota) as media,modulo, max(nota) as "Mejor Nota" FROM tbl_notas group by modulo order by media desc;

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