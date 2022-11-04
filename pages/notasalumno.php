<?php
require_once '../models/alumno.php';


?>

<head>
    <link rel="stylesheet" href="../css/notasalumno.css">
</head>

<div class="box">
    <form action="../controller/editarnotascontroller.php" method="POST" class="form">

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="idAlumno" value="<?php echo $_GET['idAlumno']; ?>" />
        
        <div class="inputBox">
            <input type="floating" name="nota" id="nota" value="<?php echo Alumno::getNotaModuloAlumno($_GET['id'])['nota'] ?>"/>
            <span>Nota</span>    
            <i></i>    
        </div>
        
        <input type="submit" name="submit" value="Guardar" id="send" onsubmit="FormEditNota(event)"/>
    
    </form>
</div>
