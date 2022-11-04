<?php

    //require_once '../components/cabecera.html';

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>Formulario</title>
</head>
<body>


  
<!-- <nav class="navbar bg-dark">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top"></a>
    <form class="d-flex" role="search" action="../pages/login.php" method="POST">
      <button class="btn btn-outline-success" name="login" type="submit">Log In</button>
    </form>
  </div>
</nav> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if(!isset($_GET['id'])){
  $action = "../controller/crearcontroller.php";
}else{
  $action = "../controller/editarcontroller.php";
}
?>

<div class="box">
  <form class="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data" onsubmit="FormAlumno(event)">
    <h2>ALUMNO</h2>
    <?php 
    if(!isset($_GET['id'])){
    ?>
    
    <div class="flex">
      <div class="inputBox">
        <input type="text" required= "required" name="nombre" id="nombre"/>  
        <span>Nombre</span>      
        <i></i>
      </div>

      <div class="inputBox">
      <span>Primer Apellido</span>
        <input type="text" required="required" name="apellido" id="apellido">
        <i></i>
      </div>

      <div class="inputBox">
      <span>Segundo apellido</span>
        <input type="text" required="required" name="apellido2" id="apellido2"></input>
        <i></i>
      </div>
    </div>

    <div class="">
      <div class="inputBox">
      <span>Correo</span>
        <input type="email" required="required" name="correo" id="correo"></input>
        <i></i>
      </div>

      <div class="inputBox">
      <span>DNI</span>
        <input type="text" required="required" name="dni" id="dni"></input>
        <i></i>
      </div>

      <div class="inputBox">
      <span>Telefono</span>
        <input type="text" required="required" name="telefono" id="tel"></input>
        <i></i>
      </div>
    </div>    


    
    
    <?php
    }else{
      $id=$_GET['id'];
      require_once '../models/alumno.php';
      $infoAlumno=Alumno::getAlumnoId($id);
    ?>
    <div class="inputBox">
      <input type="text" name="nombre" required="required" value="<?php echo $infoAlumno['nombre'] ?>" id="nombre"/>
      <span>Nombre</span>
      <i></i>
    </div>

    <div class="inputBox">
      <input type="text" name="apellido" required="required" value="<?php echo $infoAlumno['apellido'] ?>" id="apellido"></input>
      <span>Primer Apellido</span>
      <i></i>
    </div>

    <div class="inputBox">
      <input type="text" name="apellido2" required="required" value="<?php echo $infoAlumno['apellido2'] ?>" id="apellido2"></input>
      <span>Segundo Apellido</span>
      <i></i>
    </div>

    <div class="inputBox">
      <input type="email" name="correo" required="required" value="<?php echo $infoAlumno['correo'] ?>" id="correo"></input>
      <span>Email</span>
      <i></i>
    </div>

    <div class="inputBox">
      <input type="text" name="dni" required="required" value="<?php echo $infoAlumno['dni'] ?>" id="dni"></input>
      <span>DNI</span>
      <i></i>
    </div>

    <div class="inputBox">
      <input type="text" name="telefono" required="required" value="<?php echo $infoAlumno['telefono'] ?>" id="tel"></input>
      <span>Telefono</span>
      <i></i>
    </div>

    <input type="hidden" name="matricula" value="<?php echo $infoAlumno['matricula'] ?>"></input>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></input>

    <?php
    }

    ?>
    
    <p type="IMG"><input type="file" name="fileToUpload"></input></p>
    <button type="submit" id="send" onclick="admin()">Guardar</button>
    <button>Cancelar</button>
    
  </form>
</div>

<script src="../js/alerts-server.js"></script>
<script src="../js/valid-info-alumnos.js"></script>
<script src="../js/cancelar.js"></script>
</body>
</html>