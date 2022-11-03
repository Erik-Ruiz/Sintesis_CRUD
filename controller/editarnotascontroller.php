<?php 
require_once '../models/alumno.php';
require_once '../includes/valid.inc.php';

$id=$_POST['id'];
$nota=$_POST['nota'];
$alumno=$_POST['idAlumno'];

if(!errorNota($nota)){

    Alumno::setNotaModulo($id,$nota);

    ?>
    
    <script>location.href='../pages/alumno.php?id=<?php echo $alumno; ?>&ok=Todo Correcto'</script>
    
    <?php
}else{
    ?>
    
    <script>location.href='../pages/alumno.php?id=<?php echo $alumno; ?>&error=Error en el tipo de la nota'</script>
    
    <?php
}


?>
