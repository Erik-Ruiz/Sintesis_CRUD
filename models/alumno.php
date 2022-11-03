<?php

require_once("persona.php");

final class Alumno extends Persona{
    
    
    private $clase;
    private $promocion;
    private $matricula;


    public function __construct(){

        parent::__construct();


    }
    private function bd(){
        require  "../controller/connection.php";
        return $conexion;
    }
    // public static function getAlumnosFilter($sql){
    //     //require_once "../controller/config.php";
    //     $conexion=self::bd();

    //     define('NUM_ITEMS_BY_PAGE', 9);

    //     //Parte paginacion
    //     $resultado = $conexion->query('SELECT COUNT(*) as total_alu FROM tbl_alumno;');
    //     $row = $resultado->fetch_assoc();
    //     // Asignamos el numero de resultados a estas variables
    //     $num_total_rows = $row['total_alu'];
    //     if ($num_total_rows > 0) {
    //         $page = false;
    
    //     //Examinamos la pagina a mostrar y el inicio del registro a mostrar
    //     if (isset($_GET["page"])) {
    //         $page = $_GET["page"];
    //     }
    
    //     if (!$page) {
    //         $start = 0;
    //         $page = 1;
    //     } else {
    //         $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    //     }
    //     //Calculo el total de paginas
    //     $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
    //     }
  
    //     $paginas = NUM_ITEMS_BY_PAGE;


    //     //Parte alumno
    //     $sql="SELECT matricula, nombre, apellido, apellido2, correo, dni FROM tbl_alumno LIMIT where matricula like '%$filtroP%' $start, $paginas";


    //     $stmt = mysqli_stmt_init($conexion);
    //     mysqli_stmt_prepare($stmt, $sql);
    //     mysqli_stmt_execute($stmt);
                
    //     $resultadoconsulta= mysqli_stmt_get_result($stmt);

    //     mysqli_fetch_assoc($resultadoconsulta);

