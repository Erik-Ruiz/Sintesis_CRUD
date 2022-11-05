<?php
require_once '../models/alumno.php';
require_once '../components/cabecera.html';

?>

<head>
    <link rel="stylesheet" href="../css/notasalumno.css">
</head>

<div class="box">
    <form action="../controller/editarnotascontroller.php" method="POST" class="form" id="formEditNotas" onsubmit="FormEditNota(event)">

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
        <input type="hidden" name="idAlumno" value="<?php echo $_GET['idAlumno']; ?>" />
        
        <div class="inputBox">
            <input type="number" step="0.01" name="nota" id="nota" value="<?php echo Alumno::getNotaModuloAlumno($_GET['id'])['nota'] ?>"/>
            <span>Nota</span>    
            <i></i>    
        </div>
        
        <button class="send" type="submit">Guardar</button>
    
    </form>
    <button class="send cancelar" id="cancelar" onclick="alum(<?php echo $_GET['id']; ?>)">Cancelar</button>
    
</div>
<script src="../js/valid-info-alumnos.js"></script>
<script src="../js/cancelar.js"></script>