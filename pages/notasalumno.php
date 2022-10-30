<?php
require_once '../models/alumno.php';
echo $_GET['id'];

?>

<form action="../controller/editarnotascontroller.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
    <input type="hidden" name="idAlumno" value="<?php echo $_GET['idAlumno']; ?>" />
    <input type="floating" name="nota" value="<?php echo Alumno::getNotaModuloAlumno($_GET['id'])['nota'] ?>"/>
    <input type="submit" name="submit" value="submit" />
</form>