    //     mysqli_stmt_close($stmt);
    //     mysqli_fetch_assoc($resultadoconsulta);
    //     $results = array($resultadoconsulta,$total_pages,$page);
    //     return $results;
    // }
    public static function getAlumnos(){
        
        //require_once "../controller/config.php";
        $conexion=self::bd();//conexion con la bd

        //echo $_GET['nombre'];
        if(isset($_GET['nombre'])){
           $where="where nombre like '%".$_GET['nombre']."%' "; 
        }else{
           $where=''; 
        }
            

        define('NUM_ITEMS_BY_PAGE', 10);

        //Parte paginacion
        $resultado = $conexion->query("SELECT COUNT(*) as total_alu FROM tbl_alumno $where;");
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
        $sql="SELECT id, matricula, nombre, apellido, apellido2, correo, dni FROM tbl_alumno $where LIMIT $start, $paginas";


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
    public static function getMediaAlumno($id){

        //require_once "../controller/config.php";
        $conexion=self::bd();
        

        $sql="SELECT round(avg(nota),2) as media FROM tbl_notas where id_alumno = ?";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_assoc($consulta);

        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }
    public static function getMejorAlumno($modulo){

        //require_once "../controller/config.php";
        $conexion=self::bd();
        

        $sql="SELECT avg(a.nota) as nota, b.nombre as nombre, b.apellido as apellido, b.apellido2 as apellido2,b.id as id FROM tbl_notas as a inner join tbl_alumno as b on a.id_alumno = b.id where a.modulo = ? GROUP BY a.id_alumno ORDER BY nota DESC limit 1";

        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
            
        mysqli_stmt_bind_param($stmt,"s",$modulo);
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
    public static function getNotaModuloAlumno($id){

        $conexion=self::bd();

        $sql="SELECT * FROM tbl_notas WHERE id_notas = ? ";  
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $consulta = mysqli_stmt_get_result($stmt);
    
        $resultadoconsulta=mysqli_fetch_assoc($consulta);  //mysqli_fetch_assoc();
        //$resultadoconsulta=mysqli_fetch_assoc($consulta);
        mysqli_stmt_close($stmt);
        
        return $resultadoconsulta;
    }

    public static function setNotaModulo($id,$nota){

        $conexion=self::bd();

        $sql="UPDATE tbl_notas SET nota = ? WHERE id_notas = ? ";  
        $stmt = mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"di",$nota,$id);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        
    }
    public static function crearAlumno($nombre, $apellido, $apellido2, $correo, $dni,$telefono, $matricula, $promocion, $clase){
        require_once '../controller/connection.php';
        // $conexion->autocommit(FALSE);
        // try{
            
        //     $conexion->begin_transaction();
        //     $conexion->query("INSERT INTO tbl_alumno values (null,'$nombre', '$apellido', '$apellido2', '$correo', '$dni','$telefono', '$matricula', '$promocion', '$clase');");
        //     $id =mysqli_insert_id($conexion);
        //     $conexion->query("INSERT INTO ss (id_alumno,modulo,uf,nota) values ($id,'M12','UF1','0'),($id,'M6','UF1','0'),($id,'M7','UF1','0'),($id,'M9','UF1','0'),($id,'M8','UF2','0'),($id,'M8','UF4','0'),($id,'M3','UF4','0'),($id,'M3','UF5','0'),($id,'M3','UF6','0'),($id,'M2','UF2','0');");
        //     $conexion->commit();
        //     return TRUE;
        // }catch(Exception $e){
        //     $conexion->rollback();
        //     echo 'Fallo: ',  $e->getMessage(), "\n";
        //     return false;

        // }
            
        // try{
        //     mysqli_begin_transaction($conexion);

        //     $sql1= "INSERT INTO tbl_alumno values (null,'$nombre', '$apellido', '$apellido2', '$correo', '$dni','$telefono', '$matricula', '$promocion', '$clase');";
        //     mysqli_query($conexion, $sql1);
        //     $id=mysqli_insert_id($conexion);
        //     $sql2= "INSERT INTO tbl_notassssASA ('id_alumno','modulo','uf','nota') values ($id,'M12','UF1','0'),($id,'M6','UF1','0'),($id,'M7','UF1','0'),($id,'M9','UF1','0'),($id,'M8','UF2','0'),($id,'M8','UF4','0'),($id,'M3','UF4','0'),($id,'M3','UF5','0'),($id,'M3','UF6','0'),($id,'M2','UF2','0');";
        //     mysqli_query($conexion, $sql2);
        //     mysqli_commit($conexion, TRUE);
        //     return TRUE;

        // } catch (Exception $e) {
        //     // Something went wrong. Rollback
        //     $conexion->rollback();
        //     // Rethrow the exception so that PHP does not continue
        //     // with the execution and the error can be logged in the error_log
        //     echo 'Fallo: ',  $e->getMessage(), "\n";
        //     die();
        // }

//         mysqli_query("start transaction;");

// //db_res calls a custom function that performs a mysql_query on the query
//         $res1 = db_res("INSERT INTO tbl_alumno values (null,'$nombre', '$apellido', '$apellido2', '$correo', '$dni','$telefono', '$matricula', '$promocion', '$clase');");
//         $id=mysqli_insert_id($conexion);
//         $res2 = db_res("INSERT INTO tbl_notassssASA ('id_alumno','modulo','uf','nota') values ($id,'M12','UF1','0'),($id,'M6','UF1','0'),($id,'M7','UF1','0'),($id,'M9','UF1','0'),($id,'M8','UF2','0'),($id,'M8','UF4','0'),($id,'M3','UF4','0'),($id,'M3','UF5','0'),($id,'M3','UF6','0'),($id,'M2','UF2','0');");

//         if( $res1 && $res2)
//         {
//         mysqli_query("commit;");
//         }
//         else
//         {
//         mysqli_query("rollback;");
//         }
        try{
            $pdo->beginTransaction();
            
            $sql="INSERT INTO tbl_alumno values (null,?,?,?,?,?,?,?,?,?);";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$apellido);
            $stmt->bindParam(3,$apellido2);
            $stmt->bindParam(4,$correo);
            $stmt->bindParam(5,$dni);
            $stmt->bindParam(6,$telefono);
            $stmt->bindParam(7,$matricula);
            $stmt->bindParam(8,$promocion);
            $stmt->bindParam(9,$clase);
            $stmt->execute();

            $id=$pdo->lastInsertId();
            $sql2="INSERT INTO tbl_notasss (id_alumno,modulo,uf,nota) values (?,'M12','UF1','0'),(?,'M6','UF1','0'),(?,'M7','UF1','0'),(?,'M9','UF1','0'),(?,'M8','UF2','0'),(?,'M8','UF4','0'),(?,'M3','UF4','0'),(?,'M3','UF5','0'),(?,'M3','UF6','0'),(?,'M2','UF2','0');";
            $stmt=$pdo->prepare($sql2);
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$id);
            $stmt->bindParam(3,$id);
            $stmt->bindParam(4,$id);
            $stmt->bindParam(5,$id);
            $stmt->bindParam(6,$id);
            $stmt->bindParam(7,$id);
            $stmt->bindParam(8,$id);
            $stmt->bindParam(9,$id);
            $stmt->bindParam(10,$id);
            $stmt->execute();

            $pdo->commit();
            return true;
        }catch(Exception $e){
            $conexion->rollback();
            echo "Error: ".$e->getMessage();
            return false;
        }

    }


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

            
            try{
              unlink('../img/alum/'.$matricula['matricula'].'.png');
              $ok='ok';  
            }catch(Exception $e){
                
            }
            

        }catch(Exception $e){
            $ok='nok';
        }finally{
            return $ok;
        }


        
    }

    public static function updateAlumno($id,$nombre,$apellido, $apellido2, $dni, $telefono,
                                        $correo, $clase, $promocion ){
        try{
            $conexion=self::bd();


            $sql="UPDATE tbl_alumno SET nombre=?,apellido=?, apellido2=?,dni=?, telefono=?,correo=?, clase=?,promocion=? WHERE id=?";


            $stmt = mysqli_stmt_init($conexion);

            mysqli_stmt_prepare($stmt, $sql);

            mysqli_stmt_bind_param($stmt, "ssssssssi", $nombre, $apellido, $apellido2, $dni, $telefono, 
            $correo, $clase, $promocion, $id);

            mysqli_stmt_execute($stmt);


            mysqli_stmt_close($stmt);
            $ok = true;

        }catch(Exception $e){
            
            $ok = $e;
        }finally{
            return $ok;
        }
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